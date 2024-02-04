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
                <h1><strong>Testimonials</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span> <strong>Testimonials</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>       

        <div class="row">
        @foreach($testmons as $testmonial)

          <div class="col-lg-4 mb-4">

            <div class="testimonial-2">

              <blockquote class="mb-4">

              <p>{{$testmonial->content}}</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{asset('assets/images/' .$testmonial->image) }}" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">{{$testmonial->name}}</span>
                  <span>{{$testmonial->position}}</span>
                </div>
              </div>

            </div>

          </div>
          @endforeach
          </div>


    @include('includes.footer')

    @include('includes.footerjs')
  </body>

</html>

