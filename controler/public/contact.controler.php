<?php
require_once "../model/public/contact.model.php";

$shop= selectsMagasin($db);
$_SESSION['enoyeok'] ="";

if (isset($_POST['Send'])) {
    $sujet=htmlspecialchars($_POST['sujet'],ENT_QUOTES);
    $themail=htmlspecialchars($_POST['themail'],ENT_QUOTES);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])),ENT_QUOTES);
    $thename = htmlspecialchars(strip_tags(trim($_POST['thename'])),ENT_QUOTES);
    $prenom = htmlentities(strip_tags(trim($_POST['prenom'])),ENT_QUOTES);
}
if ( (!empty($themail))&& (!empty($sujet)) && (!empty($message)) && (!empty($thename))&& (!empty($prenom))  ) {
    $mail  = 'webmaster@example.com';
    $message = $message . ' ' . $thename . '' . $prenom;
    $Entetes= 'From: webmaster@example.com' . "\r\n" .
    'Content-type: text/html; charset=UTF-8' . "\r\n";
    //echo "coucou";
    ini_set('smtp_port',25);
    ini_set('SMTP','relay.proximus.be');
    mail($themail, $sujet, $message, $Entetes);
    
    $_SESSION['enoyeok'] = " Votre mail a bien été envoyer.";
    

}




include "../view/public/contacts.view.php";