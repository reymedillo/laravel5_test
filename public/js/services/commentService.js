angular.module('commentService', [])

.factory('Comment', function($http) {
    return {
        get : function() {
            return $http.get('api/comments/');
        },
        show : function(id) {
            return $http.get('api/comments/' + id);
        },
        save : function(commentData) {
            return $http({
                method: 'POST',
                url: 'api/comments',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(commentData)
            });
        },
        destroy : function(id) {
            return $http.delete('api/comments/' + id);
        },
        update : function(comment) {
            return $http({method:'PUT',url:'api/comments/'+comment.id,headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
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
            data: comment
        });
        }
    }
});


