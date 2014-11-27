@extends('admin.layouts.adminpanel')

@section('title')
Khách hàng
@stop

@section('styles')
    {{ HTML::style('assets/plugins/full-width-tabs/css/component.css') }}
    {{--{{ HTML::style('assets/plugins/full-width-tabs/css/demo.css') }}--}}
    {{--{{ HTML::style('assets/plugins/jquery.splitter/css/jquery.splitter.css') }}--}}
    <style>
        .table, .iframe{
            /*font-size: smaller;*/
            margin-bottom: auto;
        }
        .iframe {
            /*font-size: 90%;*/
        }
        .table tbody tr td
        {
            /*line-height: 1;*/
            /*padding: 4px 5px;*/
            font-size: 11px;
        }
        #table thead tr th {
            /*font-size: 90%;*/
        }
        .tabs {
            margin: auto;
        }
        table.dataTable tbody tr.selected {
            background-color: #2ecc71;
        }
         .form-control, .control-label {
            height: 28px;
            font-size: 11px;
         }
         .form-group {
            margin-bottom: 10px;
         }
    </style>
@stop

@section('content')
    @include('admin.customers.modal')
    <div id="splitter" class="row clearfix">
        @include('admin.generates.all_data')
        <div id="tabs" class="tabs">
            <nav>
                <ul>
                    <li><a href="#customer">
                        <span class="glyphicon glyphicon-user"></span> Khách hàng</a>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hợp đồng</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Người liên hệ</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hợp đồng</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hợp đồng MBTB</a></li>
                </ul>
            </nav>

            <div class="content">
                 <section id="customer">
                 <form role="form" action="@if(isset($customer)) {{ URL::to('admin/customers/'.$customer->id.'/show') }} @endif">
                    @include('admin.customers.details')
                 </form>
                </section>
                <section>
                    <div></div>
                </section>
                <section>
                    <div></div>
                </section>
                <section>
                    <div></div>
                </section>
                <section>
                    <div></div>
                </section>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    {{ HTML::script('assets/plugins/full-width-tabs/js/cbpFWTabs.js') }}
    <script>

            new CBPFWTabs(document.getElementById('tabs'));
            var oTable;

            $(document).ready(function() {
                oTable = $('#customers').dataTable ({
                    "scrollY": 150,
//                    "jQueryUI": true,
                    "scrollCollapse": true,
                    "sAjaxSource": "{{ URL::to('admin/generates/data') }}",
                    "fnDrawCallback": function ( oSettings) {
                        $(".iframe").colorbox({iframe:true});
                    }
                });
                $('#city_id').val(null);
                $('#agency_id').val(null);
                $('#customers tbody').on( 'click', 'tr', function () {
                    if ( $(this).hasClass('selected') ) {
                        $(this).removeClass('selected');
                    }
                    else {
                        oTable.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }
                    var sData = oTable.fnGetData(this);
                    // Binding dữ liệu sử dụng ajax
                    getDataById(sData[0]);
//                    var node = document.createTextNode('<p>abc</p>');
                      {{--var include = '@include("admin.customers.details")';--}}
                    {{--$('#subview').append(include);--}}
//                        $('#subview').append('<p>abc</p>');
                    {{--{{ $id = sData }}--}}
                });
            });

            function getDataById(id){
                $.ajax({
                    url: "{{ URL::to('admin/generates/datajson') }}/" + id,
                    success: function(info){
                        bindingData(info);
                    }
                });
            }

            function bindingData(info)
            {
                info = info[0];
                $('#id').val(info['id']);
                $('#city_id').val(info['city_id']);
                $('#agency_id').val(info['agency_id']);
                $('#account').val(info['account']);
                $('#name').val(info['name']);
                $('#address').val(info['address']);

                $('#license_number').val(info['license_number']);
                $('#license_date_create').val(info['license_date_create']);
                $('#license_date_end').val(info['license_date_end']);
                $('#license_address_create').val(info['license_address_create']);


                $('#phone').val(info['phone']);
                $('#fax').val(info['fax']);
                $('#email').val(info['email']);
                $('#tax').val(info['tax']);

                $('#bank_number').val(info['bank_number']);
                $('#bank_name').val(info['bank_name']);
                $('#is_active').prop("checked", info['is_active'] === 1);
                $('#create_at').val(info['create_at']);
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