angular.module('shopService', [])

.factory('Shop', function($http) {
    return {
        // get : function() {
        //     return $http.get('api/messages/');
        // },        
        // notify : function() {
        //     return $http.get('api/messages/notifications');
        // },
        // show : function(id) {
        //     return $http.get('api/messages/' + id);
        // },
        // save : function(messageData) {
        //     return $http({
        //         method: 'POST',
        //         url: 'api/messages',
        //         headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        //         data: $.param(messageData)
        //     });
        // },
        // destroy : function(id) {
        //     return $http.delete('api/messages/' + id);
        // },
        // update : function(message) {
        //     return $http({method:'PUT',url:'api/messages/'+message.id,headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
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
        //     data: message
        // });
        // },
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


