@extends('admin.base')

@section('content')


    <div class="content-wrapper">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Customer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" action="{{url('insert-customer')}}">
            @csrf
        <div class="modal-body">
           @include('admin.customer.cusromer_form')
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>


                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Customer List</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-right: 60px;">
                        New Customer
                      </button>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $i = 1;?>
                                @foreach($customers as $v_customer)
                                <tr>    
                                    <td><?php echo $i++;?></td>
                                    <td>{{$v_customer->customer_cat}}</td>
                                    <td>{{$v_customer->customer_name}}</td>
                                    <td>{{$v_customer->customer_mobile}}</td>
                                    <td>{{$v_customer->customer_email}}</td>
                                    <td>{{$v_customer->copaning_balance}}</td>
                                   
                                    <td>

                                        {{--@if ($v_customer->status==1)--}}
                                            {{--<a href="{{route('customerstatus',['id'=>$v_customer->customer_id])}}" class="btn btn-info btn-xs">--}}
                                                {{--<span class="fa fa-arrow-up"></span>--}}
                                            {{--</a>--}}
                                        {{--@elseif($v_customer->status==0)--}}
                                            {{--<a href="{{route('customerstatus',['id'=>$v_customer->customer_id])}}" class="btn btn-warning btn-xs">--}}
                                                {{--<span class="fa fa-arrow-down"></span>--}}
                                            {{--</a>--}}
                                        {{--@endif--}}
                      {{----}}
                      
                        <a href="{{route('editecustomer',['id'=>$v_customer->customer_id])}}" class="btn btn-success btn-xs">
                            <span class="fa fa-pencil-square-o"></span>
                        </a>

                        <a id="delete-button" href="{{route('deletecustomer',['id'=>$v_customer->customer_id])}}" class="btn btn-danger btn-xs">
                            <span class="fa fa-trash"></span>
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