<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- ovo mislim da se ne koristi nigde --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/adding-ad.css') }}">
        <title>Polovnjaci | Novi oglas</title>
        <!-- <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}"> -->
        <script src="{{ asset('js/cng_pwd.js') }}" defer></script>
    </head>
    <body>
        <header>
            <div class="menu">
                <div class="logo">
                    <!-- <img src="{{asset('img/icons/car-icon.png')}}" alt="Yellow car icon that is part of the logo"> -->
                    <span class="blue">Polovni</span>
                    <span class="white">Automobili</span>
                </div>
                <img src="{{asset(img/icons/hamburger-icon.png)}}" alt="Hamburger icon" id="hamburger">
            </div>
            <nav id="nav">
                <ul>
                    <li></li>
                    <li><button class="cancel-btn">skloni se se</button></li>
                    <li><button class="profile-btn modal">Promeni lozinku</button></li>
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
            
        </header>
        <main>
            <button class="modal1">pokazi se</button>
            <div id="overlay1">
            <section class="new-ad" >
                <h1>Unesite karakteristike automobila:</h1>
                <form action='/listing' enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="ad-parts">
                        <!--<input type="file" name="filename" accept="image/gif, image/jpeg, image/png">-->
                        <div class="ad-part">
                            <label for="state">Stanje:</label>
                            <select name ="state"id="state">
                                <option value="polovno">Polovno vozilo</option>
                                <option value="novo">Novo vozilo</option>
                            </select>
                        </div>
                        <div class="ad-part">
                            <label for="brand">Marka:</label>
                            <input
                                type="text"
                                name="brand"
                                value="{{old('brand')}}"
                            />
                            @error('brand')
                                <p class="form-control">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="ad-part">
                            <label for="type">Model:</label>
                            <input
                                type="text"
                                name="type"
                                value="{{old('type')}}"
                            />
                            @error('type')
                                <p class="form-control">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="ad-part">
                            <label for="manuf_year">Godište:</label>
                            <input
                                type="text"
                                name="manuf_year"
                                value="{{old('manuf_year')}}"
                            />
                            @error('manuf_year')
                                <p class="form-control">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="ad-part">
                            <label for="kilometers">Kilometraža:</label>
                            <input
                                type="text"
                                name="kilometers"
                                value="{{old('kilometers')}}"
                            />
                            @error('kilometers')
                                <p class="form-control">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="ad-part">
                            <label for="price">Cena:</label>
                            <input
                                type="text"
                                name="price"
                                value="{{old('price')}}"
                            />
                            @error('price')
                                <p class="form-control">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="ad-part">
                            <label for="fuel_type">Gorivo:</label>
                            <select name=fuel_type id="fuel_type">
                                <option value="dizel">Dizel</option>
                                <option value="benzin">Benzin</option>
                                <option value="tng">Benzin + Gas (TNG)</option>
                                <option value="cng">Benzin + Metan (CNG)</option>
                                <option value="elektricni">Električni pogon</option>
                                <option value="hibridni">Hibridni pogon</option>
                            </select>
                        </div>
                        <div class="ad-part">
                            <label for="motor_cc">Kubikaža:</label>
                            <input
                                type="text"
                                name="motor_cc"
                                value="{{old('motor_cc')}}"
                            />
                            @error('motor_cc')
                                <p class="form-control">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="ad-part">
                            <label for="horse_power">Snaga motora:</label>
                            <input
                                type="text"
                                name="horse_power"
                                value="{{old('horse_power')}}"
                            />

                            @error('horse_power')
                            <p class="form-control">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="ad-part">
                            <label for="drive_type">Vrsta pogona:</label>
                            <select name="drive_type"id="drive_type">
                                <option value="prednji">Prednji</option>
                                <option value="zadnji">Zadnji</option>
                                <option value="na_sve_tockove">4x4</option>
                            </select>
                        </div>
                        <div class="ad-part">
                            <label for="shifter_type">Menjač:</label>
                            <select name="shifter_type" id="shifter_type">
                                <option value="Manuelni menjač">Manuelni menjač</option>
                                <option value="Automatski menjač">Automatski menjač</option>
                                    
                            </select>
                        </div>
                        <div class="ad-part">
                            <label for="no_doors">Broj vrata:</label>
                            <select name="no_doors"id="no_doors">
                                <option value="2/3">2/3</option>
                                <option value="4/5">4/5</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mt-3">
                             <label for="imgpath" class="col-md-4 col-form-label">Post Image</label>
                             <input type="file" name="imgpath" id="imgpath" accept="image/*">
                     
                             @error('imgpath')
                                 <strong>{{ $message }}</strong>
                              @enderror
                        </div>
                         
                         <div class="col-6">
                             <button class="submit-btn">Pošalji oglas</button>
                             <button class="cancel-btn">skloni se se</button>
                         </div>
                     </div>
                </form>
            </section>
        </div>
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