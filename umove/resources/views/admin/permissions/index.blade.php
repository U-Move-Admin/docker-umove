<x-admin-layout>
    <x-slot name="header"> fdf </x-slot>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <h1><i class="fa fa-key"></i>İzinler

            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Kullanıcılar</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roller</a></h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>İzinler</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Düzenle</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Sil', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">İzin Ekle</a>

        </div>
    </div>

@push('scripts')
    <script src="{{ asset('js/admin/user_form.js') }}" type="text/javascript"></script>
    @endpush
</x-admin-layout>
