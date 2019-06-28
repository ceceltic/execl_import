<?php
$con=mysqli_connect("localhost","root",NULL,"chandra");
$msg="";
if(isset($_POST['import']))
{
    if($_FILES['json_file']['name'])
    {
$filename=explode(".",$_FILES['json_file']['name']);
if(end($filename)=="json")
{
    $json = file_get_contents($_FILES['json_file']['tmp_name']);
    $obj = json_decode($json,true);


    foreach($obj as $item) {
        $q="insert into cv 
        (brand_code, brand_name, model_code, model_name,fuel_type,variant_code,variant_name,cubic_capacity,brand_logo,hdfc_code,fuel_type_text,full_name,popular_brand,popular_model,popular_variant) values
        ('".$item['brand_code']."', '".$item['brand_name']."', '".$item['model_code']."', '".$item['model_name']."', '".$item['fuel_type']."', '".$item['variant_code']."', '".$item['variant_name']."', '".$item['cubic_capacity']."', '".$item['brand_logo']."', '".$item['hdfc_code']."', '".$item['fuel_type_text']."', '".$item['full_name']."', '".$item['popular_brand']."', '".$item['popular_model']."', '".$item['popular_variant']."') ";
  

      $result= mysqli_query($con,$q);
       }
       if($result==1)
       {
$msg="Json File Imported";
       }
       else{
           die(mysqli_error($con));
       }


}
else{
    $msg="Select Only Json file";
}
    }
    else
    {
$msg="Please Selcet a json file";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Json File Import</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="json_file"><br>
    <input type="submit" name="import">
    </form>
    <br>
    <?php
    echo $msg;
    ?>
</body>
</html>