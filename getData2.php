<?php 
 define('HOST','pirundb.ku.ac.th');
 define('USER','b5610506212');
 define('PASS','XzXD2eeAZQC');
 define('DB','b5610506212');
 header ('Content-type: application/json; charset=utf-8');
 
 $con = mysqli_connect(HOST,USER,PASS,DB);
 if (!$con) {
    die('Unable to Connect: ' . mysqli_connect_errno());
 }

 mysqli_query($con, "SET NAMES UTF8");

 mysqli_set_charset($con, "utf8");

 if(isset($_POST['searchQuery'])) {
 
    $searchQuery  = $_POST['searchQuery'];

 
    $sql = "SELECT * FROM bigcproduct WHERE product_name Like '%".$searchQuery."%'";
 
    $r = mysqli_query($con,$sql);
 
    while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)){
 

        $array[] = $row;
 
    }
 #array_push($result,array(
 #"product_name"=>$res['product_name'],
 #"price"=>$res['price'],
 #"image"=>$res['img_scr']
 #)
 #);

    #var_dump($array);
 
    echo json_encode(($array), JSON_UNESCAPED_UNICODE);
 
    mysqli_close($con);
 
 }
?>
