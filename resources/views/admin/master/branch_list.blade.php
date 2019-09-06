@extends('admin.base')

@section('content')


    <div class="content-wrapper">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Branch</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" action="{{url('insert-branch')}}">
            @csrf
        <div class="modal-body">
           @include('admin.master.branch_form')
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
                        <div class="ibox-title">Branch List</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-right: 60px;">
                        New Branch
                      </button>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $i = 1;?>
                                @foreach($branchs as $v_branch)
                                <tr>    
                                    <td><?php echo $i++;?></td>
                                    <td>{{$v_branch->branch_name}}</td>
                                    <td>{{$v_branch->branch_mobile}}</td>
                                    <td>{{$v_branch->branch_email}}</td>
                                    <td>{{$v_branch->opening_date}}</td>
                                    <td>{{$v_branch->opening_balance}}</td>
                                   
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