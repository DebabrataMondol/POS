@extends('admin.base')

@section('content')

<style>
  .star{
    color: red;
  }
</style>

<!-- Large modal -->

<div class="content-wrapper">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modul" style="margin-left: 85.8%;margin-bottom: 23px;">Add User</button>

<div class="modal fade " id="modul" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Add User</h4>
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	          <form  id="add_user" method="post" action="{{route('userinfo')}}" enctype="multipart/form-data">
      	                @csrf
      	         <div class="modal-body">
      				<div class="row">
      				<div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">First Name <span class="star">*</span></label>
      				      <input type="text" class="form-control" id="name" name="first_name" placeholder="First Name">
      				      <span class="text-danger">{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>
      				    </div>
      				  </div>

      				  <div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">Last Name</label>
      				      <input type="text" class="form-control" id="name" name="last_name" placeholder="Last Name">
      				      <span class="text-danger">{{$errors->has('last_name')? $errors->first('last_name'):''}}</span>
      				    </div>
      				  </div>
      				</div>
					<div class="row">
      				  <div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">Email:<span class="star">*</span></label>
      				      <input type="email" class="form-control" id="name" name="user_email" placeholder="Email Address">
      				      <span class="text-danger">{{$errors->has('user_email')? $errors->first('user_email'):''}}</span>
      				    </div>
      				  </div>
      				  <div class="col-sm-6">
	      				  <div class="form-group">
	      				    <label for="name">Mobile:<span class="star">*</span></label>
	      				    <input type="number" class="form-control" id="name" name="user_mobile" placeholder="Mobile">
	      				    <span class="text-danger">{{$errors->has('user_mobile')? $errors->first('user_mobile'):''}}</span>
	      				  </div>
      				  </div>
					</div>
						
					<div class="row">
      				  <div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">Password:<span class="star">*</span></label>
      				      <input type="password" class="form-control" id="password" name="user_password" placeholder="New Password" minlength="8">
      				      <span class="text-danger" id="passwordmess"></span>
      				    </div>
      				  </div>

      				  <div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">Conform Password:<span class="star">*</span></label>
      				      <input type="password" class="form-control" id="conpassword" name="conform_password" placeholder="Conform Password" minlength="8">
      				      <span class="text-danger" id="conform"></span>
      				    </div>

      				  </div>

					</div>

					<div class="row">
      				  <div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">User Role:<span class="star">*</span></label>
      				      <select name="user_role" id="" class="form-control">
      				      	<option value="">---Select Role---</option>
      				      	<option value="1">Admin</option>
      				      	<option value="2">Brance Manager</option>
      				      	<option value="3">User</option>
      				      </select>
      				      <span class="text-danger">{{$errors->has('user_address')? $errors->first('user_address'):''}}</span>
      				    </div>
      				  </div>

      				  <div class="col-sm-6">
      				     <div class="form-group">
      				      <label for="name">Branch:<span class="star">*</span></label>
      				      <select name="branch_id" id="" class="form-control">
      				      	<option value="">---Select Branch---</option>
      				      	@foreach ($branchs as $branch)
      				      		<option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
      				      	@endforeach
      				      </select>
      				      <span class="text-danger">{{$errors->has('user_address')? $errors->first('user_address'):''}}</span>
      				    </div>
      				  </div>
					</div>
					<input type="hidden" value="1" name="status">

					
      				  <div class="col-sm-12">
      	          			<button type="submit" class="btn btn-info btn-block">Submit</button>
      	          	</div>
      	        </div>
      	        			
      	          </form>
        
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="ibox-body">
    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th>SL</th> 
               <th>User Name</th>
               <th>Email</th>
               <th>Phone No</th>
               <th>Role</th>
               <th>Branch</th>
               <th>Action</th>
            </tr>
        </thead>
      
            
        
        <tbody>
          @php($i=1)
          @foreach ($userinfos as $userinfo)
            <tr>
               <td>{{$i++}}</td>
               <td>{{$userinfo->first_name." ".$userinfo->last_name}}</td>
               <td>{{$userinfo->user_email}}</td>
               <td>{{$userinfo->user_mobile}}</td>
               <td>{{$userinfo->name}}</td>
               <td>{{$userinfo->branch_name}}</td>
               <td>
                @if($userinfo->status==1)
                    <a href="{{route('userstatus',['id'=>$userinfo->id])}}" class="btn btn-info btn-xs">
                      <span class="fa fa-arrow-up" title="Active"></span>
                      </a>
                @elseif($userinfo->status==0)
                <a href="{{route('userstatus',['id'=>$userinfo->id])}}" class="btn btn-warning btn-xs">
                  <span class="fa fa-arrow-down" title="Inactive"></span>
                  </a>
                @endif

                  <a id="delete-button" href="{{route('statusdeletemy',['id'=>$userinfo->id])}}" class="btn btn-danger btn-xs">
                    <span class="fa fa-trash" title="Delete"></span>
                  </a>
               </td>
            </tr>
          @endforeach
        
          
        </tbody>
    </table>
</div> 
</div>
<script>
    $('#conpassword').keyup(function(){
            var x=$('#password').val(); 
            var y=$('#conpassword').val();
          if (x==y)
                 $('#conform').text('');
           else
           $('#conform').text('Password does not match');
    })
</script>


<script>

      $('#password').keyup(function(){
            var x=$(this).val().length;
            if(x<8){
                  $('#passwordmess').text('You mast have give 8 charecter');
            }else{
                $('#passwordmess').text('');  
            }
      });
</script>


@endsection