<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Opérateur Mobile</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

<nav>
    <div class="logo">Mon Site</div>

    <ul>
        <li>
            <a href="<?= base_url('/') ?>" class="active">
                Accueil
            </a>
        </li>

        <li>
            <a href="<?= base_url('profil') ?>">
                Profil
            </a>
        </li>
    </ul>
</nav>

<main>

<h1>Bienvenue <?= esc($utilisateur['nom']) ?></h1>

<div class="box-solde">

    <h2>Votre solde actuel :</h2>

    <h1>
        <?= number_format($utilisateur['solde'],2,',',' ') ?> Ar
    </h1>

</div>

<div class="box-depot">
    <input type="button" value="Dépôt">
</div>

<div class="box-retrait">
    <input type="button" value="Retrait">
</div>

<div class="box-transfert">
    <input type="button" value="Transfert">
</div>

</main>

</body>
</html>