<?php
    require 'templates/head.html';
?>

    <body>
        
        <div class="col-sm-12 offset-md-4 col-md-4" id="login">
            <h2>Inscription</h2>
            <form method="post" action="DAL/loginController.php">
                <div class="form-group">
                    <label for="exampleInputPassword1">Pseudo</label>
                    <input type="text" class="form-control" placeholder="Pseudo" name="pseudo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Entrer adresse mail" name="mail">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas cette information</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirmer mot de passe" name="password2">
                </div>
                <div class="row" id="btnValid">
                    <div class="offset-sm-4 col-sm-4">
                    <button type="submit" class="btn btn-secondary">Valider</button>
                </div>
            </form>
        </div>
        
        
        <?php
        // put your code here
        ?>
    </body>
    
<?php
    require 'templates/footer.html';
?>   

