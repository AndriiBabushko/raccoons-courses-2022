<?php
/**
 * @var array $errors
 * @var array $model
 * @var bool $registerSuccessful
 */
?>

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="formContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative py-3" id="authForm">
                <div id="authImg"></div>

                <div class="" id="content">
                    <h3 class="h3 my-2 text-center title">Join to our Raccoons' team!</h3>

                    <div class="form-group mb-3">
                        <label for="textFirstName" id="labelFirstName" class="form__label_first_name form-label label">First name</label>
                        <input type='text' name='first_name' id='textFirstName' class='input form__text_first_name form-control form-control-lg'
                               placeholder="Enter first name" value="<?php if (!empty($model['first_name'])) echo $model['first_name'] ?>">
                        <div class="invalid-feedback">
                            Contain numbers or length is less than 2.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textLastName" id="labelLastName" class="form__label_last_name form-labe label">Last name</label>
                        <input type='text' name='last_name' id='textLastName' class='input form__text_last_name form-control form-control-lg'
                               placeholder="Enter last name" value="<?php if (!empty($model['last_name'])) echo $model['last_name'] ?>">
                        <div class="invalid-feedback">
                            Contain numbers or length is less than 2.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" id="labelEmail" class="form__label_email form-label label">Email</label>

                        <?php
                        if (!empty($errors)) {
                            echo "<input type='email' name='email' id='email' class='input form__email form-control form-control-lg is-invalid' 
                                placeholder='example@abc.com' value='$model[email]'>";
                            echo "<div class='invalid-feedback'>" . $errors['email'] . "</div>";
                        } else {
                            if (!empty($model))
                                echo "<input type='email' name='email' id='email' class='input form__email form-control form-control-lg' 
                                    placeholder='example@abc.com' value='$model[email]'>";
                            else
                                echo "<input type='email' name='email' id='email' class='input form__email form-control form-control-lg' 
                                    placeholder='example@abc.com'>";
                            echo "<div class='invalid-feedback'>Email isn't correct!</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phoneNumber" id="labelPhoneNumber" class="form__label_phone_number form-label label">Phone number</label>
                        <input type='tel' name='phone_number' id='phoneNumber' class='input form__phone_number form-control form-control-lg'
                               placeholder="+380931234567" value="<?php if (!empty($model['phone_number'])) echo $model['phone_number'] ?>">
                        <div class="invalid-feedback">
                            Phone number isn't correct!
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
                                Passwords don't match!
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirmPassword" id="labelConfirmPassword" class="form__label_confirm_password form-label label">Confirm password</label>
                        <div class="input-group">
                            <input type='password' name='confirm_password' id='confirmPassword' class='input form__confirm_password form-control form-control-lg'
                                   placeholder="Confirm password">
                            <span class="input-group-text showPassword">
                                <i class="bi bi-eye-slash fs-4"></i>
                            </span>
                            <div class="invalid-feedback h-auto">
                                Passwords don't match!
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <button type='submit' name='buttonSubmit' id='buttonRegister' class='form__button_submit btn btn-secondary'>Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script> <?php include_once('static/js/validation.js'); ?></script>
<script> <?php include_once('static/js/showPassword.js'); ?></script>
