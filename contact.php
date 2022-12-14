<?php
$title= "Formulaire de contact";
$meta = "Me contacter";
require 'header.php';
session_start();


$message='';
$msg_message ='';
$msg_info ='';
$msg_title="";
$doc="";

if(!empty($_POST))
{
    
    //Traitement du formulaire

    if(empty($_POST['firstname'])){
        $msg_title = "Merci de sélectionner la civilité";
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
    if(empty($_POST['info'])){
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
if(empty($message) && empty($content) && !empty($_POST)){
    $_SESSION =
        array(
            'title' => htmlspecialchars($_POST['title'], ENT_QUOTES),
            'firstname' => htmlspecialchars($_POST['firstname'], ENT_QUOTES),
            'lastname' => htmlspecialchars($_POST['lastname'], ENT_QUOTES),
            'email' => htmlspecialchars($_POST['email'], ENT_QUOTES),
            'info' => htmlspecialchars($_POST['info'], ENT_QUOTES),
            'message' => htmlspecialchars($_POST['message'], ENT_QUOTES, "UTF-8"),
        );
    $doc = implode(PHP_EOL,$_SESSION);
    file_put_contents('form.txt', $doc, FILE_APPEND);
   
}

?>
<h1 class="text-center mb-5">Me contacter</h1>
<?= $message?>
<form action="contact.php" method="post">
    <form>
        <select class="form-select" id = "title" aria-label="Default select example" name="title">
            <option value="">Civilité</option>
            <option value="mr" <?= (isset($_POST['title']) && $_POST['title'] == "mr") ? "selected" : ""?> >Monsieur</option>
            <option value="mme" <?= (isset($_POST['title']) && $_POST['title'] == "mme") ? "selected" : ""?> >Madame</option>
        </select>
        <p class="small "><small class="text-danger"><?=(isset($_POST['title']) && (empty($_POST['title']))) ? $msg_title : "" ?></small></p>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= (isset($_POST['lastname'])) ? $_SESSION['lastname'] : "" ?>">
            <p class="small "><small class="text-danger"><?=(isset($_POST['lastname']) && empty($_POST['lastname'])) ? $msg : "" ?></small></p>
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=(isset($_POST['firstname']) ? $_SESSION['firstname'] : "")?>">
            <p class="small "><small class="text-danger"><?=(isset($_POST['firstname']) && empty($_POST['firstname'])) ? $msg : "" ?></small></p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=(isset($_POST['email']) ? $_SESSION['email'] : "")?>" >
            <p class="small "><small class="text-danger"><?=(isset($_POST['email']) && empty($_POST['email'])) ? $msg : "" ?><?=(isset($_POST) && !empty($content)) ? $content : "" ?></small></p>
        </div>
        <div>
            <div>Motif de contact</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Demande d'informations" id ="information" name="info" <?= (isset($_POST['info']) && $_POST['info'] == "Demande d'informations") ? "checked" : ""?>>
                <label class="form-check-label" for="information">
                    Demande d'informations
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Autres demandes" id="other_info" name="info" <?= (isset($_POST['info']) && $_POST['info'] == "Autres demandes") ? "checked" : ""?>>
                <label class="form-check-label" for="other_info">
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
