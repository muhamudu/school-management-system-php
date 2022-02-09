<?php
error_reporting("E_NOTICE");
?>
<?php
    require('config.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<!-- Mirrored from showwp.com/demos/ws-garden/blog-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 15:08:30 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>BLOG VIEWING</title>

    <link rel="shortcut icon" href="images/sch_sign.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- COLORS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>  

    <div id="loader">
        <div class="loader-container">
            <img src="images/load.gif" alt="" class="loader-site spinner">
        </div>
    </div>

    <div id="wrapper">
        <div class="topbar clearfix">
            <div class="container">
                <div class="row-fluid">
                    <div class="col-md-6 text-left">
                        <div class="social">
                            <a href="#" data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                            <a href="#" data-tooltip="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-tooltip="tooltip" data-placement="bottom" title="Google"><i class="fa fa-google"></i></a>
                            <a href="#" data-tooltip="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                        </div><!-- end social -->
                    </div><!-- end left -->
                    <div class="col-md-6 text-right">
                        <p>
                            <strong><i class="fa fa-phone"></i></strong> (+250) 782 560 141 / 785 175 498 &nbsp;&nbsp;
                            <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:stphiliptvet012@gmail.com"><span class="__cf_email__">stphiliptvet012@gmail.com</span></a>
                        </p>
                    </div><!-- end left -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end topbar -->
        
        <header class="header">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <nav class="navbar yamm navbar-default">
                            <div class="container-full">
                                <div class="navbar-table">
                                    <div class="navbar-cell">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" href="index.php"><img src="images/sch_sign.png" alt="Ova" width="60" height="50"></a>
                                            <div>
                                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="fa fa-bars"></span>
                                                </button>
                                            </div>
                                        </div><!-- end navbar-header -->
                                    </div><!-- end navbar-cell -->

                                    <div class="navbar-cell stretch">
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                            <div class="navbar-cell">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                                    <li><a href="news.php"><i class="fa fa-info"></i> Events</a></li>
                                                    <li><a href="gallary.php"><i class="fa fa-camera"></i> Gallary</a></li>
                                                    <li><a href="about.php"><i class="fa fa-leaf"></i> About</a></li>
                                                    <li><a href="blog.php" class="active"><i class="fa fa-github"></i> Blog</a></li>
                                                    <li><a href="contact.php"><i class="fa fa-phone"></i> Contact</a></li>
                                                </ul>
                                            </div><!-- end navbar-cell -->
                                        </div><!-- /.navbar-collapse -->        
                                    </div><!-- end navbar cell -->
                                </div><!-- end navbar-table -->
                            </div><!-- end container fluid -->
                        </nav><!-- end navbar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </header>

        <section class="section darkbg fullscreen paralbackground parallax" style="background:url('upload/bj.jpg') bottom;" data-img-width="1688" data-img-height="1125" data-diff="600">
            <div class="overlay lightoverlay"></div>
            <div class="container">
                <div class="title-area text-center">
                    <h2>Blog & Comments</h2>
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li class="active">Viewing Blog</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div>
        </section><!-- end page-title -->

        <section class="section white">
            <div class="container">
                <div class="row">
                    <div id="content" class="single-post col-md-5 col-sm-12 col-xs-12">

                    <?php
                        $id = $_REQUEST['id'];
                        $sel = mysql_query("SELECT * FROM blog_post WHERE id='$id'");
                        $row = mysql_fetch_array($sel);

                        $sel_row = mysql_query("SELECT * FROM blog_comment WHERE blog_id='".$row['id']."' ");
                        $numrow = mysql_num_rows($sel_row);
                    ?>
                        <div class="blog-wrapper">
                            <div class="blog-title">
                                <a class="category_title" href="#" title=""><?php echo $row['title'] ?></a>
                                <h2><a href="blog_view.php" title=""><?php echo $row['heading'] ?></a></h2>
                                <div class="post-meta">
                                    <span>
                                    <i class="fa fa-comments"></i>
                                    <?php ?>
                                    <a href="#"><?php echo $numrow; ?> Comments</a>
                                    </span>
                                    <span>
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#"><?php echo $row['date/time'] ?></a>
                                    </span>
                                    <span>
                                    <i class="fa fa-eye"></i>
                                    <a href="#">
                                        <?php
                                             $find_count = mysql_query("SELECT * FROM blog_post WHERE id='$id' ");

                                             while ($get = mysql_fetch_array($find_count)) {
                                                 $current_counts = $get['count'];
                                                 $new_count = $current_counts + 1;
                                                 $update_count = mysql_query("UPDATE blog_post SET count=$new_count WHERE id='$id'");

                                                 echo "$new_count Views";
                                             }
                                        ?>
                                    </a>

                                    </span>
                                    <span>
                                    <i class="fa fa-share-alt"></i>
                                    <a href="#">Share</a>
                                    </span>
                                </div>
                            </div><!-- end desc -->
                            <div class="blog-image">
                                <img src="admin&staff/uploaded-img/<?php echo $row['blog_img'] ?>" alt="" class="img-responsive">
                            </div><!-- end blog-image --> 
                            <div class="blog-title">
                                <p><?php echo $row['short_data'] ?></p><br>
                                <p><?php echo $row['more_data'] ?></p>
                            </div><!-- end desc -->
                        </div><!-- end blog-wrapper -->

                        <div class="comment-wrapper">
                            <div id="reviews" class="feedbacks">
                                <h3>
                                    What others say about this post?
                                </h3>
                                <div>
                                    <div class="well">
                                        <?php
                                            $sh = mysql_query("SELECT * FROM blog_comment WHERE blog_id='".$row['id']."' ORDER BY id DESC ");
                                            while($fet = mysql_fetch_array($sh)){
                                        ?>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                  <img class="media-object" src="upload/avatar.jpg" alt="Generic placeholder image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $fet['username']; ?></h4>
                                                <div class="time-comment clearfix">
                                                    <small class="pull-left"><?php echo $fet['date']; ?></small>
                                                </div><!-- end time-comment -->
                                                <p><?php echo $fet['comment']; ?></p>
                                            </div>
                                        </div><!-- end media -->
                                        <?php
                                            }
                                        ?>

                                        <div class="widget-title">
                                            <h4>Leave a Comment</h4>
                                            <hr>
                                        </div>
                                        <div class="commentform">
                                            <?php
                                                if (isset($_GET['send'])) {
                                                    $blog = $_GET['blog'];
                                                    $username = $_GET['username'];
                                                    $email = $_GET['email'];
                                                    $comment = $_GET['comment'];

                                                    $in = mysql_query("INSERT INTO `blog_comment`(`blog_id`, `username`, `email`, `comment`) VALUES ('$blog','$username','$email','$comment')");

                                                    if ($in == true) {
                                                        ?>
                                                            <script>
                                                                alert("Successfuly commented on the Blog above");
                                                                document.location = "blog.php";
                                                            </script>
                                                        <?php
                                                        echo "<meta http-equiv='refresh' content='2;url=teacher_tb.php'>";
                                                    }
                                                    else {
                                                        echo "<span class='alert alert-danger'>Failed to comment on the blog</span>";
                                                    }
                                                }
                                            ?>
                                            <form action="" method="get">
                                                <input type="hidden" name="blog" value="<?php echo $row[0]; ?>">
                                                <input type="text" name="username" class="form-control" placeholder="Your name">
                                                <input type="email" name="email" class="form-control" placeholder="Your email">
                                                <textarea class="form-control" name="comment" placeholder="Message goes here"></textarea>
                                                <input type="submit" name="send" value="Send Comment" class="btn btn-primary btn-block" />
                                            </form>
                                        </div><!-- end newsletter -->
                                    </div><!-- end well -->
                                </div><!-- end collapse -->
                            </div><!-- end reviews -->
                        </div><!-- end blog-wrapper -->
                    </div><!-- end content -->

                    <div id="sidebar" class="col-md-7 col-sm-12 col-xs-12">

                        <div class="widget">
                            <div class="widget-title">
                                <h4>Recent posts</h4>
                                <hr>
                            </div><!-- end title -->

                            <div class="recent-post-widget">
                                <ul class="recent-posts">
                                    <?php 
                                        $query = mysql_query("SELECT * FROM blog_post ORDER BY id DESC LIMIT 10");
                                        while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <li>
                                        <p><a href="blog_view.php?id=<?php echo $row['id']; ?>" title=""><img src="admin&staff/uploaded-img/<?php echo $row['blog_img']; ?>" alt="" class="alignleft"><?php echo $row['heading']; ?></a></p>
                                        <span><?php echo $row['count']; ?> Views</span>, Date: <span><?php echo $row['date/time']; ?></span>
                                    </li><hr>
                                    <?php 
                                        } 
                                    ?>
                                </ul><!-- end latest-tweet -->
                            </div><!-- end twitter-widget -->
                        </div><!-- end widget -->

                    </div><!-- end content -->       
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <footer class="footer">
            <div class="container">
                <div class="row module-wrapper">
                    <div class="col-md-6 col-sm-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.4261296125237!2d30.064241714306835!3d-1.9841781985534768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca5e2c966cc71%3A0xf3bc79bba81a7776!2sKK+33+Ave%2C+Kigali!5e0!3m2!1sen!2srw!4v1539122734846" width="500" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Contact Details</h4>
                            </div>
                            <ul class="site-links">
                                <li><i class="fa fa-link"></i> www.stphiliptvetschool.rw</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:stphiliptvet012@gmail.com" class="__cf_email__">stphiliptvet012@gmail.com</a></li>
                                <li><i class="fa fa-phone"></i> +250 782 560 141 / 785 175 498</li>
                                <li><i class="fa fa-home"></i> Kicukiro - Kigarama KK 33 Ave.</li>
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-6">
                        <div class="widget wow fadeInUp">
                            <div class="widget-title">
                                <h4>Useful Links</h4>
                            </div>
                            <ul class="site-links">
                                <li><a href="http://www.mineduc.gov.rw">MINEDUC</a></li>
                                <li><a href="http://www.sinapisi-rwanda.org">SINAPISI-RWANDA</a></li>
                                <li><a href="https://www.rencp.org/about/member-organizations-1/sinapisi-rwanda/">RENCP</a></li>
                                <li><a href="http://www.wda.gov.rw">Workforce Development Authority (WDA)</a></li>
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
        </footer>

        <section class="copyright">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-md-8 text-left">
                        <p>Copyright © <?php echo date("Y"); ?> All rights reserved | Distributed by St.Philip TVET School</p>
                    </div><!-- end col -->
                    <div class="col-md-4 text-right">
                        <ul class="list-inline">
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="https://www.google.com/maps/place/St.+Philip+TVET+School/@-1.9830974,30.0649532,772m/data=!3m1!1e3!4m13!1m7!3m6!1s0x19dca5e2c966cc71:0xf3bc79bba81a7776!2sKK+33+Ave,+Kigali!3b1!8m2!3d-1.9841782!4d30.0664304!3m4!1s0x19dca78fcf867a39:0xce1a8a6adbb4ac34!8m2!3d-1.9830766!4d30.0670448">Sitemap</a></li>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    </div><!-- end wrapper -->

    <script data-cfasync="false" src="../../cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/retina.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/custom.js"></script>

    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-ui-timepicker-addon.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script type="text/javascript">
        (function($) {
        "use strict";
            $('.selectpicker').selectpicker();
            $( "#datepicker" ).datepicker();
        })(jQuery);
    </script>

    <!-- CUSTOM PLUGINS -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/map.js"></script>

</body>

<!-- Mirrored from showwp.com/demos/ws-garden/blog-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 15:08:30 GMT -->
</html>