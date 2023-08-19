@include("partials/header")

<section class="tombstones-section tombstone">
    <div class="container">
        <h2 class="title">Grabsteine</h2>
        <p class="txt">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, vero.
        </p>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-1.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-2.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-3.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-4.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-5.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-6.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-7.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="{{ url('grabsteine-7') }}" class="btn btn-primary"
                    >jetzt bestellen</a
                >
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-8.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-9.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img
                    src="{{ asset('assets/images/tomb-10.png') }}"
                    alt="tomb"
                    class="img-fluid"
                />
                <h3>CHF 1550.00</h3>
                <a href="#" class="btn btn-primary">jetzt bestellen</a>
            </div>
        </div>
    </div>
</section>

<section class="gallery">
    <div
        class="bg"
        style="background-image: url('{{
            asset('assets/images/gallery-bg.jpg')
        }}');"
    ></div>
    <div class="container">
        <h2 class="title">Gallerie</h2>
        <p class="txt">Lorem ipsum dolor sit amet consectetur</p>

        <div class="wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <img
                        src="{{ asset('assets/images/gallery-1.png') }}"
                        alt="gallery"
                        class="img-fluid"
                    />
                </div>
                <div class="col-lg-4 col-md-6">
                    <img
                        src="{{ asset('assets/images/gallery-2.png') }}"
                        alt="gallery"
                        class="img-fluid"
                    />
                </div>
                <div class="col-lg-4 col-md-6">
                    <img
                        src="{{ asset('assets/images/gallery-3.png') }}"
                        alt="gallery"
                        class="img-fluid"
                    />
                </div>
                <div class="col-lg-4 col-md-6">
                    <img
                        src="{{ asset('assets/images/gallery-4.png') }}"
                        alt="gallery"
                        class="img-fluid"
                    />
                </div>
                <div class="col-lg-4 col-md-6">
                    <img
                        src="{{ asset('assets/images/gallery-5.png') }}"
                        alt="gallery"
                        class="img-fluid"
                    />
                </div>
                <div class="col-lg-4 col-md-6">
                    <img
                        src="{{ asset('assets/images/gallery-6.png') }}"
                        alt="gallery"
                        class="img-fluid"
                    />
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <a class="btn btn-secondary" href="#"
                        >Weitere Bilder ansehen</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>

@include("partials/footer")
