<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/theme.css') ?>">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">
                        
                        <h2 class="card-title text-center mb-4 fw-bold text-primary">Login</h2>

                        <!-- Gestion des erreurs Flashdata avec une alerte Bootstrap -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/login') ?>" method="post">
                            
                            <div class="mb-3">
                                <label for="num" class="form-label">Numéro de téléphone :</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="num" 
                                    name="num" 
                                    placeholder="Ex: 0341234567" 
                                    required 
                                    autofocus
                                >
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>