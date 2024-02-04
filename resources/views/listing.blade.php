<!doctype html>
<html lang="en">

@include('includes.head')
  <body>

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      @include('includes.header')
      
      <div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Listings</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span> <strong>Listings</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>
  



      

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        

        <div class="row">
        @foreach($cars as $car)

          <div class="col-md-6 col-lg-4 mb-4">

            <div class="listing d-block  align-items-stretch">
              <div class="listing-img h-100 mr-4">
              <a href="single/{{ $car->id }}"><img src="{{asset('assets/images/'.$car->image)}}" alt="Image" class="img-fluid"></a>
              </div>
              <div class="listing-contents h-100">
                <h3>{{$car->title}}</h3>
                <div class="rent-price">
                  <strong>{{$car->price}}</strong><span class="mx-1">/</span>day
                </div>
                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                  <div class="listing-feature pr-4">
                    <span class="caption">Luggage:</span>
                    <span class="number">{{$car->luggage}}</span>
                  </div>
                  <div class="listing-feature pr-4">
                    <span class="caption">Doors:</span>
                    <span class="number">{{$car->doors}}</span>
                  </div>
                  <div class="listing-feature pr-4">
                    <span class="caption">Passenger:</span>
                    <span class="number">{{$car->passenger}}</span>
                  </div>
                </div>
                <div>
                <p>{{$car->content}}</p>
               <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                </div>
              </div>

            </div>
          </div>

          @endforeach

        </div>
        </div>
        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
            {{$cars->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>

  
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        <div class="row">
        @foreach($testmons as $testimonial)
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
              <p>{{$testimonial->content}}</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{asset('assets/images/person_1.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">{{$testimonial->name}}</span>
                  <span>{{$testimonial->position}}</span>
                </div>
              </div>
            </div>
          </div>
@endforeach
        </div>
      </div>
    </div>


@include('includes.footer')
@include('includes.footerjs')
</body>

</html>
