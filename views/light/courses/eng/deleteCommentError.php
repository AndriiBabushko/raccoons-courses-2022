<?php
/**
 * @var int $id_good
 */
?>
<div class="container">
    <div class="alert alert-danger my-2 w-100 text-center">An error occurred while deleting comment!</div>

    <?php if (!empty($id_good)): ?>
        <a href="/courses/eng/view/<?php echo $id_good; ?>" class="btn btn-success mb-2" id="">Get back to course view page!</a>
    <?php endif; ?>

    <?php if (empty($id_good)): ?>
        <a href="/courses/eng/index" class="btn btn-success mb-2" id="">Get back to course page!</a>
    <?php endif; ?>
</div>
