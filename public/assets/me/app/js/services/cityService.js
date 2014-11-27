/**
 * Created by Vara on 26/10/2014.
 */
angular.module('cityService', [])
    .factory('City', function($http){
        return {
            get: function(){
                return $http.get('api/cities');
            },
            show: function(id){
                return $http.get('api/cities/' + id);
            },
            save: function(cityData){
                return $http({
                    method: 'POST',
                    url: 'api/cities',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(cityData)
                });
            },
            update: function(cityData){
                return $http({
                    method: 'PUT',
                    url: 'api/cities',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(cityData)
                })
            },
            destroy: function(id){
                return $http.delete('api/cities/' + id);
            }
        }
    });