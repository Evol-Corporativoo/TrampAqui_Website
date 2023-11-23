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
    <title>Área da empresa - TrampAqui</title>
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
            <a href="#Home"><strong> Home </strong></a>
          </li>
          <li>
            <a href="#Empresas"><strong> Empresas </strong></a>
          </li>
          <li>
            <a href="#App"><strong> App </strong></a>
          </li>
          <li>
            <a href="./sobre-nos/index.html"><strong> Sobre </strong></a>
          </li>
          <li>
            <a href="#contato"><strong> Contato </strong></a>
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
      <h1>Minha Empresa</h1>
      <br>
      
    <form action="../server/controller/registrarEmpresa.php" method="post">
      <div class="inputbox">
        <input type="text" class="registro" id="nomeEmpresa" name="nomeEmpresa" required></input>
        <span>Nome da empresa</span>
      </div>

      <div class="inputbox">
        <input type="text" class="registro" id="cnpjEmpresa" name="cnpjEmpresa" maxlength="18" oninput="mascaraCNPJ(this)" required></input>
        <span>CNPJ</span>
      </div>

      <div class="inputbox">
        <input type="text" class="registro" id="localEmpresa" name="localEmpresa" maxlength="9" oninput="mascaraCEP(this)" required></input>
        <span>CEP da Sede</span>
      </div>

      <div class="inputbox">
        <input type="text" class="registro" id="atuacaoEmpresa" name="atuacaoEmpresa" required></input>
        <span>Área de atuação</span>
      </div>

      <div class="inputbox">
        <input type="tel" class="registro" id="telEmpresa" name="telEmpresa" onkeypress="mask(this, mphone);" onblur="mask(this, mphone)" required></input>
        <span>Telefone</span>
      </div>

      <button class="entrar">Entrar</button>
    </form>

    </div>
  </div>



  </body>
  <script src="./js/script.js"></script>
  <script src="../js-formatacao/formata.js"></script>
  <script src="../js-formatacao/valida.js"></script>
</html>
