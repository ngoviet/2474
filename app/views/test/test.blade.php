@extends('admin.layouts.adminpanel1')

@section('title')
Tổng hợp
@stop

@section('styles')
    {{--{{ HTML::style('assets/me/kendoui/styles/kendo.common-bootstrap.min.css') }}--}}
    {{ HTML::style('assets/me/kendoui/styles/kendo.common.min.css') }}
    {{--{{ HTML::style('assets/me/kendoui/styles/kendo.bootstrap.min.css') }}--}}
    {{ HTML::style('assets/me/kendoui/styles/kendo.default.min.css') }}
    {{--{{ HTML::style('assets/me/kendoui/styles/kendo.dataviz.min.css') }}--}}
    {{--{{ HTML::style('assets/me/kendoui/styles/kendo.dataviz.default.min.css') }}--}}

    <style scoped>
        #splitter1 {
            /*height: 600px;*/
            /*width: 100%;*/
            margin: 0 auto;
        }
        #table {
            min-height: 100px;
        }
        .k-grid-content {
            min-height: 100px;
        }
        #tabstrip {
            height: 455px;
            width: 100%;
            /*position: fixed;*/
        }
        #detail .k-content{
            height: 300px;
        }
        .k-grid {
            font-size: 11px;
        }
        .k-grid td {
            line-height: 2em;
        }
        .form-control {
            height: 10px;
        }
        
    </style>
@stop

@section('content')

    <div id="splitter1">
        <div id="table" ></div>
        {{--<section>--}}
            <div class="tabstrip">
                <div id="detail">
                    <ul>
                        <li class="k-state-active">Khách hàng</li>
                        <li>Tài khoản</li>
                        <li>Người liên hệ</li>
                    </ul>
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <form class="form-horizontal" action="">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="id" class="control-label col-xs-4 col-md-4">#</label>
                                                    <div class="col-xs-8 col-md-8">
                                                        <input type="text" name="id" id="id"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label col-sm-4">Tên khách hàng</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" id="name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id">#</label>
                                                <input type="text" class="form-control" name="id" id="id"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Tên khách hàng</label>
                                                <input type="text" class="form-control" name="name" id="name"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div>Người liên hệ</div>
                </div>
            </div>
        {{--</section>--}}

    </div>

@stop

@section('scripts')
        {{--{{ HTML::script('assets/me/kendoui/js/jquery.min.js') }}--}}
        {{--{{ HTML::script('assets/me/kendoui/js/angular.min.js') }}--}}
        {{--{{ HTML::script('assets/me/kendoui/src/js/kendo.all.js') }}--}}
        {{ HTML::script('assets/me/kendoui/js/kendo.all.min.js') }}

    <script>

            function resizeGrid() {
                var x = $(window).height();
                $('.k-grid-content').height(x - 550);
            }

            $(window).resize(function(){
                resizeGrid();
            });

            $(document).ready(function(){
//                $('#splitter1').kendoSplitter({
//                    orientation: "vertical",
//                    panes: [
//                        { collapsible: true },
//                        { collapsible: true, size: "400px" }]
//                 });
                $('#table').kendoGrid({
                    dataSource: {
                        type: "json",
                        transport: {
                            read: "{{ URL::to('admin/generates/datajson') }}"
                        }
                    },
                  selectable: "row",
                  columns:[
                    {
                        field: "id",
                        title: "#",
                        width: 50
                    },
                    {
                        field: "account",
                        title: "Tài khoản",
                        width: 100
                    },
                    {
                        field: "name",
                        title: "Tên công ty",
                        width: 300
                    },
                    {
                        field: "address",
                        title: "Địa chỉ"
                    }
                  ]
                });

                $('#detail').kendoTabStrip({
                    animation: {
                        open: {
                            effects: "fadeIn"
                        }
                    }
                });
                $(window).trigger("resize");
            });


            function getDataById(id){
                $.ajax({
                    url: "{{ URL::to('admin/generates/databyid') }}/" + id,
                    success: function(info){
                        bindingData(info);
                    }
                });
            }

            function bindingData(info)
            {
                $('#account').val(info['account']);
            }

            function fnGetSelected( oTableLocal )
            {
                var aReturn = new Array();
                var aTrs = oTableLocal.fnGetNodes();

                for ( var i=0 ; i<aTrs.length ; i++ )
                {
                    if ( $(aTrs[i]).hasClass('selected') )
                    {
                        aReturn.push( aTrs[i] );
                    }
                }
                return aReturn;
            }
    </script>
@stop