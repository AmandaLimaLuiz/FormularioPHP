
<?php
require_once 'CLASSES/usuarios.php';
$u= new Usuario;
?>

<html lang= "pt-br">

<head>
<meta charset = "utf-8"/>
<title>Cadastro</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="corpo-form-cad">
    <h1>Cadastrar</h1>
<form method="POST" >
<input type="text" name="nome" placeholder="Nome Completo" maxlength="60">
<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
<input type="email" name="email" placeholder="Usuário" maxlength="20">
<input type="password" name="senha" placeholder="Senha" maxlength="10">
<input type="password" name="confSenha" placeholder="Confirmar Senha">
<input type="submit" value="Cadastrar">


</form>
</div>
<?php

if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confimarSenha = addslashes($_POST['confSenha']);

    
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty ($confimarSenha))

{
    $u->conectar("projeto_login","localhost","root","");
if ($u->msgErro == "") 
{
    if($senha == $confimarSenha)
    {
       if( $u->cadastrar($nome, $telefone, $email, $senha))
       {
           echo "Cadastado com sucesso!";
       }
       else{
           echo " Usuario já cadastrado!";
       }
    }
    else
    {
echo "Senha e Confirmar Senha não estão iguais. ";
    }

}
else{
echo "Erro: ";
}

}else 
{
    echo "Preencha todos os campos!";
}

}


?>
</body>
</html>
