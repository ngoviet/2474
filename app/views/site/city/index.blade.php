@extends('site.layouts.master')

@section('title')
    Index 2
@stop

@section('styles')

    {{ HTML::script('assets/me/app/js/angularStyle.js') }}
    {{ HTML::script('node_modules/angular-route/angular-route.js') }}
    {{ HTML::script('node_modules/underscore/underscore.js') }}

    {{ HTML::script('node_modules/restangular/dist/restangular.js') }}
    {{ HTML::script('assets/me/app/js/cities.js') }}
@stop

@section('content')
<div class="container-fluid">
    <div class="row" ng-app="cityApp">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center text-uppercase">
                    <strong>{{ trans('user/cities/title.city_management') }}</strong>
                </div>
                <div ng-view></div>
                <!-- Cache file: list.html -->
                <script type="text/ng-template" id="list.html">
                    <div class="panel-body">
                        <p class="text-center" ng-hide="loading"><span class="fa fa-refresh fa-2x fa-spin"></span></p>
                        <div class="pull-right">
                            <div class="col-sm-6 col-sm-offset-6 input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="search" id="cityfilter" ng-model="filter" class="form-control input-sm" placeholder="Tìm kiếm ..."/>
                            </div>
                        </div>
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="city in cities | filter: filter" ng-hide="city._id.$oid">
                                    <td>[[ city.id ]]</td>
                                    <td>[[ city.name ]]</td>
                                    <td>[[ city.code ]]</td>
                                    <td>
                                        <button class="btn btn-xs" ng-click="editCity(city.id)">
                                            <span class="glyphicon glyphicon-pencil"></span>  Sửa
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </script>
            </div>
        </div>

        <div class="col-md-6 col-xs-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <button class="btn btn-success" ng-click="editCity('new')">
                        <span class="glyphicon glyphicon-user"></span>  Tạo mới
                    </button>
                    <hr/>
                    <span class="help-block">
                        <span ng-show="edit">Tạo mới thành phố</span>
                        <span ng-hide="edit">Sửa thành phố</span>
                    </span>
                    <form class="form-horizontal" ng-submit="submitCity()">
                      <div class="form-group" ng-show="!edit">
                        <label class="col-sm-2 control-label" for="id">Id:</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" id="id" ng-model="cityData.id" ng-disabled="true" class="form-control">
                        </div>

                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">Tên:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" ng-model="cityData.name" placeholder="Nhập tên thành phố..." class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="code">Mã:</label>
                        <div class="col-sm-10">
                            <input type="text" name="code" id="code" ng-model="cityData.code" placeholder="Nhập mã thành phố..." class="form-control">
                        </div>
                      </div>

                      <hr>
                      <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>  Lưu
                      </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

