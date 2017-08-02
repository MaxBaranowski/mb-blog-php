<!DOCTYPE html>
<html lang="pl-PL">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>BLOG</title>
      <link rel="stylesheet" href="../css/components.css">
      <link rel="stylesheet" href="../css/responsee.css">
      <!-- CUSTOM STYLE -->       
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="../css/template-style.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js""></script>
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
               <!-- ARTICLE 1 -->               
               <article class="margin-bottom">
                  <!-- text -->                 
                  <div class="post-text">
                      <style>
                          .post-text > p{
                              text-align: justify;
                          }
                      </style>
                     <h1>About Me</h1>
                     <img src="../img/photo.svg" alt="About me" style="float: left; width: 30%; margin: 10px 20px 10px 0;">
                     <p>
                         Nazywam się Max Baranowski. <br> W bieżącym 2017 roku będę skończyłem studia W Brzeskim Technicznym Uniwersytecie na wydziale Informatyki. Na pewno kiedy ktoś czyta to (myślę że ktoś taki jednak będzie 😄).<br>
                         Teraz kiedy piszę ten artykuł to tylko myślę mieszkać w Polsce bo jestem z Brześcia, Białorusi ale mam kartę polaka i chcę wyjechać do Warszawy żeby znaleźć pracę i po tym osedlić się w Polsce.
                     </p>
                     <br>
                     <br>
                      <br>
                      <h2 style="clear: both;">Kim ja jestem</h2>
                     <p>
                         Z zawody jestem informatykiem, ale moja specjalność zbyt obszerna i ja wybrałem dla siebie Front end.
                         Wszystkiemu uczyłem się sam, oglądałem rożne filmiki z YouTube, czytałem książki i probowałem robić strony internetowy.<br>
                         Mam kilka HTML szablonów, prawdę mówiąc oni nie zbyt trudny w projektowaniu.<br>
                         Mam małe doświadczenie z pierwszym AngularJS, zrobiłem niewielką aplikacje, taki mini sklep internetowy.
                         W którym mam kilkoro towarów, za pomocy Ajax pobieram JSONa w którym są towary.
                         Zrobiłem swojego filtra, za pomocą którego mogę sortować towary.
                         Złączyłem swoje aplikacje z MySQL, to co jest w koszyku, kiedy naciskasz na "kupić" - towary z koszyka są dodawane do tablicy w bazie danych, które po tym  są na stronice kiedy wchodzisz na stronę.<br>
                         Jeszce zrobiłem tego bloga na PHP.
                         Myślę ze mam doświadczenie z PHP, znam że nie wielką ale znam podstawy PHP, podstawy SQL.
                     </p>
                     <h2>Co jeszcze chciałem by nauczyć się?</h2>
                     <p>
                         Po pierwsze nauczyć się mówić po polsku jak "Native speaker", mogę mówić, pisać, ale wydaje się mnie ze robię jeszcze wielu błędów.<br><br>

                         Jeśli chodzi o programowaniu to chcę nauczyć się nowemu Angular, React i zrobić szablon dla WordPressa.
                         Zaraz czytam książkę po NodeJs, dokładnej jak pracować z Express.
                     </p>
                     <p style="margin-top: 1em;">More information about i`ve already done you can find at my <a href="https://maxbaranowski.github.io/portfolio/" style="display: inline; color: tomato"> Portfolio page.</a></p>
                  </div>
               </article>

            </div>
            <!-- SIDEBAR -->             
            <div class="s-12 l-3">
               <aside>
                   <!-- LATEST POSTS -->
                   <div class="aside-block margin-bottom">
                       <h3>Contacts</h3>
                       <p class="latest-posts" >
                           <h5>Email</h5>
                           <p>
                               max.baranowski@mail.ru
                           </p>
                       </p>
                       <br>
                       <p class="latest-posts" >
                       <h5>Telephone</h5>
                       <p>
                           +375 29 _ _ _ _ _ _ _
                       </p>
                       </p>
                       <br>
                       <p class="latest-posts">
                       <h5>Skype</h5>
                       <p>
                           max.baranowski@mail.ru
                       </p>
                       </p><br>
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
        document.querySelectorAll('div')[12].style.display = 'none'   
    })
</script>
</html>