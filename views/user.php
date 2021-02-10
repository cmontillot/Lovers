<?php
if((!isset($_COOKIE['nom'])) || ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn_deco'])))
{
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn_deco']))
    {
        // Parcourt le tableau des cookies
        foreach($_COOKIE as $cookie_name => $cookie_value){
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 4200, '/');
        }
    }
    header('Location: ../index.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <div class="container justify-align-center p-4">
            <div class="row p-1">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" >Bienvenue <?= $_COOKIE['prenom'] ?></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="lovers.php">Nos célibataires</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="user.php">Mes informations</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                <div class="col-sm-2">    
                </div>
                <div class="col-sm-8 container justify-align-center p-4 shadow" id="formul">
                <form class="row g-3 needs-validation" novalidate action="user.php" method="POST" enctype="multipart/form-data">       
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <h3>Mes informations</h3><br><br>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-6"> 
                        <label for="nom" class="form-label"><strong>Nom : </strong></label>
                        <label for="nom_inp" class="form-label"><?= $_COOKIE['nom'] ?></label>
                    </div>
                    <div class="col-md-6">   
                        <label for="prenom" class="form-label"><strong>Prénom : </strong></label>
                        <label for="prenom_inp" class="form-label"><?= $_COOKIE['prenom'] ?></label>
                    </div>
                    <div class="col-md-6">   
                        <label for="age" class="form-label"><strong>Age : </strong></label>
                        <label for="age_inp" class="form-label"><?= $_COOKIE['age'] ?></label>
                    </div>
                    <div class="col-md-3"> 
                        <label for="genre" class="form-label"><strong>Genre : </strong></label>
                        <label for="genre_inp" class="form-label"><?= $_COOKIE['genre'] ?></label>
                    </div>
                    <div class="col-md-3"> 
                        <label for="cp" class="form-label"><strong>Code postal : </strong></label>
                        <label for="cp_inp" class="form-label"><?= $_COOKIE['cp'] ?></label>
                    </div>
                    <div class="col-md-6"> 
                        <label for="courriel" class="form-label"><strong>Adresse mail : </strong></label>
                        <label for="courriel_inp" class="form-label"><?= $_COOKIE['courriel'] ?></label>
                    </div>
                    <div class="col-md-6">   
                        <label for="type" class="form-label"><strong>Vous recherchez : </strong></label>
                        <label for="type_inp" class="form-label"><?= $_COOKIE['type'] ?></label>
                    </div>
                    <div class="col-md-12">   
                        <label for="description" class="form-label"><strong>Votre description : </strong></label>
                        <label for="description" class="form-label"><?= $_COOKIE['description'] ?></label>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-md-3">  
                        <a href="https://www.meetic.fr/" target="_blank"><button type="button" class="btn btn-primary">TAKE MY MONEY</button></a>
                    </div>
                    <div class="col-md-3">  
                    <input type="submit" value="DECONNEXION" name="btn_deco" id="btn_deco" class="btn btn-primary">
                    </div>
                    <div class="col-sm-3"></div>
                </form>                       
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>                                             
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
<?php } ?>