<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <?php
    include("connexion.php");
    session_start();
    $id_user=$_SESSION['id_utilisateur'];
    $req="SELECT * FROM utilisateur WHERE id_utilisateur=".$id_user."";
    $resultat=mysqli_query($link,$req);
    $data=mysqli_fetch_assoc($resultat);
    $email=$data['email'];
    $password=$data['password'];
    $nom=$data['nom'];
    $prenom=$data['prenom'];
    $photo=$data['photo'];
    $type=$data['type'];
    ?>
    <form action="#" method="post">
        <label for="fichier">Photo du profile : </label>
        <img width='80px' height='80px' src="photo/<?php echo "$photo";?>">
        <input type="file" name="file_upload"><br>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" value="<?php echo"$nom"; ?>"><br>
        <label for="prenom">Préom : </label>
        <input type="text" name="prenom" value="<?php echo"$prenom"; ?>"><br>
        <label for="email">Email : </label>
        <input type="email" name="email" value="<?php echo"$email"; ?>"><br>
        <label for="password">Mot de passe : </label>
        <input type="text" name="password" value="<?php echo"$password"; ?>"><br>
        <input type="submit" name="modifier" value="modifier">
    </form>
    <?php
    if(isset($_POST['modifier'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $password=$_POST['password'];


        if(!isset($_FILES['file_upload']) || $_FILES['file_upload']['error'] == UPLOAD_ERR_NO_FILE) {
            echo "Error no file selected"; 
        } else {
            print_r($_FILES);
        }
        // Fin partie de Photo


        // $req="UPDATE utilisateur SET nom='".$nom."', prenom='".$prenom."', email='".$email."', password='".$password."', photo='".$photo."' WHERE id_utilisateur=".$id_user."";
        
        // if($result=mysqli_query($link,$req)) {
        //     if($type=='ens') {
        //         header('location:enseignant_profile.php');
        //     } else {
        //         header('location:admin_profile.php');
        //     }
        // }
    }
    ?>
</body>
</html>