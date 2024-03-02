<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produits</title>
    <style>
       a {
    margin-right: 10px; /* add some space between links */
    position: relative; /* make links the reference for the absolutely positioned lines */
  }
  a:after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background-color: red;
    position: absolute;
    left: 0;
    transition: width 2s; /* add a transition effect */
  }
  a:hover:after {
    width: 100%; /* show the full line on hover */
  }


  .image {
    width: 30px;
    height: 30px;
}

.image:hover {
    transform: scale(1.1);
}
      table {
        border-collapse: collapse;
        width: 80%;
        margin: auto;
      }

      td {
        text-align: left;
        padding: 8px;
      }

      th {
        background-color: pink;
        color: white;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      form {
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
  <?php $lg = isset($_GET['lg']) ? $_GET['lg'] : 'Ang';
    switch ($lg) {
        case 'Mr':
            include "constants/cstmr.php";
            $sens='RTL';
            break;
        case 'Fr':
            include "constants/cstfr.php";
            $sens='LTR';
            break;
        case 'Ang':
            include "constants/cstang.php";
            $sens='LTR';
            break;
        case 'Esp':
            include "constants/cstesp.php";
            $sens='LTR';
            break;
        default:
            include "cstfr.php"; // Langue par défaut : Français
            $sens='LTR';
    }
 ?>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Vérification de la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Requête SQL pour récupérer toutes les données de la table "products"
    $sql = "SELECT * FROM stk ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);
    // Affichage des données récupérées

    if (mysqli_num_rows($result) > 0) {
      echo "<form>";
      echo '<table>';
			echo '<tr><th>'.ID.'</th><th>' . CODE_PROD . '</th><th>' . DESIGNATION . '</th><th>' . PRIX_A . '</th><th>' . MARGE . '</th><th>' . QUANTITE_STOCK . '</th><th>' . SEUIL . '</th><th>' . ID_FOURNISSEUR .'</th><th>' . ACTION . '</th><th>' ;
			
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["Code_Prod"] . "</td>";
        echo "<td>" . $row["Prod_Designiation"] . "</td>";
        echo "<td>" . $row["Prod_Prix_A"] . "</td>";
        echo "<td>" . $row["Prod_Marge"] . "</td>";
        echo "<td>" . $row["Prod_Quantity_St"] . "</td>";
        echo "<td>" . $row["Prod_Sueuil"] . "</td>";
        echo "<td>" . $row["ID_Fournisseur"] . "</td>";
        //echo '<td>' . str_replace("\\", "/", $row["imagep"]) . '</td>';
        echo '<td><a href="delete.php?Code_Prod=' . $row["Code_Prod"] . '" title="Supprimer" target="aff"><img src="img/dell.png" alt="Image" class="image"></a>
              <a href="modify.php?Code_Prod=' . $row["Code_Prod"].'&lg='.$lg.'" title="Modifier" target="aff"><img src="img/modification.png" alt="Image" class="image"></a>
              <a href="details.php?Code_Prod=' . $row["Code_Prod"].'&lg='.$lg.'" title="details" target="aff"><img src="img/details.png" alt="Image" class="image"></a>
        </td>';

        echo "</tr>";
      }
      echo "</table>";
      echo "</form>";
    }
    else {
        echo "0 résultats";
    }
    ?>
  </body>
</html>
