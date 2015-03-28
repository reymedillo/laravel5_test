var messageApp = angular.module('messageApp', ['msgCtrl', 'messageService','angularMoment','ngRoute'], function($interpolateProvider){
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
});

// messageApp.config(function($routeProvider, $locationProvider) {
//     $routeProvider.when('/messages', {
//     templateUrl : '/messages',
//     controller  : 'msgController'
//     });
//     $locationProvider.html5Mode(true);
// });
