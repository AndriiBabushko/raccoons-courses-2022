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
<div class="settings_block">
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data" id="accountForm" class="">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 p-0" id="settingsMenu">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <div class="w-100" id="userBlock">
                            <div class="d-flex flex-column align-items-center justify-content-center" id="userAvatar">
                                <label class="label">
                                    <input type="file" name="avatar" accept="image/jpg, image/png">

                                    <div class="d-flex flex-column align-items-center justify-content-between" id="userAvatarBlock">
                                        <?php

                                        $userName = "Unknown user";
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
                                                    title='Unknown user'>
                                            <div class="" id="figCaption">
                                                <i class="bi bi-camera text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </label>
                                <span class='d-none d-md-inline mb-2 h3 text-dark text-center'>
                                <?php echo $userName; ?>
                            </span>
                            </div>
                        </div>
                        <ul class="nav nav-pills d-flex flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100">
                            <?php if (!empty($user)): ?>
                                <li class="nav-item w-100 settings-item">
                                    <a href="#" class="nav-link settings-link link-dark align-middle px-0 d-flex justify-content-center align-items-center activeItem">
                                        <i class="fs-4 bi-person-circle"></i> <span class="ms-1 d-none d-sm-inline">Account</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item w-100 settings-item">
                                <a href="#" class="nav-link settings-link link-dark align-middle px-0 d-flex justify-content-center align-items-center">
                                    <i class="fs-4 bi-laptop"></i> <span class="ms-1 d-none d-sm-inline">Appearance</span>
                                </a>
                            </li>
                            <?php if (!empty($user)): ?>
                                <li class="nav-item w-100 settings-item">
                                    <a href="#" class="nav-link settings-link link-dark align-middle px-0 d-flex justify-content-center align-items-center">
                                        <i class="fs-4 bi-door-open"></i> <span class="ms-1 d-none d-sm-inline">Logout</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col p-4" id="contentContainer">
                    <?php if (!empty($user)): ?>
                        <div class="d-flex flex-column" id="accountSettings">
                            <h3 class="h3 border-bottom pb-2">Account settings</h3>
                            <div class="d-flex flex-wrap justify-content-between my-2">
                                <div class="settings-group position-relative">
                                    <label for="textFirstName" id="labelFirstName" class="label">First name</label>
                                    <input type="text" name="first_name" id="textFirstName" class="input form__text_first_name form-control form-control-lg h-25"
                                           aria-describedby="firstNameHelpBlock" value="<?php echo trim($user['first_name']); ?>">

                                    <div id="firstNameHelpBlock" class="form-text text-wrap">
                                        Your first name mustn't contain numbers and has length less than 2.
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <label for="textLastName" id="labelLastName" class="label">Last name</label>
                                    <input type="text" name="last_name" id="textLastName" class="input form__text_last_name form-control form-control-lg h-25"
                                           aria-describedby="lastNameHelpBlock" value="<?php echo trim($user['last_name']); ?>">

                                    <div id="lastNameHelpBlock" class="form-text text-wrap">
                                        Your last name mustn't contain numbers and has length less than 2.
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <label for="email" id="labelEmail" class="label">Email</label>
                                    <input type="email" name="email" id="email" class="input form__email form-control form-control-lg h-25"
                                           aria-describedby="emailHelpBlock" value="<?php echo trim($user['email']); ?>">

                                    <div id="emailHelpBlock" class="form-text text-wrap">
                                        Your email must be written in appropriate format.
                                    </div>
                                </div>

                                <div class="settings-group">
                                    <label for="phoneNumber" id="labelPhoneNumber" class="label">Phone number</label>
                                    <input type="tel" name="phone_number" id="phoneNumber" class="input form__phone_number form-control form-control-lg h-25"
                                           aria-describedby="phoneNumberHelpBlock" value="<?php echo trim($user['phone_number']); ?>">

                                    <div id="phoneNumberHelpBlock" class="form-text text-wrap">
                                        Your phone number must be written in appropriate format.
                                    </div>
                                </div>

                                <div class="settings-group" id="textareaGroup">
                                    <label for="textareaBio" id="labelTextarea" class="label">Bio</label>
                                    <textarea class="input form-control" name="bio" id="textareaBio"
                                              rows="3" aria-describedby="bioHelpBlock"><?php echo trim($user['bio']); ?></textarea>

                                    <div id="bioHelpBlock" class="form-text text-wrap">
                                        This is your bio. You can write here any information about yourself.
                                    </div>
                                </div>

                                <div class="settings-group" id="buttonGroup">
                                    <button class="btn btn-primary btn-outline-light" id="buttonUpdate" type="submit">Update user</button>
                                    <a class="btn btn-danger btn-outline-light" id="buttonDelete" href="/settings/eng/deleteUser">Delete user</a>
                                    <button class="btn btn-secondary" id="buttonClear" type="button">Clear fields</button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div id="appearanceSettings">
                        <div class="d-flex flex-column w-100">
                            <h3 class="h3 border-bottom pb-2">Appearance settings</h3>
                            <div class="d-flex flex-wrap flex-column justify-content-between" id="appearanceSettingsMenu">
                                <div class="d-flex flex-column my-2">
                                    <p id="textLanguageDropdown" class="text-black text-wrap tex">Choose language</p>
                                    <div class="dropdown">
                                        <a
                                                class="btn btn-light dropdown-toggle mt-1"
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
                                                alt="United Kingdom">
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
                                                alt="Ukraine">
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
                                        <ul class="dropdown-menu" aria-labelledby="languageDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item" href="?language=eng">
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
                                                <a class="dropdown-item" href="?language=ukr">
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
                                    <p id="textThemeDropdown" class="text-black text-wrap">Choose theme</p>
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
                                        <ul class="dropdown-menu" aria-labelledby="themeDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item" href="?theme=light">
                                                    <?php outputLightTheme(); ?>
                                                    Light
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
                                                <a class="dropdown-item" href="?theme=dark">
                                                    <?php outputDarkTheme(); ?>
                                                    Dark
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
                                <h3 class="h3">Logout settings</h3>
                                <div class="d-flex flex-column">
                                    <p id="textButtonLogout" class="text-black text-wrap">Are you sure to logout?</p>
                                    <a href="/user/eng/logout" class="btn btn-danger" id="buttonLogout">Logout</a>
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