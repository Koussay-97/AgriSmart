<?php /* includes/head.php : contenu de <head> UNIQUEMENT (sans les balises <head></head>, qui restent dans la page appelante).
         Variable attendue : $pageTitle */ ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($pageTitle ?? 'AgriSmart') ?> | AgriSmart</title>
<meta name="description" content="AgriSmart : plateforme web guidée par l'IA pour une agriculture durable.">

<!-- Polices et icônes -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap + styles du template -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- TODO template : une fois le template Front Office choisi, copier ses fichiers dans css/ et lib/ et ajouter ici ses <link> (style.css, animate, owlcarousel...). -->
<!-- <link href="css/style.css" rel="stylesheet"> -->

<!-- Charte graphique AgriSmart (doit rester en dernier pour surcharger le template) -->
<link href="css/agrismart.css" rel="stylesheet">
