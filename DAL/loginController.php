<?php
    
    //v�rification du post et direction vers la bonne fonction
    if(isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['pseudo'])){
        if($_POST['password'] != $_POST['password2']){
            header('Location: ../index.php');
        }else{
            registerPost();
        }
    }else if( isset($_POST['pseudoLog']) && isset($_POST['passwordLog'])){
        $pseudoLog = $_POST['pseudoLog'];
        $passwordLog= $_POST['passwordLog'];
        verifAccess($pseudoLog,$passwordLog);
    }else{
        header('Location: ../index.php');
    }
    
    //fonction qui r�cup�re les infos du user
    function registerPost(){
        $pseudo=$_POST['pseudo'];
        $mail=$_POST['mail']; 
        $password= $_POST['password'];
        $passwordHash=  hashMDP($password);
        
        insertUser($pseudo, $mail, $passwordHash);
    }
    
    //fontion pour récupérer le post et mettre en session
    function sessionUser($pseudo){
        session_start();
        $_SESSION['pseudo']=$pseudo;
    }
    
    //fonction pour hasher le mot de passe
    function hashMDP($password){
        $result=  password_hash($password, PASSWORD_DEFAULT);
        return $result;
    }

    //access to BDD
    function connectDB(){
        try{
           $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }catch(Exception $e){  
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }
    
    //insert new client
    function insertUser($pseudo,$mail,$password){  
        $bdd=connectDB();
        
        try{
            $req = $bdd->prepare("INSERT INTO user (pseudo,email, password, img) VALUES(?, ?,?,'img/chat3.jpg')");
            $req->execute(array($pseudo, $mail, $password));
        }catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        
        header('Location: ../index.php');
    }
    
    //fonction pour vérifier l'accès de l'utilisateur
    function verifAccess($pseudoLog, $passwordLog){
        $passwordLogHash= hashMDP($passwordLog);
        $passwordBDD= selectByAKA($pseudoLog);
        
        if(password_verify($passwordLog, $passwordBDD['password'])){
            sessionUser($pseudoLog);
            header('Location: ../home.php');
        }else{
            session_start();
            $_SESSION['pseudo']='Ce pseudo n\'existe pas';
            header('Location: ../index.php');
        }
    }
    
    //fonction pour récupérer en base la password lié au pseudo
    function selectByUser($pseudo, $email){
        $bdd=connectDB();

        $passwordBDD = $bdd->query("SELECT password, pseudo, email FROM user WHERE pseudo='$pseudo' AND email= $email");
        while($donnee = $passwordBDD->fetch()){
            $result = $donnee;
        }
        
        return $result;
    }