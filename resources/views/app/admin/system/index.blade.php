@extends('layouts.admin')

@section('page-header')
    <x-page-header title="{{ __('app.sidebar.create_apps') }}" :breadcrumbs="Breadcrumbs::generate('create_apps')"></x-page-header>
@endsection

@section('content')
    <x-card>

        <div class="card-body">
            @foreach ($systems as $system)
                <a href="{{ route('admin.systems.show', $system->slug) }}">
                    <div class="card text-center">
                        @if ($system->image)
                            <img src="{{ asset('storage/' . $system->image) }}" width="150">
                        @endif
                        <h4>{{ $system->name }}</h4>
                    </div>
                </a>
            @endforeach
        </div>
    </x-card>
@endsection
