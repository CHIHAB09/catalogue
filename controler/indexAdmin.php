<?php
require_once "../model/deconnexion.php";
require_once "../model/crud.php";

//existence de la connexion valide login admin
if(isset($_SESSION['notresession'])&&$_SESSION['notresession']===session_id()) {

    // routing admin
    if(isset($_GET['admin'])) {
        switch ($_GET['admin']) {
            case "accueil":
                require_once "files/Databases/admin/principal.php";
                break;
            case "deconnexion":
                require_once "files/Databases/admin/deconnexion.php";
                break;
            case "contact":
                require_once "files/Databases/admin/contact_admin.php";
                break;
            case "crudliens":
                require_once "files/Databases/admin/liens_admin.php";
                break;
            case "ajouter_liens":
                require_once "files/Databases/admin/liens_ajouter.php";
                break;

            default:
                require_once "files/Databases/admin/principal.php";
        }
    }
    }