@include('common.header')
@include('common.nav')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">User Profile</h3>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <h5>Roles:</h5>
                    <ul>
                        @foreach ($user->roles as $role)
                            <li>{{ $role->role_type }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.footer')
