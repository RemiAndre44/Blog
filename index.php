<?php
    session_start();
    require 'templates/head.html';
?>

    <body>
        <div class="col-sm-12 offset-md-4 col-md-4" id="login">
            <h2>Connection</h2>
            <form method="post" action="DAL/loginController.php">
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Pseudo" name="pseudoLog">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passwordLog">
                </div>
                <div class="row" id="btnValid">
                    <div class="offset-sm-4 col-sm-4">
                    <button type="submit" class="btn btn-secondary">Valider</button>
                </div>
            </form>
        </div>
                
        <div class="row">
            <div class="offset-md-12"  style="width: 100%;text-align: center">
                <a href="register.php">Rejoignez nous</a>
            </div>         
        </div>
        
    </body>
    
    
    
<?php
    require 'templates/footer.html';
?>