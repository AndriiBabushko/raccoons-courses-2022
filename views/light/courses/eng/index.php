<?php
/**
 * @var array $goods ;
 * @var array $user ;
 */
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="p-2">
                <h1 class="title fs-4 text-center mb-2 pb-2 border-bottom" id="productsTitle">All products:</h1>

                <div class="mb-3 pb-3 text-start fs-5 fw-normal border-bottom" role="search" id="searchBlock">
                    <label for="search" class="form-label">Search for here:</label>
                    <input type="search" name="search" class="form-control me-2" id="search" placeholder="Search" aria-label="Search">
                </div>

                <div class="mb-3 pb-3 text-start fs-5 fw-normal border-bottom">
                    <label class="form-label" for="sortBy">Sort by:</label>
                    <select class="form-select form-select-lg" name="sortBy" id="sortBy">
                        <option selected>Choose one</option>
                        <option value="title">By Title</option>
                        <option value="price">By Price</option>
                        <option value="time">By Time</option>
                    </select>
                </div>

                <div class="mb-3 pb-3 text-start fs-5 fw-normal border-bottom">
                    <label class="form-label">Sorting type:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortingType" id="ascendingSort" value="ascendingSort" checked>
                        <label class="form-check-label" for="ascendingSort">Ascending sort</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortingType" id="descendingSort" value="descendingSort">
                        <label class="form-check-label" for="descendingSort">Descending sort</label>
                    </div>
                </div>
            </div>
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

