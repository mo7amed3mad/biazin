<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Bayzin</title>

  <link rel="stylesheet" href="{{asset('public/web_assets/vendor/animate/animate.css')}}">
  <link rel="stylesheet" href="{{asset('public/web_assets/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('public/web_assets/css/maicons.css')}}">
  <link rel="stylesheet" href="{{asset('public/web_assets/vendor/owl-carousel/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('public/en_css/theme.css')}}">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="index.html" class="navbar-brand text-left">
          <img src="{{asset('public/web_assets/img/logo.png')}}" alt="">
        </a>
        <div class="mx-auto d-lg-none d-block">
            <a href="/" class="nav-link">
              <img src="{{asset('public/web_assets/img/ar.png')}}" alt="">
            </a>
        </div>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav mx-auto ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item">
              <a href="" class="nav-link movetodiv" data-class="about-div">About</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link movetodiv" data-class="features-div">Features</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link movetodiv" data-class="programs-div">Programs</a>
            </li>
            <li class="">
              <a href="" class="nav-link movetodiv" data-class="contact-div">Contact</a>
            </li>
            <li class="nav-item ml-auto d-lg-block d-none">
              <a href="" class="btn btn-primary rounded-pill">Download</a>
            </li>
          </ul>
          <div class="ml-auto d-lg-block d-none">
            <a href="/" class="nav-link">
              <img src="{{asset('public/web_assets/img/ar.png')}}" alt="">
            </a>
          </div>

        </div>
      </div>
    </nav>

    <div class="about-bayzin page-banner home-banner">
      <div class="container h-100">

        <div class="row align-items-center h-100">
          <div class="col-lg-6 py-3 wow fadeInUp mt-lg-0 mt-5">
            <h1 class="sp-h1 mb-4">Our platform seeks life enhancement through enhancing education</h1>
            <p class="text-lg mb-5">We provide various scientific and linguistic programs for youth</p>
            <div class="down-btn">
              <a href="#" class="btn btn-primary">Download</a>
            </div>
          </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place img-main">
              <img class="img-fluid" src="{{asset('public/web_assets/img/bg_image_1_en.png')}}" alt="">
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>

  <main>

    <div class="page-section features border-top" id="about-div">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 py-3 wow fadeInUp">
            <div class="text-center wow fadeInUp">
              <h2 class="title-section">What is <span class="marked">Bayzin</span>?</h2>
              <div class="divider mx-auto"></div>
            </div>
            <p class="nm-p text-left">Bayzin platform aims to create learning opportunities for enthusiasts around the world and BAYAZIN's core mission is to connect the influencers of the scientific community around the world with youth and transform knowledge of science into innovative products.</p>
          </div>
        </div>
      </div>
    </div> 

    <div class="page-section features" id="features-div">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">Features</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row justify-content-center">

          <div class="col-md-6 col-12 py-3 wow fadeInUp">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-left">Unlimited Access to Libraries</h5>
                <p class="text-left">Through the Beyazin application, you can access a library of videos presented by influencers in the fields of natural sciences and linguistics.</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-12 py-3 wow fadeInUp">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-left">Celebrities</h5>
                <p class="text-left">Meeting influencers face to face allows you to better enter the world of natural and linguistic sciences.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-12 py-3 wow fadeInUp">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-left">Interactive Education</h5>
                <p class="text-left">Practice what you learn with practice files and interactive quizzes.</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-12 py-3 wow fadeInUp ">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-left">Content According to Your Interests</h5>
                <p class="text-left">Recommendations for study programs tailored to your interests and careers.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> 

    <div class="page-section" id="programs-div">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">Programs</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row my-5 card-blog-row">

          <div class="col-lg-6 col-12 prog-card">
            <div class="card text-black" style="height: 580px">
              <img src="{{asset('public/web_assets/img/anwal.png')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">Anwal</h5>
                  <p class="text-muted mb-4 text-left">Anwal is concerned with theoretical physics and experimental physics. The first is concerned with formulating theories by adopting mathematical models, while the second is concerned with conducting tests on those theories, in addition to the Anwal program we discover new natural phenomena.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-12 mt-lg-0 mt-md-3 prog-card">
            <div class="card text-black" style="height: 580px">
              <img src="{{asset('public/web_assets/img/riadiati.jpg')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">Al-Riadiyati Fe Al-Saharaa</h5>
                  <p class="text-muted mb-4 text-right">Al-Riadiyati set out from his desert in 2018 to teach people that he is a fictional person who loves stories and entertains them with puzzles and mathematical games, hears their problems and solves them with algebraic symbols and geometric shapes and depends on induction, deduction, generalization, formal logic, mathematical proof, symbolic expression, visual perception, relational thinking, thinking probabilistic.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-12 mt-lg-3 mt-md-3 prog-card">
            <div class="card text-black mt-md-0 mt-4" style="height: 580px">
              <img src="{{asset('public/web_assets/img/greenisland.png')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">Al-Jazeera Al-Khadraa</h5>
                  <p class="text-muted mb-4 text-left">Al-Jazeera Al-Khadraa is concerned with life, life is a state that distinguishes all the so-called living organisms from animals, plants, humans, fungi and even bacteria and germs, distinguishing them from non-living things from inorganic purposes or dead organisms. Each organism is characterized by its ability to grow through metabolism, to reproduce to ensure the continuity of the biological species, and the ability to adapt to the environment through internal or physical changes.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-12 mt-lg-3 mt-md-3 prog-card">
            <div class="card text-black mt-lg-0 mt-md-4 mt-4" style="height: 580px">
              <img src="{{asset('public/web_assets/img/elnohah.png')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">Al-Nohat</h5>
                  <p class="text-muted mb-4 text-left">Al-Nohat is a program to introduce the Arabic language. The Arabic language is called the language of dhad, as it is the common, and recognized name.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  
    <div class="page-section border-top pb-5" id="contact-div">
      <div class="container">
        <div class="text-center wow fadeInUp mb-2">
          <h2 class="title-right">Contact</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="subhead text-left mb-3">Get in Touch</div>
            <ul class="contact-list m-0 p-0 text-left">
              <li>
                <div class="icon"><span class="mai-map"></span></div>
                <div class="content">123 Fake Street, New York, USA</div>
              </li>
              <li>
                <div class="icon"><span class="mai-mail"></span></div>
                <div class="content"><a href="#">info@digigram.com</a></div>
              </li>
              <li>
                <div class="icon"><span class="mai-phone-portrait"></span></div>
                <div class="content"><a href="#">+00 1122 3344 55</a></div>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="subhead text-left mb-3">Drop Us a Line</div>
            <form action="#">
              <div class="py-2">
                <input type="text" class="form-control" placeholder="Full Name">
              </div>
              <div class="py-2">
                <input type="text" class="form-control" placeholder="Email">
              </div>
              <div class="py-2">
                <textarea rows="6" class="form-control" placeholder="Your Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary rounded-pill mt-4">Send</button>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

  </main>

  <footer class="page-footer">
    <div class="container">

      <div class="row">
        <div class="col-sm-12 py-2 main-footer text-center">
          <p id="copyright">&copy; 2022 <a href="#">Bayzin</a>. All rights reserved</p>
        </div>
      </div>
    </div> <!-- .container -->
  </footer> <!-- .page-footer -->


  <script src="{{asset('public/web_assets/js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('public/web_assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/web_assets/vendor/wow/wow.min.js')}}"></script>
  <script src="{{asset('public/web_assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/web_assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('public/web_assets/vendor/animateNumber/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('public/web_assets/js/google-maps.js')}}"></script>
  <script src="{{asset('public/web_assets/js/theme.js')}}"></script>

  <script>
  $(".movetodiv").click(function(e) 
  {
    e.preventDefault();
    $('html, body').animate(
    {
        scrollTop: $("#"+$(this).data("class")).offset().top
    }, 1000);

  });
  </script>


</body>
</html>