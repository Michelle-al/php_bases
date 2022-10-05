<?php
$title= "Formulaire de contact";
$meta = "Me contacter";
require 'header.php';
session_start();


$message='';
$msg_message ='';
$msg_info ='';

if(!empty($_POST))
{

    $_SESSION =
        array(
            'title' => $_POST['title'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'info' => $_POST['info'],
            'message' => $_POST['message']
        );

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
    if(empty($_POST['message'] ) || strlen($_POST['message']) < 5){
        $msg_message = "Merci de remplir ce champ avec un mot de plus de 5 lettres";
        $message='<div class="alert alert-danger mb-5">Merci de remplir les champs indiqués</div>';
    }

}
if(empty($message) && empty($content)){
    $messages = "<div>Formulaire validé</div>";
}

?>
<h1 class="text-center mb-5">Me contacter</h1>

<form action="contact.php" method="post">
    <form>
        <select class="form-select" id = "title" aria-label="Default select example" name="title">
            <option value="vide">Civilité</option>
            <option value="mr" <?= (isset($_POST['title']) && $_POST['title'] == "mr") ? "selected" : ""?> >Monsieur</option>
            <option value="mme" <?= (isset($_POST['title']) && $_POST['title'] == "mme") ? "selected" : ""?> >Madame</option>
        </select>
        <p class="small "><small class="text-danger"><?=(isset($_POST) && ($_POST['title'] == "vide")) ? $msg : "" ?></small></p>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= (isset($_POST['lastname'])) ? $_SESSION['lastname'] : "" ?>">
            <p class="small "><small class="text-danger"><?=(isset($_POST) && empty($_POST['lastname'])) ? $msg : "" ?></small></p>
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=(isset($_POST['firstname']) ? $_SESSION['firstname'] : "")?>">
            <p class="small "><small class="text-danger"><?=(isset($_POST) && empty($_POST['firstname'])) ? $msg : "" ?></small></p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=(isset($_POST['email']) ? $_SESSION['email'] : "")?>" >
            <p class="small "><small class="text-danger"><?=(isset($_POST) && empty($_POST['email'])) ? $msg : "" ?><?=(isset($_POST) && !empty($content)) ? $content : "" ?></small></p>
        </div>
        <div>
            <div>Motif de contact</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Demande d'informations" name="info" <?= (isset($_POST['info']) && $_POST['info'] == "Demande d'informations") ? "checked" : ""?>>
                <label class="form-check-label" for="info">
                    Demande d'informations
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Autres demandes" name="info" <?= (isset($_POST['info']) && $_POST['info'] == "Autres demandes") ? "checked" : ""?>>
                <label class="form-check-label" for="info">
                    Autres demandes
                </label>
            </div>
            <p class="small "><small class="text-danger"><?=(isset($_POST) && empty($_POST['info'])) ? $msg_info : "" ?></small></p>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" id="message" name="message" rows="3"><?=(isset($_POST['message']) ? $_SESSION['message'] : "")?></textarea>
            <p class="small "><small class="text-danger"><?=(isset($_POST) && empty($_POST['message']) || strlen($_POST['message']) < 5) ? $msg_message : "" ?></small></p>
        </div>
        <input type="submit" class="btn btn-primary mb-3" >
    </form>
</form>
