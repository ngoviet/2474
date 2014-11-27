@extends('admin.layouts.adminpanel')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{--@section('keywords')Blogs administration @stop--}}
{{--@section('author')Laravel 4 Bootstrap Starter SIte @stop--}}
{{--@section('description')Blogs administration index @stop--}}

{{-- Content --}}
@section('styles')

@stop

@section('content')

	<div class="row">
		<h3>
			{{{ $title }}}

			<div class="pull-right">
				<a href="{{{ URL::to('admin/infos/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Tạo mới</a>
			</div>
		</h3>
	</div>

	<table id="infos" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-4">{{{ Lang::get('admin/infos/table.title') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/infos/table.comments') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/infos/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
@stop

@section('scripts')

    <script type="text/javascript">
    		var oTable;
    		{{--$(document).ready(function() {--}}
    			{{--oTable = $('#infos').dataTable( {--}}
    				{{--"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",--}}
    				{{--"sPaginationType": "bootstrap",--}}
    				{{--"oLanguage": {--}}
    					{{--"sLengthMenu": "_MENU_ records per page"--}}
    				{{--},--}}
    				{{--"bProcessing": true,--}}
    		        {{--"bServerSide": true,--}}
    		        {{--"sAjaxSource": "{{ URL::to('admin/infos/data') }}",--}}
    		        {{--"fnDrawCallback": function ( oSettings ) {--}}
    	           		{{--$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});--}}
    	     		{{--}--}}
    			{{--});--}}
    		{{--});--}}
    		$(document).ready(function() {
    		    oTable = $('#infos').dataTable({
    		        "sAjaxSource": "{{ URL::to('admin/infos/data') }}",
    		        "fnDrawCallback": function ( oSettings ) {
                        $(".iframe").colorbox({iframe:true});
                    }
    		    });
    		});
    </script>
@stop