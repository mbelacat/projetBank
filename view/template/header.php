<!doctype html>
<html class="no-js" lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>projet bank</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <!-- <link rel="stylesheet"  setHref("public/css/main.css"); ?>> -->
  <!-- <link rel="stylesheet"  setHref('public/css/normalize.css'); ?>> -->
  <?php loadCss('main.css') ?>
  <?php loadCss('normalize.css') ?>
  <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

</head>

<body>
  <section class="text-center">
    <div class="container">
      <h1 class="display-4"><i class="fas fa-university"></i> bank of Adep <i class="fas fa-university"></i></h1>
    </div>
  </section>

  <nav class="navbar navbar-expand-lg navbar-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" <?php setHref("") ?> >Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php setHref("addAccount") ?>>Créer un compte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php setHref("bankAccounts") ?>>Liste des comptes</a>
      </li>
    </ul>
  </div>
</nav>

  <main class="container">
