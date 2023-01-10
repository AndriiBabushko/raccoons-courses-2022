<?php
/**
 * @var array $goods
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
                                <input type="search" name="search" class="form-control bg-dark text-white me-2" id="search" placeholder="Search" aria-label="Search">
                            </div>
                        </li>

                        <li class="nav-item w-100">
                            <div class="mx-2 mb-2 text-start fs-5 fw-normal">
                                <select class="form-select bg-dark text-white" name="orderBy" id="orderBy">
                                    <option selected>Order by</option>
                                    <option value="name">By Name</option>
                                    <option value="price">By Price</option>
                                    <option value="short_description">By Short Description</option>
                                    <option value="comments">By Comments Count</option>
                                </select>
                            </div>
                        </li>

                        <li class="nav-item w-100">
                            <div class="d-flex flex-row flex-md-column justify-content-evenly align-items-center mx-2 text-start fs-6 fw-normal">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortingType" id="ascendingSort" value="ascendingSort" checked>
                                    <label class="form-check-label" for="ascendingSort">Ascending</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortingType" id="descendingSort" value="descendingSort">
                                    <label class="form-check-label" for="descendingSort">Descending</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="col">
            <div class="row my-2">
                <?php if (empty($errors['notExist']) && empty($errors['noGoods']) && empty($errors['somethingWrong'])): ?>
                    <div class="w-100" id="sidebarToggler">
                        <button class="navbar-toggler text-white" type="button" id="sidebarCollapse">
                            <span class="bi bi-funnel"></span>
                        </button>
                    </div>
                <?php endif; ?>

                <h1 class="title fs-4 text-center text-white pb-2 border-bottom border-2" id="productsTitle">All goods:</h1>
            </div>


            <?php if (!empty($user) && $user['is_admin'] === 1 && empty($errors['notExist']) && empty($errors['noGoods']) && empty($errors['somethingWrong'])): ?>
                <div class="row mb-3">
                    <div class="col">
                        <a class="btn btn-success w-100" href="/courses/eng/add">
                            <i class="bi bi-plus-circle"></i>
                            Add new good
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (empty($errors['notExist']) && empty($errors['noGoods']) && empty($errors['somethingWrong'])): ?>
                <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 g-4" id="cardsContainer">
                    <?php foreach ($goods as $good): ?>
                        <div class="col">
                            <div class="card border-2">
                                <?php if ($good['photo'] !== 'no_image.png'): ?>
                                    <img src="/static/img/courses/<?php echo $good['photo']; ?>" class="card-img-top" alt="<?php echo $good['photo']; ?>">
                                <?php endif; ?>
                                <?php if ($good['photo'] === 'no_image.png'): ?>
                                    <img src="/static/img/<?php echo $good['photo']; ?>" class="card-img-top" alt="<?php echo $good['photo']; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $good['name']; ?></h5>
                                    <p class="card-subtitle">Price <span class="price"><?php echo $good['price']; ?></span> UAH</p>
                                    <hr>
                                    <p class="card-text"><?php echo $good['short_description']; ?></p>
                                    <p class="card-text comments-count">
                                        <?php if ($good['comments_count'] == 0): ?>
                                            No comments yet
                                        <?php endif; ?>

                                        <?php if ($good['comments_count'] != 0): ?>
                                            <span class="count"><?php echo $good['comments_count']; ?></span>
                                            <?php if ($good['comments_count'] == 1) echo "comment from user"; else echo "comments from users" ?>
                                        <?php endif; ?>
                                    </p>
                                    <?php if (!empty($user)): ?>
                                        <div class="d-flex justify-content-between view-cart-buttons">
                                            <a class="btn btn-secondary card-link" href="/courses/eng/view/<?php echo $good['id_good']; ?>">
                                                View good
                                            </a>
                                            <a class="btn btn-success card-link" href="/cart/eng/index?id_good=<?php echo $good['id_good']; ?>">
                                                Add to cart
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($user) && $user['is_admin'] === 1): ?>
                                        <hr>
                                        <div class="d-flex justify-content-between admin-buttons">
                                            <a class="btn btn-primary" href="/courses/eng/update?id_good=<?php echo $good['id_good']; ?>"><i class="bi bi-pencil"></i></a>
                                            <a class="btn btn-danger" href="/courses/eng/delete?id_good=<?php echo $good['id_good']; ?>"><i class="bi bi-trash"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['notExist'])): ?>
                <div class="row mt-3">
                    <div class="col">
                        <div class="alert alert-danger my-2 w-100 text-center">
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <?php echo $errors['notExist']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['noGoods'])): ?>
                <div class="row mt-3">
                    <div class="col">
                        <div class="alert alert-warning my-2 w-100 text-center">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <?php echo $errors['noGoods']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['somethingWrong'])): ?>
                <div class="row mt-3">
                    <div class="col">
                        <div class="alert alert-danger my-2 w-100 text-center">
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <?php echo $errors['somethingWrong']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row mt-3"></div>
        </div>
    </div>
</div>

<?php if (empty($errors['notExist']) && empty($errors['noGoods']) && empty($errors['somethingWrong'])): ?>
    <script defer><?php include_once "static/js/sideNavbar.js"; ?></script>
<?php endif; ?>
<script defer><?php require_once "static/js/sort.js"; ?></script>
<script defer><?php require_once "static/js/sortGoods.js"; ?></script>
