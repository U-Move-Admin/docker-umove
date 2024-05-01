<x-admin-layout>
    <x-slot name="header">{{ __('Users') }} </x-slot>
    <div class="row">
        <div class="col-lg-12">

         
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/admin/user_form.js') }}" type="text/javascript"></script>
    @endpush
</x-admin-layout>

<!-- Script loading  -->

