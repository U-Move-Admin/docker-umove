@component('mail::message')

<h1>Hello {{ $name }}</h1>

<p>{{ config('app.name')}} would like you to access their account.</p>

<p>To accept this invitation please use the following link:</p>

@component('mail::button', ['url' => $url, 'color'=> 'green'])
Register
@endcomponent

<div>
    
</div>

@endcomponent




