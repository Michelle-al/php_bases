<?php
$title= "Accueil";
$meta="Site de présentation";



    if(isset($_GET['page'])){
        switch ($_GET['page']){
            case 'competences' :
                include 'competences.php';
                break;
            case 'profile' :
                include 'profile.php';
                break;
            case 'loisirs' :
                include 'loisirs.php';
                break;
            case 'contact' :
                include 'contact.php';
                break;
        }
    }else{
        require 'header.php';
        echo " <h1>Michelle Alabi</h1>
        <p>Développeuse web</p>";

    }

?>





<?php
require 'footer.php';
?>