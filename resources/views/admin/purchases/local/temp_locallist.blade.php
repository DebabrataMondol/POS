 
 @php 
 $totalcost = 0;
 $grandtotal = 0;
 @endphp
 @php($i=1)
@foreach($templocals as $v_data)
	<?php 
	$totalcost = $v_data->cost * $v_data->quantity;
	$grandtotal = $totalcost+$grandtotal;
	?>
	<tr">
		<td>{{$i++}}</td>
		<td>{{$v_data->description}}</td>
		<td>{{$v_data->stock_id}}</td>
		<td>
			
			<form method="post" action="{{url('update-temp-local/'.$v_data->temp_localp_id)}}">
				@csrf
				<input readonly="" type="number" name="quantity" value="{{$v_data->quantity}}" style="width: 100%;">
				<button type="submit" class="btn btn-info" style="display: none;">Update</button>
			</form>
		</td>
		<td>{{$v_data->cost}}</td>
		<td>{{$totalcost}}</td>
		<td><a onclick="return confirm('Are You Sure To Delete')" href="{{url('delete/'.$v_data->temp_localp_id.'/templocal')}}"><i class="fa fa-trash" style="color: red;font-size: 20px"></i></a></td>
	</tr>
	

@endforeach
<tr>
	<th>Total</th>
	<th>-</th>
	<th>-</th>
	<th>{{$totalqty}}</th>
	<th></th>
	<th>{{$grandtotal}}</th>
	<th>-</th>
</tr>
