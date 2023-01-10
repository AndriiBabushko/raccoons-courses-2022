<?php
/**
 * @var bool $deleteStatus
 */
?>

<div class="container">
    <?php
    if (!empty($deleteStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Курс успішно видалено!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">Сталася помилка під час видалення курсу!</div>';
    ?>
    <a href="/courses/ukr/index" class="btn btn-success mb-2" id="">Поверніться на сторінку курсів!</a>
</div>
