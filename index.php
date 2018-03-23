<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hell's Triangle challenge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {text-align:center;}
        form div {margin-top:4px}
    </style>
</head>
<body>
    <h1>Hell's Triangle challenge</h1>
    <p>Try to assemble a Hell's Triangle below to see the largest result</p>
    <form method="post" action="index.php">
        <div>
            <input name="triangle[0][0]" size="5" />
        </div>
        <div>
            <input name="triangle[1][0]" size="5" />
            <input name="triangle[1][1]" size="5" />
        </div>
        <div>
            <input name="triangle[2][0]" size="5" />
            <input name="triangle[2][1]" size="5" />
            <input name="triangle[2][2]" size="5" />
        </div>
        <div>
            <input name="triangle[3][0]" size="5" />
            <input name="triangle[3][1]" size="5" />
            <input name="triangle[3][2]" size="5" />
            <input name="triangle[3][3]" size="5" />
        </div>
        <div>
            <input name="triangle[4][0]" size="5" />
            <input name="triangle[4][1]" size="5" />
            <input name="triangle[4][2]" size="5" />
            <input name="triangle[4][3]" size="5" />
            <input name="triangle[4][4]" size="5" />
        </div>
        <div>
            <input type="submit" value="Send" />
        </div>
    </form>
<?php
if (isset($_REQUEST['triangle'])) {

    
    //prepare array
    $array = [];

    foreach($_REQUEST['triangle'] as $rowNumber=>$rowElements) {
        foreach ($rowElements as $position => $value) {
            if ($value=='' || !is_numeric($value)) {
                continue;
            }

            $array[$rowNumber][$position] = (int) $value;
        }
    }

    spl_autoload_extensions(".php"); 
    spl_autoload_register();


    $triangle = new HellsTriangle\Triangle();

    if($triangle->setArray($array)) {

        $hellsSum = $triangle->getHellsSum();
        ?>
        <p>Triangle:</p>
        <pre><?php
        foreach($array as $rowNumber=>$rowElements) {
            foreach ($rowElements as $position => $value) {
                echo $value.' ';
            }
            echo '<br />';
        }
        ?>
        </pre>
        <p>Path with largest sum is '<?= key($hellsSum) ?>': <?= current($hellsSum) ?></p>
        <?php
    } else {
        ?>
        <p>Invalid triangle</p>
        <?php
    }
}
?>
</body>
</html>