<?php
session_start();
 include('../../autre/bdd.php');
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>description</title>
</head>

<body>
<h3 class="masthead-brand"><a href="../../Espace_membre/controleur/accueil_c.php" style="color:#fff;"> <i style="color:#dc3545; font-weight:bold;"> Acc</i><i style="color:#007bff; font-dark:bold;">ueil</i></a></h3>
<?php

$sql = "SELECT * FROM day_act WHERE id = :id";

$stmt = $bdd->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {

  
?>

    <article class="row">
        <div class="col-sm-5 offset-sm-1">
            <p style="text-align:center; margin:20px;">
                <img src="../../images/produits/<?php echo $row['image']; ?>" width=300 height= 300>
                
            </p>
        </div>
     
        <div class="col-sm-6" style="margin-top:40px;">
            <h1><?php echo $row['titre']; ?></h1>
        </div>
       
        <div class="col-sm-8 offset-sm-2">
            <p style="font-weight: 900;">Déscription :</p>
            <p style="text-align:center;"> <?php echo $row['texte'];?></p>
        </div>
    </article>
  <?php  }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>