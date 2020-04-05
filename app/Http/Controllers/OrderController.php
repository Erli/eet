<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\OrderItem;
use App\OrderReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SlevomatEET\Client;
use SlevomatEET\Configuration;
use SlevomatEET\Cryptography\CryptographyService;
use SlevomatEET\Driver\GuzzleSoapClientDriver;
use SlevomatEET\EvidenceEnvironment;
use SlevomatEET\Receipt;

class OrderController extends Controller
{

    public function get(Request $request)
    {

        return response()->json(Order::orderBy('orders.created_at', 'desc')
            ->select('orders.*', 'order_receipts.*')
            ->join('order_receipts', 'orders.id', '=', 'order_receipts.order_id')
            ->get());
    }

    public function getById(int $id)
    {

       $receipt =  Order::orderBy('orders.created_at', 'desc')
        ->select('order_receipts.*', 'orders.*')
        ->join('order_receipts', 'orders.id', '=', 'order_receipts.order_id')
        ->where('orders.id',$id)
        ->get()->first();
       $items =  DB::table('order_items')
           ->join('items', 'items.id', '=', 'order_items.items_id')
           ->select('order_items.*', 'items.*')
        ->where('order_id',$id)
           ->get();
        return response()->json(["receipt"=>$receipt, "items"=>$items]);
    }

    public function index()
    {
        return view('orders');
    }

    public function detail()
    {
        return view('orders');
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->save();
        $sum = 0;
        foreach ($request->all() as $item) {
            $sum += ($item['price'] * $item['quantity']);
            DB::table('order_items')
                ->where('id', $item['id'])
                ->update(['order_id' => $order->id]);
        }
        $order->price = $sum;
        $order->save();
        $this->saveOrder($order);
        return $this->getById($order->id);
    }

    public function saveOrder($order)
    {
        $crypto = new CryptographyService(public_path() . '/cert/EET_CA1_Playground-CZ683555118.key', public_path() . '/cert/EET_CA1_Playground-CZ683555118.pub', '');
        $configuration = new Configuration(
            'CZ683555118',
            '1',
            '2',
            EvidenceEnvironment::get(EvidenceEnvironment::PLAYGROUND), // nebo EvidenceEnvironment::get(EvidenceEnvironment::PRODUCTION) pro komunikaci s produkčním systémem
            false // zda zasílat účtenky v ověřovacím módu
        );
        $client = new Client($crypto, $configuration, new GuzzleSoapClientDriver(new \GuzzleHttp\Client()));

        $receipt = new Receipt(
            true,
            null,
            $order->id,
            new \DateTimeImmutable(),
            $order->price * 100,
            $order->price * 100
        );

        try {
            $response = $client->send($receipt);
            $data = $response->getRequest()->getRequestData();
            $res = ['order_id' => $order->id, 'bkp' => $response->getBkp(), 'fik' => $response->getFik()];
            OrderReceipt::create($data['Hlavicka'] + $data['Data'] + $res);

        } catch (\SlevomatEET\FailedRequestException $e) {
            $response = $client->send($receipt);
            $data = $response->getRequest()->getRequestData();
            $res = ['order_id' => $order->id, 'bkp' => $response->getBkp(), 'fik' => $response->getFik(), 'pkp' => $e->getRequest()->getPkpCode()];
            OrderReceipt::create($data['Hlavicka'] + $data['Data'] + $res);
            //      echo $e->getRequest()->getPkpCode(); // if request fails you need to print the PKP and BKP codes to receipt
        } catch (\SlevomatEET\InvalidResponseReceivedException $e) {
            $response = $client->send($receipt);
            $data = $response->getRequest()->getRequestData();
            $res = ['order_id' => $order->id, 'bkp' => $response->getBkp(), 'fik' => $response->getFik(), 'pkp' => $e->getResponse()->getRequest()->getPkpCode()];
            OrderReceipt::create($data['Hlavicka'] + $data['Data'] + $res);
            //    echo $e->getResponse()->getRequest()->getPkpCode(); // on invalid response you need to print the PKP and BKP too
        }
    }
}
