<!doctype html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Serivce Central d'Authentification de l'Université de Haute-Alsace</title>
        <link rel="stylesheet" href="css/style_index.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <form class="login" method="post" action="<?php echo Router::url('personnels/login'); ?>">
            <div class="login-screen">
                <div class="login-logo">
					<img src="images/UHA.png" alt="logo">
                </div>
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" name="login" class="login-field" placeholder="Nom d'utilisateur" id="login-name">
                    </div>
                    <div class="control-group">
                        <input type="password" name="password" class="login-field" placeholder="Mot de passe" id="login-pass">
                    </div>
                    <input class="btn btn-primary btn-large btn-block" type="submit" name="submit" value="Connexion">
                </div>
            </div>
        </form>
        <!-- JAVASCRIPTS -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>