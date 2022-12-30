<?php
/**
 * @var bool $deleteStatus
 */
?>

<div class="container">
    <?php if (!empty($deleteStatus))
        echo '<div class="alert alert-success my-2 w-100 text-center">User was successfully deleted!</div>';
    else
        echo '<div class="alert alert-danger my-2 w-100 text-center">An error occurred while deleting user!</div>';
    ?>
    <a href="/user/eng/register" class="btn btn-success mb-2" id="">Get back to register page!</a>
</div>
