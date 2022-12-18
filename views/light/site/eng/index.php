<div class="container">
    <div class="row">
        <div class="w-100">
            <div class="" id="startBlockContainer">
                <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-12" id="startBlockText">
                    <h1 class="h1">Programming Courses</h1>

                    <p class="pt-3">
                        Raccoon courses are not just programming courses. These are courses where there is a minimum of theory and a maximum of real experience and tasks.
                        Various programming languages, tools and team work are studied here under the guidance of a mentor.
                    </p>

                    <?php
                    if (empty($language)) {
                        echo "<a href='/user/eng/login' class='btn btn-secondary' id='buttonStartStudying'>Start studying!</a>";
                    } else {
                        echo "<a href='/user/$language/login' class='btn btn-secondary' id='buttonStartStudying'>Start studying!</a>";
                    }
                    ?>
                </div>

                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12" id="startBlockLogo">
                    <img src="/static/img/raccoon-logo.png" alt="Raccoon Logo" id="logo">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="w-100">
            <div class="" id="offeredGoodsBlockContainer">
                <div id="offeredGoodsBlockText">
                    <h5 class="h5">Products we offer:</h5>
                </div>

                <div class="programming-languages-container" id="offeredGoodsBlockPics">
                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="C#">
                        <i class="devicon-csharp-line colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Python">
                        <i class="devicon-python-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Kotlin">
                        <i class="devicon-kotlin-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="C++">
                        <i class="devicon-cplusplus-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="C">
                        <i class="devicon-c-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="JavaScript">
                        <i class="devicon-javascript-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Java">
                        <i class="devicon-java-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="CSS3">
                        <i class="devicon-css3-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="HTML5">
                        <i class="devicon-html5-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title=".NET">
                        <i class="devicon-dot-net-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Swift">
                        <i class="devicon-swift-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="React JS">
                        <i class="devicon-react-original colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Angular JS">
                        <i class="devicon-angularjs-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Vue JS">
                        <i class="devicon-vuejs-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Android Development">
                        <i class="devicon-android-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="PHP">
                        <i class="devicon-php-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="SASS">
                        <i class="devicon-sass-original colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="PHP framework 'Yii'">
                        <i class="devicon-yii-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="PHP framework 'Laravel'">
                        <i class="devicon-laravel-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Node JS">
                        <i class="devicon-nodejs-plain colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Node JS framework 'Express JS'">
                        <i class="devicon-express-original colored"></i>
                    </div>

                    <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Wordpress">
                        <i class="devicon-wordpress-plain colored"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script> <?php include_once('static/js/indexAnimations.js'); ?></script>
