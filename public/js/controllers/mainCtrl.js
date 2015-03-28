angular.module('mainCtrl', [])
.factory('pusherChannel', function() {
  var pusher = new Pusher('ef3d2100ea220f7c5dd1');
  var channel = pusher.subscribe('basic_comments');
  return channel;
})

.controller('mainController', function($scope, $http, Comment,pusherChannel) {
    $scope.editing = false;
    $scope.editcomment = [];

        $scope.getComment = function() {
        $scope.loading = true;
        // save the comment. pass in comment data from the form

                Comment.get()
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });
    };
    // object to hold all the data for the new comment form
    $scope.commentData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;    
    // function to handle submitting the form
    $scope.submitComment = function() {
        $scope.loading = true;
        // save the comment. pass in comment data from the form
        Comment.save($scope.commentData)
            .success(function(data) {
                $scope.commentData = {};
                // if successful, we'll need to refresh the comment list
                Comment.get()
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });
            })
        .error(function(data) {
            console.log(data);
        });
    };

    // function to handle deleting a comment
    $scope.deleteComment = function(id) {
        $scope.loading = true; 

        Comment.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the comment list
                Comment.get()
                    .success(function(data) {
                        $scope.comments = data;  
                        // $scope.apply(function() {
                        //     $scope.comments = data;
                        // });
                        $scope.loading = false;
                    });
        });

    };

    $scope.updateComment = function(id) {
        $scope.loading = true;

        // update the comment. pass in comment data from the form
    Comment.update(id)
        .success(function(data) {
            console.log(id);
            Comment.get()
                .success(function(getData) {
                    $scope.comments = getData;
                    $scope.loading = false;
                });

        })
        .error(function(data) {
            console.log(data);
        });
    };

    // get all the comments first and bind it to the $scope.comments object
    Comment.get()
    .success(function(data) {
        $scope.comments = data;
        $scope.loading = false;
    });
    $scope.predicate = '-id';

    pusherChannel.bind('create', function(comment) {
        $scope.$apply(function() {
            $scope.predicate = '-id';
            $scope.comments.unshift(comment);
        });
    });

        $scope.editAppKey = function(field) {
        $scope.editing = $scope.comments.indexOf(field);
        $scope.newField = angular.copy(field);
    };
        $scope.showData = function( ){
        $scope.curPage = 0;
        $scope.pageSize = 3;

        $scope.numberOfPages = function() {
            return Math.ceil($scope.comments.length / $scope.pageSize);
        };    
    }



});
