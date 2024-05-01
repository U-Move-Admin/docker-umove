<div class="intro-section">
    <div class="intro-section-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <h3>For More Information In Order To Maximise Your Revenue From Your Property</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12" style="margin: auto;">
                    <a class="btn btn-white-lg-outline" href="{{ url('/contact') }}">
                    Contact With Us 
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-4 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-image">
                    <a href="{{ url('/') }}"><img src="{{ url('/img/logo-2.png') }}" alt="{{config('app.name')}}"></a>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li class="li">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="li">
                            <a href="{{ url('/listing/buy') }}">For Buy</a>
                        </li>
                        <li class="li">
                            <a href="{{ url('/listing/rent') }}">For Rent</a>
                        </li>
                        <li class="li">
                            <a href="{{ url('/about') }}">About Us</a>
                        </li>
                        <li class="li">
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copy">© {{date('Y')}} {{config('app.name')}}. All Rights Reserved. Design by <a href="www.janansoft.co.uk">Janansoft</a>.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
