<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
       <title>BLOG</title>
      <link rel="stylesheet" href="../css/components.css">
      <link rel="stylesheet" href="../css/responsee.css">
      <!-- CUSTOM STYLE -->       
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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
            <div class="s-12 l-12">
               <!-- ARTICLE 1 -->               
               <article class="margin-bottom">
                  <!-- text -->                 
                  <div class="post-text">
                     <h1>Contact Me</h1>
                     <div class="line">
                        <div class="margin">
                           <div class="s-12 l-6">
                              <h4>Max Baranowski</h4><br>
                              <address>
                                 <p><i class="icon-home icon"></i> Belarus, Brest</p>
                                 <p><i class="icon-mail icon"></i> <a href="mailto:max.baranowski@mail.ru">max.baranowski@mail.ru</a></p>
                                  <br><p style="margin-top: 2em;">More information at the <a href="about.php" style="display: inline; color: tomato"> About page </a>or <a href="https://maxbaranowski.github.io/portfolio/" style="display: inline; color: tomato"> Portfolio page.</a></p>
                              </address>
                           </div>
                           <div class="s-12 l-6">
                              <h4>Ccontact form</h4>
                              <form class="customform" method="post" action="../server/sendEmail.php">
                                 <div class="s-12"><input name="email" placeholder="Your e-mail" title="Your e-mail" type="text" required /></div>
                                 <div class="s-12"><input name="from" placeholder="Your name" title="Your name" type="text"  required/></div>
                                 <div class="s-12"><textarea placeholder="message" name="message" rows="5" required></textarea></div>
                                 <button type="submit">Submit Button</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- MAP -->	
                  <div id="map-block">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d156902.81356611036!2d23.763399052061413!3d52.08689346819948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sby!4v1490734154245" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
               </article>
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
        document.querySelectorAll('div')[18].style.display = 'none'   
    })
</script>
</html>