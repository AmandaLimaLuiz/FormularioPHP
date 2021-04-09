<?php
require_once '../Tela de Login/CLASSES/usuarios.php';
$u = new Usuario;
?>

<html lang= "pt-br">

<head>
<meta charset = "utf-8"/>
<title>Projeto Login</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="corpo-form">
    <h1>Entrar</h1>
<form method="POST" >
<input type="email" placeholder="Usuário" name="email">
<input type="password" placeholder="Senha" name="senha">
 <input type="submit" value="ACESSAR" >
<a href="cadastrar.php">Ainda não é escrito?<strong> Cadastre-se</strong></a>

</form>
</div>
<?php


if(isset($_POST['nome']))
{
    
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    

   
    if(!empty($email) && !empty($senha))

{
    $u->conectar("projeto_login","localhost","root","");
    if($u->$msgErro == "")
    {
 if($u->logar($email,$senha))
 {
header("location:AreaPrivada.php");
 }
 else
 {
echo "Email ou  senha invalido.";
 }
}
else{
    echo "Erro".$u->$msgErro;
}
}
else
{
echo "Preencha todos os campos!";
}

}
?>
</body>
</html>
