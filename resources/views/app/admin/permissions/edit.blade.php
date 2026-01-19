@extends('layouts.admin')

@section('content')
    <h3>Manage Access: {{ $user->name }}</h3>

    <form method="POST" action="{{ route('admin.permissions.update', $user) }}">
        @csrf

        {{-- ROLES --}}
        <div class="card mb-4">
            <div class="card-header">Roles (Baseline Access)</div>
            <div class="card-body">
                @foreach($roles as $role)
                    <label class="d-block">
                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                        {{ $role->name }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- DIRECT PERMISSIONS --}}
        <div class="card mb-4">
            <div class="card-header">
                User Permissions (Overrides Roles)
            </div>

            <div class="card-body">
                @foreach($permissions as $permission)
                        <label class="d-block">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{
                    in_array($permission->name, $userPermissions) ? 'checked' : '' }}>
                            {{ $permission->name }}

                            @if(in_array($permission->name, $rolePermissions))
                                <small class="text-muted">(via role)</small>
                            @endif
                        </label>
                @endforeach
            </div>
        </div>

        <button class="btn btn-primary">Save Changes</button>
    </form>
@endsection
