<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>

    <!--    ====================================================================================================================-->
    <link rel="icon" href="/static/img/raccoon-logo-1.png">
    <!--    ====================================================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--    ====================================================================================================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--    ====================================================================================================================-->
    <link rel="stylesheet" href="/static/styles/css/light_theme.css?v=<?php echo time(); ?>">
    <!--    ====================================================================================================================-->
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
        <div class="container">
            <img src="/static/img/raccoon-logo-1.png" alt="logo" width="50" height="50" class="img-fluid">
            <a href="/" class="navbar-brand pl-2 text-wrap">Raccoon's Programming Courses</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class='nav-item'>
                        <a class='nav-link' href='#'>Courses</a>
                    </li>
                    <?php
                    if (true) {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='#'>Admin page</a>
                        </li>
                        ";
                    }
                    ?>
                </ul>
                <ul class="navbar-nav">
                    <?php
                    if (false) {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='#'>
                                <span class='badge badge-pill bg-danger'>0</span>
                                <span><i class='bi bi-cart fs-4'></i></span>
                            </a>
                        </li>
                        ";
                        echo "
                        <li class='nav-item'>
                             <a class='nav-link' href='#'>
                                <span><i class='bi bi-box-arrow-right fs-4'></i></span>
                             </a>
                        </li>
                        ";
                    } else {
                        echo "
                        <li class='nav-item'> 
                             <a class='nav-link' href='/user/form' data-toggle='tooltip' data-placement='top' title='Login'>
                                <span><i class='bi bi-box-arrow-in-left fs-4'></i></span>
                             </a>
                        </li>
                        ";
                    }
                    ?>
                    <li class="nav-item dropdown">
                        <a
                                class="nav-link dropdown-toggle mt-1"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <?php
                            if (isset($_GET['language'])) {
                                if ($_GET['language'] == 'eng') {
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

                                if ($_GET['language'] == 'ukr') {
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
                            }
                            ?>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="?language=eng">
                                    <img
                                            src="https://flagcdn.com/24x18/gb.png"
                                            srcset="https://flagcdn.com/48x36/gb.png 2x,
                                            https://flagcdn.com/72x54/gb.png 3x"
                                            width="24"
                                            height="18"
                                            alt="United Kingdom">
                                    English
                                    <?php
                                    if (!isset($_GET['language']))
                                        echo '<i class="bi bi-check text-success fs-4"></i>';
                                    else {
                                        if ($_GET['language'] == 'eng')
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
                                    <img
                                            src="https://flagcdn.com/24x18/ua.png"
                                            srcset="https://flagcdn.com/48x36/ua.png 2x,
                                            https://flagcdn.com/72x54/ua.png 3x"
                                            width="24"
                                            height="18"
                                            alt="Ukraine">
                                    Українська
                                    <?php
                                    if (isset($_GET['language']) && $_GET['language'] == 'ukr')
                                        echo '<i class="bi bi-check text-success fs-4"></i>';
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/site/settings">
                            <span><i class="bi bi-gear fs-4"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main role="main" class="main">
    <?php echo $content ?>
</main>

<footer class="text-center text-white footer">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Google -->
            <a
                    class="btn text-white btn-floating m-1"
                    style="background-color: #dd4b39;"
                    href="/"
                    role="button"
                    target="_blank"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Google"
            >
                <i class="bi bi-google fs-5"></i>
            </a>

            <!-- Facebook -->
            <a
                    class="btn text-white btn-floating m-1"
                    style="background-color: #3b5998;"
                    href="https://www.facebook.com/andrey.babushko/"
                    role="button"
                    target="_blank"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Facebook"
            >
                <i class="bi bi-facebook fs-5"></i>
            </a>

            <!-- Telegram -->
            <a
                    class="btn text-white btn-floating m-1"
                    style="background-color: #55acee;"
                    href="https://t.me/AndiiRaccoon"
                    role="button"
                    target="_blank"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Telegram"
            >
                <i class="bi bi-telegram fs-5"></i>
            </a>

            <!-- Instagram -->
            <a
                    class="btn text-white btn-floating m-1"
                    style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%); border: none;"
                    href="https://www.instagram.com/andy.raccoon/"
                    role="button"
                    target="_blank"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Instagram"

            >
                <i class="bi bi-instagram fs-5"></i>
            </a>

            <!-- Github -->
            <a
                    class="btn text-white btn-floating m-1"
                    style="background-color: #333333;"
                    href="https://github.com/AndriiBabushko/raccoons-courses-2022"
                    role="button"
                    target="_blank"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Github"
            >
                <i class="bi bi-github fs-5"></i>
            </a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="https://github.com/AndriiBabushko/Frontend">Andrii Babushko</a>
    </div>
    <!-- Copyright -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
</script>
</body>
</html>
