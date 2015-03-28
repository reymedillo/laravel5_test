@extends('layout.main')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Register User
          </header>
          <div class="panel-body">
			<form action="{{ URL::route('account-changepass-post') }}" method="post">
             	<div class="form-group">
	              <label for="exampleInputEmail1">Current Password</label>
	              <input type="password" class="form-control" name="old-password">
	              @if($errors->has('old-password'))
	              {{$errors->first('old-password')}}
	              @endif
              	</div>
              	<div class="form-group">
	              <label for="exampleInputEmail1">New Password</label>
	              <input type="password" class="form-control" name="new-password">
	              @if($errors->has('new-password'))
	              {{$errors->first('new-password')}}
	              @endif
              	</div>
              	<div class="form-group">
	              <label for="exampleInputEmail1">Retype Password</label>
	              <input type="password" class="form-control" name="new-repassword">
	              @if($errors->has('new-repassword'))
	              {{$errors->first('new-repassword')}}
	              @endif
              	</div>
              {{Form::token()}}
              <button type="submit" class="btn btn-info">Submit</button>
          </form>

      </div>
        </section>  
      </div>
    </div>
  </section>
</section>
@stop