<?php
$title= "Formulmaire contact";
$meta = "Me contacter";
require 'header.php';

$message='';
$msg_message ='';
$msg_info ='';

if(!empty($_POST))
{

    //Traitement du formulaire

    if(empty($_POST['title'])){
        $msg = "Merci de remplir ce champ";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }
    if(empty($_POST['firstname'])){
        $msg = "Merci de remplir ce champ";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }
    if(empty($_POST['lastname'])){
        $msg = "Merci de remplir ce champ";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }
    if(empty($_POST['email'])){
        $msg = "Merci de remplir ce champ";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }
    if(empty($_POST['info'] || $_POST['other_info'] )){
        $msg_info = "Merci de choisir le motif";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && (!empty($_POST['email']))){
        $content = "L'adresse email n'est pas valide";
    }
    if(empty($_POST['message'] && strlen($_POST['message']))){
        $msg_message = "Merci de remplir ce champ avec un mot de plus de 5 lettres";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }

}
if(empty($message) && empty($content)){
    $message = "<div>Formulaire validé</div>";
}

?>
<form action="contact.php" method="post">
    <form>
        <select class="form-select" id = "title" aria-label="Default select example">
            <option selected>Civilité</option>
            <option value="mr">Monsieur</option>
            <option value="mme">Madame</option>
            <p class="small "><small class="text-danger"><?=(empty($_POST['title']) && !empty($_POST)) ? $msg : ''?></small></p>
        </select>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" >
            <p class="small "><small class="text-danger"><?=(empty($_POST['lastname']) && !empty($_POST)) ? $msg : ''?></small></p>
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstname" >
            <p class="small "><small class="text-danger"><?=(empty($_POST['firstname']) && !empty($_POST)) ? $msg : ''?></small></p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" >
            <p class="small "><small class="text-danger"><?=(empty($_POST['email']) && !empty($_POST)) ? $msg : ''?><?= (isset($content)) ? $content : ""?></small></p>
        </div>
        <div>Motif de contact</div>
        <p class="small "><small class="text-danger"><?=(empty($_POST['firstname']) && !empty($_POST)) ? $msg : ''?></small></p>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="" id="info" name=" info">
            <label class="form-check-label" for="info">
                Demande d'informations
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="" id="other_info" name="other_info">
            <label class="form-check-label" for="other_info">
                Autres demandes
            </label>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
            <p class="small "><small class="text-danger"><?=(empty($_POST['firstname']) && !empty($_POST)) ? $msg : ''?></small></p>
        </div>
        <input type="submit" class="btn btn-primary mb-3">
    </form>
</form>
