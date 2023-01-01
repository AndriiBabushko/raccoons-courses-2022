<?php
/**
 * @var array $goods
 */

use models\User;

$user = null;
if (User::isUserAuth())
    $user = User::getCurrentAuthUser();
?>

<div class="container">
    <div class="row mt-3">
        <div class="p-2">
            <h1 class="title fs-4 text-center mb-2 pb-2 border-bottom border-2" id="productsTitle">All products:</h1>







            <?php if (!empty($user) && $user['is_admin'] === 1): ?>
                <div class="mb-3 pb-3 text-start fs-5 fw-normal border-bottom">
                    <a class="btn btn-success w-100" href="/category/eng/add">
                        <i class="bi bi-plus-circle"></i>
                        Add new category
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-4">
        <?php foreach ($goods as $good): ?>
            <div class="col card-block">
                <div class="card border-2">
                    <img src="/static/img/category/<?php ?>" class="card-img-top" alt="<?php ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php ?></h5>
                        <p class="card-text"><?php ?></p>
                        <a class="btn btn-secondary card-link" href="/courses/eng/category/<?php ?>">
                            View category
                        </a>
                        <?php if ($user['is_admin'] === 1): ?>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-success" href="/category/eng/add"><i class="bi bi-plus-circle"></i></a>
                                <a class="btn btn-primary" href="/category/eng/update?id_category=<?php ?>"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-danger" href="/category/eng/delete?id_category=<?php ?>"><i class="bi bi-trash"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row">

    </div>
</div>

