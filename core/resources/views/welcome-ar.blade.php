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
  <link rel="stylesheet" href="{{asset('public/ar_css/theme.css')}}">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a class="navbar-brand">
          <img src="{{asset('public/web_assets/img/logo.png')}}" alt="">
        </a>
        
        <div class="mx-auto d-lg-none d-block">
            <a href="/en" class="nav-link">
              <img src="{{asset('public/web_assets/img/en.png')}}" alt="">
            </a>
        </div>
        

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item">
              <a class="nav-link movetodiv" data-class="about-div">عن بيازين</a>
            </li>
            <li class="nav-item">
              <a class="nav-link movetodiv" data-class="features-div">المميزات</a>
            </li>
            <li class="nav-item">
              <a class="nav-link movetodiv" data-class="programs-div">البرامج</a>
            </li>
            <li class="nav-item">
              <a class="nav-link movetodiv" data-class="contact-div">تواصل معنا</a>
            </li>
            <li class="nav-item d-lg-block d-none">
              <a href="#" class="btn btn-primary rounded-pill">تنزيل</a>
            </li>
          </ul>

          <div class="mr-auto d-lg-block d-none">
            <a href="/en" class="nav-link">
              <img src="{{asset('public/web_assets/img/en.png')}}" alt="">
            </a>
          </div>

        </div>
      </div>
    </nav>

    <div class="about-bayzin page-banner home-banner">
      <div class="container h-100">

        <div class="row align-items-center h-100">
          <div class="col-lg-6 py-3 wow fadeInUp mt-lg-0 mt-5">
            <h1 class="sp-h1 mb-4">منصتنا تهتم بجودة الحياة من خلال التعليم</h1>
            <p class="text-lg mb-5">نوفر برامج متنوعة خصيصًا للشباب تهتم بالعلومك الطبيعية واللغوية</p>
            <div class="down-btn">
              <a href="#" class="btn btn-primary">تنزيل</a>
            </div>
          </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place img-main">
              <img src="{{asset('public/web_assets/img/bg_image_1.png')}}" alt="">
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>

  <main>

    <div class="page-section features border-top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 py-3 wow fadeInUp">
            <div class="text-center wow fadeInUp">
              <h2 class="title-section">ما هي منصة <span class="marked">بيازين</span>؟</h2>
              <div class="divider mx-auto"></div>
            </div>
            <p class="nm-p text-right">منصة بيازين تهدف إلى خلق فرص التعلم للمتحمسين حول العالم ومهمة بيازين الأساسية هي ربط مؤثري الوسط العلمي في انحاء العالم مع الشباب وتحويل المعرفة بالعلوم الي منتجات مبتكرة</p>
          </div>
        </div>
      </div>
    </div> 

    <div class="page-section features">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">المميزات</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row justify-content-center">

          <div class="col-md-6 col-12 py-3 wow fadeInUp">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-right">وصول غير محدود للمكتبات</h5>
                <p class="text-right">من خلال تطبيق بيازين يمكنك الوصول الي مكتبه من الفيديوهات تقدم بواسطه مؤثريين في مجالات العلوم الطبيعية واللغوية</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-12 py-3 wow fadeInUp">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-right">المؤثرين</h5>
                <p class="text-right">مقابلة المؤثرين وجها لوجه تتيح لك الدخول إلى عالم العلوم الطبيعية واللغوية بشكل أفضل</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-12 py-3 wow fadeInUp">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-right">التتعليم التفاعلي</h5>
                <p class="text-right">تدرب على ما تتعلمه باستخدام ملفات التمارين والاختبارات التفاعلية.</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-12 py-3 wow fadeInUp ">
            <div class="d-flex flex-row feat_card">
              <div class="img-fluid mr-3">
                <img src="{{asset('public/web_assets/img/icon_pattern.svg')}}" alt="">
              </div>
              <div class="mr-2">
                <h5 class="text-right">محتوى وفقا لاهتماماتك</h5>
                <p class="text-right">توصيات لبرامج دراسة مصممة وفقا لاهتماماتك ووظائفك</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> 

    <div class="page-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">أهم البرامج</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row my-5 card-blog-row">

          <div class="col-md-6 col-lg-6 col-12 prog-card">
            <div class="card text-black" style="height: 520px">
              <img src="{{asset('public/web_assets/img/anwal.png')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">انــوال</h5>
                  <p class="text-muted mb-4 text-right">انوال تهتم  بالفيزياء النظرية والفيزياء التجريبية، تهتم الأولى بصياغة النظريات باعتماد نماذج رياضية، فيما تهتم الثانية بإجراء الاختبارات على تلك النظريات، بالإضافة إلى في برنامج انوال نكتشف ظواهر طبيعية جديدة.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-12 prog-card">
            <div class="card text-black" style="height: 520px">
              <img src="{{asset('public/web_assets/img/riadiati.jpg')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">الرياضياتي في الصحراء</h5>
                  <p class="text-muted mb-4 text-right">انطلق الرياضياتي من صحرائه عام ٢٠١٨لُيعلم الناس انه  شخص قصصي يحب القصص ويُسليهم بالغازة والعابة الرياضياتية ,يسمع مشاكلهم  ويحلها بالرموز الجبرية والأشكال الهندسية ويعتمد علي  علي الاستقراء, الاستنباط, التعميم, المنطق الشكلي, البرهان الرياضي, التعبير بالرموز, التصور البصري, التفكير العلاقي, التفكير الاحتمالي</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-12 mt-md-3 prog-card">
            <div class="card text-black mt-md-0 mt-4" style="height: 520px">
              <img src="{{asset('public/web_assets/img/greenisland.png')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">الجزيرة الخضراء</h5>
                  <p class="text-muted mb-4 text-right">الجزيرة الخضراء تهتم بالحياة,الحياة حالة تميز جميع ما يدعى الكائنات الحية من حيوانات ونباتات وبشر وفطريات وحتى البكتريا والجراثيم مميزة إياها عن غير الأحياء من الأغراض اللاعضوية أو الكائنات الميتة. يتميز كل كائن حي بقدرته على النمو من خلال الاستقلاب، والتكاثر لضمان استمرار النوع الحيوي، وقدرة التكيف مع البيئة من خلال تغيرات داخلية أو جسمانية</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-12 mt-md-3 prog-card">
            <div class="card text-black mt-lg-0 mt-md-4 mt-4" style="height: 520px">
              <img src="{{asset('public/web_assets/img/elnohah.png')}}" class="p-2 border-0 card-img-top img-thumbnail" />
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title">النحاه</h5>
                  <p class="text-muted mb-4 text-right">النحاة برنامج لتقديم اللغه العربية , تُسمّى اللغة العربية بلغة الضاد، فهو الاسم الدارج، والمتعارف عليه وقد اتفق مجموعة من العلماء على خصوصية حرف الضاد للعرب دون غيرهم</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  
    <div class="page-section border-top pb-5">
      <div class="container">
        <div class="text-center wow fadeInUp mb-2">
          <h2 class="title-right">تواصل معنا</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="subhead text-right mb-3">وسائل الاتصال</div>
            <ul class="contact-list m-0 p-0 text-right">
              <li>
                <div class="icon"><span class="mai-map"></span></div>
                <div class="content">123 Fake Street, New York, USA</div>
              </li>
              <li>
                <div class="icon"><span class="mai-mail"></span></div>
                <div class="content"><a>info@digigram.com</a></div>
              </li>
              <li>
                <div class="icon"><span class="mai-phone-portrait"></span></div>
                <div class="content"><a>+00 1122 3344 55</a></div>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="subhead text-right mb-3">أرسل لنا رسالة</div>
            <form action="#">
              <div class="py-2">
                <input type="text" class="form-control" placeholder="الاسم بالكامل">
              </div>
              <div class="py-2">
                <input type="text" class="form-control" placeholder="الايميل">
              </div>
              <div class="py-2">
                <textarea rows="6" class="form-control" placeholder="رسالتك...."></textarea>
              </div>
              <button type="submit" class="btn btn-primary rounded-pill mt-4">أرسل رسالة</button>
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
          <p id="copyright">&copy; 2022 <a>Bayzin</a>. All rights reserved</p>
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


</body>
</html>