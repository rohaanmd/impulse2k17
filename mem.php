<?php

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
        if($file_size > 2097152){

			$errors[]='File size must be less than 2 MB';
        }
        $db = new mysqli('localhost', 'impuleo4_web', 'welcome0909', 'impuleo4_db') or die("Connection Failed");
        $sql = "INSERT INTO  `images` (`image`,`text`) VALUES ('$file_tmp','NULL')";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;
                 $file_tmp;
            }
            $r=$db->query($sql);

        }else{
                print_r($errors);
        }
        $db->close();
    }
	if(empty($error)){
		echo "Success";
	}
}
?>


<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="files[]" multiple/>
	<input type="submit"/>
</form>
