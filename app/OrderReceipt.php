<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderReceipt extends Model
{
    protected $fillable = ["uuid_zpravy",
        "order_id" ,
        "dat_odesl" ,
        "prvni_zaslani",
        "overeni" ,
        "dic_popl",
        "id_provoz" ,
        "id_pokl" ,
        "porad_cis" ,
        "dat_trzby" ,
        "celk_trzba",
        "pkp",
        "fik",
        "bkp",
        "rezim"];

}
