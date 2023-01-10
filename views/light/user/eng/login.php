<?php
/**
 * @var string|null $error
 * @var array $model
 */
?>

<div class="row h-100">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 h-100 position-relative">
        <div class="form-container d-flex justify-content-center align-items-center h-100" id="formContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative" id="authForm">
                <div id="authImg"></div>

                <div class="" id="content">
                    <h3 class="h3 my-4 text-center title">Time to study hard!</h3>

                    <div class="form-group mb-3">
                        <label for="email" id="labelEmail" class="form__label_email form-label label">Email</label>
                        <input type='email' name='email' id='email' class='input form__email form-control form-control-lg' placeholder="example@abc.com"
                               value="<?php if (!empty($model)) echo $model['email']; else echo ''; ?>">
                        <div class="invalid-feedback">
                            Email isn't correct!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" id="labelPassword" class="form__label_password form-label label">Password</label>
                        <div class="input-group">
                            <input type='password' name='password' id='password' class='input form__password form-control form-control-lg' placeholder="Enter password">
                            <span class="input-group-text showPassword">
                                <i class="bi bi-eye-slash fs-4"></i>
                            </span>
                            <div class="invalid-feedback">
                                Passwords isn't correct!
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' name='buttonSubmit' id='buttonLogin' class='form__button_submit btn btn-secondary w-100'>Sign in</button>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?php echo $error ?>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<script> <?php include_once('static/js/showPassword.js'); ?></script>