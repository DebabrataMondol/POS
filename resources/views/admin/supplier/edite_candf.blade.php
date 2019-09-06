@extends('admin.base')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4> Edite C and F</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('updatecandf')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$editecandf->candfid}}" name="updatecandfId">
                            <div class="col-sm-10 form-group">
                                <label>C&F Name</label>
                                <input class="form-control" type="text" value="{{$editecandf->cf_name}}" id="cf_name"
                                       name="cf_name" placeholder="C&F Name">
                                <span class="text-danger">{{$errors->has('cf_name')? $errors->first('cf_name'):''}}</span>
                            </div>

                            <div class="col-sm-10 form-group">
                                <label>C&F Mobile</label>
                                <input class="form-control" type="text" value="{{$editecandf->cf_mobile}}"
                                       id="cf_mobile" name="cf_mobile" placeholder="C&F Mobile">
                            </div>
                            <div class="col-sm-10 form-group">
                                <label>C&F Email</label>
                                <input class="form-control" type="email" value="{{$editecandf->cf_email}}" id="cf_email"
                                       name="cf_email" placeholder="C&F Email">
                            </div>

                            <div class="col-sm-10 form-group">
                                <label>C&F Address</label>
                                <input class="form-control" type="text" value="{{$editecandf->cf_address}}"
                                       id="cf_address" name="cf_address" placeholder="Supplier Address">
                            </div>

                            <div class="col-sm-10 form-group">
                                <label>Opaning Balance</label>
                                <input class="form-control" type="text" value="{{$editecandf->cfopaning_blance}}"
                                       id="cfopaning_blance" name="cfopaning_blance" placeholder="Opaning Balance">
                            </div>

                            <div class="form-group">
                                <button type="submit" style="margin-bottom: 24px;" class="btn btn-info btn-block">
                                    Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection