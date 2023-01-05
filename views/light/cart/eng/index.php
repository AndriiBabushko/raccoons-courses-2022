<?php
/**
 * @var array $goods
 * @var array $errors
 */

$goodsTotalSum = 0;

foreach ($goods as $good)
    $goodsTotalSum += floatval($good['price']);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="row my-2">
                <h1 class="title fs-4 text-center pb-2 border-bottom border-2" id="cartTitle">Goods for purchase:</h1>
            </div>

            <?php if (!empty($goods) && empty($errors['goodNotExists']) && empty($errors['goodExists']) && empty($errors['somethingWrong'])): ?>
                <div class="row mt-3" id="cartTableRow">
                    <table class="table fs-5 fw-normal" id="cartTable">
                        <thead class="table-secondary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Product image</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Delete</th>
                        </tr>
                        </thead>

                        <tbody class="table-group-divider">
                        <?php foreach ($goods as $good): ?>
                            <tr>
                                <th scope="row"><?php echo $good['id_good']; ?></th>
                                <td><?php echo $good['name']; ?></td>
                                <td><img src="/static/img/courses/<?php echo $good['photo']; ?>" class="img-thumbnail cart-img" alt="<?php echo $good['photo']; ?>"></td>
                                <td><?php echo $good['price']; ?> UAH</td>
                                <td class="text-center">
                                    <a href="/cart/eng/delete?id_good=<?php echo $good['id_good'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>

                        <tfoot class="table-group-divider table-secondary">
                        <tr>
                            <th scope="col" colspan="2" class="text-end">Total price:</th>
                            <td colspan="3" class="text-center">
                                <?php echo $goodsTotalSum; ?> UAH
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <a href="/cart/eng/buy" class="btn btn-success w-100">
                                    <i class="bi bi-wallet2 me-2"></i>
                                    Buy
                                </a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 g-4" id="cartCardsBlock">
                    <?php foreach ($goods as $good): ?>
                        <div class="col">
                            <div class="card border-2">
                                <img src="/static/img/courses/<?php echo $good['photo']; ?>" class="card-img-top" alt="<?php echo $good['photo']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $good['name']; ?></h5>
                                    <hr>
                                    <p class="card-subtitle"><span class="fw-bold">Price</span> <?php echo $good['price']; ?> UAH</p>
                                    <hr>
                                    <a href="/cart/eng/delete?id_good=<?php echo $good['id_good'] ?>" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row mt-3" id="cartTotalSumBlock">
                    <div class="col">
                        <div class="alert alert-secondary w-100 text-center fs-5">
                            <span class="fw-bold">Total price:</span> <?php echo $goodsTotalSum; ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-2" id="cartBuyButtonBlock">
                    <div class="col">
                        <div class="w-100">
                            <a href="/cart/eng/buy" class="btn btn-success w-100">
                                <i class="bi bi-wallet2 me-2"></i>
                                Buy
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (empty($goods)): ?>
                <div class="row mb-2">
                    <div class="col">
                        <div class="alert alert-warning my-2 w-100 text-center">
                            <i class="bi bi-exclamation-octagon-fill"></i>
                            There are no products to buy! Add some on the products page :)
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['goodNotExists'])): ?>
                <div class="row mb-2">
                    <div class="col">
                        <div class="alert alert-danger my-2 w-100 text-center">
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <?php echo $errors['goodNotExists']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['goodExists'])): ?>
                <div class="row mb-2">
                    <div class="col">
                        <div class="alert alert-danger my-2 w-100 text-center">
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <?php echo $errors['goodExists']; ?>
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
        </div>
    </div>
</div>
