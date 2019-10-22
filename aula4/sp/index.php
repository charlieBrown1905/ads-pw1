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
        <div>
            <a href="formulario.php"> <i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
        </div> 
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>                
                <?php
                    $sql = 'SELECT 
                                    MER.ID, MER.Nome, FBA.Nome, MER.Preco 
                                FROM `mercadoria` AS MER
                                    INNER JOIN `fabricante` AS FBA ON MER.FabricanteID = FBA.ID';

                    $conn = new mysqli('localhost', 'root', null, 'xerp');

                    if($conn->connect_errno) {                    
                        echo '<h1>$conn->connect_error</h1>';

                        exit();
                    }

                    $resultado = $conn->query($sql);

                    while($linha = $resultado->fetch_array()) {
                        print "
                            <tr>
                                <th scope='row'>$linha[0]</th>
                                <td>$linha[1]</td>
                                <td>$linha[2]</td>
                                <td>$linha[3]</td>
                            </tr>";
                    }

                    $resultado->close();
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>