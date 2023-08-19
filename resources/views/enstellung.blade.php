@include("partials/header")

<section class="settings">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3><b>Guten Tag John</b></h3>
                <div class="line"></div>
                <div class="d-flex align-items-start">
                    <div
                        class="nav flex-column nav-pills me-3"
                        id="v-pills-tab"
                        role="tablist"
                        aria-orientation="vertical"
                    >
                        <button
                            class="nav-link active"
                            id="v-pills-home-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#v-pills-home"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-home"
                            aria-selected="true"
                        >
                            Persönliche Daten
                        </button>
                        <button
                            class="nav-link"
                            id="v-pills-profile-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-profile"
                            aria-selected="false"
                        >
                            Addresses
                        </button>
                        <button
                            class="nav-link"
                            id="v-pills-messages-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#v-pills-messages"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-messages"
                            aria-selected="false"
                        >
                            Bestellungen
                        </button>
                        <button class="nav-link">Ausloggen</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="v-pills-home"
                        role="tabpanel"
                        aria-labelledby="v-pills-home-tab"
                    >
                        <div class="wrapper">
                            <h2 class="title">Persönliche Daten</h2>

                            <form>
                                <input type="text" placeholder="Vorname*" />
                                <input type="text" placeholder="Nachname*" />
                                <input type="tel" placeholder="Telefon*" />

                                <input
                                    type="email"
                                    placeholder="E-Mail-Addresse*"
                                    class="mt-5"
                                />
                                <input
                                    type="email"
                                    placeholder="E-Mail-Addresse-Wiederholung*"
                                />
                                <input
                                    type="password"
                                    placeholder="Neues Passwort*"
                                    class="mt-5"
                                />
                                <input
                                    type="password"
                                    placeholder="Passwort Wiederholung*"
                                />
                                <button type="submit" class="btn btn-secondary">
                                    speichern
                                </button>
                            </form>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-pills-profile"
                        role="tabpanel"
                        aria-labelledby="v-pills-profile-tab"
                    >
                        <div class="address">
                            <h2 class="title">Addressen</h2>
                            <p>
                                John Smith <br />
                                +123 456 789 001 <br />
                                lorem ipsum 23 <br />
                                12354 City <br />
                                Switzerland
                            </p>

                            <h2 class="title">Neue Adresse hinzufügen</h2>

                            <form>
                                <input type="text" placeholder="Vorname*" />
                                <input type="text" placeholder="Nachname*" />
                                <input type="tel" placeholder="Telefon*" />
                                <input
                                    type="text"
                                    placeholder="Strasse und Nr.*"
                                />
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="PLZ*" />
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="ORT*" />
                                    </div>
                                    <input type="text" placeholder="Land*" />
                                    <div class="checkbox">
                                        <input type="checkbox" />
                                        <span class="txt">
                                            Als Standard-Lieferadresse verwenden
                                        </span>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" />
                                        <span class="txt">
                                            Als Standard-Rechnungsadresse
                                            verwenden
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    speichern
                                </button>
                            </form>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-pills-messages"
                        role="tabpanel"
                        aria-labelledby="v-pills-messages-tab"
                    >
                        <div class="wrapper">
                            <h2 class="title">Bestellungen</h2>
                            <div class="row config-row">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-2">
                                        <h4><b>Zwei-Säulen</b></h4>
                                    </div>
                                </div>
                                <div class="col-lg-7 configuration">
                                    <img
                                        src="{{
                                            asset(
                                                'assets/images/cart-grave.png'
                                            )
                                        }}"
                                        alt="grave"
                                        class="img-fluid"
                                    />
                                    <div>
                                        <p class="txt">Design Gestalten: Ja</p>
                                        <p class="txt">
                                            Material: Afrika Schwarz
                                        </p>
                                        <p class="txt">
                                            Bearbeitung: Stock Gehämmert
                                        </p>
                                        <p class="txt">Schriftart: Sanford</p>
                                        <p class="txt">Schriftfarbe: #f5f7f6</p>
                                        <p class="txt">Verzierung: Taube</p>
                                        <h3>Bestellt</h3>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <p class="txt">Keramik Foto: Ja</p>
                                    <p class="txt">Postleitzahl:</p>
                                    <p class="txt">Ort:</p>
                                    <p class="txt">Friedhof:</p>
                                    <p class="txt">Grabnummer:</p>
                                    <p class="txt">Grab Typ:</p>
                                    <h3 class="txt">
                                        Gesamtsumme: <b>CHF 1550,00 </b>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("partials/footer")
