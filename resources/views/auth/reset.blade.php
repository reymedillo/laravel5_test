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
            <form action="{{ URL::route('account-forgot-post') }}" method="post">
              <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email">
                  @if($errors->has('email'))
                  {{$errors->first('email')}}
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