<?php

// Database
define("DB_HOST","localhost");
define("DB_NAME","catalogue");
define("DB_USER","root");
define("DB_PWD","");
define("DB_PORT",3306);
define("DB_CHARSET","utf8");


// nombre par produit
define("NUMBER_ARTICLE_PER_PAGE",5);
// Article's number per page for Admin
define("NUMBER_ARTICLE_PER_PAGE_ADMIN",3);

// Upload images path
define("IMG_UPLOAD_ORIGINAL","image/upload/origin/");
define("IMG_UPLOAD_MEDIUM","image/upload/medium/");
define("IMG_UPLOAD_SMALL","image/upload/thumb/");

// Maximum size for medium images (keep the proportions)
define("IMG_MEDIUM_WIDTH",950);
define("IMG_MEDIUM_HEIGHT",700);

// Size for small images (crop the original)
define("IMG_SMALL_WIDTH",80);
define("IMG_SMALL_HEIGHT",80);

// Accepted image's formats
define("IMG_FORMAT",[".jpg", ".jpeg", ".gif", ".png"]);

// Maximum size for image
define("IMG_MAX_SIZE",1000000000); // +- 1000 mio

// Qualities for JPG images
define("IMG_JPG_MEDIUM",90);
define("IMG_JPG_SMALL",80);
