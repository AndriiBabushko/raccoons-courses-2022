<?php
/**
 * @var bool $updateStatus
 * @var int $id_good
 */
?>

<div class="container">
    <?php
    if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Відео успішно оновлено!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">Під час оновлення відео сталася помилка!</div>';
    ?>
    <a href="/courses/ukr/view/<?php echo $id_good; ?>" class="btn btn-success mb-2" id="">Поверніться до сторінки перегляду курсу!</a>
</div>
