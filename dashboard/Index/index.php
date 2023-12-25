<?php
session_start();
?>
<?php
if(!isset($_SESSION['username']))
{// echo "string";exit();
  header("location:../index.php");
}
?>
<?php
include"../inc/connect.php ";
//echo "string"; exit;
?>
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
           <?php 
                $sql="SELECT count(*) FROM patientregister";
    $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
     $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
   // print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Patient</p>
            </div>
            <div class="icon">
              <i class="fa fa-wheelchair"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
                $sql="SELECT count(*) FROM addappointment";
    $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
     $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
   //print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Appointment</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                   <?php 
                $sql="SELECT count(*) FROM addnewmedicine";
    $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
     $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
   // print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Medicine</p>
            </div>
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                   <?php 
                $sql="SELECT count(*) FROM addnewpres";
    $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
     $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
   // print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Prescription</p>
            </div>
            <div class="icon">
              <i class="fa fa-pencil-square-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
      </div>
<!-- new code insert -->

<!-- total income -->



<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
           <?php 
                $sql="SELECT sum(depositammount) FROM addpayment";
                $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
                $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
                $incomes = $row[0];
            ?>
            <h3><?php echo $incomes;?></h3>
              <p>Total Income</p>
            </div>
            <div class="icon">
              <i class="fa fa-wheelchair"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


<!-- total Expensess -->



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php 
                $sql="SELECT sum(doctor_salary) as ds, sum(electricty_bil) as eb, sum(hospital_reant) as hr FROM expensess";
                $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
                $row=mysqli_fetch_array($write) or die (mysqli_error($db_connect));
                $expances = $row['ds']+$row['eb']+$row['hr'];
            ?>
              <h3><?php echo $expances; ?></h3>
              <p>Total Expensess</p>
            </div>
            <div class="icon">
              <i class="fa fa-wheelchair"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>






<!-- ./col -->
    <?php $total = $incomes - $expances; ?>
    <?php if($total > 0) { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $total; ?></h3>
              <p>Profit</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <?php } else { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $total; ?></h3>
              <p>Total Lose</p>
            </div>
            <div class="icon">
            <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <?php } ?>
       
      </div>




      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    
      </div>
    </section>
    <!-- /.content -->
  </div>
 <?php include"../Include/footer.php";?>