@extends('layouts.app')


@section('content')
    @include('inc.nav')
		
    <div class="container mt-5">

        <div class="row">
            <div class="col-12 text-right">
                <a href="/store" class="btn btn-primary mb-2 rounded-0">Sync Orders</a>
            </div>
            <div class="col-12">
                @if(count($orders)> 0)
		
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
			    <th></th>
                            <th>Order Name</th>
                            <th>Payment Status</th>
                            <th>Fulfillment Status</th>
			    <th></th>			    
                            <th class="text-center">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                            <tr>
				<td>{{ $orders->firstItem() + $key }}</td>
                                <td>{{ $order->order_name }}</td>
                                <td>{{ $order->financial_status }}</td>
                                <td>{{ $order->fulfillment_stat }}</td>
			        <td class="text-center"><a href="{{ route('show.form',  $order['id']) }}" class="btn btn-sm btn-primary">View</a></td>
     				
                                <td class="text-center"><a href="{{ route('direct.pdf',  $order['id']) }}" class="btn btn-sm btn-danger">Download PDF</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <div class="text-center mt-5">
                        <h3>No Orders found!</h3>
                    </div>
                @endif

                <div class="d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
