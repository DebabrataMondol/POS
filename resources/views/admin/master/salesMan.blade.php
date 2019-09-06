@extends('admin.base')

@section('content')

    <style>
        .star {
            color: red;
        }
    </style>

    <!-- Large modal -->

    <div class="content-wrapper">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modul"
            style="margin-left: 85.8%;margin-bottom: 23px;">Add Sales Man
    </button>

    <div class="modal fade " id="modul" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="gridSystemModalLabel">Add Sales Man</h4>
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form id="add_salesMan">
                    <div class="modal-body">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Sales Man Name <span class="star">*</span></label>
                                        <input type="text" class="form-control" name="salesMan_name"
                                               placeholder="Sales Man Name" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Mobile Number<span class="star">*</span></label>
                                        <input type="text" class="form-control" name="salesMan_mobile"
                                               placeholder="Mobile Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <input type="text" class="form-control" name="salesMan_address"
                                               placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Status</label>
                                        <select type="text" class="form-control" name="salesMan_status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
            <tr  style="text-align: center;">
                <th>SL</th>
                <th>Sales Man Name</th>
                <th>Mobile Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i=1)
            @foreach($salesMans as $salesMan)
            <tr style="text-align: center;">
                <td>{{$i++}}</td>
                <td>{{$salesMan->salesMan_name}}</td>
                <td>{{$salesMan->salesMan_mobile}}</td>
                <td>{{$salesMan->salesMan_address}}</td>
                <td>
            @if($salesMan->salesMan_status==1)
            <a href="{{route('salesMans_status',['id'=>$salesMan->salesMan_id])}}" class="btn btn-info btn-xs">
            <span class="fa fa-arrow-up" title="Active"></span>
            </a>
            @elseif($salesMan->salesMan_status==0)
            <a href="{{route('salesMans_status',['id'=>$salesMan->salesMan_id])}}" class="btn btn-warning btn-xs">
            <span class="fa fa-arrow-down" title="Inactive"></span>
            </a>
            @endif

            {{--<a id="delete-button" href="{{route('statusdeletemy',['id'=>$userinfo->id])}}" class="btn btn-danger btn-xs">--}}
            {{--<span class="fa fa-trash" title="Delete"></span>--}}
            {{--</a>--}}
            </td>
            </tr>

@endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#add_salesMan').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{route('add_salesMans')}}",
                    data: $('#add_salesMan').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#exampleModalCenter').modal('hide');
                        alert("Data Saved");
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