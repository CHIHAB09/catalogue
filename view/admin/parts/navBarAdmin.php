<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <a href="./" class="navbar-brand">Accueil de l'administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"<?php if(!isset($_GET['pg'])) echo "active" ?>>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="?pg=Magasin">Magasin</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=Produit">Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=Categorie">Categorie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Image</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Promotion</a>
            </li>
        </ul>
           <a class="btn btn-light my-2 my-sm-0" href="?pg=deconnexion">Déconnexion</a>
        </div>
</nav>   