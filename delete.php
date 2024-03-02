<html>
    <head>
        <link rel="stylesheet" href="/styles/style.css">
    </head>
    <body>

        <?php
//connexion
$servername="localhost";
$username="root";
$spassword="";
$bdname="products";
$connexion=mysqli_connect($servername,$username,$spassword,$bdname);
if(!$connexion){
    die("connection failed: ". mysqli_connect_error());}
else{
    echo "connexionn OK"; echo "<br>";
}
if (isset($_GET['Code_Prod'])) {
  $Code_Prod = $_GET['Code_Prod'];
  // Vérifier si le code produit existe déjà dans la table stk
  $resultat = mysqli_query($connexion, "SELECT * FROM stk WHERE Code_Prod=$Code_Prod");
  
  if (mysqli_num_rows($resultat) > 0) {
      // Le code produit existe dans la table
      $sql = "DELETE FROM stk WHERE Code_Prod = $Code_Prod";
      
      if (mysqli_query($connexion, $sql)) {
          echo "La donnée a été supprimée avec succès de la base de données.";
          
          // Decrement the ID values of the remaining rows in the table
          $sql = "SET @decrement := 0";
          mysqli_query($connexion, $sql);
          
          $sql = "UPDATE stk SET id = (@decrement:=@decrement+1)";
          mysqli_query($connexion, $sql);
          
          // Renumber the id values to fill any gaps
          $sql = "ALTER TABLE stk AUTO_INCREMENT = 1";
          mysqli_query($connexion, $sql);
          
          // Redirection vers la page de liste
          header("Location: list.php");
      } else {
          echo "Erreur: " . mysqli_error($connexion);
      }
  } else {
      // Le code produit n'existe pas dans la table
      echo "Le code produit saisi n'existe pas dans la table stk.";
  }

  mysqli_close($connexion);
}
?>
</body>
