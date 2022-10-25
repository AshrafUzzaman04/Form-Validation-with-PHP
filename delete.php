<!-- delete data easy way -->


<?php
include_once('./header.php');
$id = $_GET['id'];
$delte_query = "DELETE FROM `user_data` WHERE $id = $id";
$delte = $connet->query($delte_query);
if(!$delte){
    echo "<span>hhahahah</span>";
}else{
    echo "<script>alert('Data deleted succsessfull');location.href='./read.php'</script>";
}