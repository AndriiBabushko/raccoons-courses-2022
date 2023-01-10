<?php
/**
 * @var bool $updateStatus
 */
?>

<div class="container">
    <?php if (!empty($updateStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">User was successfully updated!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">An error occurred while updating user!</div>';
    ?>
    <a href="/settings/eng/index" class="btn btn-success mb-2" id="">Get back to settings page!</a>
</div>
