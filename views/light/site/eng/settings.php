<div class="settings_block">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 p-0" id="settingsMenu">
                <div class="d-flex flex-column align-items-center align-items-sm-start text-white min-vh-100">
                    <div class="w-100" id="userBlock">
                        <a href="#" class="d-flex flex-column align-items-center justify-content-between text-dark text-decoration-none" id="userAvatar">
                            <?php
                            if (false) {
                                echo "<img 
                                        src='$userImgPath' 
                                        alt='default_user_img' 
                                        class='rounded-circle m-2' 
                                        id='avatarImg'
                                        title='$userName'>";
                                echo '<span class="d-none d-sm-inline mb-2 h3">' . $userName . '</span>';
                            } else {
                                echo "<img 
                                        src='/static/img/default_user_img.jpg' 
                                        alt='default_user_img' 
                                        class='rounded-circle m-2' 
                                        id='avatarImg'
                                        title='userName'>";
                                echo '<span class="d-none d-md-inline mb-2 h3">fsdfsdf</span>';
                            }
                            ?>
                        </a>
                    </div>
                    <ul class="nav nav-pills d-flex flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100">
                        <li class="nav-item w-100" id="settingsItem">
                            <a href="#" class="nav-link link-dark align-middle px-0 d-flex justify-content-center align-items-center activeItem" id="settingsLink">
                                <i class="fs-4 bi-person-circle"></i> <span class="ms-1 d-none d-sm-inline">Account</span>
                            </a>
                        </li>
                        <li class="nav-item w-100" id="settingsItem">
                            <a href="#" class="nav-link link-dark align-middle px-0 d-flex justify-content-center align-items-center" id="settingsLink">
                                <i class="fs-4 bi-laptop"></i> <span class="ms-1 d-none d-sm-inline">Appearance</span>
                            </a>
                        </li>
                        <li class="nav-item w-100" id="settingsItem">
                            <a href="#" class="nav-link link-dark align-middle px-0 d-flex justify-content-center align-items-center" id="settingsLink">
                                <i class="fs-4 bi-door-open"></i> <span class="ms-1 d-none d-sm-inline">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col p-4" id="contentContainer">
                <div class="d-flex flex-column" id="accountSettings">
                    <h3 class="h3 border-bottom pb-2">Account settings</h3>
                    <form action="" method="post" enctype="multipart/form-data" id="accountForm" class="my-2">
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="settings-group">
                                <label for="textFirstName" id="labelFirstName" class="label">First name</label>
                                <?php
                                if (false) {

                                } else {
                                    echo '<input type="text" name="textFirstName" id="textFirstName" class="input form__text_first_name form-control h-25" 
                                        aria-describedby="firstNameHelpBlock">';
                                }
                                ?>
                                <div id="firstNameHelpBlock" class="form-text text-wrap">
                                    Your first name mustn't contain numbers and has length less than 2.
                                </div>
                            </div>

                            <div class="settings-group">
                                <label for="textLastName" id="labelLastName" class="label">Last name</label>
                                <?php
                                if (false) {

                                } else {
                                    echo '<input type="text" name="textLastName" id="textLastName" class="input form__text_last_name form-control h-25" 
                                        aria-describedby="lastNameHelpBlock">';
                                }
                                ?>
                                <div id="lastNameHelpBlock" class="form-text text-wrap">
                                    Your last name mustn't contain numbers and has length less than 2.
                                </div>
                            </div>

                            <div class="settings-group">
                                <label for="email" id="labelEmail" class="label">Email</label>
                                <?php
                                if (false) {

                                } else {
                                    echo '<input type="email" name="email" id="email" class="input form__email form-control h-25" 
                                        aria-describedby="emailHelpBlock">';
                                }
                                ?>
                                <div id="emailHelpBlock" class="form-text text-wrap">
                                    Your email must be written in appropriate format.
                                </div>
                            </div>

                            <div class="settings-group">
                                <label for="phoneNumber" id="labelPhoneNumber" class="label">Phone number</label>
                                <?php
                                if (false) {

                                } else {
                                    echo '<input type="text" name="phoneNumber" id="phoneNumber" class="input form__phone_number form-control h-25" 
                                            aria-describedby="phoneNumberHelpBlock">';
                                }
                                ?>
                                <div id="phoneNumberHelpBlock" class="form-text text-wrap">
                                    Your phone number must be written in appropriate format.
                                </div>
                            </div>

                            <div class="settings-group" id="textareaGroup">
                                <label for="textareaBio" id="labelTextarea" class="label">Bio</label>

                                <?php
                                if (false) {

                                } else {
                                    echo '<textarea class="input form-control" id="textareaBio" rows="3" aria-describedby="bioHelpBlock"></textarea>';
                                }
                                ?>
                                <div id="bioHelpBlock" class="form-text text-wrap">
                                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                </div>
                            </div>

                            <div class="settings-group" id="buttonGroup">
                                <?php
                                if (false) {

                                } else {
                                    echo '<button class="btn btn-secondary ms-0" id="buttonUpdate" type="submit">Update</button>';
                                    echo '<button class="btn btn-light btn-outline-secondary me-0" id="buttonCancel" type="submit">Cancel</button>';
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>

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

                <div id="logoutSettings">
                    <div class="d-flex flex-column" id="logoutSettings">
                        <h3 class="h3">Logout settings</h3>
                        <div class="d-flex flex-column">
                            <p id="textButtonLogout" class="text-black text-wrap">Are you sure to logout?</p>
                            <?php
                            if (false) {

                            } else {
                                echo '<button class="btn btn-danger" id="buttonLogout" type="submit">Logout</button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script> <?php include_once('static/js/settings.js'); ?></script>
<script> <?php include_once('static/js/validation.js'); ?></script>
