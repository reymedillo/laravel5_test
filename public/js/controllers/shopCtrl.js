angular.module('shopCtrl', [])

.controller('shopController', function($scope, $http, Shop,$rootScope,$location) {
    $scope.checkoutData = {};
    $scope.loading = true;   
    $scope.listQty = [{id:1,value:1},{id:2,value:2},{id:3,value:3}]     

    Shop.getproduct()
        .success(function(data) {
        $scope.products = data;
        $scope.loading = false;
    });
    Shop.showCart()
        .success(function(data) {
        $scope.cartData = data;
    });
    $scope.getCart = function() { 
        Shop.showCart()
            .success(function(data) {
            $scope.cartData = data;
        });
    };
    $scope.submitCart = function(data) { 
        var addToArray=true;
        for(var i=0;i<$scope.cartData.length;i++){
            if($scope.cartData[i].description===data.description){
                addToArray=false;
            }
        }
        if(addToArray){
            Shop.saveCart(data)
            .success(function(data) {
                Shop.showCart()
                    .success(function(getdata) {
                    $scope.cartData = getdata;
                });
            })
            .error(function(data) {
                console.log(data);
            });
            console.log('not exists');
        }
        else {
            console.log('exist');
        }
    };
  

    // $scope.$watch('sqty', function (newValue, oldValue) {
    // // if (newValue > 3) {
    // //     $scope.qty = oldValue;
    //                     // if(String(newValue).indexOf(',') != -1) {
    //                     //     $scope.qty = String(newValue).replace(',', '.');
    //                     // }
    //                     // else 
    //                     // {
    //                     //     var index_dot,
    //                     //         arr = String(newValue).split("");
    //                     //     // if (arr.length === 0) return;
    //                     //     // if (arr.length === 1 && (arr[0] == '-' || arr[0] === '.')) return;
    //                     //     // if (arr.length === 2 && newValue === '-.') return;
    //                     //     // if (isNaN(newValue) || ((index_dot = String(newValue).indexOf('.')) != -1 && String(newValue).length - index_dot > 3 )) {  //for allowing decimals
    //                     //     if (isNaN(newValue) || newValue > 3) {
    //                     //         $scope.qty = oldValue;           
    //                     //     }
    //                     // }
    //     console.log(newValue+oldValue);
    // // }
    // });
    $scope.updateQty = function(data,qty) {
        Shop.updateCart(data)
        .success(function(data) {
            data.total = 100;
            Shop.showCart()
                .success(function(data) {
                $scope.cartData = data;
            });
        })
        .error(function(data) {
            console.log(data);
        });
    };
    $scope.netTotal = function() {
        var total = 0;
        angular.forEach($scope.cartData, function(cart) {
            total += cart.total;
        })
        return total;
    };

});