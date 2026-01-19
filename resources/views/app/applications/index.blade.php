@extends('layouts.application')

@section('content')
    <div class="row g-3">
        {{-- hr  --}}
        @can('hr')
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <x-card href="{{ route('user.human_resource') }}">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x9 card-img-top"
                        style="background-image: url(https://www.ismartrecruit.com/upload/blog/main_image/banner-image.webp)">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ __('app.applications.human_resource') }}</h3>
                        <p class="text-secondary" style="text-align: justify">
                            គ្រប់គ្រងព័ត៌មានបុគ្គលិក ដូចជា ថ្នាក់តួនាទី វត្តមានការងារ ការឈប់សម្រាក ប្រាក់បៀវត្ស
                            និងការវាយតម្លៃសមត្ថភាព។
                            ប្រព័ន្ធនេះជួយសម្រួលដល់ការគ្រប់គ្រង និងបង្កើនប្រសិទ្ធភាពការងារនៅក្នុងអង្គភាព។
                        </p>
                    </div>
                </x-card>
            </div>
        @endcan

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://ap-southeast-2-seek-apac.graphassets.com/AEzBCRO50TYyqbV6XzRDQz/S8Z18n2bS0ikiCbAzDQD)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Audit</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                        itaque
                        minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
            </x-card>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://ap-southeast-2-seek-apac.graphassets.com/AEzBCRO50TYyqbV6XzRDQz/AlLFgFw4TYGGUN12X6pV)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Planning</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste,
                        itaque
                        minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
            </x-card>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
            <x-card href="#">
                <!-- Photo -->
                <div class="img-responsive img-responsive-21x9 card-img-top"
                    style="background-image: url(https://www.netsuite.com/portal/assets/img/business-articles/accounting-software/social-expense-management-accounting.jpg)">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Accounting</h3>
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
