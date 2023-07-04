<?php require_once 'Views/head.php'; ?>

<div class="d-flex flex-row align-items-center justify-content-center m-auto" id="form-connexion" >
    <div class="d-none d-xl-block" style="flex: 50%;">
        <h2 style="font-size: 4rem;">Se Connecter</h2>
        <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" class="w-75 m-auto">
    </div>
    <div class="bg-white p-0 p-xl-5 d-flex flex-column align-items-center justify-content-center" style="height: 75vh; flex: 50%;">
        <h2 style="font-size: 4rem;" class="d-xl-none d-block">Se Connecter</h2>
        <form action="../utilisateur/connexion" method="post" style="width: 95%;">

            <div class="mb-4"><label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-5"><label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="mb-5 w-50 m-auto">
                <button class="btn btn-success w-100 btn-lg">
                    Se connecter
                </button>
            </div>

            <div class="mb-5 w-50 m-auto">
                <a href="../utilisateur/enregistrer" class="btn btn-dark w-100 btn-lg">Creer un compte</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'Views/foot.php'; ?>