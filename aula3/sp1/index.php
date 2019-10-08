<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo Online</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <table class="table">
    <?php
        $row = 0;
        $cols = 0;

        $handle = fopen("./data/CatalogoMercadorias.csv", "r");

        if ($handle === FALSE) {
            echo "<h1>Ocorreu um erro na manipulação do arquivo.</h1>";

            return;
        }
        while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
            if($row == 0) {
    ?>
        <thead class="thead-dark">
            <tr>
    <?php
                $cols = count($data);
                for ($c=0; $c < $cols; $c++) {
                    echo "<th scope='col'>$data[$c]</th>";
                }
    ?>      
            </tr>
        </thead>
        <tbody>
    <?php
            } else {
    ?>
            <tr>
    <?php
                $cols = count($data);
                for ($c=0; $c < $cols; $c++) {
                    echo "<td>$data[$c]</td>";
                }
            }

            $row++;
    ?>      
            </tr>
    <?php        
        }

        fclose($handle);
    ?>
        </tbody>
    </table>
</div>
</body>
</html>