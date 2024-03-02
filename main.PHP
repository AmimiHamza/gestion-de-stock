<html>
    <head>
        <title>Gestion de stock</title>
        <link rel="icon" href="stock.png">
		<style>
		html,body {
			background-image: url('background1.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			
		}
        frame[name="tit0"],frame[name="PH"],frame[name=""] {
      background-image: url('background1.jpg');
      background-size: cover;
      background-position: center;
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
    } ?>
    <frameset rows="12%,78%" border="1">
            <frame style="background-color: #f2f2f2;" name="title0" src="header.php" scrolling="no">
            <frameset rows="12%,88%">
                <frame name="menu" src="Menu.php?lg=<?= $lg ?>" scrolling="no">
                <frame name="aff" src="screen.php?lg=<?= $lg ?>"></frame>
        </frameset>
    </frameset>
</html>
