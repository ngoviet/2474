@extends('admin.layouts.adminpanel')

@section('title')
    Thành phố AngularJs
@stop

@section('styles')
    {{ HTML::style('assets/angular/angular-csp.css') }}
    {{ HTML::style('assets/me/ui-grid/ui-grid.css') }}

    {{ HTML::script('assets/me/ui-grid/ui-grid.js') }}
    {{ HTML::script('assets/me/angular-bootstrap/ui-bootstrap-tpls-0.11.2.js') }}

    <style>
        .gridStyle {
            /*max-width: 400px;*/
            height: 600px;
        }
        .ui-grid-coluiGrid-004 {
            text-align: center;
            margin-bottom: auto;
            margin-top: auto;
        }
    </style>
@stop
@section('content')
    <!-- <a class="btn btn-primary md-trigger" data-modal="cityModal">Test Modal</a> -->
    <div class="container-fluid">
        <div class="row">
            {{--<div class="form-group">--}}
                <div ng-app="cityApp" ng-controller="cityCtrl">
                    <div class="col-md-6 col-xs-6">
                        <hr>
                        <button class="btn btn-success" ng-click="getExternalScopes().showMe()">
                        <span class="glyphicon glyphicon-user"></span>  Tạo mới
                        </button>
                        <hr>

                        <h3 ng-show="edit">Tạo mới thành phố:</h3>
                        <h3 ng-hide="edit">Sửa thành phố:</h3>

                        <form class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Id:</label>
                            <div class="col-sm-10">
                            <input type="text" ng-model="id" ng-disabled="!edit" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Tên:</label>
                            <div class="col-sm-10">
                            <input type="text" ng-model="name" ng-disabled="!edit" placeholder="Tên thành phố" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Mã:</label>
                            <div class="col-sm-10">
                            <input type="text" ng-model="code" placeholder="Mã thành phố" class="form-control">
                            </div>
                          </div>
                        </form>

                        <hr>
                        <button class="btn btn-success" ng-disabled="error || incomplete">
                        <span class="glyphicon glyphicon-save"></span>  Lưu
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div class="gridStyle" id="citygrid" ui-grid="gridOptions" external-scopes="myViewModel" ui-grid-edit></div>
                    </div>
                </div>

            {{--</div>--}}

        </div>
    </div>

    @include('admin/cities/modal')
    <div class="md-overlay"></div><!-- the overlay element -->
@stop

@section('scripts')
    {{ HTML::script('assets/plugins/modal/js/jquery.modalEffects.js') }}
    <script>

//        var celltemplate = '<button class="btn btn-default btn-xs md-trigger" data-modal="cityModal" ng-click="getExternalScopes().editCity(row.entity)"><span class="glyphicon glyphicon-pencil"></span> Sửa</button>';
        var celltemplate = '<a class="btn btn-default btn-xs md-trigger" data-modal="cityModal" ng-init="$emit(\'loadModal\')" ng-click="$emit(\'LoadModal\')"><span class="glyphicon glyphicon-pencil"></span> Sửa</a>';

        var cityApp = angular.module('cityApp', ['ui.bootstrap', 'ui.grid', 'ui.grid.edit']);

        cityApp.controller('cityCtrl', ['$scope', '$http', function($scope, $http){

            $scope.$on('loadModal', function(){
                $('.md-trigger').modalEffects();
            });

            $scope.gridOptions = {};

            $http.get('data1').success(function (data){

                $scope.gridOptions.data = data;

                $scope.myViewModel = {
                    someProp:'abc',
                    showMe : function(){
                       alert($scope.cities[1].name);
                    },
                    editCity : function(id) {
                        if (id == 'new') {
                            $scope.edit = true;
                            $scope.incomplete = true;
                            $scope.name = 'name';
                            $scope.code = 'code';

                        }
                        else {
                            console.log('Ok');
                            $scope.edit = false;
                            $scope.id = id.id;
                            $scope.name = id.name;
                            $scope.code = id.code;
                        }
                    }
//                    ,LoadModal: function (){
//                        $('.md-trigger').modalEffects();
//                    }
                };

                $scope.id = '';
                $scope.name = '';
                $scope.code = '';
                $scope.cities = data;

                console.log($scope.cities[1].name);

                $scope.edit = true;
                $scope.error = false;
                $scope.incomplete = false;

            });

            console.log($scope.gridOptions.data);

            $scope.columns = [
                 {field:'id', displayName: '#', width:'10%'},
                 {field:'name', displayName: 'Tên', width: '45%'},
                 {field:'code', displayName: 'Mã', width: '15%'},
                 {name:'edit1', displayName: '', cellTemplate: celltemplate, enableFiltering:false, enableCellEdit:false, width: '20%'}
            ];

            $scope.gridOptions.columnDefs = $scope.columns;

//            (function (){
//                $('.md-trigger').modalEffects();
//            })();

            $scope.gridOptions.enableFiltering = true;

        }]);

        $('.md-trigger').modalEffects();
    </script>
    {{--{{ HTML::script('assets/plugins/modal/js/classie.js') }}--}}
    {{--{{ HTML::script('assets/plugins/modal/js/modalEffects.js') }}--}}
@stop

