@include("partials/header")

<section class="main">
    <div
        class="bg"
        style="background-image: url('{{
            asset('assets/images/kontakt-bg.jpg')
        }}');"
    ></div>
    <div class="container">
        <h2 class="title">Kontaktiere Uns</h2>
        <p class="txt">Lorem ipsum dolor sit amet consectetur</p>

        <div class="contact">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/call.png') }}" alt="" />
                    <p class="txt">+123 (4)56 789 012</p>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/mail.png') }}" alt="" />
                    <a class="txt" href="mailto: info@grabsteine.ch"
                        >info@grabsteine.ch</a
                    >
                </div>
                <div class="col-lg-4">
                    <img
                        src="{{ asset('assets/images/location.png') }}"
                        alt=""
                    />
                    <p class="txt">Lorem, ipsum dolor 23</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <form>
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Name" />
                                </div>
                                <div class="col-lg-5">
                                    <input type="email" placeholder="Email" />
                                </div>
                                <div class="col-lg-12">
                                    <input type="tel" placeholder="Telefon" />
                                </div>
                                <div class="col-lg-12">
                                    <textarea
                                        cols="30"
                                        rows="10"
                                        placeholder="Nachricht"
                                    ></textarea>
                                </div>
                            </div>

                            <button class="btn btn-secondary">SENDEN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("partials/footer")
