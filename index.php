
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="Entrar">
            <a href="cadastrar.php">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
        </form>
        
    </div>
<?php
require_once 'classes/usuarios.php';
$u = new Usuario;

if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email) && !empty($senha))
    {
        $u->conectar("projeto_login","localhost", "root", "");
        if($u->msgErro == "")
        {
        
            if($u->logar($email,$senha))
            {
                header("location: areaPrivada.php");
            }
            else
            {
                ?>
                <div class="msg-erro">
                Email e/ou senha estão incorretos!
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