<x-admin-layout>
    <x-slot name="header">{{ __('Users') }} </x-slot>
    <div class="row">
        <div class='col-lg-4 col-lg-offset-4'>

            <h2><i class='fa fa-key'></i> İzin Düzenle </h2>
            <br>
            {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

            <div class="form-group">
                {{ Form::label('name', 'İzin İsmi') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <br>
            {{ Form::submit('Güncelle', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/admin/user_form.js') }}" type="text/javascript"></script>
    @endpush
</x-admin-layout>
