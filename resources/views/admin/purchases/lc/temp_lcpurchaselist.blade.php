<?php
	$totalcost = 0;
	$grandtotal = 0;
?>
@php($i=1)
@foreach($templcs as $v_data)
<?php 
$totalcost = $v_data->lc_revquantity*$v_data->lc_costbtb;
$grandtotal = $totalcost+$grandtotal;
?>
<tr>
	<td>{{$i++}}</td>
	<td>{{$v_data->lc_description}}</td>
	<td>{{$v_data->lc_stockid}}</td>
	<td>
		<form method="post" action="{{url('update-temp-lcquantity/'.$v_data->temp_lcpur_id)}}">
			@csrf
			<input readonly="" style="width: 100%;" type="number" name="lc_revquantity" value="{{$v_data->lc_revquantity}}">
			<button type="submit" style="display: none;">Update</button>
			
		</form>
	</td>
	<td>{{$v_data->lc_costbtb}}</td>
	
	<td>{{$totalcost}}</td>
	<td><a onclick="return confirm('Are You Sure To Delete')" href="{{url('delete/'.$v_data->temp_lcpur_id.'/templcpur')}}"><i class="fa fa-trash" style="color: red;font-size: 20px"></i></a></td>
</tr>

@endforeach

<tr>
	<th>Total</th>
	<th>-</th>
	<th>-</th>
	<th>{{$lcqty}}</th>
	<th></th>
	<th>{{$grandtotal}}</th>
	<th>-</th>
</tr>