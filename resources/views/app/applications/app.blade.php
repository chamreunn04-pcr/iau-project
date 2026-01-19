@extends('layouts.app')

@section('page-header')
    <x-page-header title="{{ __('app.applications.human_resource') }}" :breadcrumbs="Breadcrumbs::generate('settings')"></x-page-header>
@endsection

@section('content')
    <div class="row g-3">
        {{-- hr  --}}
        @can('hr')
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <x-card href="{{ route('user.human_resource') }}">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x9 card-img-top"
                        style="background-image: url(https://www.cflowapps.com/wp-content/uploads/2018/07/leave-management-process.png)">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ __('app.applications.leave') }}</h3>
                        <p class="text-secondary">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                            itaque
                            minima neque pariatur perferendis
                            sed suscipit velit vitae voluptatem.
                        </p>
                    </div>
                </x-card>
            </div>
        @endcan

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://wpschoolpress.com/wp-content/uploads/2023/05/Attendance-Management-System.png)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Attendance</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                        itaque
                        minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
            </x-card>
        </div>

        {{-- hr  --}}
        @can('hr')
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <x-card href="{{ route('user.human_resource') }}">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x9 card-img-top"
                        style="background-image: url(https://adaptiveis.net/wp-content/uploads/2025/07/thumbnail-2.jpg)">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Users Detail</h3>
                        <p class="text-secondary">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                            itaque
                            minima neque pariatur perferendis
                            sed suscipit velit vitae voluptatem.
                        </p>
                    </div>
                </x-card>
            </div>
        @endcan

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://apogeecorp.ie/wp-content/uploads/2022/04/shutterstock_2054921201-1-1024x415-1.jpg)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Document Tracking</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                        itaque
                        minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
            </x-card>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://www.hotwaxsystems.com/hubfs/Imported_Blog_Media/AdobeStock_459155812-scaled-3.jpeg)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Inventory</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                        itaque
                        minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
            </x-card>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://static.vecteezy.com/system/resources/thumbnails/059/410/066/small/growing-assets-and-wealth-concept-with-house-and-stacked-coins-free-photo.jpg)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Stock Assets</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                        itaque
                        minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
            </x-card>
        </div>
    </div>
@endsection
