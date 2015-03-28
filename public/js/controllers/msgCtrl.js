angular.module('msgCtrl', [])
.factory('pusherChannel', function() {
  var pusher = new Pusher('ef3d2100ea220f7c5dd1');
  var channel = pusher.subscribe('basic_messages');
  return channel;
})
.controller('msgController', function($scope, $http, Message,pusherChannel,$rootScope,$location) {

    // object to hold all the data for the new comment form
    $scope.messageData = {};
    $scope.peoples = [{'id': '5', 'name':'rey'},{'id': '2','name':'mark'},{'id': '4','name':'von'}];

    if($location.absUrl() != 'http://localhost/messages'){
    pusherChannel.bind('createmsg', function(message) {
    $scope.$apply(function() {
        // $scope.predicate = '-id';
        $scope.notifications.unshift(message);
        });
    });
    }

    // loading variable to show the spinning loading icon
    $scope.loading = true;        
    // get all the comments first and bind it to the $scope.comments object
    Message.get()
        .success(function(data) {
            $scope.messages = data;
            $scope.loading = false;
            $scope.sendertxt = false;
            $scope.senderbtn = false;
        });

    $scope.getMessage = function() {
        Message.get()
        .success(function(data) {
            $scope.messages = data;
            $scope.loading = false;
            $scope.sendertxt = false;
            $scope.senderbtn = false;
        });
    };

    // function to handle submitting the form
    $scope.submitMessage = function() {
        // save the comment. pass in comment data from the form
        $scope.messageData.sender_id = $scope.senderid; 
        Message.save($scope.messageData)
            .success(function(data) {
                // if successful, we'll need to refresh the comment list
                Message.show($scope.messageData.sender_id)
                    .success(function(getData) {
                        $scope.messageData = {};
                        $scope.messages = getData;
                        $scope.loading = false;
                        $scope.sendertxt = true;
                        $scope.senderbtn = true;
                    });
                // if($location.absUrl() != 'http://localhost/messages'){
                // Message.notify()
                // .success(function(data) {
                //     $scope.notifications = data;
                // });
                // }
            })
            .error(function(data) {
                console.log(data);
            });
    };
    // function to handle deleting a comment
    $scope.deleteMessage = function(id) {
        $scope.loading = true; 

        Message.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the comment list
                Message.get()
                    .success(function(getData) {
                        $scope.messages = getData;
                        $scope.loading = false; 
                    });

            });
    };

    $scope.updateNotification = function(id) {
        // update the message set read field to 0
        Message.updateRead(id)
        .success(function(data) {
            Message.notify()
            .success(function(data) {
                $scope.notifications = data;
            });
        })
    };

    // function to handle viewing a message by sender
    $scope.showMessage = function(id) {
        Message.show(id)
        .success(function(data) {
            $scope.senderid = id;
            $scope.messages = data;
            $scope.sendertxt = true;
            $scope.senderbtn = true;
        });
    };
 
    Message.notify()
    .success(function(data) {
        $scope.notifications = data;
    });
});