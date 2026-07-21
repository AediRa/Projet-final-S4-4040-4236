<?= $this->include('common/header') ?>

<div class="row">
    <div class="col-12 col-md-6 offset-md-3">
        
        <!-- 1. CARTE DE SOLDE ACTUEL -->
        <div class="card bg-primary text-white p-4 shadow-sm border-0 rounded-3 mb-4 text-center">
            <span class="text-white-50 small d-block mb-1">Solde Actuel</span>
            <h2 class="fw-bold mb-0">125 000 Ar</h2>
        </div>

        <!-- 2. FORMULAIRE DE DÉPÔT SIMPLE -->
        <div class="card p-4 shadow-sm border-0 rounded-3">
            <h4 class="text-primary fw-bold mb-1">Faire un dépôt</h4>
            <p class="text-muted small mb-4">Saisissez le montant à ajouter à votre compte.</p>

            <form action="#" method="post">
                <?= csrf_field() ?>

                <!-- CHAMP MONTANT -->
                <div class="mb-4">
                    <label for="montant" class="form-label fw-bold">Montant à déposer</label>
                    <div class="input-group input-group-lg">
                        <input type="number" 
                               class="form-control" 
                               id="montant" 
                               name="montant" 
                               placeholder="0" 
                               min="1000" 
                               step="500" 
                               required 
                               autofocus>
                        <span class="input-group-text fw-bold">Ar</span>
                    </div>
                </div>

                <!-- BOUTONS D'ACTION -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg fw-bold shadow-sm">
                        Valider le dépôt
                    </button>
                    <a href="<?= base_url('/home') ?>" class="btn btn-outline-secondary">
                        Annuler
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>

<?= $this->include('common/footer') ?>