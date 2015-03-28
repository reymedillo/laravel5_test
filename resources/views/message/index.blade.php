@extends('layout.main')
@section('content')
<section id="main-content" ng-init="messageData.user_id='{{Auth::user()->id}}';">
    <section class="wrapper site-min-height">
      <!-- page start-->
        <div class="chat-room">
            <aside class="mid-side">
                <div class="chat-room-head">
                    <h3>Water Cooler</h3>
                </div>
                <div class="group-rom" ng-repeat="msg in messages" ng-init="messageData.user_id='{{Auth::user()->id}}';">
                    <div class="first-part odd"><a href="" ng-click="showMessage(msg.sender_id);">{[msg.sender_name]}</a></div>
                    <div class="second-part">{[msg.body]}</div>
                    <div class="third-part">{[msg.created_at]}</div>
                </div>
                <div class="group-rom">
                <form ng-submit="submitMessage()">
                    <div class="second-part odd">
                        <div class="chat-txt">
                            <input ng-show="sendertxt" ng-model="messageData.body" name="body" type="text" class="form-control">
                            <input ng-model="senderid" name="sender" type="hidden" value="{[senderid]}">
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button ng-show="senderbtn" type="submit" class="btn btn-primary">Submit</button>
                        <pre>{[messageData]}</pre>
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
                              <a href="" ng-click="showMessage(people.id)">
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