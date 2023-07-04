<?php require_once 'Views/head.php'; ?>


<ul class="list-group">
    <?php foreach ($logs as $log) {
        if (!$log->getIdPost()) { ?>
            <li class="list-group-item">
                <span class="text-secondary"><?= $log->getDateLog() ?></span> -> <?= $log->getIdUtilisateur() . " " . $log->getAction() ?>
            </li>
        <?php } else { ?>
            <li class="list-group-item">
                <span class="text-secondary"><?= $log->getDateLog() ?></span> -> <?= $log->getIdUtilisateur() . " " . $log->getAction() ?>
            </li>
        <?php } ?>

    <?php } ?>
</ul>

<?php require_once 'Views/foot.php'; ?>