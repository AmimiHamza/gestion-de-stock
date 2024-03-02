<!DOCTYPE html>
<html>
<head>
	<title>Recherche produit</title>

	<style>
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
		  background-color: #4CAF50;
		  color: white;
		}
	    
	    h1 {
	        text-align: center;
	        color: #333;
	        font-size: 2.5rem;
	        margin-top: 2rem;
	    }
	    form {
	    width: 60%;
	    margin: 0 auto;
	    font-family: Arial, sans-serif;
	    font-size: 16px;
	    padding: 20px;
	    border: 2px solid #ccc;
	    border-radius: 10px;
	  }
	    label {
	        display: block;
	        font-size: 1.2rem;
	        margin-bottom: 0.5rem;
	        color: #666;
	    }
	    input[type="text"] {
	        padding: 0.5rem;
	        border-radius: 5px;
	        border: 1px solid #ccc;
	        font-size: 1.2rem;
	        width: 100%;
	    }
	    input[type="submit"] {
	        background-color: #333;
	        color: #fff;
	        font-size: 1.2rem;
	        border: none;
	        padding: 0.5rem 1rem;
	        border-radius: 5px;
	        margin-top: 1rem;
	        cursor: pointer;
	        transition: background-color 0.3s ease;
	    }
	    input[type="submit"]:hover {
	        background-color: #555;
	    }
	</style>
</head>
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
<body dir="<?php echo $sens; ?>">
	<?php
		// Connexion à la base de données
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

		// Vérification de la connexion
		if (!$connexion) {
		    die("La connexion a échoué: " . mysqli_connect_error());
		}

		// Traitement du formulaire
		if (isset($_GET['Code_Prod'])) {
			$Code_Prod = $_GET['Code_Prod'];

			// Affichage des informations dans une table
			echo '<table>';
			echo '<tr><th>'.ID.'</th><th>' . CODE_PROD . '</th><th>' . DESIGNATION . '</th><th>' . PRIX_A . '</th><th>' . MARGE . '</th><th>' . QUANTITE_STOCK . '</th><th>' . SEUIL . '</th><th>' . ID_FOURNISSEUR . '</th><th>' . IMAGE . '</th></tr>';
			

$sql = "SELECT * FROM stk WHERE Code_Prod = $Code_Prod";
$resultat = mysqli_query($connexion, $sql);

if (mysqli_num_rows($resultat) > 0) {
    while($row = mysqli_fetch_assoc($resultat)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['Code_Prod'] . '</td>';
        echo '<td>' . $row['Prod_Designiation'] . '</td>';
        echo '<td>' . $row['Prod_Prix_A'] . '</td>';
        echo '<td>' . $row['Prod_Marge'] . '</td>';
        echo '<td>' . $row['Prod_Quantity_St'] . '</td>';
        echo '<td>' . $row['Prod_Sueuil'] . '</td>';
        echo '<td>' . $row['ID_Fournisseur'] . '</td>';
		echo '<td><img src="uploads/' . $row["imagep"] . '" width="40%" alt="Product Image" class="image"></td>';
        echo '</tr>';
    }
} else {
    echo '<p>' . NO_RESULT . $Code_Prod .'</p>';
}

echo '</table>';
}


		// Fermeture de la connexion à la base de données
		mysqli_close($connexion);
	?>
</body>
</html>
