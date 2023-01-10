<?php
/**
 * @var bool $deleteStatus
 */
?>

<div class="container">
    <?php if (!empty($deleteStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Користувача успішно видалено!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">Під час видалення користувача сталася помилка!</div>';
    ?>
    <a href="/user/ukr/register" class="btn btn-success mb-2" id="">Повернутися на сторінку реєстрації!</a>
</div>
