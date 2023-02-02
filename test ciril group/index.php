<?php
require_once ("conf.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <title>index</title>
</head>
<body>
    <div id="entete">
        <h1>Test de propagation du feu</h1>
    </div>
    <div>
        <?php
            printTab($NB_COL, $NB_LINE, $FIRE);
            $nbMax = $NB_LINE * $NB_COL;
        ?>

    </div>
    <button id="nextStep" chance="<?php echo $PROPAGATION_CHANCE?>">Avancée d'une étape</button>
    <button id="autoStep" chance="<?php echo $PROPAGATION_CHANCE?>">Avancée à l'étape finale</button>
</body>
</html>

<?php
    function printTab ($nbCol, $nbLine, $FIRE) {
        echo '<table>';
        for ($i=0; $i< $nbLine; $i++) {
            echo '<tr id="line' . $i . '">';
            for ($a=0; $a< $nbCol; $a++) {
                $currentCase = $i * $nbCol + $a +1 ;
                if ( in_array($currentCase, $FIRE)) {
                    echo '<th class="fire" id="' . $currentCase . '">' . $currentCase;
                    echo '</th>';
                } else {
                    echo '<th class="green" id="' . $currentCase . '">' . $currentCase;
                    echo '</th>';
                }
            }
            echo '</tr>';
        }

        echo '</table>';
    }
?>