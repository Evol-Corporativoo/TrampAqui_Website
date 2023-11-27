<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Fonte principal-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/css.css" />
    <link rel="shortcut icon" href="./imagens/Logo TrampAqui.png" type="image/x-icon"/>
    <title>Login - TrampAqui</title>
  </head>
  <body>

  <header id="Home">
      <nav id="Home">
        <img src="./imagens/Logo.png" class="logo" alt="" />
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li>
            <a href="../index.html#Home"><strong> Home </strong></a>
          </li>
          <li>
            <a href="../index.html#Empresas"><strong> Empresas </strong></a>
          </li>
          <li>
            <a href="../index.html#App"><strong> App </strong></a>
          </li>
          <li>
            <a href="./sobre-nos/index.html"><strong> Sobre </strong></a>
          </li>
          <li>
            <a href="../index.html#contato"><strong> Contato </strong></a>
          </li>
          <div class="login-cadastro">
              <a href="../login/index.php"><strong>Login</strong></a>
              <a class="cadastro" href="../registro/index.php"><strong> Sign in </strong></a>
          </div>
        </ul>
      </nav>
    </header>

  <div class="alinhamento">
    <div class="margin">
      <div class="logo-form"></div>
      <h1>Log In</h1>
      <br>
      <p style="font-size: 13px;margin-bottom: 20px;">Olá! Bem-vindo de volta, para iniciar faça login com sua empresa. Insira suas credenciais abaixo e tenha acesso a todas as ferramentas e recursos para impulsionar a sua vaga.</p>
    <form action="../server/controller/logarUsuario.php" method="post">
      <div class="inputbox">
        <input type="text" class="registro" name="emailLogin" id="emailLogin" required></input>
        <span>E-mail</span>
      </div>

      <div class="inputbox">
        <input type="password" class="registro" name="senhaLogin" id="senhaLogin" required></input>
        <span>Senha</span>
      </div>
      <div class="redefinir-login">
        <a href="#" class="texto-comum">Redefinir senha</a>
      </div>
      <button class="entrar">Entrar</button>
    </form>
    <div class="direcao-login">
      <a href="../registro/index.php" class="texto-comum">Não possui uma conta? <span>Registre-se</span></a>
    </div>
    </div>
  </div>



  </body>
  <script src="./js/script.js"></script>
</html>
