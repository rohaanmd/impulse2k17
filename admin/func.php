<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function getloginform()
{
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="form-group">
  <label for="password">Enter the Administrative Password:</label>
  <input id="password" type="password" class="form-control"  name="password" placeholder="Administrative Password"/>
  <input type="submit" value="Login" class="btn btn-primary btn-block" name="Login"/>
  </div>
  </form>
  <?php
}

function getdata()
{//Neeed To Genrate all the Data here
  $conn=get_connection();
  //for all Event
  $sql="SELECT * FROM `events`";
  $eventresult=$conn->query($sql);
  while($eventrow=$eventresult->fetch_assoc())
  {
    $name=$eventrow["eventname"];
    $id=$eventrow["eventid"];
    ?>
    <div class="panel panel-default">
      <div class="panel-heading">
    <?php
    echo "<h4>$name</h4>";
    ?>
    </div>
    <div class="panel-body table-responsive">
      <table class="table">
        <tr><th>Name</th><th>College</th><th>Phone Number</th></tr>
      <?php
      $reg="SELECT * FROM `registration` WHERE `eventid`='$id'";
      $q=$conn->query($reg);
      while($r=$q->fetch_assoc())
      {
        $name=$r["name"];
        $cname=$r["cname"];
        $pn=$r["phone"];
        echo "<tr><td>$name</td><td>$cname</td><td>$pn</td></tr>";
      }
      ?>
    </table>
    </div>
  </div>
    <?php
  }
  $conn->close();
}
function get_connection()
{
  $servername = "localhost";
  $username = "impuleo4_web";//USERNAME
  $password = "welcome0909";//PASSWORD
  $dbname = "impuleo4_db";//"DATABASE NAME
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: ");
  }
  return $conn;
}
 ?>
