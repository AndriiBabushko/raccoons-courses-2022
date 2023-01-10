<?php
/**
 * @var string $title ;
 * @var string $language ;
 * @var string $content ;
 */

use models\Category;
use models\User;

$user = null;
$goods = Category::getCategories();

if (User::isUserAuth())
    $user = User::getCurrentAuthUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $title ?></title>

    <!--    ====================================================================================================================-->
    <link rel="icon" href="/static/img/site/raccoon-logo-1.png">
    <!--    ====================================================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--    ====================================================================================================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--    ====================================================================================================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <!--    ====================================================================================================================-->
    <link rel="stylesheet" href="/static/styles/light/css/light_theme.css?v=<?php echo time(); ?>">
    <!--    ====================================================================================================================-->
</head>
<body>
<?php
if (empty($language))
    include_once "eng/header.php";
else
    include_once "$language/header.php";
?>

<main role="main" class="main">
    <?php echo $content ?>
</main>

<?php
if (empty($language))
    include_once "eng/footer.php";
else
    include_once "$language/footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
</script>
<script><?php require "static/js/videoPlayer.js"; ?></script>
</body>
</html>
