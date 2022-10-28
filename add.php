<?php
require 'connexion.php';
require 'param.php';

$titre = $_POST['titre'];
$date_de_publication = $_POST['date_de_publication'];
$edition = $_POST['edition'];
$auteur = $_POST['auteur'];
$numclass = $_POST['numclass'];
$disponibilite = $_POST['disponibilite'];
$couverture =$_FILES['couverture'];



if($_FILES['couverture']['size'] > $maxfilesize)
{
    echo "error";
    
}
else if($_FILES['couverture']['type'] != 'image/jpeg' and $_FILES['couverture']['type'] != 'image/jpg'){
    echo "error2";

}
else{
    $path = uniqid();
    move_uploaded_file($_FILES['couverture']['tmp_name'], 'photo/'.$path.'.jpg');
    $query = "insert into ouvrage values (null , '$titre' , '$date_de_publication ' ,'$edition' , '$auteur', '$numclass','$disponibilite','$path')";
    mysqli_query($connect , $query);
    mysqli_close($connect);
}

header('location:ouvrage.php')
?>


