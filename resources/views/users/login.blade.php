<form method="post" action="{{ route('postlogin') }}">
    @csrf
    enter email<input type="email" name="email"/>
    enter password<input type="password" name="password"/>
    <input type="submit" value="submit"/>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
