<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lipscomb Call for Papers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Lumia
    Theme URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <div id="wrapper">
    <header>
      <!-- Navbar
    ================================================== -->
      <div class="navbar navbar-static-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- logo -->
            <div class="logo">
              <a href="main.php"><img src="assets/img/lipscomb-logo.png" alt="" /></a>
            </div>
            <!-- end logo -->

            <!-- top menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li>
                    <a href="main.php"><i class="icon-home"></i> Home </a>
                  </li>
                  <li><!-- TODO: Make a Events Paige -->
                    <a href="#"><i class="icon-calendar"></i> Events</a>
                  </li>
                  <li><!-- TODO: Make a Sponsors Paige -->
                    <a href="#"><i class="icon-money"></i> Sponsors</a>
                  </li>
                  <li>
                    <a href="submit.php"><i class="icon-pencil"></i> Submissions</a>
                  </li>
				  <li class="active">
                    <a href="contact.php"><i class="icon-envelope-alt"></i> Contact</a>
                  </li>
                  <li class="dropdown" id="adminMenu">
                    <a href="#"><i class="icon-book"></i>Admin Menu<i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="blog-left-sidebar.html">Assign Users</a></li>
                      <li><a href="blog-right-sidebar.html">Admin Page</a></li>
                      <li><a href="post-left-sidebar.html">Admins only cool club</a></li>
                      <li><a href="post-right-sidebar.html">Admin Store</a></li>
                    </ul>
                  </li>
                  <li>
                    <?php
                      if(isset($_SESSION['USERID'])){
                        echo '<a href="main.php?logout=true" onclick="LogOut()"><i class="icon-lock"></i> Logout </a>';
                      }else{
                        echo '<a href="index.php"><i class="icon-key"></i> Login </a>';
                      }
                    ?>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end menu -->

          </div>
        </div>
      </div>
    </header>
    <!-- Subintro
================================================== -->
    <section id="maincontent">
      <div class="container">
        <div class="row">
          <div class="span4">
            <aside>
              <div class="widget">
                <h4 class="rheading">Get in touch with us<span></span></h4>
                <ul>
                  <li><label><strong>Phone : </strong></label>
                    <p>
                      +615 966 5042 ext. 5042
                    </p>
                  </li>
                  <li><label><strong>Email : </strong></label>
                    <p>
                      alfa.nyandoro@mail.lipscomb.edu
                    </p>
                  </li>
                  <li><label><strong>Address : </strong></label>
                    <p>
                      One University Park Drive<br>
					  Nashville, TN 37204
                    </p>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h4 class="rheading">Find us on social networks<span></span></h4>
                <ul class="social-links">
                  <li><a href="#" title="Twitter"><i class="icon-square icon-32 icon-twitter"></i></a></li>
                  <li><a href="#" title="Facebook"><i class="icon-square icon-32 icon-facebook"></i></a></li>
                  <li><a href="#" title="Google plus"><i class="icon-square icon-32 icon-google-plus"></i></a></li>
                  <li><a href="#" title="Linkedin"><i class="icon-square icon-32 icon-linkedin"></i></a></li>
                  <li><a href="#" title="Pinterest"><i class="icon-square icon-32 icon-pinterest"></i></a></li>
                </ul>
              </div>
            </aside>
          </div>
          <div class="span8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d10843.046623466622!2d-86.79249823516956!3d36.10184726870931!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1572989335337!5m2!1sen!2sus" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

            <div class="spacer30">
            </div>

            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="row">
                <div class="span4 form-group">
                  <input type="text" name="name" class="input-block-level" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>

                <div class="span4 form-group">
                  <input type="email" class="input-block-level" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="span8 form-group">
                  <input type="text" class="input-block-level" name="subject" id="subject" placeholder="Subject" data-rule="required" data-msg="Please enter a subject" />
                  <div class="validation"></div>
                </div>
                <div class="span8 form-group">
                  <textarea class="input-block-level" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                  <div class="text-center">
                    <button class="btn btn-theme" type="submit">Send a message</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer
 ================================================== -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5>How to find us</h5>
              <address>
				<i class="icon-home"></i> <strong>Lipscomb University</strong><br>
				One University Park Drive<br>
				Nashville, TN 37204
				</address>
              <p>
                <i class="icon-phone"></i> (615) 966-5082 ext. 5082<br>
                <i class="icon-envelope-alt"></i> chris.simmons@mail.lipscomb.edu
              </p>
            </div>
            <div class="widget">
              <ul class="social">
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square icon-32"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="verybottom">
        <div class="container">
          <div class="row">
            <div class="span6">
              <p>
                &copy; Lipscomb - All right reserved
              </p>
            </div>
            <div class="span6">
              <div class="pull-right">
                <div class="credits">
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Lumia
                  -->
                  Created by the best group in SENG
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <!-- end wrapper -->
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48 active"></i></a>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/raphael-min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/jquery-hover-effect.js"></script>
  <script src="assets/js/animate.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>

</body>

</html>
