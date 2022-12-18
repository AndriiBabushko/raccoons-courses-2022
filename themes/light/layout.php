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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <!--    ====================================================================================================================-->
    <link rel="stylesheet" href="/static/styles/light/css/light_theme.css?v=<?php echo time(); ?>">
    <!--    ====================================================================================================================-->
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
        <div class="container">
            <img src="/static/img/raccoon-logo-1.png" alt="logo" width="50" height="50" class="img-fluid" id="headerLogo">
            <?php
            if (empty($language)) {
                echo "
                <a href='/site/eng/index' class='navbar-brand pl-2 text-wrap'>Raccoon's Programming Courses</a>
                ";
            } else {
                echo "
                <a href='/site/$language/index' class='navbar-brand pl-2 text-wrap'>Raccoon's Programming Courses</a>
                ";
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (true) {
                        if(empty($language)) {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/courses/eng/view'>Courses</a>
                            </li>
                            ";
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/courses/eng/adminPage'>Admin page</a>
                            </li>
                            ";
                        } else {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/courses/$language/view'>Courses</a>
                            </li>
                            ";
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/courses/$language/adminPage'>Admin page</a>
                            </li>
                            ";
                        }
                    } else {
                        if(empty($language)) {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/courses/eng/view'>Courses</a>
                            </li>
                            ";
                        } else {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/courses/$language/view'>Courses</a>
                            </li>
                            ";
                        }
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
                        if (empty($language)) {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/user/eng/login' data-toggle='tooltip' data-placement='top' title='Login'>
                                    <span><i class='bi bi-box-arrow-in-left fs-4'></i></span>
                                </a>
                            </li>
                            ";

                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/user/eng/register' data-toggle='tooltip' data-placement='top' title='Login'>
                                    <span><i class='bi bi-person-plus fs-4'></i></span>
                                </a>
                            </li>
                            ";
                        } else {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/user/$language/login' data-toggle='tooltip' data-placement='top' title='Login'>
                                    <span><i class='bi bi-box-arrow-in-left fs-4'></i></span>
                                </a>
                            </li>
                            ";

                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='/user/$language/register' data-toggle='tooltip' data-placement='top' title='Register'>
                                    <span><i class='bi bi-person-plus fs-4'></i></span>
                                </a>
                            </li>
                            ";
                        }
                    }
                    ?>
                    <li class="nav-item">
                        <?php
                        if (empty($language)) {
                            echo "
                            <a class='nav-link' href='/site/eng/settings' data-toggle='tooltip' data-placement='top' title='Settings'>
                                <span><i class='bi bi-gear fs-4'></i></span>
                            </a>
                            ";
                        } else {
                            echo "
                            <a class='nav-link' href='/site/$language/settings' data-toggle='tooltip' data-placement='top' title='Register'>
                                <span><i class='bi bi-gear fs-4'></i></span>
                            </a>
                            ";
                        }
                        ?>
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
