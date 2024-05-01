@component('mail::message')

<div>
    Hi there,
    <br/>
    <p>
    {{ $message['message'] }}
    </p>
    <br/>
    Thanks,
    <br/>
    {{ $message['name'] }}
    <br/>
    T:  {{ $message['phone'] }}  
    <br/>
    E:  {{ $message['email'] }}  
</div>

@endcomponent




