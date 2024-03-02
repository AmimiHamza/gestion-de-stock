<style>


  a {
    margin-right: 340px; /* add some space between links */
    position: relative; /* make links the reference for the absolutely positioned lines */
  }
  a:after {
    content: '';
    display: block; /*under */
    width: 0;
    height: 2px;
    left: 0;
    background-color: red;
    position: absolute;
    transition: width 2s; /* add a transition effect */
  }
  a:hover:after {
    width: 100%; /* show the full line on hover */
  }


  .image {
    width: 40px;
    height: 40px;
}

.image:hover {
    transform: scale(1.1);
}

</style>
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



<body>

  <a href="list.php?lg=<?= $lg ?>" title="Lister" target="aff"><img src="img/list.png" alt="Image" class="image"></a>
  <a href="add.php?lg=<?= $lg ?>" title="Ajouter" target="aff"><img src="img/ajout.png" alt="Image" class="image"></a>
  <a href="search.php?lg=<?= $lg ?>" title="Rechercher" target="aff"><img src="img/rechercher.png" alt="Image" class="image"></a>
  <a href="Quit.php?lg=<?= $lg ?>" title="Quitter" target="aff"><img src="img/Quitter.png" alt="Image" class="image"></a>
 

</body>
