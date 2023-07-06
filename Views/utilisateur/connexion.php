<?php require_once 'Views/head.php'; ?>

<div class="container">
  <div class="row d-flex flex-row align-items-center justify-content-center">
    <div class="col-lg-6">
      <h2 style="font-size: 4rem;">Se Connecter</h2>
      <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" class="img-fluid w-75 m-auto">
    </div>

    <div class="col-lg-6 bg-white p-5 d-flex flex-column align-items-center justify-content-center" style="height: 75vh;">
      <form action="../utilisateur/connexion" method="post" style="width: 95%;">

        <div class="mb-4">
          <label for="email" class="form-label">Adresse Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-5">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-5">
          <button class="btn btn-success btn-lg w-100">
            Se connecter
          </button>
        </div>

        <div class="mb-5">
          <a href="../utilisateur/enregistrer" class="btn btn-dark btn-lg w-100">Créer un compte</a>
        </div>

      </form>
    </div>
  </div>
</div>


<?php require_once 'Views/foot.php'; ?>