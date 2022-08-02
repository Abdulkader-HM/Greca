<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseTrait;
use App\Http\Resources\OrderResource;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class OrderController extends Controller
{
    use ResponseTrait;

    public function orderProduct(Request $request)
    {
        $products = Product::find($request->product_id);
        $qty = $products->capacity;
        $booked_on = Booking::where('product_id', $request->product_id);
        $calculate_booking = Count($booked_on);
        if ($calculate_booking <= $qty) {
            $order = Booking::create([
                'client_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'booked_on' => 'available',
            ]);
            if ($order) {
                return $this->successResponse($order, 'available', 201);
            }
            return $this->errorResponse(null, 'unavailable', 400);
        }
        return $this->errorResponse(null, 'request failed', 400);
    }

    public function clientOrders($id)
    {
        $order = Client::with('products')->find($id);

        return response()->json($order);
    }
}
