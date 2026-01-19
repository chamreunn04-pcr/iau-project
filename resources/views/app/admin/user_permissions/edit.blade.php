@extends('layouts.admin')

@section('content')
    <h3>Manage Access: {{ $user->name }}</h3>

    <form method="POST" action="{{ route('admin.permissions.update', $user) }}">
        @csrf

        <div class="row g-3">
            <div class="col-12">
                {{-- ROLES --}}
                <x-card>
                    <div class="card-header">Roles (Baseline Access)</div>
                    <div class="card-body">
                        @foreach ($roles as $role)
                            <label class="form-check cursor-pointer d-block">
                                <input type="checkbox" class="form-check-input cursor-pointer" name="roles[]" value="{{ $role->name }}"
                                    {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        @endforeach
                    </div>
                </x-card>
            </div>

            {{-- DIRECT PERMISSIONS --}}
            <div class="col-12">
                <x-card>
                    <div class="card-header">
                        User Permissions <small class="text-muted">(Overrides Roles)</small>
                    </div>

                    <div class="card-body">

                        @foreach ($permissionsGrouped as $label => $permissions)
                            <div>

                                {{-- Group title --}}
                                <h4 class="text-primary">
                                    {{ $label }}
                                </h4>

                                {{-- Permissions --}}
                                @foreach ($permissions as $permission)
                                    <label class="form-check d-block cursor-pointer">

                                        <input type="checkbox" class="form-check-input cursor-pointer" name="permissions[]" value="{{ $permission->name }}"
                                            @checked(in_array($permission->name, $userPermissions))>

                                        {{-- Show only action (edit, view, create) --}}
                                        {{ ucfirst(last(explode('.', $permission->name))) }}

                                        @if (in_array($permission->name, $rolePermissions))
                                            <small class="text-muted">(via role)</small>
                                        @endif
                                    </label>
                                @endforeach

                            </div>
                        @endforeach

                    </div>
                </x-card>
            </div>

            <div class="col-12">
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
@endsection
