@extends('admin.layouts.modal1')

{{-- Content --}}
@section('content')

    {{-- Delete Blog Comment Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($comment)){{ URL::to('admin/comments/' . $comment->id . '/delete') }}@endif" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $comment->id }}" />
        <!-- ./ csrf token -->

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <element class="btn-info close_popup btn">Cancel</element>
                <button type="submit" class="btn btn-danger ">Delete</button>
            </div>
        </div>
        <!-- ./ form actions -->
    </form>
@stop