@extends('admin.base')

@section('content')
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 text-center">
            <u><h4><b>LC Purchases Report</b></h4></u>
        </div>
    </div>
    <div class="container border">
        <form action="{{route('search_by_supplier')}}" method="GET">
            @csrf
            <div class="row margintop">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2" style="text-align: right;">
                    <label for=""><b>Supplier Name:</b></label>
                </div>
                <div class="col-sm-4">
                    <select name="supplierid" class="form-control">
                        <option value="">---Select Supplier Name---</option>
                        @foreach ($suppers as $supper)
                            <option value="{{$supper->supplier_id}}">{{$supper->supplier_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2" style="margin-left: 27px;">
                    <button  type="submit" class="btn btn-primary">Load</button>
                </div>
            </div>
        </form>
        <br>
    </div>
    <div class="container border">
        <form action="{{route('search_by_date')}}" method="GET">
            @csrf
            <div class="row margintop">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                    Date: <input type="date" name="formdate" id="">
                </div>
                TO &nbsp;
                <div class="col-sm-3 text-center">
                    Date: <input type="date" name="todate" id="">
                </div>
                <div class="col-sm-1 text-center">
                    <button type="submit" class="btn btn-primary">Load</button>
                </div>
            </div>
        </form>
        <br>
    </div>

    </div>
@endsection
