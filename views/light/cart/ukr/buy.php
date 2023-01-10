<?php
/**
 * @var array $errors
 * @var array $messages
 */
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php if (!empty($errors['somethingWrong'])): ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger my-2 w-100 text-center">
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <?php echo $errors['somethingWrong']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($messages['boughtUnsuccessfulMessage'])): ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger my-2 w-100 text-center">
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <?php echo $messages['boughtUnsuccessfulMessage']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['goodsInCart'])): ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning my-2 w-100 text-center">
                            <i class="bi bi-exclamation-octagon-fill"></i>
                            <?php echo $errors['goodsInCart']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($messages['boughtSuccessMessage'])): ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success my-2 w-100 text-center">
                            <i class="bi bi-check-lg"></i>
                            <?php echo $messages['boughtSuccessMessage']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
