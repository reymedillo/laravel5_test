@extends('layout.main')
@section('content')
<div class="container">
    <form action="{{ url('auth/login') }}" method="post" class="form-signin">
    <h2 class="form-signin-heading">sign in now</h2>
    <div class="login-wrap">
        <input type="email" required class="form-control" placeholder="Email" autofocus name="email">
			<input required type="password" class="form-control" placeholder="Password" name="password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
                <a data-toggle="modal" href="#forgotpassModal"> Forgot Password?</a>

            </span>
        </label>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        <div class="registration">
            Don't have an account yet?
            <a class="" href="registration.html">
                Create an account
            </a>
        </div>
    </div>
    </form>
      <!-- Modal -->
      <form action="{{ url('auth/reset') }}" method="post">
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotpassModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Forgot Password ?</h4>
                  </div>
                  <div class="modal-body">
                      <p>Enter your e-mail address below to reset your password.</p>
                          <div class="form-group">
                    	  			<input required type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button class="btn btn-success" type="submit">Submit</button>
                  </div>
              </div>
          </div>
      </div>
      </form>
      <!-- modal -->
</div>
@stop
