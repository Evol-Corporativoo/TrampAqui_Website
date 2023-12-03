<?php

  include_once('../server/controller/isLogged.php');
  require_once('../server/dao/DaoCurriculo.php');
  $idEmpresa = $_SESSION['idEmpresa_real'];
  $empresaAtual = DaoEmpresa::procurarId($idEmpresa)[1];
  $idCurriculo = $_GET['idCurriculo'];
  $data = DaoCurriculo::buscarCurriculo($idCurriculo);

  $dataNasc = $data[0]['dataNascUsuario'];
  $explode = explode('-', $dataNasc);
  $newDataNasc = $explode[2].'/'.$explode[1].'/'.$explode[0];
  //print_r($data);

?>
<!DOCTYPE html>
<html
  lang="pt-BR"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Painel | Visualizar Candidatos</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/css.css" />
    
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="./assets/vendor/libs/apex-charts/apex-charts.css" />


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./assets/js/config.js"></script>
    <link rel="stylesheet" href="../css/form-style.css">
    <!-- <script defer src="../js/script.js"></script> -->
    <script defer src="../js-formatacao/formata.js"></script>
    <!-- <script defer src="../js-formatacao/valida.js"></script> -->

  </head>


  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img style="height: 70px;width: 70px;" src="./assets/img/favicon/favicon.png">
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Painel ADM</div>
              </a>
            </li>

            <!-- Layouts -->

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Gerir Empresas</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="addEmpresa.php" class="menu-link">
                    <div data-i18n="Without menu">Cadastrar empresa</div>
                  </a>
                </li>
                <li class="menu-item">
                  
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <!-- <i class="menu-icon tf-icons bx bx-layout"></i> -->
                        <div data-i18n="Layouts">Minhas empresas</div>
                      </a>

                      <ul class="menu-sub">
                        <?php
                        
                          if($empresas != 0){
                          foreach($empresas as $empresa){

                          
                        
                        ?>
                        <li <?php if($empresa['idEmpresa']==$idEmpresa){ echo('class="menu-item active"');} ?>>
                          <a href="./minhaEmpresa.php?idEmpresa=<?php echo $empresa['idEmpresa']; ?>" class="menu-link">
                            <div data-i18n="Without menu"><?php echo $empresa['nomeEmpresa']; ?></div>
                          </a>
                        </li>
                        <?php }}?>
                      </ul>
                    

                  
                </li>
              </ul>
            </li>

            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Opções</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="./addVaga.php?idEmpresa=<?php echo $idEmpresa; ?>" class="menu-link">
                    <div data-i18n="Without menu">Criar vaga</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="./vagas.php?idEmpresa=<?php echo $idEmpresa; ?>" class="menu-link">
                    <div data-i18n="Without menu">Gerir vaga</div>
                  </a>
                </li>
              </ul>
            </li>

 
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <!-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Buscar..."
                    aria-label="Search..."
                  />
                </div>
              </div> -->
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="./assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="./assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $nomeUsuario; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Meu Perfil</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Configurações</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Faturamento</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../server/controller/logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Sair</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ Usuário -->
                </ul>
                </div>
                </nav>
                
                <!-- / Barra de navegação -->
        

                  <!-- Conteúdo -->
                  <div class="submenu">
                    <div class="conteudo-submenu">
                      <a href="listCandidatos.php?idVaga=<?php echo $_SESSION['idVaga_real']; ?>" class="volta-botao">
                        <span class="material-symbols-outlined volta-botao">
                          arrow_back
                          </span>
                      </a>
                      <h2 class="green">Currículo</h2>
                    </div>
                  </div>
                  <div class="container-candidato">
                    <div class="container-info-candidato">
                      <h3>Informações básicas</h3>
                      <div class="basico-candidato">
                        <div class="left-candidato">
                          <div class="align-info">
                            <p class="bold">Nome</p>
                            <p id="nome"><?php echo $data[0]['nomeUsuario']; ?></p>
                          </div>
                          <div class="align-info">
                            <p class="bold">Endereço</p>
                            <p id="logradouro">Rua dos Têxteis</p>
                            <p id="cep">08490-600</p>
                          </div>
                        </div>
                        <div class="right-candidato">
                          <div class="align-info">
                            <p class="bold">Nível de instrução</p>
                            <p id="instrucao"><?php

                              echo ($data[2][0]['diplomaFormacao']);

                            ?></p>
                          </div>
                          <div class="align-info">
                            <p class="bold">Contato</p>
                            <p id="email"><?php echo $data[0]['emailUsuario']; ?></p>
                            <p id="telefone"><?php echo $data[0]['telefoneUsuario']; ?></p>
                          </div>
                        </div>
                      </div>
                      <h3>Informações detalhadas</h3>
                        <div class="curriculo-candidato">
                          <div class="topo-candidato">
                            <div class="left-candidato">
                              <div class="align-info">
                                <p class="bold">Gênero</p>
                                <p id="genero"><?php echo $data[1]['genero']; ?></p>
                              </div>
                              <div class="align-info">
                                <p class="bold">Data de nascimento</p>
                                <p id="data-nasc"><?php echo $newDataNasc; ?></p>
                              </div>
                            </div>
                            <div class="right-candidato">
                              <div class="align-info">
                                <p class="bold">Estado civil</p>
                                <p id="estadocivil"><?php echo $data[1]['estadoCivilCurriculo']; ?></p>
                              </div>
                            </div>
                          </div>
                          <div class="baixo-candidato">
                              <div class="align-info">
                                <p class="bold">Objetivo</p>
                                <p id="objetivo"><?php echo $data[1]['objetivoCurriculo'];?></p>
                              </div>
                          </div>

                          <?php foreach ($data[4] as $key => $experiencia) {

                            $inicio = $experiencia['dataInicioExperiencia'];
                            $termino = $experiencia['dataTerminoExperiencia'];

                            $ex_inicio = explode('-',$inicio);
                            $ex_fim = explode('-', $termino);

                            $n_inicio = $ex_inicio[1].'/'.$ex_inicio[0];
                            $n_termino = $ex_fim[1].'/'.$ex_fim[0];
                            # code...
                          ?>

                          <div class="baixo-candidato">

                            <div class="align-info">
                              <?php if($key == 0){ ?><p class="bold">Histórico profissional</p><?php } ?>
                              <div class="align-hist" id="historico">
                                <p id="cargo"><?php echo($experiencia['tituloExperiencia']); ?></p>
                                <p id="duracao-emprego">(<?php echo($n_inicio); ?> - <?php echo($n_termino); ?>)</p>
                              </div>
                              <div class="align-hist" id="historico">
                                <p id="local"><?php echo($experiencia['localidadeExperiencia']); ?></p>
                                <p id="empresa">Empresa <?php echo($experiencia['nomeEmpresa']); ?></p>
                              </div>
                            </div>

                          </div>

                          <?php } ?>

                          

                            <?php foreach ($data[2] as $key => $formacao) {

                              $dataInicio = $formacao['dataInicioFormacao'];
                              $dataTermino = $formacao['dataTerminoFormacao'];

                              $e_inicio = explode('-',$dataInicio);
                              $e_fim = explode('-', $dataTermino);

                              $n_dataInicio = $e_inicio[1].'/'.$e_inicio[0];
                              $n_dataTermino = $e_fim[1].'/'.$e_fim[0];

                              # code...
                            ?>
                            <div class="baixo-candidato">
                              <div class="align-info">
                                <?php if($key==0){ ?><p class="bold">Formação acadêmica</p><?php } ?>
                                <div class="align-hist" id="academico">
                                  <p id="curso"><?php echo $formacao['diplomaFormacao']; ?></p>
                                  <p id="duracao-curso">(<?php echo($n_dataInicio); ?> - <?php echo($n_dataTermino); ?>)</p>
                                </div>
                                <div class="align-hist" id="historico">
                                  <p id="local"><?php echo $formacao['localFormacao']; ?></p>
                                  <p id="instituicao"><?php echo $formacao['instituicaoFormacao']; ?></p>
                                </div>
                              </div>
                            </div>
                              <?php } ?>

                          

                          <div class="baixo-candidato">
                            <?php foreach ($data[3] as $key => $idioma) {
                              # code...
                            ?>
                            <div class="align-info">
                              <?php if($key==0){?><p class="bold">Idioma</p><?php } ?>
                              <div class="align-hist" id="idioma">
                                <p id="idioma"><?php echo $idioma['idioma']; ?></p>
                                <p id="nivel"><?php echo $idioma['nivelIdioma']; ?></p>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        

                          <div class="baixo-candidato">
                            <div class="align-info">
                              <p class="bold">Habilidades e competências</p>
                              <div class="align-hist" id="habilidades">
                                <p id="competencias"><?php echo $data[1]['habilidadesCurriculo']; ?></p>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div>

                    <div class="compativel-candidato">
                      <h3>Status:</h3>
                      <a href="http://localhost/TrampAqui_Website-main/server/controller/statusCandidato.php?id=<?php echo $_GET['idCandidatura']; ?>&status=2" class="botao-aprovar">Aprovar</a>
                      <a href="http://localhost/TrampAqui_Website-main/server/controller/statusCandidato.php?id=<?php echo $_GET['idCandidatura']; ?>&status=0"  class="botao-reprovar">Reprovar</a>
                    </div>
                  </div>         
            <!-- / Content -->

            <!-- Footer
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
               
              </div>
            </footer>
             / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

  

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="./assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="./assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>