<?php 

    if ( isset($_POST['img-profil'])){
            uploadImg();
    }


    //fonction pour récupérer et stocker l'upload
    function uploadImg(){
        $uploads_dir = '../img-profil';
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = basename($_FILES["file"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        session_start();
        $_SESSION['directory']=$name;
        
        header('Location: ../accueil.php');
    }