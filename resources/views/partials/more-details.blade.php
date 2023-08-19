<div class="wrapper editor">
    <div class="row">
        <div class="col-lg-6">
            <input type="text" placeholder="Postleitzahl" />
        </div>
        <div class="col-lg-6">
            <input type="text" placeholder="Orl" />
        </div>
        <div class="col-lg-6">
            <input type="text" placeholder="Friedhof" />
        </div>
        <div class="col-lg-6">
            <input type="text" placeholder="Grabnummer" />
        </div>
    </div>

    <div class="row grave-type">
        <div class="col-xl-4">
            <button class="btn btn-secondary">URNENGRAB</button>
        </div>
        <div class="col-xl-4">
            <button class="btn btn-secondary">ERDGRAB</button>
        </div>
        <div class="col-xl-4">
            <button class="btn btn-secondary">FAMILIENGRAB</button>
        </div>
    </div>
</div>

<div class="row price">
    <div class="col-lg-6">
        <h4>Postleitzahl</h4>
    </div>
    <div class="col-lg-6">
        <h3>CHF 2'050.00</h3>
    </div>
</div>

<div class="btn-split">
    <button class="btn btn-primary" id="switchBackToProfile">< zurück</button>
    <button class="btn btn-primary d-flex gap-3">
        <img
            src="{{ asset('assets/images/cart-white.png') }}"
            alt="cart"
            class="img-fluid"
        />
        In den Warenkorb
    </button>
</div>
