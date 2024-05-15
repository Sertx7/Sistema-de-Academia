<?php
    require_once '../php/connectionSQL.php';
    require_once '../php/classQuerySQL.php';

    session_start();

    $conn = (new connectionDB())->conectaDB();
    $id = (new ConsultaDB($conn))->getIdByURL();
    $dadosAluno = (new ConsultaAluno($conn))->getDadosAluno($id);
    
    function getAssinaturas($conn){
        $planos = (new ConsultaDB($conn))->getAssinaturasDB();
        // Percorre todos os planos
        foreach ($planos as $id => $plano){
            echo '<option value="'. $id .'">'. $plano .'</option>';
        }
    }
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
                <input type="hidden" name="ID" value="<?php echo $dadosAluno['ID'];?>">

                <p class="paragrafo">Nome:</p>
                <input type="text" name="Nome" placeholder="<?php echo $dadosAluno['Nome'];?>"><br>

                <p class="paragrafo">E-mail:</p>
                <input type="email" name="Email" placeholder="<?php echo $dadosAluno['Email'];?>"><br>

                <p class="paragrafo">Senha:</p>
                <input type="text" name="Senha" placeholder="<?php echo $dadosAluno['Senha'];?>"><br>

                <p class="paragrafo">CPF:</p>
                <input type="text" name="CPF" placeholder="<?php echo $dadosAluno['CPF'];?>" class="mask-cpf"><br>

                <p class="paragrafo">Data Nascimento: <?php echo $dadosAluno['Data-Nascimento'];?></p>
                <input type="date" name="Data_nascimento"><br>

                <p class="paragrafo">Telefone:</p>
                <input type="text" name="Telefone" placeholder="<?php echo $dadosAluno['Telefone'];?>" class="mask-fone"><br>

                <p class="paragrafo">Endereço:</p>
                <input type="text" name="Endereco" placeholder="<?php echo $dadosAluno['Endereco'];?>"><br>

                <p class="paragrafo">Assinatura:</p>
                <div class="div-select">
                    <select name="Plano_Adesao" id="appearance-select">
                        <?php getAssinaturas($conn);?>
                    </select><br>
                </div>
                <br>
                <input type="hidden" name="form-type" value="aluno">
                <button class="botao-cadastro" type="submit">Atualizar Cadastro</button>
                <p class="info-cadastro"></p>
            </form>
        </div>
    </div>
    <script src="../functions/mudarCadastro.js"></script>
</body>
</html>