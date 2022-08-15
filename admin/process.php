<?php
ob_start();
session_start();

include "connect.php";


if(isset($_POST["generalUpdate"])){
    $general=$db->prepare("UPDATE general_settings SET
    title=:title,
    about=:about,
    icon=:icon,
    author=:author,
    description=:description

    WHERE id = 1");

    $update=$general->execute(array(
        "title" => $_POST["title"],
        "about" => $_POST["about"],
        "icon" => $_POST["icon"],
        "author" => $_POST["author"],
        "description" => $_POST["description"]

    ));

    if($update){
        Header("Location:general-settings.php?status=okay");
        exit;

    }else{
        Header("Location:general_settings.php?status=nope");
        exit;
    }
}

/*İNfo update */
/*---------------------------------------------------------------------- */


if(isset($_POST["infoUpdate"])){
    $info=$db->prepare("UPDATE info SET
    year=:year,
    repo=:repo,
    work=:work
    WHERE id=1");

$update=$info->execute(array(
    "year" => $_POST["year"],
    "repo" => $_POST["repo"],
    "work" => $_POST["work"]
));

if($update){
    Header("Location:info.php?status=okay");
    exit;
    
}else{
    Header("Location:info.php?status=nope");
    exit;
}
}


/*Project */
/*---------------------------------------------------------------------- */

if($_GET["projectDelete"] == "ok"){
    $project=$db->prepare("DELETE from project WHERE id=:id");
    $control=$project->execute(array(
        "id" => $_GET["id"]
    ));

    if($control){
        Header("Location:project.php?delete=okay");
        exit;

    }else{
        Header("Location:project.php?delete=nope");
        exit;
    }
}



/*Proje Ekle */


if(isset($_POST["projeAdd"])){

    $uploads_dir = '../dimg';
    @$tmp_name = $_FILES['image']["tmp_name"];
    @$name = $_FILES['image']["name"];
    //resmin isminin benzersiz olması
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);	
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $project=$db->prepare("INSERT into project SET
        image=:image,
        title=:title,
        url=:url,
        sira=:sira
    ");

    $save=$project->execute(array(
        "image" => $refimgyol,
        "title" => $_POST["title"],
        "url" => $_POST["url"],
        "sira" => $_POST["sira"]

    ));

    if($save){
        Header("Location:project.php?status=okay");
        exit;

    }else{

        Header("Location:project.php?status=nope");
        exit;
    }
    
}



if(isset($_POST["projectİmageUpdate"])){

    $uploads_dir = '../dimg';
      
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
  
        $id= $_POST["id"];
  
        $benzersizsayi4=rand(20000,32000);
        $refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;
      
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
      
        
        $duzenle=$db->prepare("UPDATE project SET
          image=:images
          WHERE id = {$_POST["id"]}
          ");
          
        $update=$duzenle->execute(array(
          'images' => $refimgyol
          ));
      
      
      
        if ($update) {
      
          $resimsilunlink=$_POST['eski_yol'];
          unlink("../$resimsilunlink");
      
          Header("Location:projectEdit.php?id=$id?durum=ok");
      
        } else {
      
          Header("Location:projectEdit.php?id=$id?durum=no");
        }
  
  }


  if(isset($_POST["projectUpdate"])){
    $id= $_POST["id"];
    $project=$db->prepare("UPDATE project set
    title=:title,
    url=:url,
    sira=:sira
    WHERE id = {$_POST["id"]} ");

    $update=$project->execute(array(
        "title" => $_POST["title"],
        "url" => $_POST["url"],
        "sira" => $_POST["sira"]
    ));

    if($update){
        Header("Location:projectEdit.php?id=$id?status=ok");
        exit;
    }else{
        Header("Location:projectEdit.php?id=$id?status=no");
        exit;
    }

  }


/*Admin Login */
/*-------------------------------------------------------------------------- */

  if(isset($_POST["adminLogin"])){
    $username= $_POST["username"];
    $password = $_POST["password"];

    $admin=$db->prepare("SELECT * from admin where username=:username and password=:password ");
    $admin->execute(array(
        "username" => $username,
        "password" => $password
    ));
    $say=$admin->rowCount();

    if($say == 1){
       $_SESSION["username"] = $username;
       Header("Location:index.php?login=okay");
       exit;

    }else{

        Header("Location:login.php?login=nope");
        exit;

    }
  }


?>