<?php
/**
 * @var bool $updateStatus
 */
?>

<div class="container">
    <?php if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Користувач успішно оновлений!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">Під час оновлення користувача сталася помилка!</div>';
    ?>
    <a href="/settings/eng/index" class="btn btn-success mb-2" id="">Поверніться на сторінку налаштувань!</a>
</div>
