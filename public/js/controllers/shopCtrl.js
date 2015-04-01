angular.module('shopCtrl', [])

.controller('shopController', function($scope, $http, Shop,$rootScope,$location) {
    $scope.checkoutData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;        
    // get all the comments first and bind it to the $scope.comments object
    $scope.test = [{"id":"1","description":"Lacoste Striped Tote Bag Limited Edition (Light Blue\/Navy Blue)","category_id":"2","filename":"","filedirectory":"","created_at":"2015-04-01 00:00:00","updated_at":"2015-04-01 00:00:00"}];
    Shop.getproduct()
        .success(function(data) {
            $scope.products = data;
            $scope.loading = false;
        });
    // // function to handle submitting the form
    // $scope.submitMessage = function() {
    //     // save the comment. pass in comment data from the form
    //     $scope.messageData.sender_id = $scope.senderid; 
    //     Message.save($scope.messageData)
    //         .success(function(data) {
    //             // if successful, we'll need to refresh the comment list
    //             Message.show($scope.messageData.sender_id)
    //                 .success(function(getData) {
    //                     $scope.messageData = {};
    //                     $scope.messages = getData;
    //                     $scope.loading = false;
    //                     $scope.sendertxt = true;
    //                     $scope.senderbtn = true;
    //                 });
    //             // if($location.absUrl() != 'http://localhost/messages'){
    //             // Message.notify()
    //             // .success(function(data) {
    //             //     $scope.notifications = data;
    //             // });
    //             // }
    //         })
    //         .error(function(data) {
    //             console.log(data);
    //         });
    // };
    // // function to handle deleting a comment
    // $scope.deleteMessage = function(id) {
    //     $scope.loading = true; 

    //     Message.destroy(id)
    //         .success(function(data) {

    //             // if successful, we'll need to refresh the comment list
    //             Message.get()
    //                 .success(function(getData) {
    //                     $scope.messages = getData;
    //                     $scope.loading = false; 
    //                 });

    //         });
    // };

    // $scope.updateNotification = function(id) {
    //     // update the message set read field to 0
    //     Message.updateRead(id)
    //     .success(function(data) {
    //         Message.notify()
    //         .success(function(data) {
    //             $scope.notifications = data;
    //         });
    //     })
    // };

    // // function to handle viewing a message by sender
    // $scope.showMessage = function(id) {
    //     Message.show(id)
    //     .success(function(data) {
    //         $scope.senderid = id;
    //         $scope.messages = data;
    //         $scope.sendertxt = true;
    //         $scope.senderbtn = true;
    //     });
    // };
 
    // Message.notify()
    // .success(function(data) {
    //     $scope.notifications = data;
    // });
});