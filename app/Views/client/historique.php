<?= $this->include('common/header') ?>

<!-- 1. EN-TÊTE & SOLDE -->
<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h3 class="fw-bold text-primary mb-1">Historique des Opérations</h3>
        <p class="text-muted mb-0">Retrouvez l'ensemble des mouvements de votre compte.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <div class="card bg-primary text-white p-3 shadow-sm border-0 rounded-3 d-inline-block w-100">
            <span class="text-white-50 small d-block">Solde Actuel</span>
            <h4 class="fw-bold mb-0"><?= number_format($solde, 0, ',', ' ') ?> Ar</h4>
        </div>
    </div>
</div>

<!-- 2. FILTRES RAPIDES (PLACEHOLDER VISUEL) -->
<div class="card p-3 shadow-sm border-0 mb-4">
    <div class="row g-2 align-items-center">
        <div class="col-12 col-md-4">
            <input type="text" class="form-control" placeholder="Rechercher une opération...">
        </div>
        <div class="col-6 col-md-3">
            <select class="form-select">
                <option value="">Tous les types</option>
                <option value="depot">Dépôts</option>
                <option value="retrait">Retraits</option>
                <option value="transfert">Transferts</option>
            </select>
        </div>
        <div class="col-6 col-md-3">
            <select class="form-select">
                <option value="">Toutes les dates</option>
                <option value="7d">7 derniers jours</option>
                <option value="30d">30 derniers jours</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <button class="btn btn-outline-primary w-100">Filtrer</button>
        </div>
    </div>
</div>

<!-- 3. TABLEAU COMPLET DES OPÉRATIONS -->
<div class="card p-4 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Date & Heure</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="badge bg-success-subtle text-success">Dépôt</span></td>
                    <td class="fw-bold text-success">+ 50 000 Ar</td>
                    <td class="text-muted small">21/07/2026 10:30</td>
                    <td><span class="badge bg-success">Validé</span></td>
                </tr>
                <tr>
                    <td><span class="badge bg-danger-subtle text-danger">Transfert</span></td>
                    <td class="fw-bold text-danger">- 15 000 Ar</td>
                    <td class="text-muted small">20/07/2026 14:15</td>
                    <td><span class="badge bg-success">Validé</span></td>
                </tr>
                <tr>
                    <td><span class="badge bg-warning-subtle text-dark">Retrait</span></td>
                    <td class="fw-bold text-danger">- 20 000 Ar</td>
                    <td class="text-muted small">18/07/2026 09:00</td>
                    <td><span class="badge bg-success">Validé</span></td>
                </tr>
                <tr>
                    <td><span class="badge bg-success-subtle text-success">Dépôt</span></td>
                    <td class="fw-bold text-success">+ 100 000 Ar</td>
                    <td class="text-muted small">15/07/2026 16:45</td>
                    <td><span class="badge bg-success">Validé</span></td>
                </tr>
                <tr>
                    <td><span class="badge bg-danger-subtle text-danger">Transfert</span></td>
                    <td class="fw-bold text-danger">- 35 000 Ar</td>
                    <td class="text-muted small">10/07/2026 11:20</td>
                    <td><span class="badge bg-success">Validé</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- 4. PAGINATION (PLACEHOLDER) -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <small class="text-muted">Affichage de 5 sur 12 opérations</small>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
            </ul>
        </nav>
    </div>
</div>

<?= $this->include('common/footer') ?>