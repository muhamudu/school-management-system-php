<?php
error_reporting("E_NOTICE");
?>
<?php
include('../config.php');
session_start();

if (!isset($_SESSION['user_id'])){
header('location:index.php');
}
//lOGIN USERNAME INFORMATION
$user_id=$_SESSION['user_id'];

$result=mysql_query("select * from users_tb where id='$user_id'")or die("mysql_error".mysql_error());
$row=mysql_fetch_array($result);

$username = $row['email'];
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
    <!-- Responsive datatable examples -->
    <link href="assets/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/datetimepicker/dist/css/bootstrap-datepicker3.css">

  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        $('#teacher_id').change(function(){
            var salary=$('#teacher_id').val();
            $.ajax({
            url:"report.php",
            type:"post",
            data:"salary_id="+salary,
            success:function(msg){
                $('#salary').html(msg);
            }
        });
    });
  </script>
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
        <a class="navbar-brand" href="admin.php"><img src="../img/sch_sign.png" style="position:absolute; width:40px; top:07px;"> <i style="position:relative; left:45px;">St.PHILIP TVET SCHOOL</i></a>

      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" method="post" action="std_card_admin.php">
            <div class="input-group">
              <input type="text" class="form-control" name="search_std" size="40" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" name="search" type="submit">
                  <i class="icon-search"></i>
                </button>
              </div>
            </div>
          </form>

          <li class="active"><a href="admin_profile.php"><font color="orange" size="+1"><b><?php echo $row['email']; ?></b></font></a></li>
          <li><a href="logout.php"><span class="icon-lock"></span> LOCK</a></li>
        </ul>
      </div>
    </div>
  </nav><br><br><br><!-- Navigation -->

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active"><a href="admin.php">DASHBOARD</a> / UPDATE NON-STAFF PAYMENT</li>
      </ol>
    </div>
  </section><!-- Section 1 -->

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="admin.php" class="list-group-item "><span class="icon-dashboard"></span> DASHBOARD</a>
            <?php
             $numrows = 0;
             $query = mysql_query("SELECT * FROM feedback");
             $numrows = mysql_num_rows($query);
            ?>
            <a href="feedback.php" class="list-group-item "><span class="icon-comment"></span> FEEDBACK<span class="badge"><?php echo "$numrows"; ?></span></a>
            <a href="article_post.php" class="list-group-item "><span class="icon-pencil"></span> POST ARTICLES</a>
            <a href="register_teacher.php" class="list-group-item "><span class="icon-group"></span> REGISTER TEACHER</a>
            <a href="register_nonestaff.php" class="list-group-item "><span class="icon-group"></span> REGISTER NON-STAFF</a>
            <a href="teacher_payment.php" class="list-group-item "><span class="icon-money"></span> TEACHER'S PAYMENT</a>
            <a href="nonstaff_payment.php" class="list-group-item active"><span class="icon-money"></span> NON-STAFF'S PAYMENT</a>
            <a href="report_card.php" class="list-group-item "><span class="icon-book"></span> STUDENT REPORT CARDS</a>
            <a href="unpaid_student2.php" class="list-group-item "><span class="icon-user"></span> UNPAID STUDENTS</a>

          </div>
        </div><!-- /End list group row -->

        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading" id="main-bg-color">
              <h3 class="panel-title"><center><span class="icon-money"></span> UPDATE NON-STAFF PAYMENT FORM</center></h3>
            </div>
            <div class="panel-body">
                <?php
                    $id = $_REQUEST['id'];
                    $get = mysql_query("SELECT * FROM nonstaff_payment WHERE id='$id' ");
                    $fet_nonstaff = mysql_fetch_array($get);

                    $get2 = mysql_query("SELECT * FROM nonstaff_payment WHERE id='$id' ");
                    while($fet_nonstaff2 = mysql_fetch_array($get2)){
                        $nost = mysql_query("SELECT * FROM non_staff WHERE id='$fet_nonstaff2[nonstaff_id]' ");
                        $staff_no = mysql_fetch_array($nost);
                    }

                    if(isset($_GET['update_data'])){
                        $id = $_GET['id'];
                        $Newpaid_salary = $_GET['Newpaid_salary'];

                        $querynonst = mysql_query("UPDATE `nonstaff_payment` SET `paid_salary`='$Newpaid_salary' WHERE `id`='$id' ");

                        if($querynonst){
                            echo "<div class='alert alert-success'><center>Successfully Updated</center></div>";
                            // echo "<meta http-equiv='refresh' content='2;url=nonstaff_payment.php'>";
                        }
                        else{
                            echo "Failed".mysql_error();
                        }
                    }
                ?>
                <form role="form" method="get" action="" class="row" id="block-validate">

                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo $fet_nonstaff[0]; ?>" name="id">

                        <div class="form-group">
                        <label for="text" class="control-label">Choose Nonstaff name:</label>
                        <input type="text" class="form-control" value="<?php echo "".$staff_no['firstname']." ".$staff_no['lastname'].""; ?>" name="" disabled>
                        </div>
                        <div class="form-group">
                        <label for="text">Salary:</label>
                        <input type="text" value="<?php echo $staff_no['salary']; ?>" class="form-control" name="nonstaff_salary" disabled>
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Date Paid:</label>
                            <input type="text" class="form-control" value="<?php echo $fet_nonstaff['date_paid']; ?>" name="date_paid" id="date" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label for="pwd">Paid Salary:</label>
                            <input type="number" name="Newpaid_salary" value="<?php echo $fet_nonstaff['paid_salary']; ?>" class="form-control" required>
                        </div>
                        
                        
                        <button type="submit" name="update_data" class="btn btn-primary btn-block"><span class="icon-save"></span> SAVE DATA</button>
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
  <script type="text/javascript" src="assets/datetimepicker/dist/js/bootstrap-datepicker.min.js"></script>
</html>
<script>
        $(document).ready(function(){
          var date_input=$('input[id="date"]'); //our date input has the name "date"
          var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
          var options={
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
          };
          date_input.datepicker(options);
        })
      </script>
