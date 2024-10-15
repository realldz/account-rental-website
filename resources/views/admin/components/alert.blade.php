@if (Session::has('successMsg'))
<x-adminlte-alert theme="success" title="Success">
    {{ Session::get('successMsg') }}
</x-adminlte-alert>
@endif
@if ($errors->any())
<x-adminlte-alert theme="danger" title="Error">
    @foreach ($errors->all() as $error)
        {{ $error }} <br />
    @endforeach
</x-adminlte-alert>
@endif