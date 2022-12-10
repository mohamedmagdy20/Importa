@extends('front_master')
@section('front')

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>REL <span class="material-symbols-outlined">
                  forklift
                </span></h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav" style="direction:rtl">
              <li class="scroll-to-section"><a href="#top" class="active">@lang('lang.Home')</a></li>
              <li class="scroll-to-section"><a href="#features">@lang('lang.Features')</a></li>
              <li class="scroll-to-section"><a href="#about">@lang('lang.who')</a></li>
              <li class="scroll-to-section"><a href="#services">@lang('lang.Services')</a></li>
              <li class="scroll-to-section"><a href="#contact">@lang('lang.ContactUs')</a></li>
              <li class="scroll-to-section">
                <div class="dropdown">
                  <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="outline:none" title="Language">
                    <span class="material-symbols-outlined" style="color:white">
                      @lang('lang.language')
                    </span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('set.lang','en')}}">@lang('lang.english')</a>
                    <a class="dropdown-item" href="{{route('set.lang','ar')}}">@lang('lang.arabic')</a>
                  </div>
                </div>
               
            </ul>
            <a class='menu-trigger'>
              <span>@lang('lang.menu')</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row" style="direction: rtl;">
                  <div class="col-lg-12" style="direction: ltr;">
                    <h2>@lang('lang.Welcome_to')</h2>
                  </div>
                  <div class="col-lg-12" style="direction: ltr;">
                    <div class="main-green-button scroll-to-section">
                      <a href="#contact">@lang('lang.Get_quote')</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <!-- image -->
                <img src="{{asset('frontend/assets/images/LandingBg-removebg-preview.png')}}" alt="" style="height: 330px !important;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="features" class="features section" style="direction:rtl">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <div class="col-lg-3">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6>01</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>@lang('lang.shop1')</h4>
                  <div class="line-dec"></div>
                  <p>@lang('lang.fe1')</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="second-number number">
                    <h6>02</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>@lang('lang.shop2')</h4>
                  <div class="line-dec"></div>
                  <p>@lang('lang.fe2')</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="first-number number">
                    <h6>03</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>@lang('lang.shop3')</h4>
                  <div class="line-dec"></div>
                  <p>@lang('lang.fe3')</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item second-feature last-features-item wow fadeInUp" data-wow-duration="1s"
                  data-wow-delay="0.6s">
                  <div class="second-number number">
                    <h6>04</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>@lang('lang.speed_com')</h4>
                  <div class="line-dec"></div>
                  <p>@lang('lang.fe4')</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="skills-content">
            <div class="row">
              <div class="col-lg-3">
                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="progress" data-percentage="80">
                    <span class="progress-left">
                      <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                      <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">
                      <div>
                        80%<br>
                        <span>@lang('lang.Clients')</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="progress" data-percentage="90">
                    <span class="progress-left">
                      <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                      <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">
                      <div>
                        90%<br>
                        <span>@lang('lang.good_emp')
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="progress" data-percentage="90">
                    <span class="progress-left">
                      <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                      <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">
                      <div>
                        95%<br>
                        <span>@lang('lang.happy_cli')</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="skill-item last-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                  <div class="progress" data-percentage="90">
                    <span class="progress-left">
                      <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                      <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">
                      <div>
                        99%<br>
                        <span>@lang('lang.Exp_drivers')</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section" style="direction:rtl">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
            <!-- image -->
            <img src="{{asset('frontend/assets/images/test1-removebg-preview.png')}}" alt="" style="border-radius: 20px;">
          </div>
        </div>
        <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s"
          style="direction:rtl ">
          <div class="section-heading">
            <h6>@lang('lang.who')</h6>
            <h2>أكبر <em>شركه</em> شحن &amp; وشركه توصيل <span></span></h2>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-4">
              <div class="about-item">
                <h4>750+</h4>
                <h6>طلب</h6>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4">
              <div class="about-item">
                <h4>340+</h4>
                <h6>@lang('lang.happy_cli')</h6>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4">
              <div class="about-item">
                <h4>345+</h4>
                <h6>@lang('lang.Clients')</h6>
              </div>
            </div>
          </div>
          <p><span class="c_name">RNL</span> @lang('lang.who_p')</p>
          <div class="main-green-button"><a href="#">@lang('lang.find_out')</a></div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h6>@lang('lang.services')</h6>
            <h2>@lang('lang.find_out')</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="direction:rtl">
      <div class="row">
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <!-- image -->
                  <img src="{{asset('forntend/assets/images/service-icon-01.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>@lang('lang.manage_comp')</h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum doloribus praesentium, architecto
                    asperiores eius dolor!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <!-- image -->
                  <span class="material-symbols-outlined">
                    support_agent
                  </span>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>
                    خدمة عملاء على مدار 24 ساعة طوال أیام الأسبوع.</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <!-- image -->
                  <img src="{{asset('frontend/assets/images/service-icon-03.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Traffic Analysis</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <!-- image -->
                  <img src="{{asset('forntend/assets/images/service-icon-03.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Optimizing Keywords</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <!-- image -->
                  <img src="{{asset('frontend/assets/images/service-icon-01.png')}}" alt="">

                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Page Optimizations</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.8s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <!-- image -->
                  <img src="{{asset('frontend/assets/images/service-icon-02.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Deep URL Analysis</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dormque laudantium.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 
  <div id="portfolio" class="our-portfolio section">
    <div class="container" style="direction:rtl">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Our Portofolio</h6>
            <h2>Discover Our Recent <em>Projects</em> And <span>Showcases</span></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-01.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 101</h4>
                      </a>
                      <span>Marketing</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-04.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 102</h4>
                      </a>
                      <span>Branding</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-02.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 103</h4>
                      </a>
                      <span>Consulting</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-05.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 104</h4>
                      </a>
                      <span>Artwork</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-03.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 105</h4>
                      </a>
                      <span>Branding</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-06.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 106</h4>
                      </a>
                      <span>Artwork</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-04.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 107</h4>
                      </a>
                      <span>Creative</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/portfolio-01.jpg" alt="">
                  <div class="hover-content">
                    <div class="inner-content">
                      <a href="#">
                        <h4>Awesome Project 108</h4>
                      </a>
                      <span>Consulting</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div id="contact" class="contact-us section" style="direction:rtl">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                  <h6>@lang('lang.ContactUs')</h6>
                  <h2>@lang('lang.contact_form')</h2>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="name" name="name" id="name" placeholder="@lang('lang.name')" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="surname" name="surname" id="surname" placeholder="@lang('lang.f_name')" autocomplete="on"
                        required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="@lang('lang.email')"
                        required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="subject" name="subject" id="subject" placeholder="@lang('lang.Comment')" autocomplete="on">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="@lang('lang.Msg')"
                        required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button ">@lang('lang.Submit')</button>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="contact-info">
                  <ul>
                    <li>
                      <div class="icon">

                        <span class="material-symbols-outlined icon">
                          mail
                        </span>
                      </div>
                      <a href="relwork2@gmail.com">relwork2@gmail.com</a>
                    </li>
                    <li>
                      <div class="icon">

                        <span class="material-symbols-outlined icon">
                          call
                        </span>
                      </div>
                      <a href="#">+966 55 267 8080</a>
                    </li>
                    <li>
                      <div class="icon">

                        <span class="material-symbols-outlined icon">
                          location_on
                        </span>
                      </div>
                      <a href="#">Sauid Arabia Riyadh</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container" style="direction:rtl; color:white;">
      <div class="row">
        <div class="col-lg-12">
          <p>@lang('lang.CopyRights')
          </p>
        </div>
      </div>
    </div>
  </footer>
@endsection