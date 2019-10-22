<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Mercadoria</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php
    $cnx = new mysqli('localhost', 'root', null, 'xerp');
    $rFab = $cnx->query('SELECT ID, Nome FROM `fabricante`'); 
    
    $id = 0;
    $persistiu = false;

    if (count($_POST) == 4) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $fabricanteID = $_POST['fabricanteID'];
        $preco = $_POST['preco'];

        if ($id == 0) {
            $persistiu = $cnx->query("
                INSERT
                    INTO `mercadoria`
                        (Nome, FabricanteID, Preco)
                    VALUES
                        ('$nome', $fabricanteID, $preco)");

            if ($persistiu) {
                $id = $cnx->insert_id;
            }
        } else {
            $persistiu = $cnx->query("
                UPDATE `mercadoria`
                    SET
                        Nome = '$nome',
                        FabricanteID = $fabricanteID,
                        Preco = $preco
                    WHERE
                        ID = $id");
        }
    }
    ?>   

    <div class="container">
        <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</a>

        <h2>Mercadoria</h2>
        
        <?php
        if ($persistiu) {
        ?>
        <div class="alert alert-primary" role="alert">
            <strong>Dados armazenados com sucesso!</strong>
        </div>
        <?php
        }
        ?>

        <form method="POST">            
            <input type="hidden" name="id" value="<?= @$id ?>">

            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= @$nome ?>" placeholder="Nome da mercadoria">
            </div>

            <div class="form-group">
                <label for="fabricanteID">Fabricante</label>
                <select class="form-control" name="fabricanteID" id="fabricanteID" value="<?= @$fabricanteID ?>">
                    <?php
                    while ($f = $rFab->fetch_array()) {
                        echo "<option value='$f[0]'>$f[1]</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
              <label for="preco">Preço</label>
              <input type="number"
                class="form-control" name="preco" id="preco" placeholder="Preço da mercadoria"
                value="<?= @$preco ?>">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</body>

</html>