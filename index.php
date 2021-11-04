<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTeam-$</title>
    <link rel="shortcut icon" href="assets/images/iTeam-$.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css_additionnels.css">
</head>
<body>
<header>
    <div class="couleur_header">
        <div class="container">
            <div class="row">
                <nav class="col navbar navbar-expand-md navbar-dark">
                    <a href="#" class="navbar-brand">
                        <img class="logo_iteams shadow" src="assets/images/iteams.jpg" alt="Iteams'logo" width="57" height="57">
                        <span class="nom_iteams ml-3 font-weight-bold">iTeam-$</span> 
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
<section>
    <form action="controllers/login.php" method="post">
    <div class="container mt-2">
        <div class="row form-group">
            <div class="col-12 col-md-4">

            </div>
            <div class="col-12 col-md-4 mt-md-3 pb-2 pt-2 rounded border shadow">
                <p class="logo_index font-weight-bold"><img class="logo_iteams shadow" src="assets/images/iteams.jpg" alt="Iteams'logo" width="57" height="57">
                        <span class="ml-3 font-weight-bold">iTeam-$</span></p>
                <label for="identifiant"><b>Identifiant:</b></label>
                    <input type="text" name="identifiant" id="identifiant"
                        placeholder="Votre email ou votre prenom usuel ***" class="form-control" required><br>

                <label for="password"><b>Mot de passe:</b></label>
                    <input type="password" name="password" id="password"
                        placeholder="Mot de passe ***" class="form-control" required><br>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-12">
                                <button class="btn btn-success">Connecter</button>
                            </div>
                            <div class="col-12 text-right">
                                <a href="views/inscription.php">s'inscrire</a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-4">
            
            </div>
        </div>
    </div>
    </form>
</section>  
</body>
</html>
