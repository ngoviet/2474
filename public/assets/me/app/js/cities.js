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

function CreateCtrl($scope, $location, Restangular) {
	$scope.save = function() {
		Restangular.all('cities').post($scope.project).then(function(project){
			$location.path('/list');
		});
	}
}

function EditCtrl($scope, $location, Restangular, project) {
	var original = project;
	$scope.project = Restangular.copy(original);

	$scope.isClean = function() {
		return angular.equals(original, $scope.project);
	};

	$scope.destroy = function(){
		original.remove().then(function(){
			$location.path('/list');
		});
	};

	$scope.save = function(){
		$scope.project.put().then(function(){
			$location.path('/');
		});
	}
}