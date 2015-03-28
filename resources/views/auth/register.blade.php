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
          <form role="form" action="{{ URL::route('account-new-post') }}" method="post">
              <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email">
                  @if($errors->has('email'))
                  {{$errors->first('email')}}
                  @endif
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter username">
                  @if($errors->has('username'))
                  {{$errors->first('username')}}
                  @endif
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  @if($errors->has('password'))
                  {{$errors->first('password')}}
                  @endif
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Retype Password</label>
                  <input type="password" class="form-control" name="repassword" placeholder="Retype Password">
                  @if($errors->has('repassword'))
                  {{$errors->first('repassword')}}
                  @endif
              </div>
              <div class="checkbox">
                  <label>
                      <input type="checkbox"> Check me out
                  </label>
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