@extends('layout.main')
@section('content')
<section id="main-content" ng-init="messageData.user_id='{{Auth::user()->id}}';">
    <section class="wrapper site-min-height" ng-view>

    </section>
</section>
@endsection
