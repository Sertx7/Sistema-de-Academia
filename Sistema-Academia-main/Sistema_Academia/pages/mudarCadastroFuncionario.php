<?php
    require_once '../php/connectionSQL.php';
    require_once '../php/classQuerySQL.php';

    session_start();

    $conn = (new connectionDB())->conectaDB();
    $id = (new ConsultaDB($conn))->getIdByURL();
    $dadosFuncionario = (new ConsultaAluno($conn))->getDadosFuncionario($id);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/importGeral.css">
    <link rel="stylesheet" href="../styles/mudarCadastro.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Mudar Cadastro</title>
</head>
<body>
    <div class="container-mudar">
        <div class="container-form">
            <form action="../php/mudarCadastroSQL.php" method="POST" class="form-mudar-cadastro">
                <input type="hidden" name="ID" value="<?php echo $dadosFuncionario['ID'];?>">

                <p class="paragrafo">Nome:</p>
                <input type="text" name="Nome" placeholder="<?php echo $dadosFuncionario['Nome'];?>"><br>

                <p class="paragrafo">E-mail:</p>
                <input type="email" name="Email" placeholder="<?php echo $dadosFuncionario['Email'];?>"><br>

                <p class="paragrafo">Senha:</p>
                <input type="text" name="Senha" placeholder="<?php echo $dadosFuncionario['Senha'];?>"><br>

                <p class="paragrafo">CPF:</p>
                <input type="text" name="CPF" placeholder="<?php echo $dadosFuncionario['CPF'];?>" class="mask-cpf"><br>

                <p class="paragrafo">Data Nascimento: <?php echo $dadosFuncionario['Data-Nascimento'];?></p>
                <input type="date" name="Data_nascimento"><br>

                <p class="paragrafo">Telefone:</p>
                <input type="text" name="Telefone" placeholder="<?php echo $dadosFuncionario['Telefone'];?>" class="mask-fone"><br>

                <p class="paragrafo">Endereço:</p>
                <input type="text" name="Endereco" placeholder="<?php echo $dadosFuncionario['Endereco'];?>"><br>

                <p class="paragrafo">Salario:</p>
                <input class="salario" type="text" name="Salario" placeholder="R$ <?php echo number_format($dadosFuncionario['Salario'], 2, ',', '.');?>"><br>

                <p class="paragrafo">Cargo:</p>
                <input type="text" name="Cargo" placeholder="<?php echo $dadosFuncionario['Cargo'];?>"><br>
                <br>
                <input type="hidden" name="form-type" value="funcionario">
                <button class="botao-cadastro" type="submit">Atualizar Cadastro</button>
                <p class="info-cadastro"></p>
            </form>
        </div>
    </div>
    <script src="../functions/mudarCadastro.js"></script>
</body>
</html>