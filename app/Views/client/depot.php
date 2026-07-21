<?= $this->include('common/header') ?>

<!-- EN-TÊTE : RAPPEL DU SOLDE ACTUEL -->
<div class="row mb-4">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card bg-primary text-white p-3 shadow-sm border-0 rounded-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-white-50 small d-block">Solde disponible</span>
                    <h4 class="fw-bold mb-0">125 000 Ar</h4>
                </div>
                <div class="fs-1">📥</div>
            </div>
        </div>
    </div>
</div>

<!-- FORMULAIRE DE DÉPÔT -->
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card p-4 shadow-sm border-0 rounded-3">
            <h4 class="text-primary fw-bold mb-3">Effectuer un Dépôt</h4>
            <p class="text-muted small mb-4">Renseignez les informations ci-dessous pour recharger votre compte.</p>

            <form action="#" method="post">
                <!-- CSRF Token (Placeholder pour CI4) -->
                <?= csrf_field() ?>

                <!-- 1. NUMÉRO DU COMPTE À CRÉDITER -->
                <div class="mb-3">
                    <label for="numero_compte" class="form-label fw-bold">Numéro de compte / Téléphone</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">📱</span>
                        <input type="text" class="form-field form-control border-start-0" id="numero_compte" name="numero_compte" placeholder="Ex: 034 00 000 00" value="034 12 345 67">
                    </div>
                    <div class="form-text">Par défaut, votre propre numéro de compte client.</div>
                </div>

                <!-- 2. CANAL / PRÉFIXE (Anticipation de la table des préfixes/opérateurs) -->
                <div class="mb-3">
                    <label for="canal" class="form-label fw-bold">Canal / Opérateur</label>
                    <select class="form-select" id="canal" name="canal">
                        <option value="" selected disabled>Choisir un canal...</option>
                        <option value="MVola">MVola (034 / 038)</option>
                        <option value="OrangeMoney">Orange Money (032)</option>
                        <option value="AirtelMoney">Airtel Money (033)</option>
                        <option value="Banque">Virement Banciaire</option>
                    </select>
                </div>

                <!-- 3. MONTANT À DÉPOSER -->
                <div class="mb-3">
                    <label for="montant" class="form-label fw-bold">Montant du dépôt (Ar)</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="montant" name="montant" placeholder="Ex: 20000" min="1000" step="500">
                        <span class="input-group-text fw-bold">Ar</span>
                    </div>
                </div>

                <!-- 4. APERÇU DES FRAIS (Anticipation de la gestion des frais admin) -->
                <div class="card bg-light p-3 border-0 mb-4 rounded-3">
                    <div class="d-flex justify-content-between small text-muted mb-1">
                        <span>Frais de dépôt :</span>
                        <span class="fw-bold text-dark">0 Ar (Gratuit)</span>
                    </div>
                    <div class="d-flex justify-content-between small text-muted">
                        <span>Montant crédité :</span>
                        <span class="fw-bold text-success" id="apercu_total">0 Ar</span>
                    </div>
                </div>

                <!-- BOUTON DE SOUMISSION -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg fw-bold shadow-sm">
                        Valider le dépôt
                    </button>
                    <a href="<?= base_url('/home') ?>" class="btn btn-outline-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('common/footer') ?>