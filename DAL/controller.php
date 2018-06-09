<?php
    
    if(isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['pseudo'])){
        if($_POST['password'] != $_POST['password2']){
            header('Location: ../index.php');
        }else{
            sessionUser();
        }
    }else if( isset($_POST['pseudoLog']) && isset($_POST['passwordLog'])){
        $pseudoLog = $_POST['pseudoLog'];
        $passwordLog= $_POST['passwordLog'];
        verifAccess($pseudoLog,$passwordLog);
    }else if ( isset($_POST['ok'])){
        infoUpload();
    }else{
        //header('Location: ../index.php');
    }
    
    //fontion pour récupérer le post et mettre en session
    function sessionUser(){
        $pseudo=$_POST['pseudo'];
        $mail=$_POST['mail']; 
        $password= $_POST['password'];
        $passwordHash=  hashMDP($password);
        
        session_start();
        $_SESSION['pseudo']=$pseudo;
        $_SESSION['password']=$passwordHash;
        $_SESSION['mail']=$mail;
        
        insertClient($pseudo, $mail, $passwordHash);
    }

    
    //fonction pour hasher le mot de passe
    function hashMDP($password){
        $result=  password_hash($password, PASSWORD_DEFAULT);
        return $result;
    }

    //access to BDD
    function connectDB(){
        try{
           $bdd = new PDO('mysql:host=localhost;dbname=exoOC;charset=utf8', 'root', '');
        }catch(Exception $e){  
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }
    
    //insert new client
    function insertClient($pseudo,$mail,$password){  
        $bdd=connectDB();
        
        try{
            $req = $bdd->prepare('INSERT INTO client (pseudo,email, password) VALUES(?, ?, ?)');
            $req->execute(array($pseudo, $mail, $password));
        }catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        header('Location: ../login.php');
    }
    
    //fonction pour vérifier l'accès de l'utilisateur
    function verifAccess($pseudoLog, $passwordLog){
        $passwordLogHash= hashMDP($passwordLog);
        $passwordBDD= selectByAKA($pseudoLog);
        
        if(password_verify($passwordLog, $passwordBDD['password'])){
            session_start();
            $_SESSION['pseudo']=$pseudoLog;
            header('Location: ../accueil.php');
        }else{
            session_start();
            $_SESSION['pseudo']='Ce pseudo n\'existe pas';
            header('Location: ../login.php');
        }
    }
    
    //fonction pour récupérer et stocker l'upload
    function infoUpload(){
        $uploads_dir = '../fichier';
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = basename($_FILES["file"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        echo "$uploads_dir/$name";
        session_start();
        $_SESSION['directory']=$name;
        
        echo $_SESSION['directory'];
        header('Location: ../accueil.php');
    }
    
    //fonction pour récupérer en base la password lié au pseudo
    function selectByAKA($pseudo){
        $bdd=connectDB();

        $passwordBDD = $bdd->query("SELECT password, pseudo, email FROM client WHERE pseudo='$pseudo'");
        while($donnee = $passwordBDD->fetch()){
            $result = $donnee;
        }
        
        return $result;
    }