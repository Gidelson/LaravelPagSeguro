@if ($message = Session::get('success'))
    <div class="alert alert-info" role="alert">
    {{$message}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if(session('message'))
    <div class="alert alert-success">
            {{session('message')}}
    </div>
@endif
