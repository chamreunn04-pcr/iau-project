@extends('layouts.admin')

@section('page-header')
    <x-page-header title="{{ __('app.permission.permission_list') }}" :breadcrumbs="Breadcrumbs::generate('permissions')">
        <x-slot:action>
            <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block btn-animate-icon btn-animate-icon-rotate"
                data-bs-toggle="modal" data-bs-target="#create-permission">
                <x-icon name="plus" size="24px" stroke="2" />
                {{__('app.permission.create_permission')}}
            </a>

            <a href="#" class="btn btn-primary btn-6 d-sm-none btn-icon btn-animate-icon btn-animate-icon-rotate"
                data-bs-toggle="modal" data-bs-target="#create-permission" aria-label="{{__('app.user.create_user')}}">
                <x-icon name="plus" size="24px" stroke="2" />
            </a>
        </x-slot:action>
    </x-page-header>

    <div class="modal modal-blur fade" id="create-permission" tabindex="-1">
        <div class="modal-dialog modal-3 modal-dialog-centered">
            <div class="modal-content">

                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Add Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" placeholder="hr.view_employee" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Display Label</label>
                            <input type="text" name="label" class="form-control" placeholder="View Employee">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <div class="row g-2">
                                @foreach ([
                                        'blue',
                                        'azure',
                                        'indigo',
                                        'purple',
                                        'pink',
                                        'red',
                                        'orange',
                                        'yellow',
                                        'lime',
                                        'green'
                                    ] as $color)
                                    <div class="col-auto">
                                        <label class="form-colorinput">
                                            <input type="radio" name="color" value="{{ $color }}" class="form-colorinput-input"
                                                {{ $loop->first ? 'checked' : '' }}>
                                            <span class="form-colorinput-color bg-{{ $color }}"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Create Permission
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('content')

    <x-card>
        <div class="card-header">
            <h4 class="card-title">User Roles & Permissions</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-vcenter table-hover table-striped">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Permission</th>
                        <th>Color</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->label ?? $permission->name }}</td>
                            <td>{{ $permission->name ?? "_" }}</td>

                            <td>{{ $permission->color ?? 'empty' }}</td>

                            <td>
                                @foreach($permission->users as $user)
                                    <span class="badge bg-success-lt">{{ $user->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-body">
            {{ $permissions->links() }}
        </div>
    </x-card>

@endsection
