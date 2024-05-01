@component('mail::message')
<div>
    <table class="table table-striped table-bordered">
        {!! $message['real_estate'] !!}
    </table>
</div>
<div>
    {!! $message['message'] !!}
</div>

@endcomponent