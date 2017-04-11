<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Impulse 2k17- Photography</title>

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
            <h1 class="page-header"> The Flash
                <small> Photography !</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active"> Photography</li>
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
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="images/posters/photo.jpg" style=" width: 750px; height:500px;" alt="">
                    </div>

                    <div class="item item">
                        <img class="img-responsive" src="images/carosels/pg2.jpg" style=" width: 750px; height:500px;" alt="">
                    </div>

                    <div class="item item">
                        <img class="img-responsive" src="images/carosels/pg1.jpg" style=" width: 750px; height:500px;" alt="">
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
            <h3> The Flash </h3>
            <p> The event is the heart and soul of IMPULSE. So, get your lens ready to give life to the pictures and  essence to the fest.  </p>
            <h3>Photography Section</h3>
            <ul>
                <li>Max two members per team.</li>
                <li>Theme will be given on the spot. </li>
                <li>The camera used may be a Digital camera, SLR or DSLR, Mobile device (Min 5MP).</li>
                <li>Should submit maximum two pictures in a pen drive  within given time.</li>
                <li>Rules violation leads to elimination of the team.</li>
                <li>Should have a caption and description for pictures.</li>

                <li>Judging Criteria:
                    <ul>
                        <li>a. Creativity.</li>
                        <li>b. Quality.</li>
                        <li>c. Story Telling.</li>
                    </ul>
                </li>
            </ul>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th colspan="2">Event    </th>
                        <th colspan="2">Team    </th>
                        <th colspan="2">Entry Fee</th>
                    </tr>
                    <tr>
                        <td colspan="2"> Photography</td>
                        <td colspan="2"> Max 2 Per Team</td>
                        <td colspan="2"> 150 Rs Per Team</td>
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
                        <?php include('register.php');getregform(8);?>
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
            <b> Kushan Raj</b>
            <p>+91- 9611350307</p>
        </div>
        <div class="col-md-6 breadcrumb">
            <b>Prabhu</b>
            <p>+91- 8553615424 </p>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Why not try others too?</h3>
        </div>

        <?php require_once('related.php'); getrelated(8);?>

    </div>
    <!-- /.row -->

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="images/logo/si.png"   style=" width: 500px; height:250px;"alt="">
            </a>
        </div>

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
