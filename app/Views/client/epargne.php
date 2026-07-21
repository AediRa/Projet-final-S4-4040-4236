<?= $this->include('common/header') ?>

<div class="row">
    <div class="col-12 col-md-6 offset-md-3">
     

    <!-- 1. CARTE DE SOLDE ACTUEL -->
        <div class="card bg-primary text-white p-4 shadow-sm border-0 rounded-3 mb-4 text-center">
            <span class="text-white-50 small d-block mb-1">Solde Actuel</span>
           <h2 class="fw-bold mb-0"><?= number_format($solde, 0, ',', ' ') ?> Ar</h2>
        </div>

        <!-- 1. CARTE pourcentage d'épargne -->
        <div class="card bg-primary text-white p-4 shadow-sm border-0 rounded-3 mb-4 text-center">
            <span class="text-white-50 small d-block mb-1">Solde Actuel</span>
           <h2 class="fw-bold mb-0"><?= number_format($solde, 0, ',', ' ') ?> Ar</h2>
        </div>
                </div>
            </form>
        </div>
</div> </div>

<?= $this->include('common/footer') ?>