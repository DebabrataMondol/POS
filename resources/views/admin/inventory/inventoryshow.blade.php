@extends('admin.base')

@section('content')
	<div class="content-wrapper">
<div class="printbtn">
	<div class="fa fa-print"></div>
</div>
<div class="row" id="printstockreport" >
	<div class="col-sm-12">

		@foreach ($companyinfos as $companyinfo)
		<h4 style="text-align: center;"><b>{{ $companyinfo->company_name }}</b></h4>
		@endforeach

		@foreach ($branchs as $branch)
		<h6 style="text-align: center;">Branch Name: {{$branch->branch_name}}</h6>
		<h6 style="text-align: center;">Address:&nbsp;{{$branch->branch_address}}</h6>
		<h6 style="text-align: center;">Mobile No:&nbsp;{{$branch->branch_mobile}}&nbsp; Email:&nbsp;{{$branch->branch_email}}</h6>
		@endforeach
		<h6 style="text-align: center;">Current Date:&nbsp;<?php echo date('d/m/Y')?></h6>
		<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Sl.</th>
		                <th>Description</th>
		                <th>Stock Id</th>
		                <th>Quentity</th>
		                <th>Cost</th>
		                <th>Price</th>
		                <th>Total Cost</th>
		                <th>Total Price</th>
		            </tr>
		        </thead>
		        <tbody>
					@php($i=1)
		        	@foreach ($stockreports as $stockreport)
			            <tr>
			                <td>{{$i++}}</td>
			                <td>{{$stockreport->report_description}}</td>
			                <td style="text-align: center;">{{$stockreport->report_stock_id}}</td>
			                <td style="text-align: center;">{{$stockreport->report_quantity}}</td>
			                <td style="text-align: center;">{{$stockreport->report_cost}}</td>
			                <td style="text-align: center;">{{$stockreport->report_sales_price}}</td>
			                <td style="text-align: center;">{{$stockreport->report_cost * $stockreport->report_quantity}}</td>
			                <td style="text-align: center;">{{$stockreport->report_sales_price*$stockreport->report_quantity}}</td>
			            </tr>
		        	@endforeach
		         </tbody>
		</table>
	</div>
</div>


</div>
@endsection
