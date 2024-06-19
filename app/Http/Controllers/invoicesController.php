<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Orders;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Http\Request;

class invoicesController extends Controller
{
    public function show($orderId) {

        $orderId = $orderId;

        $order = Orders::with('user')->find($orderId);

        $orderItems = OrderItems::with('product')->where('order_id', $order->id)->get();

        $customer = new Buyer([
            'name'          => $order->user->firstname . ' ' . $order->user->lastname,
            'custom_fields' => [
                'email' => $order->user->email,
            ],
        ]);
        
        foreach ($orderItems as $orderItem) {
            $items[] = InvoiceItem::make($orderItem->product->Title)->pricePerUnit($orderItem->product->Price);                
        }
        
        $invoice = Invoice::make()
            ->buyer($customer)
            ->addItems($items);
        
        return $invoice->stream();
    }
}
