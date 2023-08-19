<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Grabstaine CH</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/slick-slider/slick/slick.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/slick-slider/slick/slick-theme.css') }}"
        />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <script defer src="{{ asset('assets/js/script.js') }}"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-xl navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img
                            src="{{ asset('assets/images/logo.png') }}"
                            alt="logo"
                            class="img-fluid"
                        />
                    </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    aria-current="page"
                                    href="/grabsteine"
                                    >GRABSTEINE</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/gallerie">GALLERIE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faq"
                                    >HÄUFIGE FRAGEN</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/bestellblauf">BESTELLABLAUF</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/referenzen">REFERENZEN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kontaktiere">KONTAKTIERE</a>
                            </li>
                            <li>
                                <a href="/enstellung">
                                    <img
                                        src="{{
                                            asset('assets/images/user.png')
                                        }}"
                                        alt="user"
                                    />
                                </a>
                                <a href="/warenkorb">
                                    <img
                                        src="{{
                                            asset('assets/images/cart.png')
                                        }}"
                                        alt="cart"
                                    />
                                </a>
                                <span>CHF 1550.00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>