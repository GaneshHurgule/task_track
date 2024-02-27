@include('common.header')
@include('common.nav')
<form method="POST" action="{{route('users.store')}}">
    @csrf
    Enter The Name<input type="text" name="name"/>
    Enter The email<input type="email" name="email"/>
    Enter The password<input type="password" name="password"/>
    <input type="submit" value="submit"/>

</form>