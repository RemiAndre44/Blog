<?php
    session_start();
    require 'templates/head.html';
    require 'DAL/controller.php';
?>

<h1 style="text-align: center">Les derniers connectés</h1>
<div class="container">
    <div class="row" id="caroussel">
        <div class="offset-md-4 col-md-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php if(isset($_SESSION['directory'])){
                            echo 'fichier/'.$_SESSION['directory'];
                        }else{
                           echo 'img/chat1.jpg'; 
                        }?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/chat2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/chat3.jpg" alt="Third slide">
                    </div>
                    </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 3vh;">
        <div class="offset-md-5 col-md-2">
            <div class="row">
                 <div class="offset-md-3 col-md-6">
                     <form action="home.php" method="post">
                        <button type="submit" class="btn btn-outline-success">Vers le site</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>

    <div id="espaceProfil">
        
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-left: 30px;margin-top: 30px;"><strong>Votre profil</strong></h3>
            </div>
            <div class="offset-md-4 col-md-4">
                <div class="row">
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="text-align: center"> <?php echo $_SESSION['pseudo'] ?></h3>
                    </div>
                </div>

                <div class="row" id="imgProfil">
                    <div class="offset-md-3 col-md-6">
                        <img src="<?php if(isset($_SESSION['directory'])){
                                        echo 'fichier/'.$_SESSION['directory'];
                                    }else{
                                       echo 'img/chat1.jpg'; 
                                    }?>">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="text-align: center"> <?php echo $_SESSION['mail'] ?></h5>
                    </div>
                </div>

            </div>
        </div>

         <div class="row">
            <div class="offset-md-4 col-md-4">
                <form method="post" action="DAL/controller.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1" style="margin-left: 70px;">Modifier votre image pour votre profil</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" style="margin-left: 70px;">
                        <div class="row" id="btnValidImg">
                            <div class="offset-md-4 col-md-4">
                                <button type="submit" class="btn btn-secondary" name="ok">Envoyer</button>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>



<?php
    require 'templates/footer.html';
?>  


