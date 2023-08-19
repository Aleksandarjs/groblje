@include("partials/header")

<section class="cart">
    <div class="container">
        <h2 class="title">Prüfen und Bestellen</h2>
        <p class="txt">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
        <div class="row">
            <div class="col-lg-2 col-sm-2">
                <h3 class="txt">Artikel</h3>
            </div>
            <div class="col-lg-1 col-sm-2">
                <h3 class="txt">Anzahl</h3>
            </div>
            <div class="col-lg-3 col-sm-2">
                <h3 class="txt">Konfiguration:</h3>
            </div>
            <div class="col-lg-2 col-sm-2 offset-lg-3 offset-sm-2">
                <h3 class="txt">Summe</h3>
            </div>
        </div>
        <div class="cart-item">
            <div class="row">
                <div class="col-lg-2 col-sm-2">
                    <h4><b>Zwei-Säulen</b></h4>
                    <img
                        src="{{ asset('assets/images/cart-grave.png') }}"
                        alt="grave"
                        class="img-fluid cart-image"
                    />
                </div>
                <div class="col-lg-1 col-sm-2 item-num">
                    <button class="item-num-decrease">-</button>
                    <span>1</span>
                    <button class="item-num-increase">+</button>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <p class="txt">Design Gestalten: Ja</p>
                    <p class="txt">Material: Afrika Schwarz</p>
                    <p class="txt">Bearbeitung: Stock Gehämmert</p>
                    <p class="txt">Schriftart: Sanford</p>
                    <p class="txt">Schriftfarbe: #f5f7f6</p>
                    <p class="txt">Verzierung: Taube</p>
                </div>
                <div class="col-lg-2 col-sm-3 col-sm-3  offset-sm-4 offset-lg-0">
                    <p class="txt">Keramik Foto: Ja</p>
                    <p class="txt">Postleitzahl:</p>
                    <p class="txt">Ort:</p>
                    <p class="txt">Friedhof:</p>
                    <p class="txt">Grabnummer:</p>
                    <p class="txt">Grab Typ:</p>
                </div>
                <div class="col-lg-2 offset-lg-1 col-sm-3">
                    <h5><b>CHF 1550,00</b></h5>
                </div>
                <div class="col-lg-1 col-sm-2">
                    <img
                        src="{{ asset('assets/images/remove-item.png') }}"
                        alt="delete"
                        class="img-fluid"
                    />
                </div>
            </div>
        </div>
        <div class="cart-footer">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <h4>Rechnungsadresse</h4>
                    <p class="txt">
                        John Smith <br />
                        +123 456 789 001 <br />
                        Lorem Ipsum 23, <br />
                        12254 City <br />
                        Switzerland
                    </p>
                    <a href="#" class="btn btn-secondary">Adresse ändern</a>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div>
                        <h4 style="font-weight: 300">
                            Gesamtsumme (inkl. 7.7% MwSt) :
                            <b class="total">CHF 1,669.35</b>
                        </h4>
                        <p class="txt">
                            <em>
                                Anzahlung 30% nach Erteilen des
                                Auftrags.Restzahlung nach <br />
                                Erteilen des «Gut zur Lieferung»
                            </em>
                        </p>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Anfrage absenden >
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@include("partials/footer")
