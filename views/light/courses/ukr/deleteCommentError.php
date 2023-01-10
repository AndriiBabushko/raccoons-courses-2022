<?php
/**
 * @var int $id_good
 */
?>
<div class="container">
    <div class="alert alert-danger my-2 w-100 text-center">Під час видалення коментаря сталася помилка!</div>

    <?php if (!empty($id_good)): ?>
        <a href="/courses/ukr/view/<?php echo $id_good; ?>" class="btn btn-success mb-2" id="">Поверніться до сторінки перегляду курсу!</a>
    <?php endif; ?>

    <?php if (empty($id_good)): ?>
        <a href="/courses/ukr/index" class="btn btn-success mb-2" id="">Поверніться на сторінку курсу!</a>
    <?php endif; ?>
</div>
