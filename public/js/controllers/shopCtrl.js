angular.module('shopCtrl', [])

.controller('shopController', function($scope, $http, Shop,$rootScope,$location) {
    $scope.checkoutData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;        
    // get all the comments first and bind it to the $scope.comments object

    Shop.getproduct()
        .success(function(data) {
            $scope.products = data;
            $scope.loading = false;
        });
    // function to handle submitting the form
    $scope.submitOrder = function() {
        // save the comment. pass in comment data from the form
        $scope.checkoutData.shopperid = $scope.shopperid; 
        Shop.save($scope.checkoutData)
            .success(function(data) {
                // if successful, we'll need to refresh the comment list
                Shop.show($scope.checkoutData.sender_id)
                    .success(function(getData) {
                        $scope.checkoutData = {};
                        $scope.products = getData;
                        $scope.loading = false;
                    });
            })
            .error(function(data) {
                console.log(data);
            });
    };
    // function to handle deleting a comment
    $scope.deleteOrder = function(id) {
        $scope.loading = true; 
        Shop.destroy(id)
            .success(function(data) {
                // if successful, we'll need to refresh the comment list
                Shop.getproduct()
                    .success(function(getData) {
                        $scope.products = getData;
                        $scope.loading = false; 
                    });

            });
    };

    $scope.select = function(data) {
        $scope.itemSelected = data;
    };

    // function to handle viewing a message by sender
    $scope.showOrder = function(id) {
        Shop.show(id)
        .success(function(data) {
            // $scope.senderid = id;
            $scope.messages = data;
            // $scope.sendertxt = true;
            // $scope.senderbtn = true;
        });
    };
});