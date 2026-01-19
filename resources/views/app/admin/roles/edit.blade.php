@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Role</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Role Name --}}
                <div class="mb-3">
                    <label class="form-label">Role Name</label>
                    <input type="text" name="name" value="{{ old('name', $role->name) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Role Color --}}
                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <div class="row g-2">
                        @foreach (['blue', 'azure', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'lime', 'green'] as $color)
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input type="radio" name="color" value="{{ $color }}"
                                        class="form-colorinput-input"
                                        {{ old('color', $role->color) === $color ? 'checked' : '' }}>
                                    <span class="form-colorinput-color bg-{{ $color }}"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('color')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.roles') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update Role
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
