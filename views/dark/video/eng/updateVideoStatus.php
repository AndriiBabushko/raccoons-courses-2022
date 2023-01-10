<?php
/**
 * @var bool $updateStatus
 * @var int $id_good
 */
?>

<div class="container">
    <?php
    if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Video was successfully updated!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">An error occurred while updating video!</div>';
    ?>
    <a href="/courses/eng/view/<?php echo $id_good; ?>" class="btn btn-success mb-2" id="">Get back to course view page!</a>
</div>
