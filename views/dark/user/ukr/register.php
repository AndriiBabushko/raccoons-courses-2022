<?php
/**
 * @var array $errors
 * @var array $model
 * @var bool $registerSuccessful
 */
?>

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center align-items-center" id="formContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative py-3"
                  id="registerForm">
                <div id="authImg"></div>

                <div class="text-white" id="content">
                    <h3 class="h3 my-2 text-center title">Приєднуйтесь до нашої команди Єнотів!</h3>

                    <div class="form-group mb-3">
                        <label for="textFirstName" id="labelFirstName" class="form__label_first_name form-label label">Ім'я</label>
                        <input type='text' name='first_name' id='textFirstName' class='input form__text_first_name form-control form-control-lg bg-dark text-white username'
                               placeholder="Введіть ім'я" value="<?php if (!empty($model['first_name'])) echo $model['first_name'] ?>">
                        <div class="invalid-feedback">
                            Містить числа або довжина менша за 2.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textLastName" id="labelLastName" class="form__label_last_name form-labe label">Прізвище</label>
                        <input type='text' name='last_name' id='textLastName' class='input form__text_last_name form-control form-control-lg bg-dark text-white'
                               placeholder="Введіть прізвище" value="<?php if (!empty($model['last_name'])) echo $model['last_name'] ?>">
                        <div class="invalid-feedback">
                            Містить числа або довжина менша за 2.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" id="labelEmail" class="form__label_email form-label label">Електронна пошта</label>

                        <?php
                        if (!empty($errors)) {
                            echo "<input type='email' name='email' id='email' class='input form__email form-control form-control-lg bg-dark text-white is-invalid' 
                                placeholder='example@abc.com' value='$model[email]'>";
                            echo "<div class='invalid-feedback'>" . $errors['email'] . "</div>";
                        } else {
                            if (!empty($model))
                                echo "<input type='email' name='email' id='email' class='input form__email form-control form-control-lg bg-dark text-white' 
                                    placeholder='example@abc.com' value='$model[email]'>";
                            else
                                echo "<input type='email' name='email' id='email' class='input form__email form-control form-control-lg bg-dark text-white' 
                                    placeholder='example@abc.com'>";
                            echo "<div class='invalid-feedback'>Електронна пошта неправильна!</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phoneNumber" id="labelPhoneNumber" class="form__label_phone_number form-label label">Номер телефону</label>
                        <input type='tel' name='phone_number' id='phoneNumber' class='input form__phone_number form-control form-control-lg bg-dark text-white'
                               placeholder="+380931234567" value="<?php if (!empty($model['phone_number'])) echo $model['phone_number'] ?>">
                        <div class="invalid-feedback">
                            Номер телефону не правильний!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" id="labelPassword" class="form__label_password form-label label">Пароль</label>
                        <div class="input-group">
                            <input type='password' name='password' id='password' class='input form__password form-control form-control-lg bg-dark text-white'
                                   placeholder="Введіть пароль">
                            <span class="input-group-text showPassword bg-dark text-white">
                                <i class="bi bi-eye-slash fs-4"></i>
                            </span>
                            <div class="invalid-feedback">
                                Паролі не збігаються!
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirmPassword" id="labelConfirmPassword" class="form__label_confirm_password form-label label">Confirm password</label>
                        <div class="input-group">
                            <input type='password' name='confirm_password' id='confirmPassword' class='input form__confirm_password form-control form-control-lg bg-dark text-white'
                                   placeholder="Підтвердьте пароль">
                            <span class="input-group-text showPassword bg-dark text-white">
                                <i class="bi bi-eye-slash fs-4"></i>
                            </span>
                            <div class="invalid-feedback h-auto">
                                Паролі не збігаються!
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between">
                        <button type='submit' name='buttonSubmit' id='buttonRegister' class='form__button_submit btn btn-secondary'>Зареєструватися</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script> <?php include_once('static/js/validation.js'); ?></script>
<script> <?php include_once('static/js/showPassword.js'); ?></script>
