@component('mail::message')

<h1>Dear {{ $message['name'] }},</h1>

<div>
    {{ $message['message'] }}
</div>
<p>
    Regards,
    <br/>
    {{ env('APP_NAME') }}
</p>
@endcomponent




