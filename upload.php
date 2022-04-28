<?php include 'header.php';?>
<!-- <!DOCTYPE html>
<html>
<head>
<title>Insert images to my SQL</title>
</head>

<body>
<form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="userfile[]" value="" multiple="">
        <input type="submit" name="submit" value="Upload">
    </form> 
    </body> -->
  <div class="spacer">  

<?php

$phpFileUploadErrors = array(
    0 => 'Success! File uploaded.',
    1 => 'Something went wrong, File is not uploaded.'
);

    $mysqli = new mysqli('localhost','root','','images') or die($mysqli->connect_error);
    $table = 'cats';

    use function PHPSTORM_META\elementType;
    if(isset($_FILES['userfile'])){
        $file_array = reArrayFiles($_FILES['userfile']);
           // pre_r($_FILES);
        for ($i=0; $i<count($file_array); $i++){
            if ($file_array[$i]['error']){
                ?> <div class="alert alert-success">
                    <?php echo @$file_array[$i]['name'].'  '.@$phpFileUploadErrors[@$file_array[$i]['error']];
                ?></div> <?php
            }
            else {
                $extensions = array('jpg','jpeg','png','gif','JPG','JPEG');
                $file_ext = explode('.',$file_array [$i]['name']);
    
                $name = $file_ext[0];
                // $name = preg_replace("!"," ",$name);
                $name = ucwords($name);
    
                $file_ext =  end($file_ext);
    
                if (!in_array($file_ext,$extensions)){
                    ?> <div class="alert alert-warning">
                    <?php echo "{$file_array[$i]['name']} - Invalid file extension" ;
                    ?></div> <?php  
                }
                else {
                    $img_dir = 'web/'.$file_array[$i]['name'];

                    move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
        
                    $sql = "INSERT IGNORE INTO $table (name , img_dir) VALUES('$name','$img_dir')";
                    $mysqli->query($sql) or die($mysqli->error);

                    ?> <div class="alert alert-success">
                    <?php echo $phpFileUploadErrors[$file_array[$i]['error']];
                    ?></div> <?php

                }
            }
            // pre_r($file_ext);
        }
    }

function reArrayFiles( $file_post ){
    
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++){
            foreach($file_keys as $key){
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
}
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
?>


  </div>
<?php include 'footer.php';?>