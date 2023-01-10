<?php
/**
 * @var array $model
 * @var array $errors
 * @var array $categories
 * @var array $good
 */
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="goodUpdateContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative"
                  id="goodUpdateForm">
                <div id="goodFormImg"></div>

                <?php if (!empty($errors['somethingWrong'])): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle fs-3"></i>
                        <?php echo $errors['somethingWrong']; ?></div>
                <?php endif; ?>

                <div class="" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Форма оновлення курсу</h3>

                    <div class="form-group mb-3">
                        <label for="goodName" id="labelGoodName" class="form-label label">Назва курсу</label>
                        <input type='text' name='name' id='goodName'
                               class='input form-control form-control-lg <?php if (!empty($errors['name'])) echo "is-invalid"; ?>'
                               placeholder="COMPLETE REACT COURSE, etc..."
                               value="<?php if (!empty($model)) echo $model['name']; elseif (!empty($good)) echo $good['name']; ?>">
                        <div class="invalid-feedback">
                            Назва курсу не повинна бути порожньою!
                            <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodPrice" id="labelGoodPrice" class="form-label label">Ціна курсу</label>
                        <input type='number' name='price' id='goodPrice'
                               class='input form-control form-control-lg'
                               placeholder="1000, 5000, etc..."
                               value="<?php if (!empty($model)) echo $model['price']; elseif (!empty($good)) echo $good['price']; ?>">
                        <div class="invalid-feedback">
                            Ціна товару вказана невірно!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodShortDescription" id="labelShortDescription" class="form-label label">Короткий опис курсу</label>
                        <textarea class="input form-control form-control-lg short"
                                  name="short_description" id="goodShortDescription"
                                  placeholder="Розкажіть трішки про що цей курс..."
                        ><?php if (!empty($model)) echo $model['short_description']; elseif (!empty($good)) echo $good['short_description']; ?></textarea>
                        <div class="invalid-feedback">
                            Короткий опис курсу має бути не більше 100 символів!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodDescription" id="labelDescription" class="form-label label">Загальний опис курсу</label>
                        <textarea class="input form-control form-control-lg long"
                                  name="description" id="goodDescription"
                                  placeholder="Розкажіть детальніше про що цей курс..." rows="10"
                        ><?php if (!empty($model)) echo $model['description']; elseif (!empty($good)) echo $good['description'];?></textarea>
                        <div class="invalid-feedback">
                            Опис має бути не менше 50 символів!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodPhoto" id="labelGoodPhoto" class="form-label label">Головна фотографія курсу</label>
                        <input type='file' name='photo' id='goodPhoto' accept="image/*"
                               class='input form__email form-control form-control-lg <?php if (!empty($errors['photo'])) echo "is-invalid"; ?>'>
                        <?php if (!empty($errors['photo'])): ?>
                            <div class="invalid-feedback">
                                <?php echo $errors['photo']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="goodCategory" id="labelGoodCategory" class="form-label label">Категорія курсу</label>
                        <select class="form-select" name="id_category" id="goodCategory">
                            <option value="NULL">Категорія</option>
                            <?php foreach ($categories as $category): ?>
                                <option <?php if($good['id_category'] == $category['id_category']) echo "selected"; ?>
                                        value="<?php echo $category['id_category']; ?>">
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' id='buttonUpdateGood' class='btn btn-primary w-100'>Оновити курс</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module"><?php require "static/js/validation.js" ?></script>
