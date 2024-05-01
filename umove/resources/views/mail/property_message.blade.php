@component('mail::message')

<p>
    You have new message from a customer.
</p>
<div>
    <a href="{{ env('APP_URL').'/detail'.$property_id }}" class="button button-primary" target="_blank" rel="noopener">View Property - {{ $property_id }}</a>
</div>
</br>
<p>{!! $text !!}</p>   
<p>You can see this message on Admin Panel.</p>
<a href="{{ env('APP_URL').'/login' }}" class="button button-green" target="_blank" rel="noopener">Login</a>
<div>
    <p>
        Regards,
    </p>
    <p>
        {{ $name }}
    </p>
    <p>
        T:  {{ $tel }}  
    </p>
    <p>
        E:  {{ $email }}  
    </p>
    <p>
        {{ env('APP_NAME') }}
    </p>

</div>

@endcomponent




