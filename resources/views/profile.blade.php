<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <title>Polovnjaci | Profil korisnika</title>
        <!-- <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}"> -->
        <script src="{{asset('js/index.js')}}" defer></script>
        <script src="{{asset('js/profile.js')}}" defer></script>
        <script src="{{asset('js/cng_pwd.js')}}" defer></script>
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
                    <li><a href="/">Početna</a></li>
                    <li><a href="/search_list">Pretraga</a></li>
                    <!-- <li><a href="https://autoblog.rs/" target="blank">Vesti</a></li> -->
                    <li>
                        <div>
                            <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="profile">
                <div class="profile-info">
                    <div class="profile-image-name">
                        <img src="{{ auth()->user()->profileImage() }}" alt="Profile image of user" class="profile-image">
                        <h2 class="profile-name">{{ auth()->user()->username }}</h2>
                    </div>
                    <form action='/changeProfile' enctype="multipart/form-data" method="post" class="change-picture">
                        @csrf
                        <div class="change-picture-div">
                            <label for="image" class="col-form-label">Promenite profilnu sliku:</label>
                            <input type="file" name="image" id="image" accept="image/*" class="image-input">
                            
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    
                        <div class="submit-btn-div">
                            <button class="submit-btn mr-5">Ažuriraj</button>
                        </div>
                    </form>
                    <div class="profile-image-name">
                        <img src="{{ auth()->user()->car_image() }}" alt="Profile image of user" class="profile-image">
                        <h2 class="profile-name">Auto</h2>
                    </div>
                    <form action='/changecarimage' enctype="multipart/form-data" method="post" class="change-picture">
                        @csrf
                        <div class="change-picture-div">
                            <label for="car_image" class="col-form-label">Promenite sliku svog auta:</label>
                            <input type="file" name="car_image" id="car_image" accept="image/*" class="image-input">
                            
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        
                    
                        <div class="submit-btn-div">
                            <button class="submit-btn mr-5">Ažuriraj</button>
                        </div>
                    </form>
                </div>
                <div class="profile-options">
                    <ul>
                        <li><a href="/adding_ad" class="new-ad">Novi oglas</a></li>
                        <li><a href="logout" class="profile-btn">Odjavite se</a></li>
                    </ul>
                </div>
            </section>
            <section class="profile-section car-ads" id="ads">
                <h1>Moji oglasi</h1>
                <div class="car-ads-grid">
                    @unless ($listings->isEmpty())
                            @foreach ($listings as $listing)
                            <div class="car-ad">
                                <img src="{{asset("storage/uploads/". $listing->imgpath)}} " alt="A car">
                                <div class="car-desc">
                                    <div class="car-name-price">
                                        <h2 class="car-name">{{$listing->band.$listing->type}}</h2>
                                        <p class="car-price">{{$listing->price}}</p>
                                    </div>
                                    <p class="car-details">{{$listing->fuel_type}}</p>
                                    <p class="car-details text-primary">{{($listing->approved == '1') ? "Odobren" : 'Na cekanju';}}</p>
                                </div>
                            </div>
                        @endforeach
                    @endunless
                </div>
                    
                        
                   
                    
                    
            </section>
            <section class="profile-section saved-searches" id="searches">
                <h1>Sačuvane pretrage</h1>
                <ul>
                    @unless ($my_searches->isEmpty())
                        @foreach ($my_searches as $my_search)
                            <a href="/det_search/{{$my_search->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter;"><path d="M13.707 2.293A.996.996 0 0 0 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9a.996.996 0 0 0-.293-.707l-6-6zM6 4h6.586L18 9.414l.002 9.174-2.568-2.568c.35-.595.566-1.281.566-2.02 0-2.206-1.794-4-4-4s-4 1.794-4 4 1.794 4 4 4c.739 0 1.425-.216 2.02-.566L16.586 20H6V4zm6 12c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path></svg>
                                <p>{{$my_search->id}} .Pretraga</p>
                            </a>
                        @endforeach
                        
                    @endunless
                </ul>
            </section>
            <section class="profile-section profile-data" id="data">
                <h1>Podaci o profilu</h1>
                <div>
                    <p>Ime</p>
                    <p class="bold">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <p>Prezime</p>
                    <p class="bold">{{ auth()->user()->surname }}</p>
                </div>
                <div>
                    <p>Korisničko ime</p>
                    <p class="bold">{{ auth()->user()->username }}</p>
                </div>
                <div>
                    <p>Email adresa</p>
                    <p class="bold">{{ auth()->user()->email }}</p>
                </div>
                <button class="profile-btn modal">Promeni lozinku</button>
                <button onclick="window.location.href = 'http://localhost:8000/destroy'" class="profile-btn" >Obriši nalog</button>
            </section>
            <div id="overlay1">
                <form  class="login-form" method="POST" action='/updatepsw'>
                    @csrf
                    <div>
                            <div class="login-item">
                                <label for="password">Unesite trenutnu lozinku</label>
                                <input
                                     type="password"
                                     name="password"
                                     value="{{old('password')}}"
                                 />
                            </div>
                            <div class="login-item">
                                <label for="newpassword">Nova lozinka</label>
                                <input
                                     type="password"
                                     name="newpassword"
                                     value="{{old('newpassword')}}"
                                 />
                            </div>
                            <button type="submit" class="login-btn">Promeni lozinku</button>
                        <div class="close-login">
                            <button type="button" class="cancel-btn">Zatvori</button>
                        </div>
                    </div>
                </form>
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
                <!-- <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo"> -->
                <span class="blue">Polovni</span>
                <span class="white">Automobili</span>
            </div>
            <p>©2023 PolovniAutomobili.com</p>
        </footer>
    </body>
</html>