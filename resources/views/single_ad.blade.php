<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{  asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/single-ad.css') }}">
        <title>Polovnjaci | Oglas</title>
        <!-- <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}"> -->
        <script src="{{ asset('js/index.js') }}" defer></script>
        <script src="{{ asset('js/single-ad.js') }}" defer></script>
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
                    <li><a href="{{ url('/') }}">Početna</a></li>
                    <li><a href="/search_list">Pretraga</a></li>
                    <!-- <li><a href="https://autoblog.rs/" target="blank">Vesti</a></li> -->
                    @if (auth()->user())
                        <li>
                            <div>
                                <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                            </div>
                        </li>
                    @else
                        <div class="buttons">
                            <li><button class="modal-btn">Prijavi se</button></li>
                            <li><a href="{{ url('register') }}" class="login-btn">Registruj se</a></li>
                        </div>
                    @endif
                </ul>
            </nav>
            <div id="overlay">
                <div class="login-form">
                    <div class="login-data">
                        <div class="login-item">
                            <label for="uname">Korisničko ime</label>
                            <input type="text" placeholder="Korisničko ime" name="uname" required>
                        </div>
                        <div class="login-item">
                            <label for="psw">Šifra</label>
                            <input type="password" placeholder="Šifra" name="psw" required>
                        </div>
                        <button type="submit" class="login-btn">Uloguj se</button>
                    </div>
        
                    <div class="close-login">
                        <button type="button" class="cancel-btn">Zatvori</button>
                        <a href="/register">Nemate svoj nalog? Napravite novi!</a>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="ad">
                <h1>{{ $listing[0]->brand }} {{ $listing[0]->type }}</h1>
                <div class="ad-image-toggler">
                    <img src="{{ asset('storage/uploads/'. $listing[0]->imgpath) }}" alt="Advertised car image" class="ad-image">
                </div>
                <div class="ad-info">
                    <h2>Opšte informacije</h2>
                    <ul>
                        <li>
                            <p>Stanje: </p>
                            <p>{{ $listing[0]->state }}</p>
                        </li>
                        <li>
                            <p>Marka: </p>
                            <p>{{ $listing[0]->brand }}</p>
                        </li>
                        <li>
                            <p>Model: </p>
                            <p>{{ $listing[0]->type }}</p>
                        </li>
                        <li>
                            <p>Godište: </p>
                            <p>{{ $listing[0]->manuf_year }}</p>
                        </li>
                        <li>
                            <p>Kilometraža: </p>
                            <p>{{ $listing[0]->kilometers }}</p>
                        </li>
                        <li>
                            <p>Cena: </p>
                            <p>{{ $listing[0]->price }}</p>
                        </li>
                        <li>
                            <p>Gorivo: </p>
                            <p>{{ $listing[0]->fuel_type }}</p>
                        </li>
                        <li>
                            <p>Kubikaža:</p>
                            <p>{{ $listing[0]->motor_cc }}</p>
                        </li>
                        <li>
                            <p>Snaga motora: </p>
                            <p>{{ $listing[0]->horse_power }}</p>
                        </li>
                        <li>
                            <p>Vrsta pogona:</p>
                            <p>{{ $listing[0]->drive_type }}</p>
                        </li>
                        <li>
                            <p>Vrsta menjača: </p>
                            <p>{{ $listing[0]->shifter_type }}</p>
                        </li>
                        <li>
                            <p>Broj vrata: </p>
                            <p>{{ $listing[0]->no_doors}}</p>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <h2>Informacije o prodavcu</h2>
                    <div class="user-info">
                        <div class="user-basic">
                            <img src="{{ $user[0]->profileImage() }}" alt="Profile picture of the user" class="rounded-circle profilna">
                            <h3>{{ $user[0]->username }}</h3>
                        </div>
                        <p class="user-city">{{ $user[0]->city }}</p>
                        <b>{{ $user[0]->email }}</b>
                    </div>
                </div>
                <div class="other-ads">
                    <h2>Ostali oglasi ovog prodavca</h2>
                    
                    @unless ($other_listings->isEmpty())
                        
                        @foreach ($other_listings as $list)
                            @if ($list->id == $listing[0]->id)
                                @continue
                        @endif 
                            
                            <div class="car-ad">
                                <img src="{{asset("storage/uploads/". $list->imgpath)}} " alt="A car">
                                <div class="car-desc">
                                    <div class="car-name-price">
                                    <h2 class="car-name">{{$list->band.$list->type}}</h2>
                                    <p class="car-price">{{$list->price}}</p>
                                </div>
                                <p class="car-details">{{$list->fuel_type}}</p>
                            </div>
                        </div>
                        @endforeach
                    @endunless

                </div>
            </section>
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
                <span class="blue">Polovni</span>
                <span class="white">Automobili</span>
            </div>
            <p>©2023 PolovniAutomobili.com</p>
        </footer>
    </body>
</html>