<!doctype html>
<html lang="en" ng-app="messageApp">
<head>
    <meta charset="utf-8">
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="PGKH">
    <link rel="shortcut icon" href="/img/favicon.png">

    <title>Philippine Golden Kaizen Blog</title>

    <!-- ANGULAR -->
    <script src="/js/node_modules/angular/angular.min.js"></script>
    <script src="/js/node_modules/angular-route.js"></script> 
    <script src="/js/controllers/msgCtrl.js"></script>
    <script src="/js/services/commentService.js"></script>
    <script src="/js/services/messageService.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/node_modules/pusher/pusher.min.js"></script>
    <script src="/js/node_modules/moment.min.js"></script>
    <script src="/js/node_modules/angular-moment.js"></script>


    <link rel="stylesheet" type="text/css" href="/js/select2/select2.css" />
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->


</head>
<body ng-controller="msgController">
    @if(Session::has('global'))
        <p>{{ Session::get('global') }}</p>
    @endif

    @include('layout.navigation')
    @yield('content')

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->

    <script src="/js/common-scripts.js"></script>

    <script>
    $(document).ready(function() {

    });
    </script>
</body>
</html>