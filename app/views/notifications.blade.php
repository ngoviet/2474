@if (count($errors->all()) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Lỗi</h4>
            Vui lòng kiểm tra lại thông tin.
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Success</h4>
        @if(is_array($message))
            @foreach ($message as $m)
                {{ $m }}
            @endforeach
        @else
            {{ $message }}
        @endif
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Error</h4>
        @if(is_array($message))
            @foreach ($message as $m)
            {{ $m }}
            @endforeach
        @else
            {{ $message }}
        @endif
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Warning</h4>
        @if(is_array($message))
            @foreach ($message as $m)
            {{ $m }}
            @endforeach
        @else
            {{ $message }}
        @endif
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Info</h4>
        @if(is_array($message))
            @foreach ($message as $m)
            {{ $m }}
            @endforeach
        @else
            {{ $message }}
        @endif
    </div>
@endif
