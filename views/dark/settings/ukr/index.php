<?php

use models\User;

/**
 * @var bool $updateStatus
 * @var bool $deleteStatus
 * @var string $language
 * @var string $theme
 */

$user = null;

if (User::isUserAuth())
    $user = User::getCurrentAuthUser();
?>
<div class="settings_block text-white h-100">
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data" id="accountForm" class="h-100">
            <div class="row flex-nowrap h-100">
                <div class="col-auto col-md-3 col-xl-2 p-0" id="settingsMenu">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <div class="w-100" id="userBlock">
                            <div class="d-flex flex-column align-items-center justify-content-center" id="userAvatar">
                                <label class="label">
                                    <input type="file" name="avatar" accept="image/jpg, image/png">

                                    <div class="d-flex flex-column align-items-center justify-content-between" id="userAvatarBlock">
                                        <?php

                                        $userName = "Невідомий користувач";
                                        if (!empty($user)):
                                            $userName = ucfirst($user['first_name']) . " " . ucfirst($user['last_name'])
                                            ?>
                                            <img
                                                    src='/static/img/<?php if ($user['avatar'] === 'default_user_img.png') echo $user['avatar']; else echo 'user/' . $user['avatar']; ?>'
                                                    alt='<?php echo $userName ?>'
                                                    class='rounded-circle'
                                                    id='avatarImg'
                                                    title='<?php echo $userName ?>'>
                                            <div class="" id="figCaption">
                                                <i class="bi bi-camera text-white"></i>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (empty($user)): ?>
                                            <img
                                                    src='/static/img/default_user_img.png'
                                                    alt='default_user_img'
                                                    class='rounded-circle'
                                                    id='avatarImg'
                                                    title='Невідомий користувач'>
                                            <div class="" id="figCaption">
                                                <i class="bi bi-camera text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </label>
                                <span class='d-none d-md-inline mb-2 h3 text-light text-center'>
                                <?php echo $userName; ?>
                            </span>
                            </div>
                        </div>
                        <ul class="nav nav-pills d-flex flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100">
                            <?php if (!empty($user)): ?>
                                <li class="nav-item w-100 settings-item">
                                    <a href="#" class="nav-link settings-link link-light align-middle px-0 d-flex justify-content-center align-items-center activeItem">
                                        <i class="fs-4 bi-person-circle"></i> <span class="ms-1 d-none d-sm-inline">Аккаунт</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item w-100 settings-item">
                                <a href="#" class="nav-link settings-link link-light align-middle px-0 d-flex justify-content-center align-items-center">
                                    <i class="fs-4 bi-laptop"></i> <span class="ms-1 d-none d-sm-inline">Зовнішній вигляд</span>
                                </a>
                            </li>
                            <?php if (!empty($user)): ?>
                                <li class="nav-item w-100 settings-item">
                                    <a href="#" class="nav-link settings-link link-light align-middle px-0 d-flex justify-content-center align-items-center">
                                        <i class="fs-4 bi-door-open"></i> <span class="ms-1 d-none d-sm-inline">Вийти</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col p-4" id="contentContainer">
                    <?php if (!empty($user)): ?>
                        <div class="d-flex flex-column" id="accountSettings">
                            <h3 class="h3 border-bottom pb-2">Налаштування профілю</h3>
                            <div class="d-flex flex-wrap justify-content-between my-2">
                                <div class="settings-group position-relative">
                                    <label for="textFirstName" id="labelFirstName" class="label">Ім'я</label>
                                    <input type="text" name="first_name" id="textFirstName" class="input form__text_first_name form-control form-control-lg bg-dark text-light h-25"
                                           aria-describedby="firstNameHelpBlock" value="<?php echo trim($user['first_name']); ?>">

                                    <div id="firstNameHelpBlock" class="form-text text-wrap">
                                        Ваше ім'я не повинно містити цифр і мати довжину менше ніж 2.
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <label for="textLastName" id="labelLastName" class="label">Прізвище</label>
                                    <input type="text" name="last_name" id="textLastName" class="input form__text_last_name form-control form-control-lg bg-dark text-light h-25"
                                           aria-describedby="lastNameHelpBlock" value="<?php echo trim($user['last_name']); ?>">

                                    <div id="lastNameHelpBlock" class="form-text text-wrap">
                                        Ваше прізвище не повинно містити цифр і мати довжину менше ніж 2.
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <label for="email" id="labelEmail" class="label">Електронна пошта</label>
                                    <input type="email" name="email" id="email" class="input form__email form-control form-control-lg bg-dark text-light h-25"
                                           aria-describedby="emailHelpBlock" value="<?php echo trim($user['email']); ?>">

                                    <div id="emailHelpBlock" class="form-text text-wrap">
                                        Ваша електронна пошта має бути написана у відповідному форматі.
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <label for="phoneNumber" id="labelPhoneNumber" class="label">Номер телефону</label>
                                    <input type="tel" name="phone_number" id="phoneNumber" class="input form__phone_number form-control form-control-lg bg-dark text-light h-25"
                                           aria-describedby="phoneNumberHelpBlock" value="<?php echo trim($user['phone_number']); ?>">

                                    <div id="phoneNumberHelpBlock" class="form-text text-wrap">
                                        Ваш номер телефону повинен бути написаний у відповідному форматі.
                                    </div>
                                </div>

                                <div class="settings-group" id="textareaGroup">
                                    <label for="textareaBio" id="labelTextarea" class="label">Bio</label>
                                    <textarea class="input form-control bg-dark text-light" name="bio" id="textareaBio"
                                              rows="3" aria-describedby="bioHelpBlock"><?php echo trim($user['bio']); ?></textarea>

                                    <div id="bioHelpBlock" class="form-text text-wrap">
                                        Це твоя біографія. Тут ви можете написати будь-яку інформацію про себе.
                                    </div>
                                </div>

                                <div class="settings-group" id="buttonGroup">
                                    <button class="btn btn-primary btn-outline-light" id="buttonUpdate" type="submit">Оновити профіль</button>
                                    <a class="btn btn-danger btn-outline-light" id="buttonDelete" href="/settings/ukr/deleteUser">Видалити профіль</a>
                                    <button class="btn btn-secondary" id="buttonClear" type="button">Очистити поля</button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div id="appearanceSettings">
                        <div class="d-flex flex-column w-100">
                            <h3 class="h3 border-bottom pb-2">Налаштування зовнішнього вигляду</h3>
                            <div class="d-flex flex-wrap flex-column justify-content-between" id="appearanceSettingsMenu">
                                <div class="d-flex flex-column my-2">
                                    <p id="textLanguageDropdown" class="text-black text-wrap tex">Виберіть мову</p>
                                    <div class="dropdown">
                                        <a
                                                class="btn btn-secondary dropdown-toggle mt-1"
                                                href=""
                                                id="languageDropdownMenuLink"
                                                role="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                        >
                                            <?php
                                            function outputEngFlag(): void
                                            {
                                                echo '
                                            <img
                                                src="https://flagcdn.com/24x18/gb.png"
                                                srcset="https://flagcdn.com/48x36/gb.png 2x,
                                                https://flagcdn.com/72x54/gb.png 3x"
                                                width="24"
                                                height="18"
                                                alt="Великобританія">
                                            ';
                                            }

                                            function outputUaFlag(): void
                                            {
                                                echo '
                                            <img
                                                src="https://flagcdn.com/24x18/ua.png"
                                                srcset="https://flagcdn.com/48x36/ua.png 2x,
                                                https://flagcdn.com/72x54/ua.png 3x"
                                                width="24"
                                                height="18"
                                                alt="Україна">
                                            ';
                                            }


                                            if (!empty($language)) {
                                                if (isset($_GET['language']) && $_GET['language'] == 'eng' || $language == 'eng')
                                                    outputEngFlag();

                                                if (isset($_GET['language']) && $_GET['language'] == 'ukr' || $language == 'ukr')
                                                    outputUaFlag();
                                            } else
                                                outputEngFlag();
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu bg-dark" aria-labelledby="languageDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item text-light" href="?language=eng">
                                                    <?php outputEngFlag(); ?>
                                                    English
                                                    <?php
                                                    if (!isset($_GET['language']) && empty($language))
                                                        echo '<i class="bi bi-check text-success fs-4"></i>';
                                                    else {
                                                        if (isset($_GET['language']) && $_GET['language'] == 'eng' || !empty($language) && $language == 'eng')
                                                            echo '<i class="bi bi-check text-success fs-4"></i>';
                                                    }
                                                    ?>
                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider"/>
                                            </li>

                                            <li>
                                                <a class="dropdown-item text-light" href="?language=ukr">
                                                    <?php outputUaFlag(); ?>
                                                    Українська
                                                    <?php
                                                    if (isset($_GET['language']) && $_GET['language'] == 'ukr' || !empty($language) && $language == 'ukr')
                                                        echo '<i class="bi bi-check text-success fs-4"></i>';
                                                    ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex flex-column my-2">
                                    <p id="textThemeDropdown" class="text-black text-wrap">Виберіть тему</p>
                                    <div class="dropdown">
                                        <a
                                                class="btn btn-secondary dropdown-toggle mt-1"
                                                href=""
                                                id="themeDropdownMenuLink"
                                                role="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                        >
                                            <?php
                                            function outputLightTheme(): void
                                            {
                                                echo '
                                            <span><i class="bi bi-circle-fill" style="color: #dedede"></i></span>
                                            ';
                                            }

                                            function outputDarkTheme(): void
                                            {
                                                echo '
                                            <span><i class="bi bi-circle-fill" style="color: #000000"></i></span>
                                            ';
                                            }

                                            if (!empty($theme)) {
                                                if ($theme == 'light')
                                                    outputLightTheme();

                                                if ($theme == 'dark')
                                                    outputDarkTheme();
                                            } else
                                                outputLightTheme();
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu bg-dark" aria-labelledby="themeDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item text-light" href="?theme=light">
                                                    <?php outputLightTheme(); ?>
                                                    Світла
                                                    <?php
                                                    if (!empty($theme) && $theme == 'light')
                                                        echo '<i class="bi bi-check text-success fs-4"></i>';
                                                    ?>
                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider"/>
                                            </li>

                                            <li>
                                                <a class="dropdown-item text-light" href="?theme=dark">
                                                    <?php outputDarkTheme(); ?>
                                                    Темна
                                                    <?php
                                                    if (!empty($theme) && $theme == 'dark')
                                                        echo '<i class="bi bi-check text-success fs-4"></i>';
                                                    ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($user)): ?>
                        <div id="logoutSettings">
                            <div class="d-flex flex-column" id="logoutSettings">
                                <h3 class="h3">Налаштування виходу</h3>
                                <div class="d-flex flex-column">
                                    <p id="textButtonLogout" class="text-black text-wrap">Ви впевнені, що хочете вийти з системи?</p>
                                    <a href="/user/ukr/logout" class="btn btn-danger" id="buttonLogout">Вийти</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>

<script defer> <?php require_once 'static/js/settings.js'; ?></script>
<script defer> <?php require_once 'static/js/validation.js'; ?></script>