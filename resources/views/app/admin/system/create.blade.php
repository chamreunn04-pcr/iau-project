@extends('layouts.admin')

@section('page-header')
    <x-page-header title="{{ __('app.sidebar.create_apps') }}" :breadcrumbs="Breadcrumbs::generate('create_apps')"></x-page-header>
@endsection

@section('content')

    <x-card>
        <form action="{{ route('admin.system.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label required">{{ __('app.system.name') }}</label>
                        <input type="text" name="name" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-12">
                        <label class="form-label required">{{ __('app.system.slug') }}</label>
                        <input type="text" name="slug" class="form-control" autocomplete="off">
                    </div>

                    <!-- Image Preview (Clickable) -->
                    <div class="col-12 text-center">
                        <img id="photoPreview" src="{{ asset('img/illustrations/image_default.jpg') }}"
                            class="rounded mb-2 card-body border-none shadow-sm"
                            style="width:520px;height:320px;object-fit:cover;cursor:pointer;"
                            onclick="document.getElementById('photoInput').click();">
                        <div class="text-muted">Click image to choose photo</div>
                    </div>

                    <!-- Hidden File Input -->
                    <div class="col-12 d-none">
                        <input type="file" id="photoInput" class="form-control" name="image" accept="image/*"
                            onchange="previewPhoto(event)">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-animate-icon btn-animate-icon-rotate">
                    Submit
                    <x-icon name="plus" class="icon-end" />
                </button>
            </div>
        </form>
    </x-card>

@endsection

@push('scripts')
    <script>
        function previewPhoto(event) {
            const input = event.target;
            const preview = document.getElementById('photoPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
