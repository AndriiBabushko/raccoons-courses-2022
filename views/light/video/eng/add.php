<?php
/**
 * @var array $model
 * @var array $goods
 * @var array $errors
 */
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="form-container d-flex justify-content-center" id="goodAddContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative" id="videoAddForm">
                <div id="videoFormImg"></div>

                <div class="" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Add video form!</h3>

                    <div class="form-group mb-3">
                        <label for="videoTheme" id="labelVideoTheme" class="form-label label">Video's theme</label>
                        <input type='text' name='theme' id='videoTheme'
                               class='input form-control form-control-lg <?php if (!empty($errors['theme'])) echo "is-invalid"; ?>'
                               placeholder="Introduction to React, etc..."
                               value="<?php if (!empty($model)) echo $model['theme']; ?>">
                        <?php if (!empty($errors['theme'])): ?>
                            <div class="invalid-feedback">
                                <?php echo $errors['theme']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="videoName" id="labelVideoName" class="form-label label">Upload video</label>
                        <input type='file' name='video' id='videoName' accept="video/mp4"
                               class='input form-control form-control-lg <?php if (!empty($errors['video'])) echo "is-invalid"; ?>'>
                        <?php if (!empty($errors['video'])): ?>
                            <div class="invalid-feedback">
                                <?php echo $errors['video']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <button type='submit' id='buttonAddVideo' class='btn btn-success w-100'>Add Video</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
