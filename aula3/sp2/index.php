<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa X</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <?php include "shared/header.php"; ?>

        <div class="conteudo">
            <?php
                $page = $_GET["p"] ?? "principal";

                include "pages/$page.php";
            ?>
        </div>
        <div class="adjacente">
            <h2>Conteúdo Adjacente</h2>
        </div>
    </div>

    <?php include "shared/footer.php"; ?>
</body>
</html>