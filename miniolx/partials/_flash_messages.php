<?php

    use App\utils\FlashMessages;

    $errors = FlashMessages::getMessages('error');
    $infos = FlashMessages::getMessages('info');

?>

<?php if (isset($errors)) : ?>
    <ul class="alert alert-danger">
        <?php foreach ($errors as $e) : ?>
            <li><?= $e ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?php if (isset($infos)) : ?>
    <ul class="alert alert-info">
        <?php foreach ($infos as $info) : ?>
            <li><?= $info ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>