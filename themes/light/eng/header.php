<?php
/**
 * @var models\User $user
 * @var array $categories
 */
?>

<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container justify-content-center justify-content-sm-between">
            <div class="d-flex flex-wrap justify-content-center  align-items-center">
                <img src="/static/img/site/raccoon-logo-1.png" alt="logo" width="50" height="50" class="img-fluid" id="headerLogo">
                <a href='/site/eng/index' class='navbar-brand text-wrap ps-2'>Raccourses</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class='nav-item'>
                        <a class='nav-link' href='/courses/eng/index' data-toggle='tooltip' data-placement='top' title='Courses'>
                            <span class="nav-block">
                                <i class="bi bi-bag fs-4"></i>
                                Courses
                            </span>
                        </a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link' href='/category/eng/index' data-toggle='tooltip' data-placement='top' title='Categories'>
                            <span class="nav-block">
                                <i class="bi bi-grid fs-4"></i>
                            Category
                            </span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <?php if (!empty($user)): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='/courses/eng/cart' data-toggle='tooltip' data-placement='top' title='Cart'>
                                <span class="nav-block">
                                    <div>
                                        <span class='badge badge-pill bg-secondary'>0</span>
                                        <span><i class='bi bi-cart fs-4'></i></span>
                                    </div>
                                    Cart
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (empty($user)): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='/user/eng/login' data-toggle='tooltip' data-placement='top' title='Login'>
                                <span class="nav-block">
                                    <i class='bi bi-box-arrow-in-left fs-4'></i>
                                    Login
                                </span>
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link' href='/user/eng/register' data-toggle='tooltip' data-placement='top' title='Register'>
                                <span class="nav-block">
                                    <i class='bi bi-person-plus fs-4'></i>
                                    Register
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class='nav-link' href='/settings/eng/index' data-toggle='tooltip' data-placement='top' title='Settings'>
                            <span class="nav-block">
                                <i class='bi bi-gear fs-4'></i>
                                Settings
                            </span>
                        </a>
                    </li>

                    <?php if (!empty($user)): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='/user/eng/logout' data-toggle='tooltip' data-placement='top' title='Logout'>
                                <span class="nav-block">
                                    <i class='bi bi-box-arrow-right fs-4'></i>
                                    Logout
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
