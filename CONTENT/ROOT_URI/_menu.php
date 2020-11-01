</head>
 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top py-2">
    <div class="container d-flex align-items-center justify-content-between" id="headContainer" style="margin-top: 0; margin-bottom: 0;">

      <!-- <h1 class="logo"><a href="/"><img src="/assets/images/logo.png" style="height: 80px;"></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="/" class="logo"><img src="assets/images/logo.png" style="height: 100px;" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block mx-auto">
        <ul>
          <li><a style="font-weight: bold;" href="/" style="font-size: 1.4em;">Home</a></li>
          <li><a style="font-weight: bold;" href="#">About Us</a></li>
          <?php if ($_SESSION['LoggedIn']) { ?>
            <li><a style="font-weight: bold;" href="logout">Log Out</a></li>
       <?php }else{ ?>
            <li><a style="font-weight: bold;" href="login">Login</a></li>
            <li><a style="font-weight: bold;" href="signup">Sign Up</a></li>
       <?php } ?>
          <li><a style="font-weight: bold;" href="#">Affiliate Login</a></li>
          <li><a style="font-weight: bold;" href="#">Engagement Pods</a></li>
          <li><a style="font-weight: bold;" href="#">Services</a></li>
          <li><a style="font-weight: bold;" href="#">How It Works</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <body>