<?php
/**
 * @var array $model
 * @var array $errors
 * @var array $categories
 */
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="goodAddContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative" id="goodAddForm">
                <div id="goodFormImg"></div>

                <?php if (!empty($errors['somethingWrong'])): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle fs-3"></i>
                        <?php echo $errors['somethingWrong']; ?></div>
                <?php endif; ?>

                <div class="" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Add good form!</h3>

                    <div class="form-group mb-3">
                        <label for="goodName" id="labelGoodName" class="form-label label">Good's name</label>
                        <input type='text' name='name' id='goodName'
                               class='input form-control form-control-lg <?php if (!empty($errors['name'])) echo "is-invalid"; ?>'
                               placeholder="COMPLETE REACT COURSE, etc..."
                               value="<?php if (!empty($model)) echo $model['name']; ?>">
                        <div class="invalid-feedback">
                            Name shouldn't be empty!
                            <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodPrice" id="labelGoodPrice" class="form-label label">Good's price</label>
                        <input type='number' name='price' id='goodPrice'
                               class='input form-control form-control-lg'
                               placeholder="1000, 5000, etc..."
                               value="<?php if (!empty($model)) echo $model['price']; ?>">
                        <div class="invalid-feedback">
                            Good's price is entered incorrectly!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodShortDescription" id="labelShortDescription" class="form-label label">Good's short description</label>
                        <textarea class="input form-control form-control-lg short" name="short_description" id="goodShortDescription"
                                  placeholder="Tell a little what this good is about..."><?php if (!empty($model)) echo $model['short_description']; ?></textarea>
                        <div class="invalid-feedback">
                            Short description shouldn't be more than 100 characters long!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodDescription" id="labelDescription" class="form-label label">Good's description</label>
                        <textarea class="input form-control form-control-lg long" name="description" id="goodDescription"
                                  placeholder="Tell more what this good is about..." rows="10"><?php if (!empty($model)) echo $model['description']; ?></textarea>
                        <div class="invalid-feedback">
                            Description should be at least 50 characters long!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodPhoto" id="labelGoodPhoto" class="form-label label">Good's image</label>
                        <input type='file' name='photo' id='goodPhoto' accept="image/*"
                               class='input form__email form-control form-control-lg <?php if (!empty($errors['photo'])) echo "is-invalid"; ?>'>
                        <?php if (!empty($errors['photo'])): ?>
                            <div class="invalid-feedback">
                                <?php echo $errors['photo']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodCategory" id="labelGoodCategory" class="form-label label">Good's category</label>
                        <select class="form-select" name="id_category" id="goodCategory">
                            <option selected value="NULL">Good category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id_category']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' id='buttonAddGood' class='btn btn-success w-100'>Add Good</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module"><?php require "static/js/validation.js" ?></script>
