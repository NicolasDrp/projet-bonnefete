<?php require_once 'Views/head.php'; ?>



<div class="d-flex flex-row align-items-center justify-content-center m-auto" id="form-connexion">
    <div class="bg-white p-5 d-flex flex-column align-items-center justify-content-center" style="height: 75vh;flex: 50%;">
        <form action="../utilisateur/enregistrer" method="post" style="width: 95%;">

            <div class="mb-4">
                <label for="nom" class="form-label">Nom<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>

            <div class="mb-4">
                <label for="prenom" class="form-label">Prénom<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="prenom" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">E-mail<span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Mot de passe<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-5 w-50 m-auto">
                <button class="btn btn-success w-100 btn-lg">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
    <div class="d-flex flex-column align-items-end d-none d-xl-flex" style="flex: 50%;">
        <h2 style="font-size: 4rem;">Creer un compte</h2>
        <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" class="w-75 m-auto">
    </div>
</div>















<?php require_once 'Views/foot.php'; ?>