@extends('layouts.admin')

@section('page-header')
    <x-page-header title="{{ __('app.role.role_list') }}" :breadcrumbs="Breadcrumbs::generate('roles')">
        <x-slot:action>
            <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block btn-animate-icon btn-animate-icon-rotate"
                data-bs-toggle="modal" data-bs-target="#create-role">
                <x-icon name="plus" size="24px" stroke="2" />
                {{ __('app.role.create_role') }}
            </a>

            <a href="#" class="btn btn-primary btn-6 d-sm-none btn-icon btn-animate-icon btn-animate-icon-rotate"
                data-bs-toggle="modal" data-bs-target="#create-role" aria-label="{{ __('app.user.create_user') }}">
                <x-icon name="plus" size="24px" stroke="2" />
            </a>
        </x-slot:action>
    </x-page-header>

    <div class="modal modal-blur fade" id="create-role" tabindex="-1">
        <div class="modal-dialog modal-3 modal-dialog-centered">
            <div class="modal-content">

                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Add Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label required">Role Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Role Name"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Color</label>
                            <div class="row g-2">
                                @foreach (['blue', 'azure', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'lime', 'green'] as $color)
                                    <div class="col-auto">
                                        <label class="form-colorinput">
                                            <input type="radio" name="color" value="{{ $color }}"
                                                class="form-colorinput-input" {{ $loop->first ? 'checked' : '' }}>
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
                        <th>Role</th>
                        <th>Color</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td><span class="text-{{ $role->color }}">{{ $role->name ?? '_' }}</span></td>

                            <td>
                                <label class="form-colorinput">
                                    <span class="form-colorinput-color bg-{{ $role->color }}"></span>
                                </label>
                            </td>

                            <td class="d-flex justify-content-end">
                                <x-action-buttons {{-- :view-url="route('admin.role.show', $role)" --}} :edit-url="route('admin.roles.edit', $role)" :delete-url="route('admin.roles.destroy', $role)"
                                    view-permission="role.view" edit-permission="role.edit" delete-permission="role.delete"
                                    confirm="This booking will be permanently deleted." />
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-body">
            {{ $roles->links() }}
        </div>
    </x-card>
@endsection
