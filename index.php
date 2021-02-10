<?php
include("controllers/index_controller.php");
if((empty($erreurs) && $_SERVER['REQUEST_METHOD']=='POST') || isset($_COOKIE['nom']))
{
    if(!isset($_COOKIE['nom']))
    {
        setcookie('nom', $nom, time()+3600*24, '/');
        setcookie('prenom', $prenom, time()+3600*24 , '/');
        setcookie('age', $age, time()+3600*24, '/');
        setcookie('genre', $genre, time()+3600*24, '/');
        setcookie('cp', $cp, time()+3600*24, '/');
        setcookie('courriel', $courriel, time()+3600*24, '/');
        setcookie('type', $type, time()+3600*24, '/');
        setcookie('description', $description, time()+3600*24, '/');
    }
    header('Location: views/lovers.php');
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
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <div class="container justify-align-center p-4">
            <div class="row p-1">
                <div class="col-sm-2">    
                </div>
                <div class="col-sm-8 container justify-align-center p-4 shadow" id="formul">
                <form class="row g-3 needs-validation" novalidate action="index.php" method="POST" enctype="multipart/form-data">       
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <h3>Pré-inscription MADE WITH LOVE</h3><br><br>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-6"> 
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control <?= isset($erreurs['nom']) ?  'is-invalid' : ''  ?>" id="nom" name="nom" value="<?= $nom; ?>" required>
                        <?= isset($erreurs['nom']) ? $erreurs['nom'] : '' ?>
                    </div>
                    <div class="col-md-6">   
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control <?= isset($erreurs['prenom']) ?  'is-invalid' : ''  ?>" id="prenom" name="prenom" value="<?= $prenom; ?>" required>
                        <?= isset($erreurs['prenom']) ? $erreurs['prenom'] : '' ?>
                    </div>
                    <div class="col-md-6"> 
                        <label for="age" class="form-label">Age</label>
                        <select id="age" name="age" class="form-control <?= isset($erreurs['age']) ?  'is-invalid' : ''  ?>">
                                    <?php
                                        $age_courant = 18;
                                        for($i=$age_courant;$i<100;$i++)
                                        {
                                            if($age==$i) echo '<option value='.$i.' selected>'.$i.'</option>';
                                            else echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    ?>
                        </select>
                        <?= isset($erreurs['age']) ? $erreurs['age'] : '' ?>
                    </div>
                    <div class="col-md-2"> 
                        <label for="genre" class="form-label">Genre</label>
                        <select id="genre" name="genre" class="form-control <?= isset($erreurs['genre']) ?  'is-invalid' : ''  ?>">
                                            <option value="homme">Homme</option>
                                            <option value="femme">Femme</option>7
                        </select>
                        <?= isset($erreurs['genre']) ? $erreurs['genre'] : '' ?>
                    </div>
                    <div class="col-md-4"> 
                        <label for="cp" class="form-label">Code postal</label>
                        <input type="text" class="form-control <?= isset($erreurs['cp']) ?  'is-invalid' : ''  ?>" id="cp" name="cp" value="<?= $cp; ?>" required>
                        <?= isset($erreurs['cp']) ? $erreurs['cp'] : '' ?>
                    </div>
                    <div class="col-md-6"> 
                        <label for="courriel" class="form-label">Adresse mail</label>
                        <input type="text" class="form-control <?= isset($erreurs['courriel']) ?  'is-invalid' : ''  ?>" id="courriel" name="courriel" value="<?= $courriel; ?>" required>
                        <?= isset($erreurs['courriel']) ? $erreurs['courriel'] : '' ?>
                    </div>
                    <div class="col-md-6">   
                        <label for="type" class="form-label">Vous recherchez</label>
                        <select id="type" name="type" class="form-control <?= isset($erreurs['type']) ?  'is-invalid' : ''   ?>">
                                            <option value="femme">Une femme</option>
                                            <option value="homme">Un homme</option>7
                        </select>
                        <?= isset($erreurs['type']) ? $erreurs['type'] : '' ?>
                    </div>
                    <div class="col-md-12">   
                        <label for="description" class="form-label">Décrivez-vous en quelques lignes</label>
                        <TEXTAREA type="text" class="form-control <?= isset($erreurs['description']) ?  'is-invalid' : ''  ?>" id="description" name="description" rows=4 cols=23 required><?= $description; ?></TEXTAREA>
                        <?= isset($erreurs['description']) ? $erreurs['description'] : '' ?>
                    </div>
                        <input type="submit" value="♡ ♡ ♡    Rencontrer nos célibataires    ♡ ♡ ♡" name="btn_valid" id="btn_valid" class="btn btn-primary">
                </form>
                </div>
                <div class="col-sm-2">    
                </div>
            </div>
        </div>     
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
</html>
<?php } ?>