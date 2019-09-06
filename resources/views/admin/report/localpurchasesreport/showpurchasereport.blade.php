@extends('admin.base')

@section('content')

	<div class="content-wrapper">
<div class="row" id="printstockreport" >

	<div class="col-md-12 text-center">
		@foreach ($supplayers as $supplayer)
			<h4>{{$supplayer->supplier_name}}</h4>
			<h6>{{$supplayer->supplier_address}}&nbsp;&nbsp;{{$supplayer->supplier_email}}</h6>
			<h6> <strong><u>Supplay Date:</u></strong> {{$supplayer->supplier_date}}</h6>
			<h6> <strong>Contact:</strong> {{$supplayer->supplier_mobile}}</h6>
		@endforeach
	</div>

	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover"  cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Sl.</th>
		                <th>Date</th>
		                <th>Invoice Number</th>
		                <th>Quentity</th>
		                <th>Cost</th>
		                <th>Price</th>
		                <th>Total Cost</th>
		                <th>Total Price</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@php($i=1)
		        	@foreach ($filterdates as $filterdate)
			            <tr class="text-center">
			                <td>{{$i++}}</td>
			                <td>{{$filterdate->purchase_date}}</td>
			                <td>{{$filterdate->stock_id}}</td>
			                <td>{{$filterdate->quantity}}</td>
			                <td>{{$filterdate->cost}}</td>
			                <td>{{$filterdate->sale_price}}</td>
			                <td>{{$filterdate->quantity*$filterdate->cost}}</td>
			                <td>{{$filterdate->sale_price}}</td>
			                <td>
			                	<a title="Show details" href="{{route('implemtentinvoice',['id'=>$filterdate->local_purchase_id,'sid'=>$filterdate->supplier_id])}}" class="btn btn-info btn-xs" id="show">
			                	<span class="fa fa-eye"></span>
								</a>
			                </td>
			            </tr>
		        	@endforeach
		         </tbody>
		</table>
	</div>
</div>

	</div>
@endsection
