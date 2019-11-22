<?php
  session_start();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lumia - Multipurpose responsive bootstrap website template</title>
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
  <script>
    function confirmDelete(n){
      var x = confirm("Are you sure you want to delete this submission? The action cannot be undone.");
      if(x == true){
        var url = "deletePaper.php?PaperID=" + n;
        window.location.href = url;
      }
    }
    function assign(n){
      var url = "assignReviewer.php?PaperID=" + n;
      window.location.href = url;
    }
  </script>
</head>


<body>

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
              <a href="main.php"><img src="assets/img/lipscomb-logo.png" width=200 heigh=40 alt="" /></a>
            </div>
            <!-- end logo -->

            <!-- top menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li class="active">
                    <a href="main.php"><i class="icon-home"></i> Home </a>
                  </li>
                  <li class="dropdown">
                    <a href="#"><i class="icon-calendar"></i> Events <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="media.html">Media</a></li>
                      <li><a href="color-scheme.html">10 Theme colors</a></li>
                      <li><a href="buttons.html">Buttons</a></li>
                      <li><a href="components.html">Components</a></li>
                      <li><a href="animations.html">56 Animations</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="icon-variations.html">Icon variations</a></li>
                      <li class="dropdown"><a href="#">3rd level <i class="icon-angle-right"></i></a>
                        <ul class="dropdown-menu sub-menu">
                          <li><a href="#">Example menu</a></li>
                          <li><a href="#">Example menu</a></li>
                          <li><a href="#">Example menu</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#"><i class="icon-money"></i> Sponsors <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="portfolio-2cols.html">Portfolio 2 columns</a></li>
                      <li><a href="portfolio-3cols.html">Portfolio 3 columns</a></li>
                      <li><a href="portfolio-4cols.html">Portfolio 4 columns</a></li>
                      <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="submissions.html"><i class="icon-phone"></i> Submissions</a>
                  </li>
                  <li>
                    <a href="contact.html"><i class="icon-envelope-alt"></i> Contact</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end menu -->

          </div>
        </div>
      </div>
      </header>

      <section id="maincontent">
        <div class="container">
          <div class="row">
            <div class="span12">
              <h4 class="rheading">Submissions Archive<span></span></h4>
              <br><br>
              <div class="row">
                <table>
                  <tr>
                    <th>Presentor</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Reviewer</th>
                    <th>Download</th>
                    <th>Remove</th>
                  </tr>
                  <?php
                  $db = new mysqli('68.178.217.43', 'paigeweber', 'Bison51#', 'paigeweber');
                  if(mysqli_connect_errno())
                    {
                        echo 'Connection to database failed:'.mysqli_connect_error();
                        exit();
                    }

                  $query = "SELECT * FROM Papers";
                      $result = $db-> query($query);
                      if($result -> num_rows > 0)
                      {
                          while ($row = $result->fetch_assoc()) {
                              $field1name = $row["Title"];
                              $field2name = $row["Author"];
                              $field3name = $row["Paper"];
                              $field4name = $row["ReviewerID"];
                              $field5name = $row["UserID"];
                              $field6name = $row["PaperID"];

                              echo '<tr>
                              <td>'.$field5name.'</td>
                              <td>'.$field1name.'</td>
                              <td>'.$field2name.'</td>';

                              if($field4name == ""){
                                echo'<td><button type="button" id="'. $field6name . '" onclick="assign(this.id)">Assign</button></td>';
                              }else{
                                echo '<td>'.$field4name.'</td>';
                              }

                              echo'
                              <td>'.'<a href='.'download.php?nama='.$field3name.'>download</a></td>
                              <td><button type="button" id="'. $field6name . '" onclick="confirmDelete(this.id)">x</button></td>
                              </tr>';
                              //<td><a href="deletePaper.php?PaperID=' . $field6name . '">x</a></td>
                            }
                        }


                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br><br><br><br><br>
      <!-- Footer
 ================================================== -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5>Interesting pages</h5>
              <ul class="regular">
                <li><a href="#">About our company</a></li>
                <li><a href="#">How we do all stuff</a></li>
                <li><a href="#">Our recent works</a></li>
                <li><a href="#">Press releases</a></li>
                <li><a href="#">Get in touch with us</a></li>
              </ul>
            </div>
          </div>

          <div class="span4">
            <div class="widget">
              <h5>How to find us</h5>
              <address>
								<i class="icon-home"></i> <strong>Lipscomb University</strong><br>
								X104 Awesome ville, Suite AB12<br>
								Jakarta 12420 Indonesia
								</address>
              <p>
                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-8890<br>
                <i class="icon-envelope-alt"></i> email@domainname.com
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

    <!-- Template Custom JavaScript File -->
    <script src="assets/js/custom.js"></script>

  </body>

</html>
