<x-slot name="toolsSlot">
    <a class="btn btn-outline-dark btn-add" href="{{ route('admin.'. $model .'.create') }}">
        <i class="fas fa-plus" aria-hidden="true"></i>
        Thêm {{ $modelName }}
    </a>
</x-slot>