@extends('admin.base')

@section('content')
    <div class="content-wrapper">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4>  Update Supplier</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('updatesupplier')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$editesupplier->supplier_id}}" name="updatecandfId">
                    <div class="row">

                        <div class="col-sm-8 form-group">
                            <label>Supplier Name</label>
                            <input class="form-control" type="text" value="{{$editesupplier->supplier_name}}" id="supplier_name" name="supplier_name" placeholder="Supplier Name">
                            <span class="text-danger">{{$errors->has('supplier_name')? $errors->first('supplier_name'):''}}</span>
                        </div>

                        <div class="col-sm-8 form-group">
                            <label>Supplier Mobile</label>
                            <input class="form-control" type="text" value="{{$editesupplier->supplier_mobile}}" id="supplier_mobile" name="supplier_mobile" placeholder="Supplier Mobile">
                        </div>
                        <div class="col-sm-8 form-group">
                            <label>Supplier Email</label>
                                <input class="form-control" type="email" value="{{$editesupplier->supplier_email}}" id="supplier_email" name="supplier_email" placeholder="Supplier Email">
                        </div>

                        <div class="col-sm-8 form-group">
                            <label>Supplier Address</label>
                            <input class="form-control" type="text" value="{{$editesupplier->supplier_address}}" id="supplier_address" name="supplier_address" placeholder="Supplier Address">
                        </div>

                        <div class="col-sm-8 form-group">
                            <label>Opaning Balance</label>
                            <input class="form-control" type="text" value="{{$editesupplier->sopaning_balance}}" id="sopaning_balance" name="sopaning_balance" placeholder="Opaning Balance">
                        </div>
                        <div class="col-sm-8 form-group">
                            <button type="submit" style="margin-bottom: 24px;" class="btn btn-info btn-block">Update</button>
                        </div>

                    </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>


@endsection