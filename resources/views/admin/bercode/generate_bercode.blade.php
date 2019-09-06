@extends('admin.base')

@section('content')
    <div class="content-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 5px;">
                        <h2 style="border-bottom: #3d35ff;">Barcode Control Panel</h2>
                    </div>
                </div>
                <div class="container">
                    <form action="{{route('Bardode')}}" method="get">
                        <div class="row col-sm-10 text-center" style="margin-left: 80px;">
                            <div class="col-sm-2 text-center" style="margin-top: 14px;margin-left: 10px;">From Date</div>
                            <div class="col-sm-3" style="margin-left: -30px;margin-top: 9px;">
                                <input type="date" class="form-control" name="fromdate"/>
                            </div>
                            <div class="col-sm-2 text-center" style="margin-top: 14px;">To Date</div>
                            <div class="col-sm-3" style="margin-left: -20px;margin-top: 9px;">
                                <input type="date" class="form-control" name="todate"/>
                            </div>
                            <div class="col-sm-1 form-group" style="margin-top: 12px;">
                                <button type="submit" class="btn btn-info">Load</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <br>
                <div class="madescroll" style="overflow:scroll; height:250px;">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr style="text-align: center;">
                        <th>SL.</th>
                        <th>Barcode</th>
                        <th>Description</th>
                        <th>P. Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                        <tbody style="overflow: scroll">
                        <?php $i=1?>
                        @foreach($filterdates as $filterdate)
                        <tr style="text-align: center;">
                            <th class="text-center">{{ $i++ }}</th>
                            <td>{{$filterdate->report_stock_id}}</td>
                            <td>{{$filterdate->report_description}}</td>
                            <td>{{$filterdate->report_quantity}}</td>
                            <td>{{$filterdate->report_sales_price}}</td>
                            <td class="text-center">
                                <button type="button" value="{{$filterdate->stockreport_id}}" class="btn btn-primary editeAdd" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-edit"></i><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
                <br>
            </div>
            <div class="card">
                <div class="ibox-body">
                    <div class="madescroll" style="overflow:scroll; height:250px;">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr style="text-align: center;">
                            <th>SL.</th>
                            <th>Barcode</th>
                            <th>Description</th>
                            <th>P. Quantity</th>
                            <th>Price</th>
                            <th>Print Quantity</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1?>
                        @foreach($cartItems as $cartItem)
                        <tr style="text-align: center;">
                            <td>{{ $i++ }}</td>
                            <td>{{ $cartItem->id }}</td>
                            <td>{{ $cartItem->name }}</td>
                            <td>{{ $cartItem->qty }}</td>
                            <td>{{ $cartItem->price }}</td>
                            <td>{{ $cartItem->options['printqty'] }}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="button form-control text-center">
                    <a href="{{ route('printBercode') }}"><button type="button" class="btn btn-primary">Print Barcode</button></a>
                    <button type="button" class="btn btn-success remove">Clear</button>
                    <button type="button" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <form class="addBercodeList">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bercode</label>
                                <input type="text" class="form-control berCodes" name="berCodes" readonly/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Description</label>
                                <input type="text" class="form-control Pdesc" name="Pdesc" readonly/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>P.Quantity</label>
                                <input type="text" class="form-control p_qty" name="p_qty" readonly/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control price" name="price" readonly/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Print Quantity</label>
                                <input type="text" class="form-control Pqty" name="Pqty" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

        </div>
  <script>
      $(document).ready(function () {
          $('.remove').on('click',function () {
             $.ajax({
                 url:'{{ route('distroyCart') }}',
                 type:'POST',
                 data:{},
                 success:function (response) {
                     console.log(response);
                     location.reload();
                 }
             }) ;
          });
      });
  </script>
    <script>
        $(document).ready(function () {
           $('.editeAdd').on('click',function () {
                var id = $(this).val();
                $.ajax({
                   url:'{{ route('addbercodeqty') }}',
                    type:'GET',
                    data:{id:id},
                    success:function (data) {
                        $('.berCodes').val(data[0]['report_stock_id']);
                       $('.Pdesc').val(data[0]['report_description']);
                        $('.p_qty').val(data[0]['report_quantity']);
                        $('.price').val(data[0]['report_sales_price']);
                    }
                });
           }) ;
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.addBercodeList').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{route('addBercodeLists')}}",
                    data: $('.addBercodeList').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#exampleModalCenter').modal('hide');
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Data Not Saved');
                    }
                });
            });
        });
    </script>
@endsection