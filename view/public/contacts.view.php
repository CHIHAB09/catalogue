<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    
</head>
<body>
    <h1>Panther Sneakers</h1></br>
    <h2>Nous contacter!</h2></br>
      <!--formulaire de contact-->
      <div id="contact">
        <form method="POST">    
            <div class="wrapper">
                <div class="contact-form">
                    <div class="input-fields">
                        <input type="text" class="input" name="thename" placeholder="Nom">
                        <input type="text" class="input" name="prenom" placeholder="Prenom">
                        <input type="text" class="input" name="themail" placeholder="Email"required>
                        <input type="text" class="input" name="sujet" placeholder="Sujet">
                    </div>
                
                    <div class="msg">
                        <textarea name="message" placeholder="Message"></textarea>
                        <div class="btn">
                            <button class="Send" name="Send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
        <p style='center color:red'><?php if(isset($_SESSION['enoyeok'] )) echo $_SESSION['enoyeok'] ;  ?></p>      
    </div>
    <div id="mymap">
        
    </div>
  
    <!-- js leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- js perso -->
    <script>let shops= <?=json_encode($shop)?>;</script>
    <script src="js/map.js"></script>
</body>
</html>