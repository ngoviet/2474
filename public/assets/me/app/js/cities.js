/**
 * Created by Vara on 20/10/2014.
 */
// Code đã chạy
//var cityApp = angular.module('cityApp', ['cityCtrl', 'cityService','angularStyle','restangular']);
var cityApp = angular.module('cityApp', ['angularStyle','restangular','ngRoute'])
	.config(function($routeProvider, RestangularProvider){
		$routeProvider
			.when('/', {
				controller:ListCity,
				templateUrl:'list.html'
			})
			.otherwise({redirectTo:'/'});
		RestangularProvider.setBaseUrl('http://2474.dev/api');
		RestangularProvider.setRestangularFields({
			id: '_id.$oid'
		});
	});

function ListCity($scope, Restangular) {
	$scope.cities = Restangular.all('cities').getList().$object;
}