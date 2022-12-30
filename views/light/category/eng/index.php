<?php
$user = models\User::getCurrentAuthUser();
$categories = \models\Category::getCategories();
?>

<div class="container">
    <div class="row mt-3">
        <h1 class="title fs-4 text-center mb-3 pb-1" id="adminTitle">Category admin page</h1>
    </div>

    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-4">
        <?php foreach ($categories as $category): ?>
            <div class="col card-block">
                <div class="card border-2">
                    <img src="/static/img/category/<?php echo $category['photo']; ?>" class="card-img-top" alt="<?php echo $category['photo']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $category['name']; ?></h5>
                        <p class="card-text"><?php echo $category['description']; ?></p>
                        <a class="btn btn-secondary card-link" href="/courses/eng/category/<?php echo $category['id_category'] ?>">
                            View category
                        </a>
                        <?php if ($user['is_admin'] === 1): ?>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-success" href="/category/eng/add"><i class="bi bi-plus-circle"></i></a>
                                <a class="btn btn-primary" href="/category/eng/update?id_category=<?php echo $category['id_category'] ?>"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-danger" href="/category/eng/delete?id_category=<?php echo $category['id_category'] ?>"><i class="bi bi-trash"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row mt-3"></div>
</div>
