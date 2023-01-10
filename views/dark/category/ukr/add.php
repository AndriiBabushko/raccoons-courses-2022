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

                <div class="text-white" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Форма додавання категорії!</h3>

                    <div class="form-group mb-3">
                        <label for="categoryName" id="labelCategoryName" class="form-label label">Назва категорії</label>
                        <input type='text' name='name' id='categoryName'
                               class='input form-control form-control-lg bg-dark text-white <?php if (!empty($errors['name'])) echo "is-invalid"; ?>'
                               placeholder="Backend розробка і тп..."
                               value="<?php if (!empty($model)) echo $model['name']; ?>">
                        <?php if (!empty($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?php echo $errors['name']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textareaDescription" id="labelDescription" class="form-label label">Опис категорії</label>
                        <textarea class="input form-control form-control-lg bg-dark text-white long" name="description" id="textareaDescription"
                                  placeholder="Розкажіть, про що ця категорія..."><?php if (!empty($model)) echo $model['description']; ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="categoryPhoto" id="labelCategoryName" class="form-label label">Загальна фотографія категорії</label>
                        <input type='file' name='photo' id='categoryPhoto' class='input form-control form-control-lg bg-dark text-white' accept="image/*">
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' id='buttonAddCategory' class='btn btn-success w-100'>Додати категорію</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
