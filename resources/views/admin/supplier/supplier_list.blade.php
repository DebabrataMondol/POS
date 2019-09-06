@extends('admin.base')

@section('content')


    <div class="content-wrapper">
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">New Supplier</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form method="post" action="{{url('insert-supplier')}}">
                        @csrf
                        <div class="modal-body">
                            @include('admin.supplier.supplier_form')
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
                <div class="ibox-title">Supplier List</div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                        style="margin-right: 60px;">
                    New Supplier
                </button>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1;?>
                    @foreach($suppliers as $v_supplier)
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td>{{$v_supplier->supplier_name}}</td>
                            <td>{{$v_supplier->supplier_mobile}}</td>
                            <td>{{$v_supplier->supplier_email}}</td>
                            <td>{{$v_supplier->sopaning_balance}}</td>

                            <td>

                                <a href="#" class="btn btn-info btn-xs">
                                    <span class="fa fa-arrow-up"></span>
                                </a>

                                <a href="#" class="btn btn-warning btn-xs">
                                    <span class="fa fa-arrow-down"></span>
                                </a>


                                <a href="{{route('editesupplier',['id'=>$v_supplier->supplier_id])}}"
                                   class="btn btn-success btn-xs">
                                    <span class="fa fa-pencil-square-o"></span>
                                </a>

                                <a id="delete-button"
                                   href="{{route('deletesupplier',['id'=>$v_supplier->supplier_id])}}"
                                   class="btn btn-danger btn-xs">
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