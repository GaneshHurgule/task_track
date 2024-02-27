@include('common.header')
@include('common.nav')
@foreach($users as $user)
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>

    @foreach($user->roles as $role)
    <p>{{$role->role_type}}</p>
    @endforeach
@endforeach
