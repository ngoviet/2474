/**
 * Created by Vara on 26/10/2014.
 */
angular.module('angularStyle',[])
    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });
