<?php
/**
 * @var bool $updateStatus
 */
?>

<div class="container">
    <?php
    if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">Good was successfully updated!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">An error occurred while updating good!</div>';
    ?>
    <a href="/courses/eng/index" class="btn btn-success mb-2" id="">Get back to courses page!</a>
</div>
