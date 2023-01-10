<?php
/**
 *
 */

use models\User;

?>

<div class="container">
    <div class="row">
        <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12" id="startBlockText">
            <h1 class="h1">Курси програмування</h1>

            <p class="pt-3">
                Курси Raccources - це не просто курси програмування. Це курси, де мінімум теорії і максимум реального досвіду та завдань.
                Тут під керівництвом ментора вивчають різні мови програмування, інструменти та командну роботу.
            </p>

            <a href='<?php if (User::isUserAuth()) echo "/courses/ukr/index"; else  echo "/user/ukr/register"; ?>' class='btn btn-secondary' id='buttonStartStudying'>
                Почати навчання!
            </a>
        </div>

        <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12" id="startBlockLogo">
            <img src="/static/img/site/raccoon-logo.png" alt="Лого Єнота" id="logo">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h5 class="h5">Продукти які ми пропонуємо:</h5>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="programming-languages-container" id="">
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

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Apache">
                    <i class="devicon-apache-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Arduino">
                    <i class="devicon-arduino-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Azure">
                    <i class="devicon-azure-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="MySQL">
                    <i class="devicon-mysql-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="PostgreSQL">
                    <i class="devicon-postgresql-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="MongoDB">
                    <i class="devicon-mongodb-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="SQLite">
                    <i class="devicon-sqlite-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="D3JS">
                    <i class="devicon-d3js-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Jupyter">
                    <i class="devicon-jupyter-plain colored"></i>
                </div>

                <div class="programming-language-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Linux">
                    <i class="devicon-linux-plain colored"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module"> <?php include_once('static/js/index.js'); ?></script>
