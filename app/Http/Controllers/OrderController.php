<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $orders = DetailTransaction::join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->join('transactions', 'transactions.id', '=', 'detail_transactions.transaction_id')
            ->where('transactions.user_id', '=', $user_id)
            ->get();
        return view('frontend.user_order', compact('orders'));
    }
}
