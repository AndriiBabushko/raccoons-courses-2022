<?php
/**
 * @var models\User $user
 * @var array $categories
 */

$goodsCount = 0;

if(!empty($user)) {
    $cartGoods = \models\Cart::getCartGoodsByUserID($user['id_user']);
    if ($cartGoods)
        $goodsCount = count(unserialize($cartGoods));
}
?>

<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container justify-content-center justify-content-sm-between">
            <div class="d-flex flex-wrap justify-content-center  align-items-center">
                <img src="/static/img/site/raccoon-logo-1.png" alt="logo" width="50" height="50" class="img-fluid" id="headerLogo">
                <a href='/site/ukr/index' class='navbar-brand text-wrap ps-2'>Raccourses</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class='nav-item'>
                        <a class='nav-link' href='/courses/ukr/index' data-toggle='tooltip' data-placement='top' title='Курси'>
                            <span class="nav-block">
                                <i class="bi bi-bag fs-4"></i>
                                Курси
                            </span>
                        </a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link' href='/category/ukr/index' data-toggle='tooltip' data-placement='top' title='Категорії'>
                            <span class="nav-block">
                                <i class="bi bi-grid fs-4"></i>
                                Категорії
                            </span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <?php if (!empty($user)): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='/cart/ukr/index' data-toggle='tooltip' data-placement='top' title='Кошик'>
                                <span class="nav-block">
                                    <div>
                                        <span class='badge badge-pill bg-secondary'>
                                            <?php echo $goodsCount; ?>
                                        </span>
                                        <span><i class='bi bi-cart fs-4'></i></span>
                                    </div>
                                    Кошик
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (empty($user)): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='/user/ukr/login' data-toggle='tooltip' data-placement='top' title='Логін'>
                                <span class="nav-block">
                                    <i class='bi bi-box-arrow-in-left fs-4'></i>
                                    Логін
                                </span>
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link' href='/user/ukr/register' data-toggle='tooltip' data-placement='top' title='Реєстрація'>
                                <span class="nav-block">
                                    <i class='bi bi-person-plus fs-4'></i>
                                    Реєстрація
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class='nav-link' href='/settings/ukr/index' data-toggle='tooltip' data-placement='top' title='Налаштування'>
                            <span class="nav-block">
                                <i class='bi bi-gear fs-4'></i>
                                Налаштування
                            </span>
                        </a>
                    </li>

                    <?php if (!empty($user)): ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='/user/ukr/logout' data-toggle='tooltip' data-placement='top' title='Вийти(у вікно)'>
                                <span class="nav-block">
                                    <i class='bi bi-box-arrow-right fs-4'></i>
                                    Вийти
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
