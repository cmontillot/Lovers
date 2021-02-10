<?php
    define('REGEX_NO_NUMBER', "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/");
    define('REGEX_DATE', "/^(19|20[0-9]{2})[-\/.](0[1-9]|1[012])[-\/.](0[1-9]|[12][0-9]|3[01])$/");
    define('REGEX_POSTAL_CODE', "/^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/");
    define('REGEX_NUMBER_ADD', "/^([0-9]+)((bis)|(ter))|([0-9]+)$/");
    define('REGEX_PHONE', "/^(\+33|0033)[0-9]{9}|0[0-9]{9}|(\+33[(]0[)]|0033[(]0[)])[0-9]{9}$/");
    define('REGEX_EMPLOI', "/^[0-9]{7}[A-Z]{1}$/");
    define('REGEX_NUMBER', "/^[1-9]{1}$/");
    define('REGEX_AGE', "/^[1-9]{2}$/");

    // Tableau des erreurs
    $erreurs = [];
    $nom = '';
    $prenom = '';
    $age = '';
    $genre = '';
    $type = '';
    $description = '';
    $cp = '';
    $courriel = '';

    // Si page envoyée en POST et click sur bouton ENVOYER du formulaire
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_valid'])){
        // Traitement du nom
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        if(!empty($nom)){
            if(!preg_match(REGEX_NO_NUMBER, $nom)){
                $erreurs['nom'] = '<div class="invalid-feedback">Le nom ne peux pas comporter de chiffres.</div>';
            }
        }else{
            $erreurs['nom'] = '<div class="invalid-feedback">Le champs est vide</div>';   
        }

        // Traitement du prénom
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        if(!empty($prenom)){
            if(!preg_match(REGEX_NO_NUMBER, $prenom)){
                $erreurs['prenom'] = '<div class="invalid-feedback">Le prénom ne peux pas comporter de chiffres.</div>';
            }
        }else{
            $erreurs['prenom'] = '<div class="invalid-feedback">Le champs est vide</div>';   
        }

        // Traitement de l'âge
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        if(!empty($age)){
            if(!preg_match(REGEX_AGE, $age)){
                $erreurs['age'] = '<div class="invalid-feedback">L\'âge ne peut pas comporter de lettres.</div>';
            }
        }else{
            $erreurs['age'] = '<div class="invalid-feedback">Le champs est vide</div>';   
        }

        // Traitement du genre
        $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
        if(!empty($genre)){
            if(!preg_match(REGEX_NO_NUMBER, $genre)){
                $erreurs['genre'] = '<div class="invalid-feedback">Le genre est invalide.</div>';
            }
        }else{
            $erreurs['genre'] = '<div class="invalid-feedback">Le champs est vide</div>';   
        }

        // Traitement du type
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
        if(!empty($type)){
            if(!preg_match(REGEX_NO_NUMBER, $type)){
                $erreurs['type'] = '<div class="invalid-feedback">Le type recherché est invalide.</div>';
             }
        }else{
                $erreurs['type'] = '<div class="invalid-feedback">Le champs est vide</div>';   
        }

        // Traitement du code postal
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
        if(!empty($cp)){
            if(!preg_match(REGEX_POSTAL_CODE, $cp)){
                $erreurs['cp'] = '<div class="invalid-feedback">Le code postal n\'est pas valide.</div>';
            }
        }else{
            $erreurs['cp'] = '<div class="invalid-feedback">Le champs est vide</div>';   
        }

        // Traitement du code postal
        $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
        if(!empty($courriel)){
            if(!filter_var($courriel, FILTER_VALIDATE_EMAIL)){
                $erreurs['courriel'] = '<div class="invalid-feedback">L\'adresse mail n\'est pas valide.</div>';
            }
        }else{
            $erreurs['courriel'] = 'Le champs est vide';  
        }

        // Traitement de la description
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        if(empty($description)){
            $erreurs['description'] = '<div class="invalid-feedback">Le champs est vide</div>';  
    
        }
    } 
?>