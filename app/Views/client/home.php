<?= $this->include('common/header') ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-primary text-white p-4 shadow-sm border-0 rounded-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 text-white-50">Bienvenue,</p>
                    <h3 class="fw-bold mb-0"><?= esc($nom) ?></h3>
                </div>
                <div class="text-end">
                    <small class="text-white-50 d-block">Solde Disponible</small>
                    <h2 class="fw-bold mb-0"><?= number_format($solde, 0, ',', ' ') ?> Ar</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-4">
        <a href="<?= base_url('/depot') ?>" class="card p-3 text-center text-decoration-none shadow-sm border-0 h-100 hover-card">
            <div class="fs-3 text-success mb-2">📥</div>
            <span class="fw-bold text-dark">Dépôt</span>
        </a>
    </div>
    <div class="col-6 col-md-4">
        <a href="<?= base_url('/retrait') ?>" class="card p-3 text-center text-decoration-none shadow-sm border-0 h-100 hover-card">
            <div class="fs-3 text-danger mb-2">📤</div>
            <span class="fw-bold text-dark">Retrait</span>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="<?= base_url('/transfert') ?>" class="card p-3 text-center text-decoration-none shadow-sm border-0 h-100 hover-card">
            <div class="fs-3 text-primary mb-2">💸</div>
            <span class="fw-bold text-dark">Transfert</span>
        </a>
    </div>
</div>

<div class="card p-4 shadow-sm border-0">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Dernières opérations</h5>
        <a href="<?= base_url('/historique') ?>" class="btn btn-sm btn-outline-primary">Tout voir</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Date</th>
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
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('common/footer') ?>