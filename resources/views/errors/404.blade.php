
@section('content')
<section class="header-image bg-picture" style="background-image: url('{{asset('assets/images/header-image-6.jpg')}}')">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="{{url('/')}}"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="list-inline-item">404</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="error-page regular-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>NOT FOUND</h1>
        <h2>404</h2>
        <a href="{{url('/')}}" class="button">Zur homesite</a>
      </div>
    </div>
  </div>
</section>
@endsection