<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Fonte principal-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/css.css?v2" />
    <link rel="shortcut icon" href="./imagens/Logo TrampAqui.png" type="image/x-icon"/>
    <title>Registro - TrampAqui</title>
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
              <a class="cadastro" href="#"><strong> Sign in </strong></a>
          </div>
        </ul>
      </nav>
    </header>

  <div class="alinhamento">
    <div class="margin">
    <div class="logo-form"></div>
      <h1>Registre-se</h1>
      <br>
      <p style="font-size: 13px;margin-bottom: 20px;">Olá! Seja bem-vindo(a) à nossa plataforma de oportunidades! Estamos entusiasmados por você se juntar a nós na busca por talentos excepcionais para impulsionar o crescimento de novas empresas.</p>

    <form action="../server/controller/registrarUsuario.php" method="post">
      <div class="inputbox">
        <input type="text" class="registro" name="nomeUsuario" id="nomeUsuario" oninput="validaNome(this)"  required></input>
        <span>Nome do Usuario</span>
      </div>
      <div class="inputbox">
        <input type="text" class="registro" name="cpfUsuario" id="cpfUsuario" oninput="mascaraCPF(this)" minlength="14" maxlength="14" required></input>
        <span>CPF</span>
      </div>
      <div class="inputbox">
        <input type="text" class="registro" name="emailUsuario" id="emailUsuario" oninput="mascaraEmail(this)" required></input>
        <span>E-mail</span>
      </div>
      <div class="inputbox">
        <input type="password" class="registro" name="senhaUsuario" id="senhaUsuario" required></input>
        <span>Senha</span>
      </div>
      <button class="entrar">Entrar</button>
    </form>

    <div class="direcao-login">
      <a href="../login/index.php" class="texto-comum">Já possui uma conta? <span>Fazer login</span></a>
    </div>
    </div>
  </div>
  
  </body>
  <script src="./js/index.js"></script>
  <script src="../js-formatacao/formata.js"></script>
</html>
