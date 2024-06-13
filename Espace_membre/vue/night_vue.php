
<?php
include('../../autre/bdd.php');

function selectTitlesAndIdsFromDayAct($bdd) {
    try {
        
        $sql = "SELECT * FROM `night_act`";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        echo "Erreur: " . $e->getMessage();
        return null;
    }
}

$titlesAndIds = selectTitlesAndIdsFromDayAct($bdd);

?>


<!doctype html>
<html lang="en">
    <head>
    <title>PoleIT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>PoleIT Our Astro World  </title>


    </head>
    <?php include("../autre/menu.php"); ?>
    
    <body>

        <main>

            <header class="site-header">
            
            </header>


            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">                
                <div class="offcanvas-header">                    
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
              
            </div>


          
        </main>

        

        <!-- JAVASCRIPT FILES -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/countdown.js"></script>
        <script src="../js/init.js"></script>

    </body>
  <!-- Modal -->
  

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                

                        
                          <h1 class="text-white mt-2 mb-4 pb-2">
                            Pole <span style="color: blue;">IT</span> <span style="color: darkcyan;">Our Astro World  See Our Activities </span>    </h1>
                             <ul class="countdown d-flex flex-wrap align-items-center">
                               
                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="../videos_t/video_t.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>

            </section>
            <h2 style="color:white; display:block; margin:10px; "> Voici nos différentes activités</h2>

            <section class="articles">

  <?php
    // Affichage des titres et de leurs ID dans une structure HTML répétée
    if (!empty($titlesAndIds)) {
        foreach ($titlesAndIds as $data) {
            ?>
            
            <section class="articles">

  <article>

    <div class="article-wrapper">
      <figure>
           <img src="../../images/produits/<?php echo $data["image"];?>" alt="" />
      </figure>
      <div class="article-body">
        <h2>Night Activities</h2>
        <p style="color:black">
    <?php echo $data['titre']; ?>     
    </p> 
        <a href="Description_night.php?id=<?php echo $data["id"];?>" class="read-more">
          voir plus 
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
          <?php
        }
    } 
    ?>
</section>
  <!-- Modal 
-->
  


</html>
<style>


article {
  --img-scale: 1.001;
  --title-color: #000000;
  --link-icon-translate: -20px;
  --link-icon-opacity: 0;
  position: relative;
  border-radius: 16px;
  box-shadow: none;
  background: #fff;
  transform-origin: center;
  transition: all 0.4s ease-in-out;
  overflow: hidden;
}

article a::after {
  position: absolute;
  inset-block: 0;
  inset-inline: 0;
  cursor: pointer;
  content: "";
}

/* basic article elements styling */
article h2 {
  margin: 0 0 18px 0;
  font-family: "Bebas Neue", cursive;
  font-size: 1.9rem;
  letter-spacing: 0.06em;
  color: var(--title-color);
  transition: color 0.3s ease-out;
}

figure {
  margin: 0;
  padding: 0;
  aspect-ratio: 16 / 9;
  overflow: hidden;
}

article img {
  max-width: 100%;
  transform-origin: center;
  transform: scale(var(--img-scale));
  transition: transform 0.4s ease-in-out;
}

.article-body {
  padding: 24px;
}

article a {
  display: inline-flex;
  align-items: center;
  text-decoration: none;
  color: #28666e;
}

article a:focus {
  outline: 1px dotted #28666e;
}

article a .icon {
  min-width: 24px;
  width: 24px;
  height: 24px;
  margin-left: 5px;
  transform: translateX(var(--link-icon-translate));
  opacity: var(--link-icon-opacity);
  transition: all 0.3s;
}

/* using the has() relational pseudo selector to update our custom properties */
article:has(:hover, :focus) {
  --img-scale: 1.1;
  --title-color: #28666e;
  --link-icon-translate: 0;
  --link-icon-opacity: 1;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}


/************************ 
Generic layout (demo looks)
**************************/

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  padding: 48px 0;
  font-family: "Figtree", sans-serif;
  font-size: 1.2rem;
  line-height: 1.6rem;
  background-image: transparent;
  min-height: 100vh;
}

.articles {
  display: grid;
  max-width: 1200px;
  margin-inline: auto;
  padding-inline: 24px;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 24px;
}

@media screen and (max-width: 960px) {
  article {
    container: card/inline-size;
  }
  .article-body p {
    display: none;
  }
}

@container card (min-width: 380px) {
  .article-wrapper {
    display: grid;
    grid-template-columns: 100px 1fr;
    gap: 16px;
  }
  .article-body {
    padding-left: 0;
  }
  figure {
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
  figure img {
    height: 100%;
    aspect-ratio: 1;
    object-fit: cover;
  }
}

.sr-only:not(:focus):not(:active) {
  clip: rect(0 0 0 0); 
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap; 
  width: 1px;
}
</style>
