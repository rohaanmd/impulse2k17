<?php
$msg = "";
if(isset($_POST['upload'])){
        echo "Uploading....";
        $target ="img/".basename($_FILES['image']['name']);
        $db = new mysqli('localhost', 'impuleo4_web', 'welcome0909', 'impuleo4_db') or die("Connection Failed");
        echo "Database Connected..";
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
        echo $target." ".$image." ".$text;
        $sql = "INSERT INTO  `images` (`image`,`text`) VALUES ('$image','$text')";
        $r=$db->query($sql);
        $db->close();
        echo $r;

            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                $msg = "Image sucessfully Uploaded";
                }else{
                     $msg = "Problem uploading file ";
                    }
              echo "Uploaded";
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>
            Images
    </title>
</head>
<body>
    <div id="from">
        <form method="post" action="memories.php" enctype="multipart/form-data">

            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" value="image">
            </div>
            <textarea name ="text" cols="30" rows="3" placeholder="Say something about it ">
            </textarea>

            <div>
                <input type="submit" name="upload" value="Upload Image">

            </div>
        </form>

        <?php
        $db = mysql_connect('localhost','impuleo4_web','welcome0909',"impuleo4_db");
        $sql = "SELECT * FROM `images`";
        $result = mysqli_query($db,$sql);

        while($row = mysqli_fetch_array($result) )
        echo " <div  id=img>";
                echo "<img src='img/".$row['image']."'>";
                echo "<p>".$row['text']."</p>";
          echo "  </div>";
        ?>

    </div>

</body>



</html>
