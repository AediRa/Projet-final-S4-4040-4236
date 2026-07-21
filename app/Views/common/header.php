<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mobile Money' ?></title>

    <!-- Styles Bootstrap & Thème -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/theme.css') ?>">
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row min-vh-100">

        <!-- ================= BARRE LATÉRALE (SIDEBAR) ================= -->
        <aside class="col-md-3 col-lg-2 bg-white shadow-sm p-3 border-end d-flex flex-column justify-content-between">
            <div>
                <!-- Nom / Logo -->
                <div class="text-center py-3 mb-3 border-bottom">
                    <h4 class="fw-bold text-primary mb-0">Mobile Money</h4>
                    <small class="text-muted">Espace <?= session()->get('user_type') === 'admin' ? 'Administration' : 'Client' ?></small>
                </div>

                <!-- Info Utilisateur -->
                <div class="mb-4 p-2 bg-light rounded text-center">
                    <span class="d-block fw-bold"><?= esc(session()->get('user_nom')) ?></span>
                    <span class="badge bg-primary text-capitalize"><?= esc(session()->get('user_type')) ?></span>
                </div>

                <!-- Navigation Dynamique -->
                <ul class="nav nav-pills flex-column gap-1">

                    <!-- MENU CLIENT (Gère 'user' ET 'client') -->
                    <?php if (in_array(session()->get('user_type'), ['user', 'client'])): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/home') ?>" class="nav-link text-dark">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/depot') ?>" class="nav-link text-dark">Dépôt</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/retrait') ?>" class="nav-link text-dark">Retrait</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/transfert') ?>" class="nav-link text-dark">Transfert</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/historique') ?>" class="nav-link text-dark">Historique</a>
                        </li>

                    <!-- MENU ADMIN -->
                    <?php elseif (session()->get('user_type') === 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark d-flex justify-content-between align-items-center" 
                               data-bs-toggle="collapse" 
                               data-bs-target="#menuConfig" 
                               aria-expanded="false" 
                               aria-controls="menuConfig"
                               role="button"
                               style="cursor: pointer;">
                                <span>Configurations</span>
                                <small>▼</small>
                            </a>
                            
                            <div class="collapse ps-3 mt-1" id="menuConfig">
                                <ul class="nav nav-pills flex-column gap-1">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/prefixes') ?>" class="nav-link text-dark small">Préfixes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/types-operation') ?>" class="nav-link text-dark small">Types d'opération</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/frais') ?>" class="nav-link text-dark">Gains de frais</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/clients') ?>" class="nav-link text-dark">Nos clients</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <!-- Déconnexion -->
            <div class="pt-3 border-top mt-auto">
                <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger w-100">Déconnexion</a>
            </div>
        </aside>

        <!-- ================= CONTENU PRINCIPAL (MAIN) ================= -->
        <main class="col-md-9 col-lg-10 p-4">