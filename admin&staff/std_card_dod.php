
<?php
include('../config.php');
session_start();

if (!isset($_SESSION['user_id'])){
header('location:index.php');
}
//lOGIN USERNAME INFORMATION
$user_id=$_SESSION['user_id'];

$result=mysql_query("SELECT * FROM users_tb WHERE id='$user_id'")or die("mysql_error".mysql_error());
$row=mysql_fetch_array($result);

$email = $row['email'];
?>
<html>
  <head>
    <title>Saint Philip Managment</title>
      <link rel="icon" href="../img/sch_sign.PNG" type="image">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
      <link rel="stylesheet" href="../css/style.css">
      <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <script src="../js/jquery.min.js"></script>
      <style type="text/css">
          body{
            background: url(../img/bg.jpg);
          }
          .card {
          width: 60%;
          height: 225px;
          margin: 5px;
          margin-left: 17%;
          border: 2px solid;
          border-color: grey;
          border-radius: 5px;
        }
        .card-header{
          font-weight: bold;
          text-align: center;
          font-size: 18px;
          font-family: "Times New Roman", Times, serif;
        }
        .card-body{
          margin:8px;
        }
      </style>
  </head>

  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dod.php"><img src="../img/sch_sign.png" style="position:absolute; width:40px; top:07px;"> <i style="position:relative; left:45px;">St.PHILIP TVET SCHOOL</i></a>

      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" method="post" action="std_card_dod.php">
            <div class="input-group">
              <input type="text" class="form-control" name="search_std" size="40" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" name="search" type="submit">
                  <i class="icon-search"></i>
                </button>
              </div>
            </div>
          </form>

          <li class="active"><a href="dod_profile.php"><font color="orange" size="+1"><b><?php echo $row['email']; ?></b></font></a></li>
          <li><a href="logout.php"><span class="icon-lock"></span> LOCK</a></li>
        </ul>
      </div>
    </div>
  </nav><br><br><br><!-- Navigation -->

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">HOME / </li>
        </ol>
      </div>
    </section><!-- Section 1 -->

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="dod.php" class="list-group-item"><span class="icon-home"></span> HOME</a>
              <a href="conduct_list-dod.php" class="list-group-item "><span class="icon-legal"></span> CONDUCT</a>
              <a href="pemission.php" class="list-group-item "><span class="icon-book"></span> PERMISSION</a>
              <a href="punishment.php" class="list-group-item "><span class="icon-book"></span> PUNISHMENT</a>
            </div>
          </div><!-- /End list group row -->
            
          <div class="col-md-9">
            <div class="panel panel-default" id="table-content">
              <div class="panel-heading" id="main-bg-color">
                <h3 class="panel-title"><center><span class="icon-list-alt"></span> STUDENT CARD</center></h3>
              </div>

                <div class="panel-body">
                    <?php
                        if(isset($_POST['search'])){
                            if(!empty($_POST['search_std']))
                            {
                                $search_std = mysql_real_escape_string($_POST['search_std']);

                                $s_query = mysql_query("SELECT * FROM student_tb WHERE firstname LIKE '%$search_std%' OR lastname LIKE '%$search_std%' OR class LIKE '%$search_std%' ");
                                $numrows = mysql_num_rows($s_query);

                                if($numrows > 0){
                                while($fetch = mysql_fetch_assoc($s_query)){

                                    ?>
                                    <div class="card">
                                    <div class="card-header"><label>SAINT PHILIP TVET SCHOOL</label></div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-md-11"><img src="../img/sch_sign.PNG" style="width:75px; height:80px;">
                                            <p style="margin-top:-83px; margin-left:89px; font-family: 'Times New Roman', Times, serif;"><font size="-1" >P.O BOX 1692 Kigali-Rwanda Tel:+250 788 565 100<br>E-mail:saintphiliptss1985@gmail.com</font></p>
                                            <h4 style="margin-top:0px; margin-left:137px; color:#B40A0A; font-family: 'Times New Roman', Times, serif;">STUDENT CARD</h4>
                                            <?php 
                                                $year = '';
                                                for($year = date('Y'); $year <= date('Y'); $year++)
                                                {
                                                echo "<h5 style='margin-top:0px; margin-left:188px; color:#0080FF; font-family: Times, serif;'>$year</h5>";
                                                }
                                            ?>
                                            <p><b>FIRSTNAME:<?php echo $fetch['firstname'];$fetch['lastname']; ?><br>
                                            LASTNAME : <?php echo $fetch['lastname']; ?><br>
                                            DATE OF BIRTH: <?php echo $fetch['date_of_birth']; ?><br>
                                            CLASS : <?php echo $fetch['class']; ?></b><br>
                                            </p>
                                            <img src="../img/sign.PNG" style="margin-top:-16%; margin-left:70%;">
                                        </div>
                                        <div class="col-md-1"><img src="student_img/<?php echo $fetch['profile_picture']; ?>" align="right" style="margin-top:40px; width:100px; height:130px;"></div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <?php
                                }
                                }else {
                                    echo "<div class='col-sm-12 alert alert-info'><center><span class='icon-eye'></span> Student Information Was Not Found In The School Database!!</center></div>";
                                }
                            }else {
                                echo "<div class='col-sm-12 alert alert-warning'><center><span class='icon-eye'></span> Please Before Clicking on Search button, You have to Fill in the Field!!</center></div>";
                            }
                        }
                    ?>
                </div>
            </div><!-- ./End  Card Data -->
          </div>
        </div><!-- /End row  -->
      </div><!-- /End container -->
    </section><!-- / End section 2 -->

    <!-- Footer -->
    <footer id="footer">
      <p> &copy; 2018 Copyright Designed by NDAYISHIMIYE Muhamudu</p>
      <p>School email: <a href="#">saintphiliptss@gmail.com</a></p>
    </footer><!-- /End Footer -->

    <script src="../js/bootstrap.js"></script>

  </body>
</html>