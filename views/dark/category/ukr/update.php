<?php
$category = \models\Category::getCategoryById(intval($_GET['id_category']));
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="categoryUpdateContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative"
                  id="categoryUpdateForm">
                <div id="categoryFormImg"></div>

                <div class="text-white" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Форма оновлення категорії!</h3>

                    <div class="form-group mb-3">
                        <label for="categoryName" id="labelCategoryName" class="form-label label">Назва категорії</label>
                        <input type='text' name='name' id='categoryName' class='input form-control form-control-lg bg-dark text-white' placeholder="Backend development, etc..."
                               value="<?php if (!empty($model)) echo $model['name']; else echo $category['name']; ?>">
                        <div class="invalid-feedback">
                            Неправильна назва категорії!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textareaDescription" id="labelDescription" class="form-label label">Опис категорії</label>
                        <textarea class="input form-control form-control-lg bg-dark text-white" name="description" id="textareaDescription"
                                  placeholder="Розкажіть, про що ця категорія..."><?php if (!empty($model)) echo $model['description']; else echo $category['description'];?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="categoryPhoto" id="labelCategoryName" class="form-label label">Загальна фотографія категорії</label>
                        <input type='file' name='photo' id='categoryPhoto' class='input form-control form-control-lg bg-dark text-white' accept="image/png, image/jpg">
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' id='buttonUpdateCategory' class='btn btn-primary w-100'>Оновити категорію</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
