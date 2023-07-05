<?php require_once 'Views/head.php'; ?>



<ul class="list-group">
    <?php foreach ($logs as $log) {
        if (!$log->getIdPost()) { ?>
            <li class="list-group-item">
                <span class="text-secondary"><?= $log->getDateLog() ?></span> ->
                <a href="../utilisateur/details/<?= $log->getIdUtilisateur() ?>" class="text-primary text-decoration-none"> L'utilisateur Id <?= $log->getIdUtilisateur() ?></a>
                <?= " " . $log->getAction() ?>
            </li>
        <?php } else { ?>
            <li class="list-group-item">
                <span class="text-secondary"><?= $log->getDateLog() ?></span> ->
                <a href="../utilisateur/details/<?= $log->getIdUtilisateur() ?>" class="text-primary text-decoration-none"> L'utilisateur Id <?= $log->getIdUtilisateur() ?></a>
                <?= " " . $log->getAction() ?>
                <a href="../post/details/<?= $log->getIdPost() ?>" class="text-primary text-decoration-none"> , Id <?= $log->getidPost() ?></a>
            </li>
        <?php } ?>

    <?php } ?>
</ul>

<?php require_once 'Views/foot.php'; ?>