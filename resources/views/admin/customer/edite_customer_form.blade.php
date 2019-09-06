@extends('admin.base')

@section('content')
    <div class="content-wrapper">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4> Update Supplier</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('updatecustomer')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$editecustomer->customer_id}}" name="updatecustomerId">

                        <div class="row">

                            <div class="col-sm-8 form-group">
                                <label>Customer Category</label>
                                <select class="form-control" name="customer_cat" id="customer_cat">
                                    <option value="{{$editecustomer->customer_cat}}">{{$editecustomer->customer_cat}}</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Platinum">Platinum</option>

                                </select>
                            </div>

                            <div class="col-sm-8 form-group">
                                <label>Customer Name</label>
                                <input class="form-control" type="text" value="{{$editecustomer->customer_name}}"
                                       id="customer_name" name="customer_name" placeholder="Customer Name">
                                <span class="text-danger">{{$errors->has('customer_name')? $errors->first('customer_name'):''}}</span>
                            </div>

                            <div class="col-sm-8 form-group">
                                <label>Customer Mobile</label>
                                <input class="form-control" type="text" value="{{$editecustomer->customer_mobile}}"
                                       id="customer_mobile" name="customer_mobile" placeholder="Customer Mobile">
                            </div>
                            <div class="col-sm-8 form-group">
                                <label>Customer Email</label>
                                <input class="form-control" type="email" value="{{$editecustomer->customer_email}}"
                                       id="customer_email" name="customer_email" placeholder="Customer Email">
                            </div>

                            <div class="col-sm-8 form-group">
                                <label>Customer Address</label>
                                <input class="form-control" type="text" value="{{$editecustomer->customer_address}}"
                                       id="customer_address" name="customer_address" placeholder="Customer Address">
                            </div>

                            <div class="col-sm-8 form-group">
                                <label>Opaning Balance</label>
                                <input class="form-control" type="text" value="{{$editecustomer->copaning_balance}}"
                                       id="copaning_balance" name="copaning_balance" placeholder="Opaning Balance">
                            </div>
                            <div class="col-sm-8 form-group">
                                <button type="submit" style="margin-bottom: 24px;" class="btn btn-info btn-block">
                                    Update
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>
@endsection