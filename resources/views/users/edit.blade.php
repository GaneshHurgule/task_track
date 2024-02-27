@include('common.header')
@include('common.nav')
<form method="POST" action="{{route('users.update',['user'=>$user->id])}}">
    @csrf
    @method('PUT')
    Enter The Name<input type="text" name="name"  value="{{$user->name}}"/>
    Enter The email<input type="email" name="email" value="{{$user->email}}"/>
    Enter The password<input type="password" name="password"/>
    <input type="submit" value="submit"/>

</form>