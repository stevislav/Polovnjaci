<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Polovnjaci</title>
        <!-- <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}"> -->
        <script src="{{ asset('js/index.js') }}" defer></script>
    </head>
    <body>
        <header>
            <div class="menu">
                <div class="logo">
                    <!-- <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo"> -->
                    <span class="blue">Polovni</span>
                    <span class="white">Automobili</span>
                </div>
                <img src="{{ asset('img/icons/hamburger-icon.png') }}" alt="Hamburger icon" id="hamburger">
            </div>
            <nav id="nav">
                <ul>
                    <li><a href=" {{ url('/admin/index') }}">Početna</a></li>
                    <li><a href="{{ url('/admin/on_hold')}}">Oglasi na cekanju</a></li>
                    <li><a href="{{ url('/admin/users')}}">Korisnici</a></li>
                        <li>
                            <div>
                                <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                            </div>
                        </li>
                </ul>
            </nav>
        </header>
        <main>
            
            <section class="car-ads">
                <h1>Korisnici</h1>
                <ul style="list-style: none;">
                        @unless ($users->isEmpty())
                        @foreach ($users as $user)
                            @if ($user->id == auth()->user()->id)
                                @continue
                            @endif
                            <li>
                                <div class="car-ad">
                                    <div class="car-desc">
                                        <div class="car-name-price">
                                            <h2 class="car-name">{{$user->name. $user->lastname}}</h2>
                                            <p class="car-price">{{$user->username}}</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger" onclick="window.location.href='http://localhost:8000/delete_user/{{$user->id}}'">Izbrisi korisnika</button>
                                </div>
                            </li>
                        @endforeach
                    @endunless
                </ul>
            </section>
            {{-- <div class="mt-6 p-4">
                {{$listings->links()}}
            </div> --}}
            <section class="guide">
                <div class="guide-desc">
                    <h1 class="guide-title">Kako odabrati savršeni automobil za Vas?</h1>
                    <p>Odaberite vaš automobil iz snova na našem veb sajtu za polovna vozila. 
                        Pronađite visoko kvalitetna, pouzdana vozila po neverovatnim cenama. 
                        Sa širokim izborom i transparentnim oglasima, vaš savršen automobil je na klik od vas. Započnite svoje putovanje danas i vozite sa poverenjem.</p>
                </div>
                <!-- <img src="{{asset('img/icons/shopping_cart.png')}}" alt="Shopping cart icon"> -->
            </section>
        </main>
        <footer>
            <div class="logo">
                <!-- <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo"> -->
                <span class="blue">Polovni</span>
                <span class="white">Automobili</span>
            </div>
            <p>©2023 PolovniAutomobili.com</p>
        </footer>
    </body>
</html>