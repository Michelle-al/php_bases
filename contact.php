<?php
$title= "Formulmaire contact";
$meta = "Me contacter";
require 'header.php';
?>
<form action="contact.php" method="post">
    <form>
        <select class="form-select" aria-label="Default select example">
            <option selected>Civilité</option>
            <option value="mr">Monsieur</option>
            <option value="mme">Madame</option>
        </select>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" >
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstname" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" >
        </div>
        <div>Motif de contact</div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="info">
            <label class="form-check-label" for="info">
                Demande d'informations
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="other_info">
            <label class="form-check-label" for="other_info">
                Autres demandes
            </label>
        </div>
    </form>
</form>
