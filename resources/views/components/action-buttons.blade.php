@php
    $modalId = 'deleteModal-' . uniqid();
@endphp

<div class="btn-actions" role="group">

    {{-- VIEW --}}
    @if($viewUrl && (!$viewPermission || auth()->user()->can($viewPermission)))
        <a href="{{ $viewUrl }}" class="btn btn-action text-primary">
            <x-icon name="eye" />
        </a>
    @endif

    {{-- EDIT --}}
    @if($editUrl && (!$editPermission || auth()->user()->can($editPermission)))
        <a href="{{ $editUrl }}" class="btn btn-action text-warning">
            <x-icon name="edit" />
        </a>
    @endif

    {{-- DELETE --}}
    @if($deleteUrl && (!$deletePermission || auth()->user()->can($deletePermission)))
        <button type="button" class="btn btn-action text-danger" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
            <x-icon name="trash" />
        </button>
    @endif

</div>

{{-- DELETE MODAL --}}
@if($deleteUrl && (!$deletePermission || auth()->user()->can($deletePermission)))
    <div class="modal modal-blur fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title text-danger">Are you sure?</div>
                    <div>{{ $confirm }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ $deleteUrl }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
