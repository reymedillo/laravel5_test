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
    $scope.qty = 1;

    $scope.orders = [];
    // $scope.$watch('qty', function (newValue, oldValue) {
    // // if (newValue > 3) {
    // //     $scope.qty = oldValue;
    //     if(String(newValue).indexOf(',') != -1) {
    //         $scope.qty = String(newValue).replace(',', '.');
    //     }
    //     else 
    //     {
    //         var index_dot,
    //             arr = String(newValue).split("");
    //         // if (arr.length === 0) return;
    //         // if (arr.length === 1 && (arr[0] == '-' || arr[0] === '.')) return;
    //         // if (arr.length === 2 && newValue === '-.') return;
    //         // if (isNaN(newValue) || ((index_dot = String(newValue).indexOf('.')) != -1 && String(newValue).length - index_dot > 3 )) {  //for allowing decimals
    //         if (isNaN(newValue) || newValue > 3) {
    //             $scope.qty = oldValue;           
    //         }
    //     }
    // // }
    // });

    $scope.select = function(data) {
    // $scope.orders.push({'id':data.id,'description':data.description,'qty':1});
    //     angular.forEach($scope.orders, function(item) {
    //         console.log($scope.orders.indexOf(1));
    //     });
    var addToArray=true;
    for(var i=0;i<$scope.orders.length;i++){
        if($scope.orders[i].id===data.id){
            addToArray=false;
        }
    }
    if(addToArray){
        $scope.orders.push({'id':data.id,'description':data.description,'qty':1});
        console.log('not exists');
    }
    else {
        console.log('exist');
    }

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