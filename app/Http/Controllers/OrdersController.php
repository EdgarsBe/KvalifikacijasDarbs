<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function showOrders()
    {
        //Produktu izvade tabulā
        $orders = Orders::all();

        return view('admin/Orders', ['orders' => $orders]);
    }
}
