<?php
//$lifetime = 1800;
//session_set_cookie_params($lifetime);
//session_start();
require 'server/db_connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <title>BLOG</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- CUSTOM STYLE -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="css/template-style.css">
    <!--[if lt IE 9]>
    <script src='http://html5shiv.googlecode.com/svn/trunk/html5.js'></script>
    <![endif]-->
</head>
<body class="size-1140">
<!-- TOP NAV WITH LOGO -->
<?php require "includes/header.php" ?>
<!-- MAIN SECTION -->
<?php
$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 4");
?>
<section id="home-section" class="line">
    <div class="margin">
        <!-- ARTICLES -->
        <div class="s-12 l-9">
            <!-- ARTICLE -->
            <?php
            while ($article = mysqli_fetch_assoc($articles)) {
                ?>
                <article class="post-1 <?php if ($article['id'] % 2 == 0) echo 'right-align'; ?> line">
                    <!-- image -->
                    <div class="s-12 l-6 post-image">
                        <img src="<?= $article['main-image'] ?>" alt="main-image">
                    </div>
                    <!-- text -->
                    <div class="s-12 l-5 post-text">
                        <a href="public/post.php?id=<?= $article['id'] ?>">
                            <h2><?= $article['title'] ?></h2>
                        </a>
                        <p><?= mb_substr($article['under-title-text'], 0, 200, 'utf-8') . '...' ?></p>
                        <i class="fa fa-eye" aria-hidden="true" style="margin-top: 10px;"> <?= $article['views'] ?></i>
                    </div>
                    <!-- date -->
                    <div class="s-12 l-1 post-date">
                        <p class="date"><?= date(d, strtotime($article['date'])) ?></p>
                        <p class="month"><?= date(M, strtotime($article['date'])) ?></p>
                    </div>
                </article>
                <br>
                <?php
            }
            ?>

            <!-- load more posts -->
            <article class="post-5 line">
                <!-- text -->
                <div class="s-12 l-12 post-text load-more">
                    <a href="">
                        <h2>Click to load more posts...</h2>
                    </a>
                </div>
            </article>
        </div>
        <!-- SIDEBAR -->
        <div class="s-12 l-3">
            <aside>
                <div>
                    <!-- NEWS 1 -->
                    <?php
                    $popular = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 1");
                    $popular_article = mysqli_fetch_assoc($popular);
                    ?>
                    <h3 style="text-align: center">Most popular</h3>
                    <img src="<?= $popular_article['main-image'] ?>" alt="popular">
                    <div class="aside-block margin-bottom">
                        <a href="public/post.php?id=<?= $popular_article['id'] ?>">
                            <h3><?= $popular_article['title'] ?></h3>
                        </a>
                        <p><?= mb_substr($popular_article['under-title-text'], 0, 150, 'utf-8') . '...' ?></p>
                        <i class="fa fa-eye" aria-hidden="true"
                           style="margin-top: 10px;"> <?= $popular_article['views'] ?></i>
                    </div>
                </div>

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
<?php require "includes/footer.php"; ?>
</body>
    <script>
        (function() {
            let arr = document.getElementsByTagName('script');
            [].forEach.call(arr, function(e,i){
                    e.remove();
            })
        })()
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/responsee.js"></script>
<script>
    //przepraszam, ale jeśli wiem jak to wylaczyc to dlaczego by nie zrobic :)
    //można byłoby wylaczyc wszystkie skrypty, ale to trzeba przetworzyc html do string, po tym znalezc wsystkie scripty i usunuc ich. I juz potym z pomocy Ajax znowy odprawic do uzutkownika. Moge to zrobic ale to nie ma sensu. Pracuje i dobrze, to tylko pokaz ze coś znam z PHP i moge zrobic bloga.
    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('div')[0].style.display = 'none';
        document.querySelectorAll('div')[1].style.display = 'none';
        document.querySelectorAll('div')[2].style.display = 'none';
        document.querySelectorAll('div')[26].style.display = 'none';  
    })
</script>
</html>