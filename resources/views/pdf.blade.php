@extends('layouts.app')

@section('css')
    <style>
        input{
            border: none;
            border-bottom: 1px solid #000;
            background: none;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    @include('inc.nav')

    <div class="container mt-3">


        <div class="row bg-white p-2">
            <div class="col-md-12">
                <div class="logo text-center">
                    <img src="{{ asset('download.png') }}" alt="no image" class="w-100 img-fluid">
                    <h5 class="mt-2"><u>Small Parcel/Cargo Insurence </u><span class="text-danger">Buyer/Recipient Affidavit</span></h5>
                </div>


                <div class="row my-3">
                    <div class="order-details col-6">
                        Order Number: <span><u>{{ $order->f_id }}</u></span>
                    </div>

                    <div class="claim-details col-6 text-right">
                        Claim Number: <span>{{ $order->fulfillments ? $order->tracking : '............'}} </span>
                    </div>
                </div>


                <div class="claim-info">
                    <h4><u>Claim inforamation Sheet</u></h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Buyers / Recipients Name: </span><input type="text" disabled value="{{ $order['shipping_address'] ? $order->name : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span>Street Address / PO Box: </span><input type="text" disabled value="{{ $order['shipping_address'] ? $order->address : '' }}">
                        </div>

                        <div class="col-6">
                            <span>City: </span><input type="text" disabled value="{{ $order['shipping_address'] ? $order->city : '' }}">
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-4">
                            <span>State/Province: </span><input type="text" disabled  value="{{ $order['shipping_address'] ? $order->province : '' }}">
                        </div>

                        <div class="col-4">
                            <span>Postal/Zip Code: </span><input type="text" disabled  value="{{ $order['shipping_address'] ? $order->zip : '' }}">
                        </div>

                        <div class="col-4">
                            <span>Country: </span><input type="text" disabled  value="{{ $order['shipping_address'] ? $order->country : '' }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <span>Email </span><input type="text" disabled value="{{ $order['shipping_address'] ? $order->email : '' }}">
                        </div>
                        <div class="col-6">
                            <span>Phone: </span><input type="text" disabled  value="{{ $order['shipping_address'] ? $order->phone : '' }}">
                        </div>

                    </div>

                </div>

                <div class="claim-details">
                    <h4><u>Claim Detail</u></h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Lost / Damage / Incomplete: </span><input type="text">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>If item is damaged, please descibe and attach picture of damage:</span><input type="text" disabled >
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Describe condition of package: </span><input type="text" disabled >
                        </div>
                    </div>

                </div>

                <div class="seller-info">
                    <h4><u>Seller Information</u></h4>
                     <div class="row mb-3">
                        <div class="col-12">
                            <span>Name: </span><input type="text" disabled value="OTC SHOPPE EXPRESS">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span>Phone: </span><input type="text" disabled value="+1 (619) 880-0429">
                        </div>

                        <div class="col-6">
                            <span>Email: </span><input type="text" disabled value="HELLO@OTCSHOPPEEXPRESS.COM">
                        </div>
                    </div>

                    <p>I hearby certify that all information on this form is accurate and truthful under Federal Law and under penalty of perjury, under the laws of the state
                        of California. The submission of a false, fictitious or fraudulent or fraudulent
                        statement may result in imprisonment of up to 5 years and a fine of up to $10,000 (18 USC
                        1001). In addition, a civil penalty of up to $5,000, and an assessment of twice the
                        amount falsely claimed may be imposed ( 31 USC 3802).
                    </p>

                    <div class="row mb-2">
                        <div class="col-8">
                            <span>Buyer / Recipient Signature: </span><input type="text" disabled >
                        </div>

                        <div class="col-4">
                            <span>Date: </span><input type="text" disabled >
                        </div>
                    </div>

                    <p>Warning: Any fraudulent claims will make the shipper and/or consignee liable for any prosecution for
                        mail fraud under the federal crime code.<br><br>

                        Should the insured and/or shipper submit a false, fictitious or fraudulent statement,
                        it will result in the claims being denied.
                    </p>

                    <br>

                    <footer class="text-center">
                        <p><b>Insure</b>Ship 3211 Cahuenga Bivd. West Suite 200, Los Angeles, CA 900</p>
                        <div class="row">
                            <div class="col-4"><b>Phone:</b> (866) 701-3654 / (818) 303-9255</div>
                            <div class="col-4"><b>Fax: </b> (877) 859-5858</div>
                            <div class="col-4"><b>Email: </b>claims@insureship.com</div>
                        </div>
                    </footer>



                </div>

            </div>
        </div>

	<br><br><br><br>

	<div class="row bg-white p-2 mt-5">
	   <div class="col-md-12">
		<h4><u>Invoice</u></h4>
		<h5><u>Order Date:</u> <i>{{ $order->date }}</i></h5>
		
		@if($order->line_items_count >0)
                    <table class="table table-striped table-vcenter">
                       <thead>
                          <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          </thead>
                              <tbody>
                                {{ $order->line_item_details }}

                              </tbody>
                    </table>
		    <div class="row">
        <div class="col-6">
            <h4><u>Customer Details</u></h4>
            <h5>Buyers / Recipients Name: {{ $order['shipping_address'] ? $order->name : '' }}</h5>
            <h5>Phone: {{ $order['shipping_address'] ? $order->phone : '' }}</h5>
            <h5>Street Address / PO Box: {{ $order['shipping_address'] ? $order->address : '' }}</h5>
            <h5>City: {{ $order['shipping_address'] ? $order->city : '' }}</h5>
            <h5>Zip: {{ $order['shipping_address'] ? $order->zip : '' }}</h5>
            <h5>Country: {{ $order['shipping_address'] ? $order->country : '' }}</h5>
        </div>
        <div class="col-6 text-right">
            <h5>Sub Total: <u>${{ $order->sub_total }}</u></h5>
 	    <h5>Shipping Fee: <u>${{ $order->shipping_fee }}</u></h5>
            <h5>Total:<u>${{ $order->total }}</u></h5>
        </div>
    </div>
		   
                    @else
                            <p>No line items</p>
                    @endif
	   </div>  
        </div>

    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            window.print();
        });
    </script>
@endsection
