<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="corpo-form-cad">
        <h1>Cadastrar<h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlenght="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlenght="30">
            <input type="email" name="email" placeholder="E-mail" maxlenght="40">
            <input type="password" name="senha" placeholder="Senha" maxlenght="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha">
            <input type="submit" value="Cadastrar">
        </form>
        
    </div>

<?php
require_once 'classes/usuarios.php';
$u = new Usuario;

//verificar se clicou no botao
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']); // ADDSLASHES PARA A SEGURANÇA -> REMOVE QUALQUER COMANDO MAL INTENCIONADO INSERIDO
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //verificar se nao esta preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha))
    {
        $u->conectar("projeto_login","localhost", "root", "");
        if($u->msgErro == "")//esta tudo ok
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome, $telefone, $email, $senha))
                {
                    ?>
                    <div id="msg-sucesso">
                        Cadastrado com sucesso! Acesse para entrar!
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                    Email já cadastrado!
                    </div>
                    <?php
                    
                }

            }
            else
            {
                ?>
                <div class="msg-erro">
                    As senhas não coincidem!
                </div>
                <?php
            }
            
        }
        else
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u->msgErro; ?>
            </div>
            <?php
            
        }
    }
    else
    {
        ?>
        <div class="msg-erro">
            Preencha todos os campos!
        </div>
        <?php
    }
}
?>
</body>

</html>