<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Http\Controllers\HelperController;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class OrdersController extends Controller
{
    public function getAllOrders(Request $request) {

	if($request->query('order')) {
		$query = $request->query('order');

		if($query == 'unfulfilled'){
		   $orders = Order::where('fulfillment_status', null)->simplePaginate(50);
		}
		else{
		   $orders = Order::where('order_name', 'like', '%' . $query . '%')->
				 orWhere('financial_status', 'like', '%' . $query . '%')->
				 orWhere('fulfillment_status', 'like', '%' . $query . '%')->
				 orWhere('shipping_address', 'like', '%' . $query . '%')->simplePaginate(50);
		}
		
	}
	else {
		$orders = Order::latest()->simplePaginate(50);
	}

        



        return view('welcome')->with('orders', $orders);
    }

    public function storeOrders() {

        $api = HelperController::config();
        $orders = [];

        $response = $api->rest('GET', '/admin/orders/count.json', null, [],true);
	

        if(!$response['errors']) {
            $count = $response['body']['container']['count'];
            
            $iterations = ceil($count / 50);
            $next = '';

            for ($i = 1; $i <= $iterations; $i++) {
                if ($i == 1) {
                    $order_response = $api->rest('GET', '/admin/orders.json');
                } else {
                    $order_response = $api->rest('GET', '/admin/orders.json', ['page_info' => $next]);
                }

                if(!$order_response['errors']) {
                    if($order_response['link'] != null){
                        $next = $order_response['link']['next'];
                    }

                    $orders =  array_merge($orders,$order_response['body']['container']['orders']);

                }
            }
        }


	



        foreach ($orders as $order) {
	   $this->order_sync($order);	    
        }

        return redirect()->back();
    }

    public function order_sync($order){
	if(Order::where('id', $order['id'])->exists()) {
		 $o = Order::find($order['id']);
	    } 
	    else{
                $o = new Order();
            }
            

                if(array_key_exists("shipping_address",$order)) {
                    $o->shipping_address = json_encode($order['shipping_address']);
                }
                else{
                    $o->shipping_address = null;
                }
                if($order["fulfillments"] == null) {
                    $o->fulfillments = null;
                }
                else {
		    $o->fulfillments = json_encode($order['fulfillments']);
                    
                }

 	        if($order["tags"] == null) {
                    $o->frugo_id = null;
                }
                else {
		    $o->frugo_id = $order['tags'];         
                }

		$o->line_items = json_encode($order['line_items']);
		$o->customer = json_encode($order['customer']);
                $o->order_name = $order['name'];
		$o->total = $order['total_price'];
		$o->sub_total = $order['subtotal_price'];
                $o->id = $order['id'];
                $o->financial_status = $order['financial_status'];
		$o->shipping_price = json_encode($order['total_shipping_price_set']);
		$o->order_date = $order['created_at'];
		$o->fulfillment_status = $order['fulfillment_status'];
                $o->save();

    }

    public function showFormPage($id) {


        $order = Order::find($id);


        return view('insurence-form')->with('order', $order);
    }

    
    public function pdf(Request $request) {

	
        $order = Order::find($request->query('id'));


        return view('insurence-form')->with('order', $order);
    }


    public function showEditForm($id) {


        $order = Order::find($id);



        return view('form')->with('order', $order);
    }


    public function directDownload($id) {
        $order = Order::find($id);

        return view('pdf')->with('order', $order);
    }




    public function generatePdf($id) {


        $api = HelperController::config();

        $results = $api->rest('GET', '/admin/orders/'.$id.'.json', null, [],true);


        $order = $results['body']['container']['order'];


        $pdf = PDF::loadView('pdf', [
            "order" =>$order
        ]);

        return $pdf->download('form.pdf');
    }
    public function submit(Request $request) {

	

        $this->validate($request, [
            'order_id' => 'required',
            'tracking_number' => 'required',
            'buyer_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'buyer_phone' => 'required',
            'buyer_email' => 'required|email',
            'condition' => 'required',
            'description' => '',
            'name' => 'required',
            'seller_phone' => 'required',
            'seller_email' => 'required|email',
        ]);

        $image = null;
        if($request->hasFile('img')) {
            $image = $request->img->store('forms');
        }

        Order::create([
            'order_id' => $request->order_id,
            'tracking_number' => $request->tracking_number,
            'buyer_name' => $request->buyer_name,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'buyer_phone' => $request->buyer_phone,
            'buyer_email' => $request->buyer_email,
            'condition' => $request->condition,
            'description' => $request->description,
            'img' => $image,
            'name' => $request->name,
            'seller_phone' => $request->seller_phone,
            'seller_email' => $request->seller_email,
        ]);

        return redirect()->back()->with('success', "Data Stored Successfully!");



    }

    public function getSingleOrder($id) {

        $api = HelperController::config();

        $results = $api->rest('GET', '/admin/orders/'.$id.'.json', null, [],true);


        dd($results['body']['container']['order']);

    }

}
