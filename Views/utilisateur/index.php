<?php require_once 'Views/head.php'; ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Role</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateurs as $utilisateur) { ?>
            
                <tr>
                    <td><?= $utilisateur->getNomUtilisateur() ?></td>
                    <td><?= $utilisateur->getPrenomUtilisateur() ?></td>
                    <td><?php
                        if ($utilisateur->isEstModerateur()) {
                            echo 'Modérateur';
                        } elseif ($utilisateur->isEstSuperAdmin()) {
                            echo 'Super Admin';
                        } else {
                            echo 'Utilisateur';
                        }
                        ?></td>
                    <td><a href="../utilisateur/details/<?= $utilisateur->getIdUtilisateur() ?>" class="btn btn-success">Voir</a></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once 'Views/foot.php'; ?>