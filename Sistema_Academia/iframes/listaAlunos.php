<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="../styles/iframeListaAlunos.css">
    <link rel="stylesheet" href="../styles/financeiro.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Lista Alunos</h1>
    </header>
    <?php require '../php/listaAlunosSQL.php';?>
    <script src="../functions/listaAlunos.js"></script>
</body>
</html>