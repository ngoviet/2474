/**
 * Created by Vara on 26/10/2014.
 */
angular.module('cityCtrl', [])
	.controller('cityCtrl', function($scope, $http, City){

		$scope.cityData = {};

		$scope.id = '';
		$scope.name = '';
		$scope.code = '';

		$scope.edit = true;
		$scope.error = false;
		$scope.incomplete = false;
		$scope.loading = true;

		City.get().success(function(data){
			$scope.cities = data;
			$scope.loading = false;
		});

		//Todo: Validate input

		// Hàm điều khiển quá trình lưu thông tin vào CSDL
		$scope.submitCity = function(){
			$scope.loading = true;

			//alert('submitCity run!');

			if($scope.edit){
				// Tạo mới thành phố vào CSDL
				City.save($scope.cityData)
					.success(function(data){
						//alert('save run!');
						console.log('Tạo mới thành phố: ' + $scope.cityData.name);
						// Nếu thành công thì refresh danh sách
						City.get().success(function(getData){
							$scope.cities = getData;
							$scope.loading = false;
						})

					})
					.error(function(data){
						console.log(data);
					});
			} else {
				City.update($scope.cityData.id).success(function(data){

					console.log('Sửa thành phố: ' + $scope.cityData.id);

					City.get().success(function (getData) {
						$scope.cities = getData;
						$scope.loading = false;
					})
				})
			}

		};

		$scope.editCity = function(id){
			if(id == 'new'){
				$scope.edit = true;
				$scope.incomplete = true;
				$scope.cityData.name = '';
				$scope.cityData.code = '';
			} else {
				$scope.edit = false;
				$scope.cityData.id 	= $scope.cities[id - 1].id;
				$scope.cityData.name = $scope.cities[id - 1].name;
				$scope.cityData.code = $scope.cities[id - 1].code;


			}
		};

		$scope.deleteCity = function(id){
			$scope.loading = true;

			City.destroy(id)
				.success(function(data){

					// Nếu thành công thì refresh danh sách
					City.get()
						.success(function(getData){
							$scope.cities = getData;
							$scope.loading = false;
						});
				})
		}


});
