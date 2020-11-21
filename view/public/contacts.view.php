<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/contact.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="contact">
        <form method="POST"    
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
        </form> 
        <p style='center color:red'><?php if(isset($_SESSION['enoyeok'] )) echo $_SESSION['enoyeok'] ;  ?></p>      
    </div>
</body>
</html>