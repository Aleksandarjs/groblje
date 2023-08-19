<div class="wrapper editor">
    <div class="row">
        <div class="col-lg-4">
            <input type="text" id="username" placeholder="Vorname*" />
        </div>
        <div class="col-lg-4">
            <input type="text" id="surname" placeholder="Nachname*" />
        </div>
        <div class="col-lg-4">
            <input
                type="text"
                id="date"
                placeholder="15.07.1933 - 30.05.2020"
            />
        </div>

        <div class="col-lg-6">
            <input
                type="text"
                id="text-line-1"
                placeholder="Freier Text line 1"
            />
        </div>
        <div class="col-lg-6">
            <input
                type="text"
                id="text-line-2"
                placeholder="Freier Text line 2"
            />
        </div>

        <div class="col-lg-5">
            <select id="fontFamilySelect">
                <option value="font" selected disabled>Font</option>
                <option value="Arial">Arial</option>
                <option value="Georgia">Georgia</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
            </select>
        </div>
        <div class="col-lg-5">
            <ul class="color-pallete">
                <li class="pick-color" style="background-color: #d4d4d4"></li>
                <li class="pick-color" style="background-color: #adadad"></li>
                <li class="pick-color" style="background-color: #d8bd2a"></li>
                <li class="pick-color" style="background-color: #6e6e6e"></li>
                <li class="pick-color" style="background-color: #000000"></li>
            </ul>
        </div>
        <div class="col-lg-2">
            <div class="font-resizer">
                <button id="decrease-font">-</button>
                <span id="font-size-value">24</span>
                <button id="increase-font">+</button>
            </div>
        </div>
    </div>

    <div class="title-line-through">
        <h3>Verzierung</h3>
        <div class="line-through"></div>
    </div>

    <div class="ornament">
        <div class="row">
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-1.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>Keine Verzierung</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/ornaments/or-2.svg') }}"
                        alt="ornament"
                        class="img-fluid"
                        data-color="#000000"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <svg
                        version="1.0"
                        xmlns="http://www.w3.org/2000/svg"
                        width="97px"
                        height="97px"
                        viewBox="0 0 601.000000 601.000000"
                        preserveAspectRatio="xMidYMid meet"
                    >
                        <metadata>
                            Created by potrace 1.16, written by Peter Selinger
                            2001-2019
                        </metadata>
                        <g
                            transform="translate(0.000000,601.000000) scale(0.100000,-0.100000)"
                            fill="#000000"
                            stroke="none"
                        >
                            <path
                                d="M2780 4530 l0 -570 -485 0 -485 0 0 -235 0 -235 485 0 485 0 0 -1290
0 -1290 235 0 235 0 0 1290 0 1290 485 0 485 0 0 235 0 235 -485 0 -485 0 0
570 0 570 -235 0 -235 0 0 -570z m420 -50 l0 -570 485 0 485 0 0 -185 0 -185
-485 0 -485 0 0 -1290 0 -1290 -185 0 -185 0 0 1290 0 1290 -485 0 -485 0 0
185 0 185 485 0 485 0 0 570 0 570 185 0 185 0 0 -570z"
                            />
                            <path
                                d="M2930 4380 l0 -570 -485 0 -485 0 0 -85 0 -85 485 0 485 0 0 -1290 0
-1290 85 0 85 0 0 1290 0 1290 485 0 485 0 0 85 0 85 -485 0 -485 0 0 570 0
570 -85 0 -85 0 0 -570z"
                            />
                        </g>
                    </svg>
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-4.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-5.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-6.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-7.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-8.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-9.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>100 CHF</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pick-ornament">
                    <img
                        src="{{ asset('assets/images/or-10.png') }}"
                        alt="ornament"
                        class="img-fluid"
                    />
                    <h3>
                        Nach Wunsch <br />
                        200 CHF
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="title-line-through">
    <h3>KERAMIK FOTO</h3>
    <div class="line-through"></div>
</div>

<div class="upload">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit 200 CHF</p>
    <button class="btn btn-secondary">
        <img
            src="{{ asset('assets/images/upload.png') }}"
            alt="upload"
            class="img-fluid"
        />
        Bild hochladen
    </button>
</div>

<div class="btn-split">
    <button class="btn btn-primary">< zurück</button>
    <button class="btn btn-primary">NEBEN ></button>
</div>
