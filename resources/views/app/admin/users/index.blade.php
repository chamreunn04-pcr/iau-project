@extends('layouts.admin')

@section('page-header')
    <x-page-header title="{{ __('app.user.user_list') }}" :breadcrumbs="Breadcrumbs::generate('users')">
        <x-slot:action>
            <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block btn-animate-icon btn-animate-icon-rotate" data-bs-toggle="modal"
                data-bs-target="#modal-report">
                <x-icon name="plus" size="24px" stroke="2" />
                {{__('app.user.create_user')}}
            </a>

            <a href="#" class="btn btn-primary btn-6 d-sm-none btn-icon btn-animate-icon btn-animate-icon-rotate" data-bs-toggle="modal"
                data-bs-target="#modal-report" aria-label="{{__('app.user.create_user')}}">
                <x-icon name="plus" size="24px" stroke="2" />
            </a>
        </x-slot:action>
    </x-page-header>
@endsection

@section('content')

    <x-card>
        <div class="card-header">
            <h4 class="card-title">{{ __('app.user.user_list') }}</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-centered table-nowrap mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">{{ __('app.user.name') }}</th>
                        <th scope="col">{{ __('app.user.email') }}</th>
                        <th scope="col">{{ __('app.user.role') }}</th>
                        <th scope="col">{{ __('app.user.created_at') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            {{ $users->links() }}
        </div>
    </x-card>

@endsection
