@extends('admin.base')

@section('content')


    <div class="content-wrapper">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Company</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" action="{{url('insert-company')}}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
           @include('admin.master.company_form')
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
                        <div class="ibox-title">Company List</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-right: 60px;">
                        New Company
                      </button>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($companys as $v_company)
                                <tr>
                                    <td>{{$v_company->company_name}}</td>
                                    <td>{{$v_company->company_mobile}}</td>
                                    <td>{{$v_company->company_email}}</td>
                                    <td>{{$v_company->company_website}}</td>
                                    <td>{{$v_company->country}}</td>
                                    <td><img src="{{asset($v_company->company_image)}}" alt="Company Image" style="height: 30px; width: 50px;"></td>
                                    <td>
                                        
                                    </td>
                                    </tr>
                                @endforeach
                               
                               
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
@endsection