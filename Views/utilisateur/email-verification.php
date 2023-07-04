<?php

if(isset($_POST['email_verifier'])){
    $email = $_POST['email'];
    $codeDeVerification = $_POST['codeDeVerification'];

    $bdd = mysqli_connect('localhost:8889', 'root', 'root', 'bonnefete');
    // Il faut rajouter email_verfifier_si dans la table utilisateur et codeDeVerification en BDD !
    $sql = 'UPDATE utilisateur SET email_verifier_si = 1 WHERE email = "'.$email.'" AND codeDeVerification = "'.$codeDeVerification.'"';
    $resultat = mysqli_query($bdd, $sql);

    if(mysqli_affected_rows($bdd) == 0){
        die('Erreur : email ou code de vérification incorrect');
    }
        echo '<p>Vous pouvez vous connecter</p>';
        exit();
}
?>

<form method="post">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="codeDeVerification" placeholder="Entrer le code de vérification" required>
    <input type="submit" name="email_verifier" value="Email Verifier">
</form>