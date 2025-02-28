<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">
                            @php
                                \Carbon\Carbon::setLocale('fr');
                                $time = \Carbon\Carbon::now();
                            @endphp
                            {{$time->dayName}}, {{$time->isoFormat('LL')}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-body small" href="#">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    @foreach($socials as $social)
                        <li class="nav-item">
                            <a class="nav-link text-body" href="{{$social->link}}"
                            ><small class="{{$social->icon}}">
                                </small
                                ></a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-info">
                    Galsen<span class="text-secondary font-weight-normal">Tech</span>
                </h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <a href="https://freewebsitecode.com"
            ><img class="img-fluid" src="img/ads-728x90.png" alt=""
                /></a>
        </div>
    </div>
</div>
