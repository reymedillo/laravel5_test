angular.module('shopService', [])

.factory('Shop', function($http) {
    return {
        saveCart : function(product) {
            return $http({
                method: 'POST',
                url: 'api/cart',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                transformRequest: function(obj) {
                var str = [];
                for (var key in obj) {
                    if (obj[key] instanceof Array) {
                        for(var idx in obj[key]){
                            var subObj = obj[key][idx];
                            for(var subKey in subObj){
                                str.push(encodeURIComponent(key) + "[" + idx + "][" + encodeURIComponent(subKey) + "]=" + encodeURIComponent(subObj[subKey]));
                            }
                        }
                    }
                    else {
                        str.push(encodeURIComponent(key) + "=" + encodeURIComponent(obj[key]));
                    }
                }
                return str.join("&");
                },
                data: {code:product.id, description:product.description, qty:1, price:product.price, total:product.price}
            });
        },
        showCart : function() {
            return $http.get('api/cart');
        },
        // destroy : function(id) {
        //     return $http.delete('api/messages/' + id);
        // },
        updateCart : function(cart) {
            return $http({method:'PUT',url:'api/cart/'+cart.id,headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
            transformRequest: function(obj) {
                var str = [];
                for (var key in obj) {
                    if (obj[key] instanceof Array) {
                        for(var idx in obj[key]){
                            var subObj = obj[key][idx];
                            for(var subKey in subObj){
                                str.push(encodeURIComponent(key) + "[" + idx + "][" + encodeURIComponent(subKey) + "]=" + encodeURIComponent(subObj[subKey]));
                            }
                        }
                    }
                    else {
                        str.push(encodeURIComponent(key) + "=" + encodeURIComponent(obj[key]));
                    }
                }
                return str.join("&");
                },
                data: {qty:cart.qty,total:cart.qty*cart.price}
            });
        },
        // updateRead : function(n) {
        //     return $http({method:'PUT',url:'api/messages/'+n.id,headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        //     transformRequest: function(obj) {
        //     var str = [];
        //     for (var key in obj) {
        //         if (obj[key] instanceof Array) {
        //             for(var idx in obj[key]){
        //                 var subObj = obj[key][idx];
        //                 for(var subKey in subObj){
        //                     str.push(encodeURIComponent(key) + "[" + idx + "][" + encodeURIComponent(subKey) + "]=" + encodeURIComponent(subObj[subKey]));
        //                 }
        //             }
        //         }
        //         else {
        //             str.push(encodeURIComponent(key) + "=" + encodeURIComponent(obj[key]));
        //         }
        //     }
        //     return str.join("&");
        //     },
        //     data: n
        // });
        // },
        getproduct : function() {
            return $http.get('api/products/');
        }
    }
});


