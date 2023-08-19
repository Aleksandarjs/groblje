@include("partials/header")

<section class="selection" style="padding-bottom: 500px">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="title">ZWEI SÄULEN</h2>
                <canvas id="main-grave" width="500" height="600"></canvas>
            </div>
            <div class="col-lg-7">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#home"
                            type="button"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true"
                        >
                            <span class="tab-counter">1</span>
                            Material
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#profile"
                            type="button"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                        >
                            <span class="tab-counter">2</span>
                            Details zum Grabsteine
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="contact-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#contact"
                            type="button"
                            role="tab"
                            aria-controls="contact"
                            aria-selected="false"
                        >
                            <span class="tab-counter">3</span>
                            Friedhof Angaben
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <div class="wrapper">
                            @include("partials/materials")
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        @include("partials/detail")
                    </div>
                    <div
                        class="tab-pane fade"
                        id="contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        @include("partials/more-details")
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("partials/footer")
