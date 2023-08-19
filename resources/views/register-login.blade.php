@include("partials/header")

<section class="register-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login">
                    <h2 class="title">Anmeldung</h2>
                    <form>
                        <input type="text" placeholder="E-Mail-Adresse" />
                        <input type="password" placeholder="Passwort" />

                        <a href="#">Passwort vergessen?</a>

                        <button type="submit" class="btn btn-secondary">
                            Anmeldung
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="register">
                    <h2 class="title">Registrieren</h2>
                    <form>
                        <input type="text" placeholder="Vorname*" />
                        <input type="text" placeholder="Nachname*" />
                        <input type="email" placeholder="E-Mail-Adresse* " />
                        <input type="password" placeholder="Passwort*" />

                        <p>
                            <b>
                                Ihr Passwort muss mindestens 8 Zeichen
                                enthalten. Berücksichtigen Sie Groß- und
                                Kleinschreibung.
                            </b>
                        </p>
                        <input type="tel" placeholder="Telefon*" />
                        <input type="text" placeholder="Strasse und Nr.*" />
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="PLZ*" />
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Ort*" />
                            </div>
                        </div>
                        <input type="text" placeholder="Land*" />

                        <button type="submit" class="btn btn-secondary">
                            Registrieren
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include("partials/footer")
