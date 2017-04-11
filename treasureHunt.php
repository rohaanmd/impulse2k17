<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Treasure Hunt</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php require_once('header.php'); ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Treasure Hunt
                    <small> Treasure Hunt !</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active"> Treasure Hunt</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="5"></li>

                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="images/posters/th.jpg" style=" width: 750px; height:500px;" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/carosels/th1.jpg" style=" width: 750px; height:500px;" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/carosels/th2.jpg" style=" width: 750px; height:500px;" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/carosels/th3.jpg" style=" width: 750px; height:500px;" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/carosels/th4.jpg" style=" width: 750px; height:500px;" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/carosels/th5.png" style=" width: 750px; height:500px;" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h3> Treasure Hunt </h3>
                <p> EXPLORE OXFORD TO FIND THE TREASURE</p>
                <ol><li> <b>Rules</b>
                <ul>
                    <li>Two members in a team.</li>
                    <li>The event will be conducted over 6 rounds.</li>
                    <li>Each clue will lead closer and closer to the treasure.</li>
                    <li>The final clue will reveal the treasure.</li>
                    <li>A map of the college will be provided to each and every team participating.</li>
                    <li>Acquiring help from others will account for cheating and will lead to disqualification.</li>
                </ul>
              </li>
              <li>
                <b>Team Compostion</b>
                <ul>2 in each team
                </ul>
              </li>
              </ol>
              <div class="table-responsive">
              <table class="table">
                  <tr>
                      <th colspan="2">Event Name    </th>
                      <th colspan="2">Team Composition </th>
                      <th colspan="2">Registration Fee</th>
                  </tr>
                  <tr>
                      <td colspan="2">Treasure Hunt </td>
                      <td colspan="2"> 2 members Per team</td>
                      <td colspan="2"> 100 Rs Per Team</td>

                  </tr>
              </table>
              <!-- Modal-->
              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Register</button>

              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Provisional Register</h4>
                    </div>
                    <div class="modal-body">
                      <?php include('register.php'); getregform(11);?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            </div>

        </div>
        <!-- Coordinator Stufs -->
        <div class="row">
          <h3>Event Coordinators</h3>
          <div class="col-md-6 breadcrumb">
            <b>Venky</b>
            <p>+91-9916603883</p>
          </div>
          <div class="col-md-6 breadcrumb">
            <b>Somesh</b>
            <p>+91-9590496649</p>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Why not try others too?</h3>
            </div>

            <?php require_once('related.php'); getrelated(11);?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php require_once('footer.php');?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
if(isset($_POST["register"]))
{
	?>
	<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>
<?php
}
?>
