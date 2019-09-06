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
     	<h4><b>Lc Purchase</b></h4>
    		<div class="card">
		<div class="card-body">
			<form class="cart_lcpurchase" method="post" action="{{url('insert-cartlcpurchase')}}">
				@csrf
				
				 <div class="row">
	<div class="col-sm-2 form-group">
        <label>Date</label>
        <input class="form-control" type="text" id="purchase_date" name="lc_purdate" value="<?php echo date('Y-m-d');?>">
    </div>
     <div class="col-sm-2 form-group">
        <label>L/C Number</label>
        <input class="form-control" type="text" id="lc_number" name="lc_number" placeholder="L/C Number">
    </div>
	<div class="col-sm-2 form-group">
        <label>Supplier Name</label>
         <select class="form-control" id="supplier_id" name="supplier_id">
        	<option value="CASH">CASH</option>
        	@foreach($suppliers as $v_data)
        	<option value="{{$v_data->supplier_id}}">{{$v_data->supplier_name}}</option>
        	@endforeach
        </select>
    </div>
    <div class="col-sm-2 form-group">
        <label>Purchase No</label>
        <?php
            $countpurchas=DB::table('temp_lc_purchase')->count();
            $addpurrchas=date('dmY').$countpurchas+1;
        ?>
        <input class="form-control" readonly="" value="LPO<?php echo $addpurrchas?>" type="text" id="lc_purchaseno" name="lc_purchaseno" placeholder="Purchase No">
    </div>
    <div class="col-sm-2 form-group">
        <label>Supplier Invoice No</label>
        <input class="form-control" type="text" id="lc_supplierno" name="lc_supplierno" placeholder="Supplier Invoice No">
    </div>
	<div class="col-sm-2 form-group">
        <label>Unite Type</label>
       <select name="lc_unitetype" id="lc_unitetype" class="form-control">
         <option value="PCS">PCS</option>
         <option value="Meter">Meter</option>
       </select>
    </div>

    <div class="col-sm-2 form-group">
        <label>Stock Id</label>
        <?php
            $stockid=DB::table('stock_report')->count();
            $stockidsum=date('dmY').$stockid+1;
        ?>
        <input readonly="" class="form-control" value="<?php echo $stockidsum?>" type="text" id="lc_stockid" name="lc_stockid" placeholder="Stock Id">
    </div>
    

     <div class="col-sm-2 form-group">
        <label>Supplier Code</label>
        <input class="form-control" type="text" id="lc_suppliercode" name="lc_suppliercode" placeholder="Company Code">
    </div>
	<div class="col-sm-2 form-group">
        <label>Con. Rate</label>
        <input class="form-control" type="text" id="lc_conrate" name="lc_conrate" placeholder="Con. Rate">
    </div>
     <div class="col-sm-2 form-group">
        <label>C&F BTD</label>
        <input class="form-control" readonly="" type="text" id="lc_candfbdt" name="lc_candfbdt" placeholder="C&F BTD">
    </div>
	<div class="col-sm-4 form-group">
        <label>C&F Name</label>
       <select name="candfid" id="candfid" class="form-control">
			@foreach($candfs as $v_candf)
         <option value="{{$v_candf->candfid}}">{{$v_candf->cf_name}}</option>

			@endforeach
       </select>
    </div>
    <div class="col-sm-2 form-group">
        <label>Group</label>
          <select class="form-control" id="lc_group" name="lc_group">
            @foreach ($groups as $group)
        	   <option value="{{$group->id}}">{{$group->group_name}}</option>
            @endforeach
        </select>
    </div>
	   <div class="col-sm-2 form-group">
        <label>Brand</label>
        <select class="form-control" id="lc_brand" name="lc_brand">
            @foreach ($brands as $brand)
        	<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
            @endforeach
        </select>
    </div>

   <div class="col-sm-2 form-group">
        <label>Category</label>
        <select class="form-control" id="lc_brand" name="lc_category">
            @foreach ($categorys as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
        </select>
    </div>
	<div class="col-sm-2 form-group">
        <label>Design No</label>
        <input class="form-control" type="text" id="lc_designno" name="lc_designno" placeholder="Design No">
    </div>
	<div class="col-sm-2 form-group">
        <label>Product Description*</label>
        <input class="form-control" type="text" id="lc_description" name="lc_description" placeholder="Product Description">
    </div>
	<div class="col-sm-2 form-group">
        <label>P.Quantity</label>
        <input class="form-control" type="text" id="lc_pquantity" name="lc_pquantity" placeholder="P.Quantity">
    </div>
	<div class="col-sm-2 form-group">
        <label>Rev. Quantity</label>
        <input class="form-control" type="text" id="lc_revquantity" name="lc_revquantity" placeholder="Rev. Quantity">
    </div>
	<div class="col-sm-2 form-group">
        <label>Pur. Rate</label>
        <input class="form-control" type="text" id="lc_purrate" name="lc_purrate" placeholder="Pur. Rate">
    </div>
	<div class="col-sm-2 form-group">
        <label>Carrying TK</label>
        <input class="form-control" type="text" id="lc_carryingtk" name="lc_carryingtk" placeholder="Carrying TK">
    </div>
	<div class="col-sm-2 form-group">
        <label>Cost BTD</label>
        <input class="form-control" readonly="" type="text" id="lc_costbtb" name="lc_costbtb" placeholder="Cost BTD">
    </div>
	<div class="col-sm-2 form-group">
        <label>W.Margin%</label>
        <input class="form-control" type="text" value="0" id="lc_wmargin" name="lc_wmargin" placeholder="Margin%">
    </div>
	<div class="col-sm-2  form-group">
        <label>Wholesale Price</label>
        <input class="form-control" type="text" id="lc_wprice" name="lc_wprice" placeholder="Wholesale Price">
    </div>
	<div class="col-sm-2 form-group">
        <label>R.Margin%</label>
        <input class="form-control" type="text" id="lc_rmargin" name="lc_rmargin" placeholder="Margin%">
    </div>
	<div class="col-sm-2 form-group">
        <label>Retail Price </label>
        <input class="form-control" type="text" id="lc_retailprice" name="lc_retailprice" placeholder="Retail Price">
    </div>
	
	<button type="submit" class="btn btn-info btn-block">Add Lc Purchase</button>

  </div>
  </form>
	
</div>

  </div>

		
     <div class="card">
		<div class="card-body">
	<table class="table table-bordered">
			<thead>
                <tr>
                <th style="width: 1%;">SL.</th>
                <th style="width: 30%">Description</th>
                <th style="width: 15%">Stock Id</th>
                <th style="width: 10%">Qty</th>
                <th style="width: 10%">Cost</th>
                <th style="width: 10%">Total Cost</th>
                <th style="width: 10%">Action</th>
            </tr>
            </thead>

			<tbody id="temp-lcinfo">
				
			</tbody>
		</table>
	</div>
	</div>			
			<form method="post" action="{{url('confirm-lcpurchase')}}">
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
<script type="text/javascript">
    $('#lc_conrate').keyup(function(){
        var lcconrate=$(this).val();
    $('#lc_purrate').keyup(function(){
        var lcpurrant=$(this).val();
        var condfbdt=(lcconrate*lcpurrant).toFixed(2);
            $('#lc_candfbdt').val(condfbdt);
            $('#lc_costbtb').val(condfbdt);
            $('#lc_carryingtk').keyup(function(){
            var carryingtk =$(this).val();
            var costbtd=+condfbdt+ +carryingtk;
                $('#lc_costbtb').val(costbtd);
                $('#lc_wprice').val(costbtd);
                $('#lc_retailprice').val(costbtd);
                    $('#lc_wmargin').keyup(function(){
                    var lcwmargin=$(this).val();
                    var x=$('#lc_costbtb').val();
                    var marge=((x*lcwmargin)/100).toFixed(2);
                    var WholesalePrice=+marge+ +x;
                    $('#lc_wprice').val(WholesalePrice);
                    $('#lc_retailprice').val(WholesalePrice);
                    $('#lc_rmargin').keyup(function(){
                        var lcrmargin =$(this).val();
                        var y=$('#lc_wprice').val();
                        var margind=((lcrmargin*y)/100).toFixed(2);
                        var rmargin=+y+ +margind;
                        $('#lc_retailprice').val(rmargin);
                    });
                });

            });

        });
    });

</script>
	
	<script type="text/javascript">
        
 
		   function Templcpurchase(){
		
		$.get("{{route('Temp_lcpurchase')}}", function(data){

			
				$('#temp-lcinfo').empty().html(data);

		      
		    
		});

		

	}

	window.onload = Templcpurchase();

		$(".cart_lcpurchase").on('submit', function(e){
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
								
								//console.log(data);
								$('#temp-lcinfo').empty().html(data);
								window.onload = Templcpurchase();
								
							}
					})
				  
				  });
	</script>
@endsection