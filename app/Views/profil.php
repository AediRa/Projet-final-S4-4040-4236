<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Profil</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

</head>

<body>

<nav>

    <div class="logo">Mon Site</div>

    <ul>

        <li>
            <a href="<?= base_url('/') ?>">
                Accueil
            </a>
        </li>

        <li>
            <a href="<?= base_url('profil') ?>" class="active">
                Profil
            </a>
        </li>

    </ul>

</nav>

<main>

<h1>Mon Profil</h1>

<p><strong>Nom :</strong> <?= esc($utilisateur['nom']) ?></p>

<p><strong>Email :</strong> <?= esc($utilisateur['email']) ?></p>

<p><strong>Solde :</strong> <?= number_format($utilisateur['solde'],2,',',' ') ?> Ar</p>

</main>

</body>

</html>