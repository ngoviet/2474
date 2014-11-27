@extends('admin.layouts.adminpanel')

@section('title')
    Index 2
@stop

@section('styles')
    {{ HTML::style('assets/angular/angular-csp.css') }}
    {{ HTML::style('assets/me/ui-grid/ui-grid.css') }}

    {{ HTML::script('assets/me/angular-bootstrap/ui-bootstrap-tpls-0.11.2.js') }}
    {{ HTML::script('assets/me/app/js/controllers/cityCtrl.js') }}
    {{ HTML::script('assets/me/app/js/services/cityService.js') }}
    {{ HTML::script('assets/me/app/cities.js') }}
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Mã</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="city in cities">
                                    <td>[[ city.id ]]</td>
                                    <td>[[ city.name ]]</td>
                                    <td>[[ city.code ]]</td>
                                    <td>[[ city.code ]]</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            {{--</div>--}}

        </div>
    </div>

@stop

@section('scripts')

@stop


