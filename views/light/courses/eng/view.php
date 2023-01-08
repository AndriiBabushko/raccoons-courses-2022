<?php
/**
 * @var int $idGood
 * @var string $goodImgName
 * @var array $videos
 * @var array $currentVideo
 * @var array $comments
 * @var array $courseMaker
 * @var array $errors
 * @var bool $courseAccess
 * @var bool $isAdmin
 */
?>

<div class="container-fluid">
    <div class="row my-2">
        <?php if (empty($videos)): ?>
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning my-2 w-100 text-center">
                        <i class="bi bi-exclamation-diamond-fill"></i>
                        There are no videos on this course yet! Check back later :)
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors['notExist'])): ?>
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger my-2 w-100 text-center">
                        <i class="bi bi-exclamation-diamond-fill"></i>
                        <?php echo $errors['notExist']; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!$courseAccess): ?>
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning my-2 w-100 text-center">
                        <i class="bi bi-exclamation-diamond-fill"></i>
                        Buy the course for full access!
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (empty($errors) && !empty($videos)): ?>
            <div class="col-12 col-xxl-9 col-xl-9 col-lg-9 col-md-12 col-sm-12">
                <div class="video-container paused" data-volume-level="up">
                    <img src="/static/img/courses/<?php echo $goodImgName; ?>" alt="<?php echo $goodImgName; ?>" class="thumbnail-img">
                    <div class="video-controls-container">
                        <div class="timeline-container">
                            <div class="timeline">
                                <div class="thumb-indicator"></div>
                            </div>
                        </div>
                        <div class="controls">
                            <button class="btn play-pause-button">
                                <i class="bi bi-play-fill fs-5 play-icon"></i>
                                <i class="bi bi-pause-fill fs-5 pause-icon"></i>
                            </button>
                            <div class="volume-container">
                                <button class="btn mute-button">
                                    <i class="bi bi-volume-up-fill fs-5 volume-up-icon"></i>
                                    <i class="bi bi-volume-down-fill fs-5 volume-down-icon"></i>
                                    <i class="bi bi-volume-mute-fill fs-5 volume-mute-icon"></i>
                                </button>
                                <input class="volume-slider form-range" type="range" min="0" max="1" step="any" value="1">
                            </div>
                            <div class="duration-container">
                                <div class="current-time">0:00</div>
                                /
                                <div class="total-time"></div>
                            </div>
                            <button class="btn speed-button wide">
                                1x
                            </button>
                            <button class="btn full-screen-button">
                                <i class="bi bi-fullscreen fs-5 full-screen-open-icon"></i>
                                <i class="bi bi-fullscreen-exit fs-5 full-screen-exit-icon"></i>
                            </button>
                        </div>
                    </div>
                    <video src="/<?php echo $currentVideo['video_path']; ?>" class="video"></video>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($videos)): ?>
            <div class="col-12 col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 ps-xxl-0 ps-xl-0 ps-lg-0">
                <div class="view-video-menu">
                    <ul class="nav nav-pills d-flex flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100">
                        <?php if ($courseAccess): ?>
                            <?php foreach ($videos as $video): ?>
                                <li class="nav-item w-100 settings-item">
                                    <a href="/courses/eng/view/<?php echo $idGood; ?>?id_video=<?php echo $video['id_video'] ?>"
                                       class="nav-link settings-link link-dark align-middle px-0 d-flex justify-content-center align-items-center <?php if ($video['is_visible']) echo
                                       "activeItem"; ?>">
                                        <?php echo $video['theme']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (!$courseAccess): ?>
                            <?php foreach ($videos as $video): ?>
                                <li class="nav-item w-100 settings-item">
                                    <a href="/courses/eng/view/<?php echo $idGood; ?>?id_video=<?php echo $video['id_video'] ?>"
                                       class="nav-link settings-link link-dark align-middle px-0 d-flex justify-content-center align-items-center <?php if ($video['is_visible']) echo
                                       "activeItem"; ?>">
                                        <?php echo $video['theme']; ?>
                                    </a>
                                </li>
                                <?php break; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($isAdmin) && $isAdmin): ?>
        <div class="row mt-2">
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                <a class="btn btn-success w-100" href="/video/eng/add?id_good=<?php echo $idGood; ?>">
                    <i class="bi bi-plus-circle"></i>
                    Add new video
                </a>
            </div>

            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                <a class="btn btn-primary w-100" href="/video/eng/update?id_good=<?php echo $idGood; ?>">
                    <i class="bi bi-pencil"></i>
                    Update video
                </a>
            </div>

            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                <a class="btn btn-danger w-100" href="/video/eng/delete?id_good=<?php echo $idGood; ?>">
                    <i class="bi bi-trash"></i>
                    Delete video
                </a>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($courseMaker)): ?>
        <div class="col-12">
            <div class="course-maker">
                <div class="d-flex flex-column align-items-center justify-content-center w-100" id="userAvatar">
                    <div class="d-flex flex-column align-items-center justify-content-between w-100" id="userAvatarBlock">
                        <div class="title w-100 mb-2">
                            <h3>
                                Course creator
                            </h3>
                        </div>

                        <div class="card border-2">
                            <div class="card-body">
                                <img
                                    <?php $userName = ucfirst($courseMaker['first_name']) . ' ' . ucfirst($courseMaker['last_name']); ?>
                                        src='/static/img/user/<?php echo $courseMaker['avatar']; ?>'
                                        alt='<?php echo $userName; ?>'
                                        class='rounded-circle'
                                        id='courseMakerImg'
                                        title='<?php echo $userName; ?>'
                                        style="cursor: default;"
                                >
                                <h5 class="card-title">
                                    <span class='d-none d-sm-inline mb-2 h3 text-dark text-center'><?php echo $userName; ?></span>
                                </h5>
                                <hr>
                                <p class="card-text"><?php echo $courseMaker['bio']; ?></p>
                                <?php if (!empty($user) && $user['is_admin'] === 1): ?>
                                    <hr>
                                    <div class="d-flex justify-content-between admin-buttons">
                                        <a class="btn btn-primary" href="/category/eng/update?id_category=<?php echo $category['id_category'] ?>"><i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-danger" href="/category/eng/delete?id_category=<?php echo $category['id_category'] ?>"><i class="bi bi-trash"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script defer><?php require_once "static/js/videoPlayer.js"; ?></script>
<script defer><?php require_once "static/js/videoPage.js"; ?></script>
