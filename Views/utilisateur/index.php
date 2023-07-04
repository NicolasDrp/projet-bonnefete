<?php require_once 'Views/head.php'; ?>

<table class="table w-100">
    <thead>
        <tr>
            <th scope="col">Nom Prenom</th>
            <th scope="col">Role</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateurs as $utilisateur) { ?>
            <tr>
                <td><?= $utilisateur->getPrenomUtilisateur() . " " . $utilisateur->getNomUtilisateur() ?></td>
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