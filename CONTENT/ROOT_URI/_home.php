<title>SocialMySocial+</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<?php include '_menu.php'; ?>
<style type="text/css">
  #myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%; 
    min-height: 100%;
  }
  #myVideo2 {
    display: none;
  }
  @media (max-width: 769px) {
    #myVideo {
      display: none;
    }
    /*Mobile*/
    #myVideo2 {
      display: block;
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%; 
      min-height: 100%;
    }
  }
  .content {
    background: rgba(0, 0, 0, 0.6);
  }
</style>

 <!-- ======= Hero Section ======= -->
 <video autoplay muted loop id="myVideo">
  <source src="assets/videos/v1.mp4" type="video/mp4">
 </video>
 <video autoplay muted loop id="myVideo2">
  <source src="assets/videos/v2.mp4" type="video/mp4">
 </video>
 <div class="content">
  <section id="hero" class="">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mainSec text-center">
          <h1>Social<span>My</span>Social<span>+</span></h1>
          <a href="#services" class="btn roundedButton mt-4 shadow scrollto">Get Started</a>
          <a href="login" class="btn roundedButton2 mt-4 shadow">Sign In</a>
        </div>
        <!-- <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 imgSec order-1 order-sm-2 order-md-2">
          <img src="assets/icons/social-networks.png" class="mainImg" data-aos="fade-down-left" data-aos-delay="500">
        </div> -->
      </div>

    </div>
  </section> <!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="color: #ffffff;">Our Speciality</h2>
          <p style="color: #ffffff;">We have our user's trust</p>
        </div>

        <div class="row">
          <div class="col-md-4 col-sm-12 mb-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box shadow" style="background: rgba(0, 0, 0, 0.7); color: #fff; border: none;">
              <div><img src="assets/icons/worldwide.png" width="auto" class="img-fluid" alt="" style="height: 100px; margin-bottom: 20px; "></div>
              <h6 class="font-weight-bold" style="font-size: 1.3em;">An Order is Made every</h6>
              <h4 style="font-size: 1.6em;">0.14 SEC</h4>
            </div>
          </div>

          <div class="col-md-4 col-sm-12 mb-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box shadow" style="background: rgba(0, 0, 0, 0.7); color: #fff; border: none;">
              <div><img src="assets/icons/network.png" width="auto" class="img-fluid" alt="" style="height: 100px; margin-bottom: 20px; "></div>
              <h6 class="font-weight-bold" style="font-size: 1.3em;">Orders Completed</h6> 
              <h4 style="font-size: 1.6em;">43431459</h4>
            </div>
          </div>

          <div class="col-md-4 col-sm-12 mb-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box shadow" style="background: rgba(0, 0, 0, 0.7); color: #fff; border: none;">
              <div class=""><img src="assets/icons/notification.png" width="auto" class="img-fluid" alt="" style="height: 100px; margin-bottom: 20px; "></div>
              <h6 class="font-weight-bold" style="font-size: 1.3em;">Price Starting from</h6>
              <h4 style="font-size: 1.6em;">$0.01/1K</h4>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2 style="color: #ffffff;">Achievements</h2>
          <p style="color: #ffffff;">So far we have achieved</p>
        </div>
        <div class="row mx-auto text-center content">
          <div class="col-md-3 col-sm-12">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">5729</span>
              <p><strong>Happy Clients</strong></p>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="count-box">
              <i class="icofont-award"></i>
              <span data-toggle="counter-up">192</span>
              <p><strong>Coffe Cups</strong></p>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
              <span data-toggle="counter-up">170474</span>
              <p><strong>Orders</strong></p>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="count-box">
              <i class="icofont-people"></i>
              <!--  -->
              <span data-toggle="counter-up">7</span>
              <p><strong>Staff Members</strong></p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2 style="color: #ffffff;">Services</h2>
          <p style="color: #ffffff;">What we provide</p>
        </div>
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2 text-right" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/icons/sm.png" width="500" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-lg-0 order-2 order-lg-1 content" style="color: #fff;" data-aos="fade-right" data-aos-delay="100">
            <div class="my-4">
              <h3>Social Media Services</h3>
              <p>
                SMS (Social My Social+) is directly using social networking sites such as  Twitter, Facebook, and LinkedIn to promote your website. At multi-smm.com we offer Instagram reseller panels, as well as other cheap smm panels. If you are looking for the most competitive SMM panels, smseplus.com has experienced workers with years of experience and are guaranteed to give you and amazing experience.
              </p>
              <p>
                Anyone who is involved in the field of marketing would have noticed a sudden shift to the use of social media to engage with customers. Social networking sites such as Facebook, Twitter, YouTube, and increasingly Instagram, are becoming the hottest new places to get in touch with their clients. If you are in marketing or even have an online business, then you should know all about this trend so that you too can make use of it to further your interests. As a matter of fact, this is becoming so important that there are plenty of social media jobs available.
              </p>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/icons/social-media.png" height="10" width="400" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <div class="my-4" style="color: #ffffff;">
              <p>
                This medium is growing at a very fast pace. Since the number of people joining Facebook, Twitter and Instagram is increasing by leaps and bounds, marketers have access to vast numbers of individuals almost effortlessly.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> IG Likes for 0.01$/1000</li>
                <li><i class="ri-check-double-line"></i> IG Followers for 0.20$/1000</li>
                <li><i class="ri-check-double-line"></i> Facebook likes, YouTube views, Twitter followers, etc...</li>
                <li><i class="ri-check-double-line"></i> A lot of cheap services</li>
                <li><i class="ri-check-double-line"></i> Automatic order processing</li>
                <li><i class="ri-check-double-line"></i> Instantdelivery</li>
              </ul>
              <p>
                This medium provides seamless connectivity to customers. People from all over the world can be given updates about the business as soon as they happen. Since the marketer communicates directly with the customer through social networking sites, there is no chance of any mistake in communication. The information that the clients get through these media is also generally believed to be more credible.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container px-4 py-4" data-aos="zoom-in" style="background: rgba(0, 0, 0, 0.8); opacity: 0.8;">

        <div class="text-center">
          <h3>Join Now</h3>
          <p>Social media marketing is important in this day and age as you apply to a wider variety of people, given the fact that many individuals from all the parts of the world are connected to social networks such as Facebook, Twitter, Instagram, and others. A good amount of traffic is generated by reaching out to people in these sites.</p>
          <a class="cta-btn btn roundedButton2 mt-4 shadow" style="color: #000000;" href="#">Join</a>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="color: #ffffff;">Contact</h2>
          <p style="color: #ffffff;">Contact Us</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="content px-3 py-3" style="color: #fff;">

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>contact@smseplus.com</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <!-- <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div> -->
              </div>
              <div class="text-center"><button class="btn roundedButton2 mt-4 shadow" type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  </div>

<script type="text/javascript">
  function saveContact() {
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    var warning = document.getElementById('warningMsg');
    var success = document.getElementById('successMsg');

    if(name == '' || phone == '' || email == '' || message==''){
      warning.style.display = "block";
    }else{
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

      if (reg.test(email) == false) 
      {
        emailError.style.display = "block";
      }else{
        emailError.style.display = "none";
        warning.style.display = "none";
        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('message', message);
        formData.append('subject', subject);
        formData.append('submitContact', "true");

        fetch('/API/V1/', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(json =>  {

          console.log(json);
          success.style.display = "block";
          document.getElementById("name").value="";
          document.getElementById("phone").value="";
          document.getElementById("email").value="";
          document.getElementById("message").value="";
          document.getElementById("subject").value="";

          // window.location.href = "contact-back";
          }
        );
      }

  }
}
</script>


</main><!-- End #main