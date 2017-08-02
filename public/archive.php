<?
   require '../server/db_connect.php';
   require '../server/pagination.php';

   $paginationPage = new Pagination($connection);
//   echo $test->totalArticles;
//   $test->paginationArticle(5,7,$connection);
//    print_r($test->articlesArray);
?>
<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Blog</title>
      <link rel="stylesheet" href="../css/pagination.css">
      <link rel="stylesheet" href="../css/components.css">
      <link rel="stylesheet" href="../css/responsee.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
       <!-- CUSTOM STYLE -->
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="../css/template-style.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js""></script>
      <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <?php if( (int) $_GET['page'] <= -1 || (int) $_GET['page'] > $paginationPage->howManyPages  ){
          echo "<p style='text-align: center; font-size: 3em; margin: 1.5em 0;'>ERROR <span style='color: tomato;'>404</span> THERE IS NO SUCH PAGE</p>";
      }else { ?>
          <section id="article-section" class="line">
              <div class="margin">
                  <!-- ARTICLES -->
                  <div class="s-12 l-12">
                      <?php
                      //            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 5");
                      //            while($article = mysqli_fetch_assoc($articles)){
                      //  $test = new Pagination($connection);
                      $page = (int)$_GET['page'];

                      if ($page == 1 || $page == 0 || $page == is_null($page)) {
                          $paginationPage->paginationArticle(0, 5, $connection);
                      } else {
                          $start = ($paginationPage->articlesPerPage * $_GET['page']) - 5;
                          $end = $paginationPage->articlesPerPage * $_GET['page'];
                          $paginationPage->paginationArticle($start, $end, $connection);
                      }
                      for ($i = 0; $i < count($paginationPage->articlesArray); $i++) {
                          ?>
                          <!-- ARTICLE 1 -->
                          <article class="margin-bottom">
                              <div class="post-1 line">
                                  <!-- image -->
                                  <div class="s-12 l-11 post-image">
                                      <img src="<?= $paginationPage->articlesArray[$i]['main-image'] ?>" alt="image">
                                  </div>
                                  <!-- date -->
                                  <div class="s-12 l-1 post-date" style="margin-left: 0">
                                      <p class="date"><?= date(d, strtotime($paginationPage->articlesArray[$i]['date'])) ?></p>
                                      <p class="month"><?= date(M, strtotime($paginationPage->articlesArray[$i]['date'])) ?></p>
                                      <i class="fa fa-eye" aria-hidden="true"
                                         style="margin-top: 10px;"> <?= $paginationPage->articlesArray[$i]['views'] ?></i>
                                  </div>
                              </div>
                              <!-- text -->
                              <div class="post-text">
                                  <a href="post.php?id=<?= $paginationPage->articlesArray[$i]['id'] ?>">
                                      <h2><?= $paginationPage->articlesArray[$i]['title'] ?></h2>
                                  </a>
                                  <p>
                                      <?= $paginationPage->articlesArray[$i]['under-title-text'] ?>
                                  </p>
                                  <a class="continue-reading" href="post.php?id=<?= $paginationPage->articlesArray[$i]['id'] ?>">Continue
                                      reading</a>
                              </div>
                          </article><br><br>
                      <?php } ?>
                  </div>

              </div>
          </section>
          <div class="container">
              <ul class="pagination">
                  <li>
                      <?php
                      if ($_GET['page'] > 1) {
                          ?>
                          <a href="<?= 'archive.php?page=' . ($_GET['page'] - 1) ?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                          </a>
                          <?php
                      }
                      ?>
                  </li>
                  <?php
                    $allPages = $paginationPage->howManyPages;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
//                    $currentPage = $_GET['page'];
                    $startPage = $currentPage - 2;
                    $lastPage = $currentPage + 2;

                    if($currentPage < 3){
                        $startPage = 1;
                        $lastPage = 5;
                    }
                    for($i = $startPage; $i <= $lastPage; $i++){
                        if($i == $currentPage){
                            echo "<li><a href=\"archive.php?page=$i\"><span style='color: tomato'>$i</span></a></li>";
                        }
                        else{
                            echo "<li><a href=\"archive.php?page=$i\">$i</a></li>";
                        }
                    }
                  ?>
                  <li>
                      <?php
                      if ($_GET['page'] != 20) {
                          ?>
                          <a href="<?= 'archive.php?page=' . ($_GET['page'] + 1) ?>" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                          </a>
                          <?php
                      }
                      ?>
                  </li>
              </ul>
          </div>
          <?php
      }
      ?>
      <?php require "../includes/footer.php" ?>
   </body>
<script>
    //przepraszam, ale jeśli wiem jak to wylaczyc to dlaczego by nie zrobic :)
    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('div')[0].style.display = 'none';
        document.querySelectorAll('div')[1].style.display = 'none';
        document.querySelectorAll('div')[2].style.display = 'none';
        document.querySelectorAll('div')[30].style.display = 'none'   
    })
</script>
</html>