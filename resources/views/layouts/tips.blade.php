@if(session()->get('status'))

    <div class="alert {{ session()->get('status.code')==200?'alert-success':'alert-warning' }}">
        {{ session()->get('status.msg') }}
    </div>


@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
