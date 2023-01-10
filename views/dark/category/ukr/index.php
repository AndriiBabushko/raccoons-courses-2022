<?php
/**
 * @var array $categories ;
 */

use models\User;

$user = null;
if (User::isUserAuth())
    $user = User::getCurrentAuthUser();
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-xl-2 col-lg-2 col-md-3 col-sm-12 p-0" id="sidebarCol">
            <nav class="navbar navbar-light navbar-bg" id="sidebar">
                <div class="w-100 py-2 text-white" id="sidebarNav">
                    <ul class="navbar-nav" id="sidebarUl">
                        <li class="nav-item w-100">
                            <div class="mx-2 mb-5 text-start fs-5 fw-normal" role="search" id="searchBlock">
                                <input type="search" name="search" class="form-control bg-dark text-white me-2" id="search" placeholder="Пошук" aria-label="Search">
                            </div>
                        </li>

                        <li class="nav-item w-100">
                            <div class="mx-2 mb-2 text-start fs-5 fw-normal">
                                <select class="form-select bg-dark text-white" name="orderBy" id="orderBy">
                                    <option selected>Впорядкувати за</option>
                                    <option value="name">Назвою</option>
                                    <option value="description">Описом</option>
                                </select>
                            </div>
                        </li>

                        <li class="nav-item w-100">
                            <div class="d-flex flex-row flex-md-column justify-content-evenly align-items-center mx-2 text-start fs-6 fw-normal">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortingType" id="ascendingSort" value="ascendingSort" checked>
                                    <label class="form-check-label" for="ascendingSort">За зростанням</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortingType" id="descendingSort" value="descendingSort">
                                    <label class="form-check-label" for="descendingSort">За спаданням</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="col">
            <div class="row my-2">
                <div class="w-100" id="sidebarToggler">
                    <button class="navbar-toggler text-white" type="button" id="sidebarCollapse">
                        <span class="bi bi-funnel"></span>
                    </button>
                </div>

                <h1 class="title fs-4 text-center text-white pb-2 border-bottom border-2" id="categoryTitle">Наші категорії:</h1>
            </div>

            <?php if (!empty($user) && $user['is_admin'] === 1): ?>
                <div class="row mb-3">
                    <div class="col">
                        <a class="btn btn-success w-100" href="/category/ukr/add">
                            <i class="bi bi-plus-circle"></i>
                            Додати нову категорію
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 g-4" id="cardsContainer">
                <?php foreach ($categories as $category): ?>
                    <div class="col">
                        <div class="card border-2">
                            <img src="/static/img/category/<?php echo $category['photo']; ?>" class="card-img-top" alt="<?php echo $category['photo']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $category['name']; ?></h5>
                                <hr>
                                <p class="card-text"><?php echo $category['description']; ?></p>
                                <a class="btn btn-secondary card-link" href="/courses/ukr/index/<?php echo $category['id_category'] ?>">
                                   Переглянути категорію
                                </a>
                                <?php if (!empty($user) && $user['is_admin'] === 1): ?>
                                    <hr>
                                    <div class="d-flex justify-content-between admin-buttons">
                                        <a class="btn btn-primary" href="/category/ukr/update?id_category=<?php echo $category['id_category'] ?>"><i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-danger" href="/category/ukr/delete?id_category=<?php echo $category['id_category'] ?>"><i class="bi bi-trash"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="row mt-3"></div>
        </div>
    </div>
</div>

<script defer><?php include_once "static/js/sideNavbar.js"; ?></script>
<script defer><?php require_once "static/js/sort.js"; ?></script>
<script defer><?php require_once "static/js/sortCategories.js"; ?></script>
