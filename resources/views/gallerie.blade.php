@include("partials/header")
<section class="main">
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
            </div>
        </div>
    </section>
@include("partials/footer")