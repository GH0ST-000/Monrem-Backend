<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/script.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<header class="col-12 mt-1 d-flex justify-content-between align-items-end ps-5">
    <div class="col-1 d-flex justify-content-start">
        <img src="{{asset('img/logo.jpeg')}}" alt="Logo" width="70" height="70">
    </div>

    <div class="col-11 header-border">
        <div class="col-11 d-flex flex-column align-items-end pe-5 mb-2">
            <div class=" col-11 mt-1 d-flex gap-4 align-items-center justify-content-end">

                <nav class="d-none d-md-block">
                    <ul class="list-inline d-flex gap-4 m-0">
                        <li>ABOUT US</li>
                        <li>PRODUCTS</li>
                        <li>SERVICES</li>
                        <li>CONTACT US </li>
                    </ul>
                </nav>

                <div class="search-container d-none d-md-flex justify-content-center align-items-center">
                    <img src="{{asset('img/search.png')}}" alt="Logo" width="20" height="20">
                </div>
                <img src="{{asset('img/burger-bar.png')}}" alt="Logo" width="28" height="28" class="d-block d-md-none mb-2">

            </div>


        </div>
    </div>
</header>


<section>
    <img src="./img/hero.jpeg" alt="Hero Image" class="col-12 mt-4">
</section>


<section class="container mx-auto d-flex flex-column flex-lg-row mt-2" >
    <div class="col-12 col-lg-6">
        <h3 class="pt-5">ABOUT US</h3>
        <p class="about-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <img src="./img/about_img.jpeg" alt="Hero Image" class="col-12">
    </div>
</section>

<section class="col-12 pt-5 pb-5" style="background: #EDF3F1">
    <div class="container mx-auto">
        <h3>SERVICES</h3>

        <div>
            <img src="./img/line.png" alt="Logo" style="width: 100%">
        </div>

        <div class="services-wrapper">
            <div class="col-3">
                <div class="mt-2">
                    <p class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p>
                </div>
                <div class="mt-2">
                    <p class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p>
                </div>
                <div class="mt-2">
                    <p class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p>
                </div>
            </div>

            <div class="col-3">
                <div class="mt-2">
                    <li class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</li>
                </div>
                <div class="mt-2">
                    <li class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</li>
                </div>
                <div class="mt-2">
                    <li class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</li>
                </div>
            </div>


            <div class="col-3">
                <div class="mt-2">
                    <li class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</li>
                </div>
                <div class="mt-2">
                    <li class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</li>
                </div>
                <div class="mt-2">
                    <li class="service-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</li>
                </div>
            </div>

        </div>
    </div>

</section>

<section class="container mx-auto mb-4 mt-4">
    <h3>PRODUCTS</h3>
    <div class="image-grid">
        <div class="image-container">
            <img class="image" src="./img/hero.jpeg" alt="Image 1">
            <div class="title"> Wheat</div>
            <p>some text some tex some tex some tex some tex some tex some tex some tex</p>
        </div>

        <div class="image-container">
            <img class="image" src="./img/hero.jpeg" alt="Image 1">
            <div class="title"> Wheat</div>
            <p>some text some tex some tex some tex some tex some tex some tex some tex</p>
        </div>


        <div class="image-container">
            <img class="image" src="./img/hero.jpeg" alt="Image 1">
            <div class="title"> Wheat</div>
            <p>some text some tex some tex some tex some tex some tex some tex some tex</p>
        </div>


        <div class="image-container">
            <img class="image" src="./img/hero.jpeg" alt="Image 1">
            <div class="title"> Wheat</div>
            <p>some text some tex some tex some tex some tex some tex some tex some tex</p>
        </div>


        <div class="image-container">
            <img class="image" src="./img/hero.jpeg" alt="Image 1">
            <div class="title"> Wheat</div>
            <p>some text some tex some tex some tex some tex some tex some tex some tex</p>
        </div>


        <div class="image-container">
            <img class="image" src="./img/hero.jpeg" alt="Image 1">
            <div class="title"> Wheat</div>
            <p>some text some tex some tex some tex some tex some tex some tex some tex</p>
        </div>
    </div>

</section>


<section class="container flex-wrap d-flex gap-5 mt-5 mb-5 mx-auto justify-content-center" id="logoSection">
</section>


<section class="contact-container mt-2 col-12 d-flex flex-column flex-lg-row mt-2">
    <div class="contact-us-container col-12 col-lg-6 pb-5">
        <h3 class="pt-5 ps-5">CONTACT US</h3>
        <p class="mt-4 ps-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

        <div class="d-flex gap-2 align-items-center ps-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
            <p class="m-0">Tbilisi, Oniashvili street 57</p>
        </div>

        <div class="d-flex gap-2 align-items-center ps-5 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M18.48 22.926l-1.193.658c-6.979 3.621-19.082-17.494-12.279-21.484l1.145-.637 3.714 6.467-1.139.632c-2.067 1.245 2.76 9.707 4.879 8.545l1.162-.642 3.711 6.461zm-9.808-22.926l-1.68.975 3.714 6.466 1.681-.975-3.715-6.466zm8.613 14.997l-1.68.975 3.714 6.467 1.681-.975-3.715-6.467z"/></svg>
            <p class="m-0">+00 22 123 321</p>
        </div>

        <div class="d-flex gap-2 align-items-center ps-5 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M17 5v17h-10v-17h10zm2-5h-2v3h-10c-1.104 0-2 .896-2 2v17c0 1.104.896 2 2 2h10c1.104 0 2-.896 2-2v-22zm-9 20h-2v-1h2v1zm0-2h-2v-1h2v1zm0-2h-2v-1h2v1zm3 4h-2v-1h2v1zm0-2h-2v-1h2v1zm0-2h-2v-1h2v1zm3 4h-2v-1h2v1zm0-2h-2v-1h2v1zm0-2h-2v-1h2v1zm0-3h-8v-6h8v6z"/></svg>
            <p class="m-0">+00 22 123 321</p>
        </div>

        <div class="d-flex gap-2 align-items-center ps-5 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
            <p class="m-0">info@company.com</p>
        </div>

    </div>
    <div class="col-12 col-lg-6  d-flex flex-column align-items-center">
        <h3 class="pt-5 ps-5">GET IN TOUCH</h3>
        <div class="custom-input-wrapper  ps-0 ps-lg-5">
            <input type="text" class="custom-input" placeholder="Your Name">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="input-icon" viewBox="0 0 24 24"><path d="M20.822 18.096c-3.439-.794-6.641-1.49-5.09-4.418 4.719-8.912 1.251-13.678-3.732-13.678-5.081 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-2.979.688-3.178 2.143-3.178 4.663l.005 1.241h10.483l.704-3h1.615l.704 3h10.483l.005-1.241c.001-2.52-.198-3.975-3.177-4.663zm-8.231 1.904h-1.164l-.91-2h2.994l-.92 2z"/></svg>
        </div>

        <div class="custom-input-wrapper mt-3 ps-0 ps-lg-5">
            <input type="text" class="custom-input" placeholder="Email">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="input-icon" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
        </div>

        <div class="custom-input-wrapper mt-3 ps-0 ps-lg-5">
            <input type="text" class="custom-input" placeholder="Message">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 30 30">
                <path d="M 15 3 C 7.82 3 2 7.925 2 14 C 2 17.368 3.7933281 20.378484 6.6113281 22.396484 C 6.6832805 23.932468 6.4452784 26.053382 4.3261719 27.03125 A 0.5 0.5 0 0 0 4.3222656 27.033203 A 0.5 0.5 0 0 0 4 27.5 A 0.5 0.5 0 0 0 4.5 28 C 4.5119372 28 4.5232366 27.998109 4.5351562 27.998047 A 0.5 0.5 0 0 0 4.5429688 27.998047 C 6.9769949 27.982445 9.0432734 26.667034 10.46875 25.277344 C 10.92075 24.836344 11.550875 24.619328 12.171875 24.736328 C 13.081875 24.909328 14.028 25 15 25 C 22.18 25 28 20.075 28 14 C 28 7.925 22.18 3 15 3 z"></path>
            </svg>
        </div>

        <div class="button-container ps-0 ps-lg-5 mb-4">
            <button class="custom-button">SEND A MESSAGE</button>
        </div>


    </div>
</section>


<section>
    <img src="./img/map.png" alt="Map" class="col-12">
</section>


<footer class="container mb-5 mx-auto mt-5 d-flex justify-content-between align-items-center">
    <div class="d-md-block d-none">
        <img src="./img/logo.jpeg" alt="Logo" width="70" height="70">
    </div>


    <div>
        <h3>RECEIVE OUR NEWSLETTER</h3>
        <p>Lorem Ipsum is simply dummy text of the printing</p>
        <div class="d-flex gap-4">
            <input type="email" class="custom-input" placeholder="Email">
            <button class="footer-btn">SUBSCRIBE</button>
        </div>
    </div>

    <div class="up-container d-flex justify-content-center align-items-center">
        <img src="./img/upload.png" alt="Logo" width="20" height="20">

    </div>
</footer>

<section class="copyright-container m-0 col-12 d-flex justify-content-center">
    <p class="pt-4 pb-4 m-0">© 2012 TermsFeed®. All rights reserved.</p>
</section>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>
