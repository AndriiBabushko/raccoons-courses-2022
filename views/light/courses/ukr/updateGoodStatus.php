<?php
/**
 * @var bool $updateStatus
 */
?>

<div class="container">
    <?php
    if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Курс успішно оновлено!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">Під час оновлення курсу сталася помилка!</div>';
    ?>
    <a href="/courses/ukr/index" class="btn btn-success mb-2" id="">Поверніться на сторінку курсів!</a>
</div>
