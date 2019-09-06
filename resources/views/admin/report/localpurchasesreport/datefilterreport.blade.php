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
			@break
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
		                <th>Total Cost</th>
		                <th>Total Price</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@php($i=1)
		        	@foreach ($datesearces as $datesearce)
			            <tr class="text-center">
			                <td>{{$i++}}</td>
			                <td>{{$datesearce->purchase_date}}</td>
			                <td>{{$datesearce->stock_id}}</td>
			                <td>{{$datesearce->quantity}}</td>
			                <td>{{$datesearce->quantity*$datesearce->cost}}</td>
			                <td>{{$datesearce->sale_price}}</td>
			                <td>
			                	<a href="{{ route('implemtentinvoice',['id'=>$datesearce->local_purchase_id,'sid'=>$datesearce->supplier_id]) }}" title="Show details" class="btn btn-info btn-xs" id="show">
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
