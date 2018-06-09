<?php
    require 'templates/head.html';
?>

    <body>
        
        <div class="col-sm-12 offset-md-4 col-md-4" id="login">
            <h2>Inscription</h2>
            <form method="post" action="DAL/controller.php">
                <div class="form-group">
                    <label for="exampleInputPassword1">Pseudo</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Pseudo" name="pseudo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" name="password2">
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

