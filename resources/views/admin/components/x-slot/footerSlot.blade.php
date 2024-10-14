<x-slot name="footerSlot">
    Tổng <code>{{ $model->total() }}</code> mục
    <div class="float-right">
        {{ $model->links() }}
    </div>
</x-slot>