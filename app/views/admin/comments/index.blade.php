@extends('admin.layouts.adminpanel')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="row">
        {{{ $title }}}
		<div class="pull-right">
            <a href="{{{ URL::to('admin/comments/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Tạo mới</a>
        </div>
	</div>

	<table id="comments" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-3">{{{ Lang::get('admin/comments/table.title') }}}</th>
				<th class="col-md-3">{{{ Lang::get('admin/infos/table.post_id') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/comments/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
	</table>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
			oTable = $('#comments').dataTable( {
//				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
//				"sPaginationType": "bootstrap",
//				"oLanguage": {
//					"sLengthMenu": "_MENU_ records per page"
//				},
//				"bProcessing": true,
//		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/comments/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true});
	     		}
			});
		});
	</script>
@stop