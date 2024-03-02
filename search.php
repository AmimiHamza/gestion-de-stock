<!DOCTYPE html>
<html>
<head>
	<title>Recherche produit</title>
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
    } ?>
	<style>
	  /* Add styles here */
	  form {
	    width: 60%;
	    margin: 0 auto;
	    font-family: Arial, sans-serif;
	    font-size: 16px;
	    padding: 20px;
	    border: 2px solid #ccc;
	    border-radius: 10px;
	  }
	  
	  h3 {
	    text-align: center;
	  }
	  
	  label {
	    display: inline-block;
	    width: 150px;
	    margin-bottom: 10px;
	  }
	  
	  input[type="text"], input[type="password"], textarea {
	    width: 60%;
	    padding: 10px;
	    margin-bottom: 15px;
	    border: 1px solid #ccc;
	    border-radius: 5px;
	    box-sizing: border-box;
	    font-family: inherit;
	    font-size: 16px;
	  }
	  
	  input[type="submit"], input[type="reset"] {
	    background-color: #4CAF50;
	    color: white;
	    padding: 12px 20px;
	    margin: 8px 0;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	    font-size: 16px;
	  }
	  
	  input[type="submit"]:hover, input[type="reset"]:hover {
	    background-color: #45a049;
	  }
	  
	  .button {
	    width: 100%;
	    height: 50px;
	    margin-top: 10px;
	  }
	</style>
</head>
<body>
    <form dir="<?php echo $sens; ?>" method="POST" action="">
	<h3><?php echo RECHERCHE_TITRE; ?></h3>
<label for="Code_Prod"><?php echo codeprod ;?>:</label>
	  <input type="text" id="Code_Prod" name="code_prod" placeholder="<?php echo codeprod ;?>" autocomplete="off"><br>
	  
	  <label for="Prod_Designiation"><?php echo des ;?>:</label>
	  <input type="text" id="Prod_Designiation" name="Prod_Designiation" placeholder="<?php echo des ;?>" autocomplete="off"><br>
	  
	  <label for="Prod_Prix_A"><?php echo prix ;?>:</label>
	  <input type="text" id="Prod_Prix_A" name="Prod_Prix_A" placeholder="<?php echo prix ;?>" autocomplete="off"><br>
	  
	  <label for="Prod_Marge"><?php echo mar ;?>:</label>
	  <input type="text" id="Prod_Marge" name="Prod_Marge" placeholder="<?php echo mar ;?>" autocomplete="off"><br>
	  
	  <label for="Prod_Quantité_St"><?php echo qua ;?>:</label>
	  <input type="text" id="Prod_Quantité_St" name="Prod_Quantité_St" placeholder="<?php echo qua ;?>" autocomplete="off"><br>
	  
	  <label for="Prod_Sueuil"><?php echo seu ;?>:</label>
	  <input type="text" id="Prod_Sueuil" name="Prod_Sueuil" placeholder="<?php echo seu ;?>" autocomplete="off"><br>
	  
	  <label for="ID_Fournisseur"><?php echo fou ;?>:</label>
	  <input type="text" id="ID_Fournisseur" name="ID_Fournisseur" placeholder="<?php echo fou ;?>" autocomplete="off"><br>
	  <input type="submit" class="button" name="submit_btn" value="<?php echo val ;?>">
	  <input type="reset" class="button" name="reset_btn" value="<?php echo ini ;?>">
	</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code_prod = $_POST["code_prod"];
	$Prod_Designiation=$_POST['Prod_Designiation'];
    $Prod_Prix_A = $_POST["Prod_Prix_A"];
    $Prod_Marge = $_POST["Prod_Marge"];
    $Prod_Quantity_St=$_POST['Prod_Quantité_St'];
    $Prod_Seuil=$_POST['Prod_Sueuil'];
    $ID_Fournisseur=$_POST['ID_Fournisseur'];
	header("Location: recherchertab.php?lg=" . $lg . "&Code_Prod=" . $code_prod . "&Prod_Designiation=" . $Prod_Designiation . "&Prod_Prix_A=" . $Prod_Prix_A . "&Prod_Marge=" . $Prod_Marge . "&Prod_Quantity_St=" . $Prod_Quantity_St . "&Prod_Seuil=" . $Prod_Seuil . "&ID_Fournisseur=" . $ID_Fournisseur);
}
?>


	<br>

</body>
</html>
