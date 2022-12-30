<?php
/**
 * @var array $model ;
 * @var array $errors ;
 */
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="categoryAddContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative" id="categoryAddForm">
                <div id="categoryFormImg"></div>

                <?php if (!empty($errors['somethingWrong'])): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle fs-3"></i>
                        <?php echo $errors['somethingWrong']; ?></div>
                <?php endif; ?>

                <div class="" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Add category form!</h3>

                    <div class="form-group mb-3">
                        <label for="categoryName" id="labelCategoryName" class="form-label label">Category name</label>
                        <input type='text' name='name' id='categoryName'
                               class='input form-control form-control-lg <?php if (!empty($errors['name'])) echo "is-invalid"; ?>'
                               placeholder="Backend development, etc..."
                               value="<?php if (!empty($model)) echo $model['name']; ?>">
                        <?php if (!empty($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?php echo $errors['name']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textareaDescription" id="labelDescription" class="form-label label">Category description</label>
                        <textarea class="input form-control form-control-lg" name="description" id="textareaDescription"
                                  placeholder="Tell what this category is about..."><?php if (!empty($model)) echo $model['description']; ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="categoryPhoto" id="labelCategoryName" class="form-label label">Category image</label>
                        <input type='file' name='photo' id='categoryPhoto' class='input form__email form-control form-control-lg' accept="image/png, image/jpg">
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' id='buttonAddCategory' class='btn btn-success w-100'>Add category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
