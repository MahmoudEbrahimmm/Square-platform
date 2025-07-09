@extends('layouts.users')
@section('cartoona')
<!-- intro section -->
<section id="intro">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 title">
          <h4>{{__('language.WELCOM INTRO')}}</h4>
          <h2>{{__('language.LEARN')}} &amp; {{__('language.H2 HOME')}}</h2>
          <hr>
          <p><h4>{{__('language.P INTRO')}}</h4></p>
        </div>
      </div>
    </div>
  </section>
  <!-- work section -->
  <section id="work">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 title">
          <h2>{{__('language.COURSES')}}</h2>
          <hr>
          <p><h4>{{__('language.P WORK')}}<h4></p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="col-md-6 col-sm-6 bg-black"> <i class="fa fa-mobile"></i>
            <h3>{{__('language.MOPLI APP')}}</h3>
          </div>
          <div class="col-md-6 col-sm-6 bg-red"> <i class="fa fa-cloud"></i>
            <h3>{{__('language.FLUTTER')}}</h3>
          </div>
          <div class="col-md-6 col-sm-6 bg-red"> <i class="fa fa-link"></i>
            <h3>{{__('language.FULL')}}</h3>
          </div>
          <div class="col-md-6 col-sm-6 bg-black"> <i class="fa fa-globe"></i>
            <h3>{{__('language.BASIC')}}</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- team section -->
  <section id="team">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
          <h2>{{__('language.OURTEAM')}}</h2>
          <hr>
          <p><h5>{{__('language.P TEAM')}}</h5></p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.3s"><img src="images/T-squar hatem.jpg" class="img-responsive" alt="team img">
          <div class="team-des">
            <h4>{{__('language.N1')}}</h4>
            <h3>{{__('language.J1')}}</h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="0.9s"><img src="images/Picsart_24-09-21_15-34-06-384.jpg" class="img-responsive" alt="team img">
          <div class="team-des">
            <h4>{{__('language.N2')}}</h4>
            <h3>{{__('language.J2')}}</h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.6s"><img src="images/download (1).jpeg" class="img-responsive" alt="team img">
          <div class="team-des">
            <h4>{{__('language.N3')}}</h4>
            <h3>{{__('language.J3')}}</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- portfolio section -->
  <div id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
          <h2>{{__('language.PROJECTST')}}</h2>
          <hr>
          <p><h4>{{__('language.P PRO')}}</h4></p>
        </div>
        <div class="col-md-12 col-sm-12"></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img1.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img1.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img2.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img2.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img3.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img3.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img4.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img4.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img5.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img5.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img6.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img6.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img7.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img7.jpg" alt="portfolio img"></a></div>
        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s"><a href="images/portfolio-img8.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img8.jpg" alt="portfolio img"></a></div>
      </div>
    </div>
  </div>
  <!-- price section -->
  <div id="price">
    <div class="container">
      <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
        <h2>{{__('language.OFFER')}}</h2>
        <hr>
        <p><h4>{{__('language.P OFFER')}}</h4></p>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="plan wow bounceIn" data-wow-delay="0.3s">
          <div class="plan_title">
            <h3>{{__('language.MOPLI APP')}}</h3>
          </div>
          <div class="plan_sub_title">
            <h2>$ 25</h2>
            <small></small> </div>
          <ul>
            <li>5 {{__('language.ACC')}} </li>
          </ul>
          <button class="btn btn-warning">{{__('language.VIEW')}}</button>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="plan wow bounceIn" data-wow-delay="0.6s">
          <div class="plan_title">
            <h3>{{__('language.BASIC')}}</h3>
          </div>
          <div class="plan_sub_title">
            <h2>$ 50</h2>
            <small></small> </div>
          <ul>
            <li>10 {{__('language.ACC')}}</li>
          </ul>
          <button class="btn btn-warning">{{__('language.VIEW')}}</button>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="plan wow bounceIn" data-wow-delay="0.9s">
          <div class="plan_title">
            <h3>{{__('language.FULL')}}</h3>
          </div>
          <div class="plan_sub_title">
            <h2>$ 75</h2>
            <small></small> </div>
          <ul>
            <li>20 {{__('language.ACC')}}</li>
          </ul>
          <button class="btn btn-warning">{{__('language.VIEW')}}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- contact section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
          <h2>{{__('language.CON')}}</h2>
          <hr>
          <p><h4>{{__('language.P CON')}}</h4></p>
        </div>
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 contact-form wow fadeInUp" data-wow-delay="0.9s">
          <form action={{route('message.store')}} method="post" enctype="multipart/form-data">
            @csrf
            
            <input type="text" class="form-control" name="name" placeholder={{__('language.NAME')}}>
            <input type="text" class="form-control" name="email" placeholder={{__('language.EMAIL')}}>
            <textarea class="form-control" name="message" placeholder={{__('language.MESSAGEN')}} rows="6"></textarea>
            <input type="submit" class="form-control" value="{{__('language.BUTT')}}">
          </form>
        </div>
      </div>
    </div>
  </section>
  

@endsection