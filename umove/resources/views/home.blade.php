<x-app-layout>
    <x-slot name="header">{{ __('Dashboard') }} </x-slot>


    <div class="container" style="margin: auto;">
        <div class="row mt-8">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

