<?php


function getregform($id)
{
$index=$id-1;
$eventname=array("Coding","Debate","Entertainment Quiz","Gaming"," IT Quiz","Kannada Event","Movie Making","Photography","Star of Impulse","Tech Ads","Treasure Hunt","Web Designing");
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$nerr=$cerr=$emerr=$perr=$err="";
$name=$cname=$email=$pn="";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"]))
{
$f=1;//Lets Say Everything is Okay
$name=test_input($_POST["name"]);
$cname=test_input($_POST["cname"]);
$email=test_input($_POST["email"]);
$pn=test_input($_POST["pn"]);
// $hdyfu=test_input($_POST["hdyfu"]);
$hdyfu="Ajeeb";
$event=(int)test_input($_POST["event"]);
// $ip1= $_SERVER['REMOTE_ADDR'];
// $ip2= $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
$ip1 = false;
if (array_key_exists('HTTP_CLIENT_IP', $_SERVER))
    $ip1 = $_SERVER['HTTP_CLIENT_IP'];

$ip2 = false;
if (array_key_exists('HTTP_X_FORWARDED_FOR',$_SERVER))
    $ip2 = $_SERVER['HTTP_X_FORWARDED_FOR'];
if($name=="" || $name==NULL)
{
  $nerr="Please Enter a Name";
  $f=0;
}
if($cname=="" || $cname==NULL)
{
  $cerr="Please Enter a College Name";
  $f=0;
}
if($email=="" || $email==NULL)
  {
    $f=0;
    $emerr="EMAIL CANNOT BE EMPTY";
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $f=0;
    $emerr = "INVALID EMAIL FORMAT";
  }
if($pn=="" || $pn==NULL)
{
  $perr="Please Enter a Phone Number";
  $f=0;
}
if(!preg_match('/^[0-9]{10}$/', $pn))
{
	$perr="Please Enter a valid Phone Number";
	$f=0;
}
if($event<1 || $event>12)
{
  $f=0;
}
if($f==1)
{
  
$servername = "localhost";
// $username = "impuleo4_web";//USERNAME
$username="root";
// $password = "welcome0909";//PASSWORD
$password="";
$dbname = "impuleo4_db";//"DATABASE NAME//$dbname="impulse2k17";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ");
}
echo "Reaching Here";
$sql="SELECT * FROM `registration` where `email`='$email' and `eventid`='$event'";
$r=$conn->query($sql);
if($r->num_rows ==1)
$err="You already Registered";
else {
  $sql="INSERT INTO `registration`(`name`,`cname`,`email`,`phone`,`eventid`,`hdyfu`,`ip1`,`ip2`) VALUE ('$name','$cname','$email','$pn','$event','$hdyfu','$ip1','$ip2')";
  $r=$conn->query($sql);
  $err="Registraion Successful";
}
}
}//IF Request
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="form-group">
  <input class="form-control" type="text" placeholder="Name" name="name" value="<?php echo $name; ?>"/>
  <label style="color:red;"><?php echo $nerr; ?> </label>
</div>
<div class="form-group">
<input class="form-control" type="text" placeholder="College Name" name="cname" value="<?php echo $cname; ?>"/>
<label style="color:red;"><?php echo $cerr; ?> </label>
</div>
<div class="form-group">
<input class="form-control" type="email" placeholder="Email" name="email"value="<?php echo $email; ?>"/>
<label style="color:red;"><?php echo $emerr; ?> </label>
</div>
<div class="form-group">
  <input class="form-control" type="text" placeholder="Phone Number" name="pn" value="<?php echo $pn; ?>"/>
  <label style="color:red;"><?php echo $perr; ?> </label>
</div>
<div class="form-group">    <select class="form-control" name="event">
  <?php for($i=$index;$i<12;$i++)      {?>    <option value="<?php echo $i+1;?>"><?php echo $eventname[$i];?></option>  <?php }  for($i=0;$i<$index;$i++)  {?>    <option value="<?php echo $i+1;?>"><?php echo $eventname[$i];?></option>  <?php  }  ?>    </select></div>
  <!-- <div class="form-group">
    <input class="form-control" type="text" placeholder="How did you find us?" name="hdyfu" value="<?php echo $hdyfu; ?>"/>
  </div> -->
<div class="form-group">
    <label><?php echo $err; ?> </label>
<input class="btn btn-primary hvr-grow-shadow hvr-round-corners btn-block" type="submit" name="register" value="Register"/>
</div><!--Register -->
</form>
<?php  }  ?>
