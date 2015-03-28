@extends('layout.main')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <!-- page start-->
        <div class="chat-room">
            <aside class="mid-side">
                <div class="chat-room-head">
                    <h3>Water Cooler</h3>
                </div>
                <div class="group-rom">
                </div>
                <div class="group-rom">
                <form>
                    <div class="second-part odd">
                        <div class="chat-txt">
                            <input name="body" type="text" class="form-control">
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>  
                </div>
                </form>
            </aside> 
            <aside class="right-side">
                      <div class="user-head">
                          <a href="#" class="chat-tools btn-success"><i class="fa fa-cog"></i> </a>
                          <a href="#" class="chat-tools btn-key"><i class="fa fa-key"></i> </a>
                      </div>     
                      <div class="invite-row">
                          <h4 class="pull-left">People</h4>
                      </div>
                      <ul class="chat-available-user">
                          <li ng-repeat="people in peoples">
                              <a href="#" ng-click="senderMessage(people.id)">
                                  <i class="fa fa-circle text-success"></i>
                                  {[people.name]}
                                  <span class="text-muted">3h:22m</span>
                              </a>
                          </li>
                         
                      </ul>
                  </aside>                 
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
@stop