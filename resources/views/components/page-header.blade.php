<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">

            {{-- LEFT --}}
            <div class="col">

                {{-- Title row --}}
                <div class="d-flex align-items-center gap-2">

                    {{-- Back (browser history – multi step) --}}
                    <a href="javascript:void(0)"
                        onclick="window.history.length > 1
                            ? history.back()
                            : window.location.href='{{ route('user.app') }}'"
                        class="text-muted btn-animate-icon btn-animate-icon-move-start" title="{{ __('Back') }}">
                        <x-icon name="arrow-narrow-left" class="icon" />
                    </a>

                    {{-- Title --}}
                    <h2 class="page-title mb-0">
                        {{ $title }}
                    </h2>
                </div>

                {{-- Breadcrumbs --}}
                @if (isset($breadcrumbs) && count($breadcrumbs))
                    <nav aria-label="breadcrumb" class="mt-1">
                        <ol class="breadcrumb breadcrumb-arrows small mb-0 text-muted">
                            @foreach ($breadcrumbs as $item)
                                @if ($loop->last)
                                    <li class="breadcrumb-item active text-muted">
                                        {{ __($item->title) }}
                                    </li>
                                @else
                                    <li class="breadcrumb-item">
                                        <a href="{{ $item->url }}" class="text-muted">
                                            {{ __($item->title) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                @endif

            </div>

            {{-- RIGHT (actions) --}}
            @if (isset($action))
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        {{ $action }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
