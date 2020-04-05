@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <order-items></order-items>
            </div>
            <div class="col-md-6">
                <items-cart></items-cart>
            </div>
        </div>
        <create-item></create-item>
        <print-order></print-order>
    </div>

@stop
