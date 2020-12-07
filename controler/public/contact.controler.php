<?php
require_once "../model/public/contact.model.php";

$shop= selectsMagasin($db);
$_SESSION['enoyeok'] ="";

if (isset($_POST['Send'])) {
    $sujet=htmlspecialchars($_POST['sujet'],ENT_QUOTES);
    $themail=htmlspecialchars(filter_var($_POST['themail'],FILTER_VALIDATE_EMAIL),ENT_QUOTES);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])),ENT_QUOTES);
    $thename = htmlspecialchars(strip_tags(trim($_POST['thename'])),ENT_QUOTES);
    $prenom = htmlentities(strip_tags(trim($_POST['prenom'])),ENT_QUOTES);
}
if ((!empty($themail))&& (!empty($sujet)) && (!empty($message)) && (!empty($thename))&& (!empty($prenom))){
    $themail  = 'cherifi.chihab@live.be';
    $message = $message . ' ' . $thename . '' . $prenom;
    $Entetes= 'From: webmaster@example.com' . "\r\n" .
    'Content-type: text/html; charset=UTF-8' . "\r\n";
    if(mail($themail, $sujet, $message, $Entetes)){
        $msg="Message bien envoyé";
    }else{
        $msg="Le message n'a pas été envoyer";
    }
   
}

include "../view/public/contacts.view.php";