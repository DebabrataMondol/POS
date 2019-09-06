@extends('admin.base')

@section('content')

<?php
$stock_id = '';
for ($counter = 0; $counter < 4; $counter++)
{
   $stock_id .= mt_rand(0, 5);
}
?>
<div class="content-wrapper">
     <div class="container">
     	<h4><b>Local Purchases</b></h4>
    		<div class="card">
		<div class="card-body">
<form class="cart_localpurchase" method="post" action="{{url('insert-cartlocalpurchase')}}" name="editProductForm">
				@csrf
		<div class="row">
	<div class="col-sm-2 form-group">
        <label>Date</label>
        <input class="form-control" type="text" id="purchase_date" name="purchase_date" value="<?php echo date('Y-m-d');?>">
    </div>
     <div class="col-sm-2 form-group">
        <label>Supplier Name</label>
        <select class="form-control" id="supplier_id" name="supplier_id">
        	@foreach($suppliers as $v_data)
        	<option value="{{$v_data->supplier_id}}">{{$v_data->supplier_name}}</option>
        	@endforeach
        </select>
    </div>
    <div class="col-sm-2 form-group">
        <label>Purchase No</label>
        <?php
            $count=DB::table('local_purchase')->count();
            $maincount=date('dmY').$count+1;
        ?>
        <input class="form-control" value="PO<?php echo $maincount ?>" type="text" id="purchase_no" name="purchase_no"  readonly="">
    </div>
    <div class="col-sm-2 form-group">
        <label>Supplier Invoice No</label>

        <input class="form-control" value="" type="text" id="supplier_invoiceno" name="supplier_invoiceno" placeholder="Supplier Invoice No">
    </div>
	<div class="col-sm-2 form-group">
        <label>Unite Type</label>
       <select name="unit_type" id="unit_type" class="form-control">
         <option value="PCS">PCS</option>
         <option value="Meter">Meter</option>
       </select>
    </div>

		 <div class="col-sm-2 form-group">
        <label>Supplier Code</label>
        <input class="form-control" type="text" id="supplier_code" name="supplier_code" placeholder="Supplier Code">
    </div>

    <div class="col-sm-2 form-group">
        <label>Stock Id</label>
           <?php
               $stockid=DB::table('stock_report')->count();
               $stockidsum=date('dmY').$stockid+1;
           ?>
      <input class="form-control" readonly="" type="text" id="stock_id" name="stock_id" value="<?php echo $stockidsum?>">
    </div>

    <div class="col-sm-2 form-group">
        <label>Group</label>
         <select class="form-control" id="pgroup" name="pgroup">
         	@foreach ($groups as $group)
        		<option value="{{$group->group_name}}">{{$group->group_name}}</option>
         	@endforeach
        </select>
    </div>
	   <div class="col-sm-2 form-group">
        <label>Brand</label>
        <select class="form-control" id="pbrand" name="pbrand">
        	@foreach ($brands as $brand)
        		<option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
        	@endforeach
        </select>
    </div>

   <div class="col-sm-2 form-group">
        <label>Category</label>
        <select class="form-control" id="pcategory" name="pcategory">
        	@foreach ($categorys as $category)
        		<option value="{{$category->category_name}}">{{$category->category_name}}</option>
        	@endforeach
        </select>
    </div>
	<div class="col-sm-4 form-group">
        <label>Product Description <span style="color: red;">*</span></label>
        <input class="form-control"  type="text" id="description" name="description" placeholder="Product Description">
    </div>
	<div class="col-sm-2 form-group">
        <label>Quantity</label>
        <input class="form-control" type="text" id="quantity" name="quantity" placeholder="Quantity">
    </div>
	<div class="col-sm-2 form-group">
        <label>Cost</label>
        <input class="form-control" type="text" id="cost" name="cost" placeholder="Cost">
    </div>
	<div class="col-sm-2 form-group">
        <label>Margin%</label>
        <input class="form-control" type="text" id="margin" name="margin" placeholder="Margin%">
    </div>
	<div class="col-sm-2 form-group">
        <label>Sales Price</label>
        <input class="form-control" type="text" id="sale_price" name="sale_price" placeholder="Sales Price">
    </div>

    	<button type="submit" class="btn btn-info btn-block">Add Product</button>


</div>
</form>
</div>

  </div>



		<table class="table table-bordered">
			<thead>
				<tr>
                <th style="width: 10%;">SL.</th>
				<th style="width: 30%">Description</th>
				<th style="width: 15%">Stock Id</th>
				<th style="width: 10%">Qty</th>
				<th style="width: 10%">Cost</th>
				<th style="width: 10%">Total Cost</th>
				<th style="width: 10%">Action</th>
			</tr>
			</thead>

			<tbody id="temp_localperches">

			</tbody>
		</table>

			<form method="post" action="{{url('confirm-localpurchase')}}">
				@csrf

				<div class="all-button text-center">
					<button type="submit" class="btn btn-info">Submit</button>
				<button type="button" class="btn btn-info">Report</button>
				<button type="button" class="btn btn-info">Print Barcode</button>
				</div>
			</form>
 </div>
</div>
@endsection

@section('scriptsection')

<script>
    $('#cost').keyup(function(){
        var x=$(this).val();
    $('#margin').keyup(function(){
            var y=$(this).val();
            var z=(x*y)/100;
            var a=+x+ +z;
            $('#sale_price').val(a);
        });
    });
</script>


<script type="text/javascript">
   function conCat () {
        var x=$("#pgroup").val();
        var y=$("#pbrand").val();
        var z=$("#pcategory").val();
        $('#description').val(x +' '+ y +' '+z);
        }
        $("#pgroup").on('change', conCat);
        $("#pbrand").on('change', conCat);
        $("#pcategory").on('change', conCat);
</script>

	<script type="text/javascript">

        function TemplocalPerc(){

		$.get("{{route('Temp_localperches')}}", function(data){

				$('#temp_localperches').empty().html(data);

		});
	}
	 window.onload = TemplocalPerc();


		$(".cart_localpurchase").on('submit', function(e){
				e.preventDefault();

				var data = $(this).serialize();
				var url = $(this).attr('action');
				var method = $(this).attr('method');
				//console.log(url+method);

					$.ajax({
							url : url,
							type : method,
							data : data,
							dataTy : 'json',
							success:function(data)
							{
								$('#category').val("");
								$('#description').val("");
								$('#quantity').val("");
								$('#cost').val("");
								$('#margin').val("");
								$('#sale_price').val("");

								$('#temp_localperches').empty().html(data);
								 return TemplocalPerc();

							}
					})

				  });
	</script>
@endsection
