<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
	public function index()
	{
		$orders = Order::Active()->orderBy('id', 'desc')->paginate(10);
		return view('admin.orders.orders', compact('orders'));
	}
	public function orderInfo($id)
	{
		$order = Order::where("id", $id)->first();
		$products = $order->products()->withTrashed()->get();
		return view('admin.orders.order', compact('order', 'products'));
	}
	/**
	 *
	 * @param  \Illuminate\Http\Request  $request
	 */
	function fetch_data(Request $request)
	{
		if ($request->ajax()) {
			$searchInput = $request->get('query') ??  '';
			$paymentFilter = $request->get('filter');
			$dateFilter = $request->get('date');

			$orders = Order::active();
			$searchInput ? $orders = $orders->where(function ($query) use ($searchInput) {
				foreach (['name', 'destination_adress', 'comment', 'email'] as $field)
					$query->orWhere($field, 'like', "%{$searchInput}%");
			}) : '';
			$paymentFilter != "" ? $orders = $orders->where('payment', $paymentFilter) : '';
			$dateFilter != "" ? $orders = $orders->orderBy('created_at', $dateFilter) : '';

			$orders = $orders->paginate(7);
			return response()->json(
				[
					'view' => view('admin.orders.searchData', compact('orders'))->render()
				]
			);
		}
	}
}
