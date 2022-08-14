<?php 
try{
    $db=new PDO("mysql:host=localhost;dbname=cinargithub;charset=utf8;","root","");
    // echo "asdas";
}catch(PDOException $e ) {
    $e->getMessage();

}


?>