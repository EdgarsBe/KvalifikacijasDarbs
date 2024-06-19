<?php

namespace App\Jobs\StripeWebhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;
use Carbon\Carbon;
use App\Models\CartItems;
use App\Models\Orders;
use App\Models\OrderItems;

class PaymentIntentSucceeded implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;

    /**
     * Create a new job instance.
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $userId = $this->webhookCall->payload['data']['object']['metadata']['user_id'];

        $cartId = $this->webhookCall->payload['data']['object']['metadata']['cart_id'];
        
        $cartItems = CartItems::where('cart_id', $cartId)->get();
        
        CartItems::where('cart_id', $cartId)->delete();
        
        // Create order
        $order = new Orders();
        $order->user_id = $userId;
        $order->OrderOpen = Carbon::today();
        $order->OrderClosed = null;
        $order->Status = "Pending";

        $order->save();
        
        // Create order items for each cart item
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItems();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->save();
        }
    }
}
