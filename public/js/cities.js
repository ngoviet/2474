var app = angular.module('cityApp', ['ngSanitize', 'restangular']);

app.config(function($routeProvider, RestangularProvider) {

	$routeProvider.when('/city', {
		templateUrl: 'js/city/cities.html',
		controller: 'CitiesController'
	});

	$routeProvider.otherwise({
		redirectTo: '/login'
	});

	RestangularProvider.setBaseUrl('/api');
});

app.controller("CitiesController", function($scope, Restangular, FlashService) {

	$scope.loadCity = function(){
		$scope.cities = Restangular.all("cities").getList().$object;
	};

	$scope.loadCity();
	$scope.currentCity = {};
	var original;

	$scope.Id = '';
	$scope.name = '';
	$scope.code = '';

	// $scope.editForm = false;
	$scope.btnSave = false;
	$scope.btnCancel = true;
	$scope.edit = true;
	$scope.error = false;
	$scope.incomplete = false;



	$scope.editCity = function(id) {

		$scope.editForm = true;

		if (id == 'new') {
			$scope.edit = false;
			$scope.incomplete = true;
			$scope.currentCity.name = '';
			$scope.currentCity.code = '';
			// $scope.btnSave = true;
			$scope.editMode = true;
		} else {
			$scope.edit = false;
			$scope.createMode = true;

			$scope.currentCity = $scope.cities[id-1];
			original = $scope.currentCity;
			$scope.currentCity = Restangular.copy(original);
			$scope.saveCity = function(){
				$scope.currentCity.put().then(
					function(res){
						console.log(res.status);
						FlashService.show('Cập nhật thành công');

						$scope.editForm = false;

						$scope.editMode = false;
						$scope.createMode = false;
						$scope.loadCity();
					},
					function(res){
						FlashService.show('Cập nhật thất bại, vui lòng thử lại. \n' + res.data.error.message);
						console.log(res.data.error.message);
					}
				);
			};
		}

		$scope.cancelEdit = function(){
			$scope.editForm = false;
			$scope.editMode = false;
			$scope.createMode = false;
		}
	};

});
