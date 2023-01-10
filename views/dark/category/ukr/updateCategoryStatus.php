<?php
/**
 * @var bool $updateStatus
 */
?>

<div class="container">
    <?php
    if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Категорію успішно оновлено!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">Під час оновлення категорії сталася помилка!</div>';
    ?>
    <a href="/category/ukr/index" class="btn btn-success mb-2" id="">Повернутися на сторінку категорій</a>
</div>
