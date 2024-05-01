<x-admin-layout>
    <x-slot name="header">{{ __('Users') }} </x-slot>
    <div class="row">
        <div class='col-lg-4 col-lg-offset-4'>

            <h1><i class='fa fa-key'></i> İzin Ekle</h1>
            <br>

            {{ Form::open(array('url' => 'permissions')) }}

            <div class="form-group">
                {{ Form::label('name', 'İsim') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
            </div><br>
            @if(!$roles->isEmpty())
                <h4>Rolü</h4>
                @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                @endforeach
            @endif
            <br>
            {{ Form::submit('Kaydet', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

        </div>
    </div>
@push('scripts')
    <script src="{{ asset('js/admin/user_form.js') }}" type="text/javascript"></script>
    @endpush
</x-admin-layout>
