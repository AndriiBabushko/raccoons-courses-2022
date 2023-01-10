<?php
/**
 * @var array $videos
 * @var array $selectedVideo
 * @var array $errors
 * @var int $id_good
 */
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 w-100 position-relative">
        <div class="form-container d-flex justify-content-center" id="goodDeleteContainer">
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center position-relative"
                  id="videoDeleteForm">
                <div id="videoFormImg"></div>

                <div class="" id="content">
                    <h3 class="h3 my-4 pb-1 text-center title">Форма видалення відео!</h3>

                    <?php if (!empty($errors['somethingWrong'])): ?>
                        <div class="alert alert-danger text-center">
                            <i class="bi bi-exclamation-triangle"></i>
                            <?php echo $errors['somethingWrong']; ?></div>
                    <?php endif; ?>

                    <?php if (!empty($videos) && empty($selectedVideo)): ?>
                        <div class="form-group mb-3">
                            <label for="videoId" id="labelVideoId" class="form-label label">Виберіть тему відео для видалення</label>
                            <select class="form-select" name="id_video" id="videoId">
                                <option value="NULL" selected>Тема відео</option>
                                <?php foreach ($videos as $video): ?>
                                    <option value="<?php echo $video['id_video']; ?>">
                                        <?php echo $video['theme']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <button type='submit' id='buttonAutofillFields' class='btn btn-secondary w-100'>Вибрати тему відео</button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($selectedVideo)): ?>
                        <div class="form-group mb-3">
                            <label for="buttonDeleteVideo" id="labelDeleteVideo" class="form-label fs-5">Ви впевнені, що хочете видалити відео?</label>
                            <div class="d-flex flex-wrap justify-content-evenly w-100 mt-3">
                                <button type='submit' id='buttonDeleteVideo' class='btn btn-danger'>Видалити відео</button>
                                <a href="/courses/ukr/view/<?php echo $id_good; ?>" id='buttonCancelDeleteVideo' class='btn btn-secondary'>Поверніться до сторінки перегляду
                                    курсу</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
