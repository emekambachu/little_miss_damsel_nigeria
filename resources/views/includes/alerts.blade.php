@if(session('success'))
    <div style="width: 50%; margin: 10px auto;" align="center" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

@if(session('warning'))
    <div style="width: 50%; margin: 10px auto;" align="center" class="alert alert-danger" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if(count($errors) > 0)
    <div style="width: 50%; margin: 10px auto;" align="center" class="alert alert-danger" role="alert">
        <ul style="list-style: none;">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif