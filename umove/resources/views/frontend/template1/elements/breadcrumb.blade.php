<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{config('app.name')}}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Homepage</a></li>
                @isset($name2)
                <li class="active"><a href="{{ url('/'.$url2) }}">{{$name2}}</a></li>  
                @endisset
                <li class="active">{{ $name }}</li>
            </ul>
        </div>
    </div>
</div>