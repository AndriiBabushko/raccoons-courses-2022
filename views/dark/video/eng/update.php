<?php
/**
 * @var array $videos
 * @var array $selectedVideo
 * @var array $model
 * @var array $errors
 */
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="videoUpdateContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative"
                  id="videoUpdateForm">
                <div id="videoFormImg"></div>

                <div class="text-white" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Update video form!</h3>

                    <?php if (!empty($errors['somethingWrong'])): ?>
                        <div class="alert alert-danger text-center">
                            <i class="bi bi-exclamation-triangle"></i>
                            <?php echo $errors['somethingWrong']; ?></div>
                    <?php endif; ?>

                    <?php if (!empty($videos) && empty($selectedVideo)): ?>
                        <div class="form-group mb-3">
                            <label for="videoId" id="labelVideoId" class="form-label label">Choose video to autofill all fields</label>
                            <select class="form-select bg-dark text-white" name="id_video" id="videoId">
                                <option value="NULL" selected>Video Theme</option>
                                <?php foreach ($videos as $video): ?>
                                    <option value="<?php echo $video['id_video']; ?>">
                                        <?php echo $video['theme']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <button type='submit' id='buttonAutofillFields' class='btn btn-secondary w-100'>Autofill fields</button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($selectedVideo)): ?>
                        <div class="form-group mb-3">
                            <label for="videoTheme" id="labelVideoTheme" class="form-label label">Video's theme</label>
                            <input type='text' name='theme' id='videoTheme'
                                   class='input form-control form-control-lg bg-dark text-white <?php if (!empty($errors['theme'])) echo "is-invalid"; ?>'
                                   placeholder="Introduction to React, etc..."
                                   value="<?php echo $selectedVideo['theme']; ?>">
                            <?php if (!empty($errors['theme'])): ?>
                                <div class="invalid-feedback">
                                    <?php echo $errors['theme']; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="videoName" id="labelVideoName" class="form-label label">Upload video</label>
                            <input type='file' name='video' id='videoName' accept="video/mp4"
                                   class='input form-control form-control-lg bg-dark text-white <?php if (!empty($errors['video'])) echo "is-invalid"; ?>'>
                            <?php if (!empty($errors['video'])): ?>
                                <div class="invalid-feedback">
                                    <?php echo $errors['video']; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <button type='submit' id='buttonUpdateGood' class='btn btn-primary w-100'>Update video</button>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module"><?php require "static/js/validation.js" ?></script>
