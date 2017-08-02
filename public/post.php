<?php
    $lifetime=1800;
    session_set_cookie_params($lifetime);
    session_start();
    if (!isset($_SESSION["latestPost"])) {
        $_SESSION["latestPost"] = array();
    }

    //add header.php
    require '../server/db_connect.php';
    //connect with database where choose only one item which equals to GET param
    mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int)$_GET['id']);
    $articles_detail = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` =" . (int)$_GET['id']);
    $article_detail = mysqli_fetch_assoc($articles_detail);

    // check if such article `id` already exist, if not add it to array
    if (empty($_SESSION['latestPost'])) {
        array_unshift($_SESSION["latestPost"], (int)$article_detail['id']);
    } else {
        if (count($_SESSION['latestPost']) > 3) {
            $_SESSION['latestPost'] = array_slice($_SESSION['latestPost'], 0, 3);
        }
        if (array_search($article_detail['id'], $_SESSION['latestPost']) === false) {
            array_unshift($_SESSION["latestPost"], $article_detail['id']);
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <title>Blog</title>
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/responsee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- CUSTOM STYLE -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="../css/template-style.css">
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/modernizr.js"></script>
    <script type="text/javascript" src="../js/responsee.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="size-1140">
<!-- TOP NAV WITH LOGO -->
<?php require "../includes/header.php" ?>
<!-- MAIN SECTION -->
<section id="article-section" class="line">
    <div class="margin">
        <!-- ARTICLES -->
        <div class="s-12 l-9">
            <!-- ARTICLE -->
            <article class="margin-bottom">
                <div class="post-1 line">
                    <!-- image -->
                    <div class="s-12 l-11 post-image">
                        <img src="<?= $article_detail['main-image'] ?>" alt="main image">
                    </div>
                    <!-- date -->
                    <div class="s-12 l-1 post-date" style="margin-left: 5px;">
                        <p class="date"><?= date(d, strtotime($article_detail['date'])) ?></p>
                        <p class="month"><?= date(M, strtotime($article_detail['date'])) ?>
                            <br><i class="fa fa-eye" aria-hidden="true"
                                   style="margin-top: 0px;"> <?= $article_detail['views'] ?></i>
                        </p>

                    </div>
                </div>
                <!-- text -->
                <div class="post-text">
                    <h1><?= $article_detail['title'] ?></h1>
                    <p>
                        <?= $article_detail['under-title-text'] ?>
                    </p>
                    <br>
                    <h2><?= $article_detail['subtitle'] ?></h2>
                    <p>
                        <?= $article_detail['under-subtitle-text'] ?>
                    </p>
                    <img src="<?= $article_detail['text-image'] ?>" alt="text image">
                    <p>
                        <?= $article_detail['under-image-text'] ?>
                    </p>
                    <p class="author">Max Baranowski</p>
                </div>
            </article>
            <div class="line">
                <div class="advertising horizontal"></div>
            </div>
        </div>
        <!-- SIDEBAR -->
        <div class="s-12 l-3">
            <aside>
                <!-- LATEST POSTS -->
                <div class="aside-block margin-bottom">
                    <?php
                    if (!empty($_SESSION['latestPost'])) {
                        ?>
                        <h3 style="text-align: center">Latest posts</h3>
                        <?php
                        //create temporary array for articles which must be loaded from DB
                        $latestPostsArray = array_values($_SESSION['latestPost']);
                        // $latestPostsArray = array(1,2,7);
                        // for non sorting data from db should use next: *implode(',', $latestPostsArray)* to send array as id values whisch should be found, and *ORDER BY FIELD(`id`," .implode(',', $latestPostsArray)* to sort array as it is
                        $latestPosts = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` in(" . implode(',', $latestPostsArray) . ") ORDER BY FIELD(`id`," . implode(',', $latestPostsArray) . " )");

                        while ($latestPost = mysqli_fetch_assoc($latestPosts)) {
                            ?>
                            <a class="latest-posts" href="public/post.php?id=<?= $latestPost['id'] ?>">
                                <h5><?= $latestPost["title"] ?></h5>
                                <p>
                                    <?= mb_substr($latestPost['under-title-text'], 0, 100, 'utf-8') . '...' ?>
                                </p>
                                <i class="fa fa-eye" aria-hidden="true"
                                   style="float: right; display:block;"> <?= $latestPost['views'] ?></i>
                            </a>

                            <?php
                        }
                    }
                    ?>
                </div>
            </aside>
        </div>
    </div>
</section>
<?php require "../includes/footer.php" ?>
</body>
<script>
    //przepraszam, ale jeśli wiem jak to wylaczyc to dlaczego by nie zrobic :)
    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('div')[0].style.display = 'none';
        document.querySelectorAll('div')[1].style.display = 'none';
        document.querySelectorAll('div')[2].style.display = 'none';
        document.querySelectorAll('div')[17].style.display = 'none'   
    })
</script>
</html>