<?php
error_reporting("E_NOTICE");
?>
<?php
include('../config.php');
session_start();

if (!isset($_SESSION['user_id'])){
header('location:../login.php');
}
//lOGIN USERNAME INFORMATION
$user_id=$_SESSION['user_id'];

$result=mysql_query("select * from users_tb where id='$user_id'")or die("mysql_error".mysql_error());
$d_row=mysql_fetch_array($result);

$username = $d_row['email'];
?>
<html>
<head>
  <title>Saint Philip Managment</title>
    <link rel="icon" href="../img/sch_sign.PNG" type="image">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../css/style.css">

    <!-- DataTables -->
  <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.min.js"></script>
     <style type="text/css">
        body{
          background: url(../img/bg.jpg);
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
        <a class="navbar-brand" href="dos.php"><img src="../img/sch_sign.png" style="position:absolute; width:40px; top:07px;"> <i style="position:relative; left:45px;">St.PHILIP TVET SCHOOL</i></a>

      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" method="post" action="std_card_dos.php">
            <div class="input-group">
              <input type="text" class="form-control" name="search_std" size="40" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" name="search" type="submit">
                  <i class="icon-search"></i>
                </button>
              </div>
            </div>
          </form>

          <li class="active"><a href="dos_profile.php"><font color="orange" size="+1"><b><?php echo $username; ?></b></font></a></li>
          <li><a href="logout.php"><span class="icon-lock"></span> LOCK</a></li>
        </ul>
      </div>
    </div>
  </nav><br><br><br><!-- Navigation -->

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">HOME</li>
      </ol>
    </div>
  </section><!-- Section 1 -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="dos.php" class="list-group-item "><span class="icon-home"></span> HOME</a>
            <a href="class_subjcet.php" class="list-group-item "><span class="icon-pencil"></span> CLASS & SUBJECTS</a>
            <a href="student_conduct.php" class="list-group-item "><span class="icon-legal"></span> STUDENT CONDUCT</a>
            <a href="student_marks.php" class="list-group-item "><span class="icon-book"></span> STUDENT MARKS</a>
            <a href="student_list.php" class="list-group-item active"><span class="icon-list-ol"></span> STUDENT LIST</a>
          </div>
        </div><!-- /End list group row -->

        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading" id="main-bg-color">
              <h3 class="panel-title"><center><span class="icon-list-ol"></span> SCHOOL STUDENTS LIST</center></h3>
            </div>
            <div class="panel-body">
              <p align="right"><a href="student_list.php" class="btn btn-danger">Back</a></p>
                <form method="post" action="print_std_list.php">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="icon-home"></i>
                        </div>
                            <select class="form-control" name="class" required>
                            <option value="" disabled selected>Select Class</option>
                            <option value="L3ACC">L3 ACC</option>
                            <option value="L3CST">L3 CST</option>
                            <option value="L3SFTD">L3 SFTD</option>
                            <option value="L3TOUR">L3 TOUR</option>
                            <option value="L3F&B">L3 F&B</option>
                            <option value="L3C.A">L3 C.A</option>
                            <option value="L4ACC">L4 ACC</option>
                            <option value="L4CST">L4 CST</option>
                            <option value="L4SFTD">L4 SFTD</option>
                            <option value="L4TOUR">L4 TOUR</option>
                            <option value="L4F&B">L4 F&B</option>
                            <option value="L4C.A">L4 C.A</option>
                            <option value="L5ACC">L5 ACC</option>
                            <option value="L5CST">L5 CST</option>
                            <option value="L5SFTD">L5 SFTD</option>
                            <option value="L5TOUR">L5 TOUR</option>
                            <option value="L5F&B">L5 F&B</option>
                            <option value="L5C.A">L5 C.A</option>
                            </select>
                        </div><br>
                        <!-- /.input group -->
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="icon-calendar"></i>
                                </div>
                                <select type="text" name="year" class="form-control pull-right">
                                    <option value="" selected>Select Year</option>
                                    <?php
                                        $year;
                                        for($year = date('Y'); $year >= 2000 ; $year--)
                                        {
                                        echo'
                                        <option value="'.$year.'">'.$year.'</option>';
                                        }
                                    ?>
                                </select>
                            </div><br>
                            <!-- /.input group -->

                            <button type="submit" name="getdoc" class="btn btn-success btn-block"><i class="icon-print"></i> Print in Document</button>
                        </div>
                        
                    </div>
                </form>
            </div>
          </div>

        </div>
      </div><!-- /End row  -->
    </div><!-- /End container -->
  </section><!-- / End section 2 -->


    <!-- Footer -->
      <footer id="footer">
        <p> &copy; 2018 Copyright Designed by NDAYISHIMIYE Muhamudu</p>
        <p>School email: <a href="#">saintphiliptss@gmail.com</a></p>
      </footer><!-- /End Footer -->
</body>
<!-- Required datatable js -->
<script src="assets/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Responsive examples -->
  <script src="assets/datatables/dataTables.responsive.min.js"></script>
  <script src="assets/datatables/responsive.bootstrap4.min.js"></script>
</html>
<script>
  $(document).ready(function(){
    $("#datatable").DataTable();
  });
</script>
