@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dissmisibl fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"  arial-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dissmisibl fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"  arial-label="Close"></button>
    </div>
@endif