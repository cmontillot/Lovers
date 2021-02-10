<?php
if(!isset($_COOKIE['nom']))
{
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
                            <a class="nav-link active" aria-current="page" href="lovers.php">Nos célibataires</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="user.php">Mes informations</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    // Ouverture et récupération du fichier JSON
                    $lectureBDD = file_get_contents('../profils.json');
                    $lectureBDD = json_decode($lectureBDD, true);
                    foreach($lectureBDD as $key => $value) {
                        if($_COOKIE['type']==$lectureBDD[$key]['gender'])
                        {
                            ?>
                                <div class="col">
                                    <div class="card h-100">
                                    <img src="../assets/img/<?= $lectureBDD[$key]['picture'] ?>" class="card-img-top" alt="<?= $lectureBDD[$key]['picture'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $lectureBDD[$key]['firstname']." ".$lectureBDD[$key]['lastname'] ?></h5>
                                        <p class="card-text"><?= $lectureBDD[$key]['age']." - Code postal : ".$lectureBDD[$key]['zipcode'] ?></p>
                                        <p class="card-text"><?= $lectureBDD[$key]['description'] ?></p>
                                    </div>
                                    <div class="card-img-overlay d-flex justify-content-start align-items-start">
                                        <button type="button" class="btn btn-dark rounded-circle" name="but" id="but<?= $key ?>" onclick="change(<?= $key ?>)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>                                             
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91dd45fef9.js" crossorigin="anonymous"></script>
    <script>
        function change(num)
        {
            boutton=document.getElementById('but'+num);
            if (boutton.style.backgroundColor!="blue")
                {
                    boutton.style.backgroundColor="blue";
                }else
                {
                    boutton.style.backgroundColor="black";
                }
            }
    </script>
</html>
<?php } ?>