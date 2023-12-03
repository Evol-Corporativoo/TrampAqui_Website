<?php

include_once(__DIR__.'/../server/controller/isLogged.php');
require_once(__DIR__.'/../server/dao/DaoEmpresa.php');
$idEmpresa = $_GET['idEmpresa'];
$_SESSION['idEmpresa_real'] = $idEmpresa;

$empresaAtual = DaoEmpresa::procurarId($idEmpresa)[1];
if($empresaAtual['idUsuario'] != $usuarioLogado->getId()){
  header('Location: ../server/controller/logout.php');
}

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

    <title>Trampaqui | Painel</title>

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
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="./assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="./assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./assets/js/config.js"></script>
    
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

            <li class="menu-item active">
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
                <li class="menu-item active">
                  
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

            <li class="menu-item">
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
                <li class="menu-item">
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
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Buscar..."
                    aria-label="Search..."
                  />
                </div>
              </div>
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
                        <!-- Alterar aqui--->
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
                
                <!-- Content wrapper -->
                <div class="content-wrapper">
                  <!-- Conteúdo -->
                
                  <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                      <div class="col-lg-8 mb-4 order-0">
                        <div class="card">
                          <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                              <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo $empresaAtual['nomeEmpresa']; ?></h5>
                                <p class="mb-4">
                                  Comece a contratar profissionais para <?php echo $empresaAtual['nomeEmpresa']; ?> e administre suas necessidades aqui mesmo. Como podemos ser úteis hoje?
                                </p>
                            </div>

                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                              <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                  src="./assets/img/favicon/favicon.png"
                                  height="200"
                                  alt="Ver Medalha do Usuário"
                                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                  data-app-light-img="illustrations/man-with-laptop-light.png"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center row">
                              <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                  <h5 class="card-title text-primary">Crie uma vaga</h5>
                                  <p class="mb-4">
                                    Abra portas para a vinda de funcionários por aqui. Abra uma vaga dentro da sua empresa!
                                  </p>
                                  <a href="./addVaga.php?idEmpresa=<?php echo($_GET['idEmpresa']); ?>">
                                    <button type="submit" class="entrar">Abrir vaga</button>
                                  </a>
                                </div>
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                  <h5 class="card-title text-primary">Gerir suas vagas</h5>
                                  <p class="mb-4">
                                    Veja candidatos às suas vagas, edite alguma informação ou feche a vaga por aqui.
                                  </p>
                                  <a href="./vagas.php?idEmpresa=<?php echo($_GET['idEmpresa']); ?>">
                                    <button type="submit" class="entrar">Gerir vagas</button>
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 order-1">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0" style="border-radius: 5px; ">
                                    <img
                                      src="./assets/img/icons/unicons/funcionarios.png"
                                      alt="Sucesso no Gráfico"
                                      class="rounded"
                                      
                                    />
                                  </div>
                                  <div class="dropdown">
                                    <button
                                      class="btn p-0"
                                      type="button"
                                      id="cardOpt3"
                                      data-bs-toggle="dropdown"
                                      aria-haspopup="true"
                                      aria-expanded="false"
                                    >
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                      <a class="dropdown-item" href="javascript:void(0);">Ver Mais</a>
                                      <a class="dropdown-item" href="javascript:void(0);">Excluir</a>
                                    </div>
                                  </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Funcionários</span>
                                <h3 class="card-title mb-2"><?php echo('N/A'); ?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i><?php echo('N/A'); ?></small>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0" style=" border-radius: 5px;">
                                    <img
                                      src="./assets/img/icons/unicons/trabalho.png"
                                      alt="vagas"
                                      class="rounded"
                                    
                                    />
                                  </div>
                                  <div class="dropdown">
                                    <button
                                      class="btn p-0"
                                      type="button"
                                      id="cardOpt6"
                                      data-bs-toggle="dropdown"
                                      aria-haspopup="true"
                                      aria-expanded="false"
                                    >
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                      <a class="dropdown-item" href="javascript:void(0);">Ver Mais</a>
                                      <a class="dropdown-item" href="javascript:void(0);">Excluir</a>
                                    </div>
                                  </div>
                                </div>
                                <span>Vagas</span>
                                <h3 class="card-title text-nowrap mb-1"><?php echo('N/A'); ?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i><?php echo('N/A'); ?></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Receita Total -->
                      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                        <div class="card">
                          <div class="row row-bordered g-0">
                            <div class="col-md-8">
                              <h5 class="card-header m-0 me-2 pb-3">Receita Total</h5>
                              <div id="totalRevenueChart" class="px-2"></div>
                            </div>
                            <div class="col-md-4">
                              <div class="card-body">
                                <div class="text-center">
                                  <div class="dropdown">
                                    <button
                                      class="btn btn-sm btn-outline-primary dropdown-toggle"
                                      type="button"
                                      id="growthReportId"
                                      data-bs-toggle="dropdown"
                                      aria-haspopup="true"
                                      aria-expanded="false"
                                    >
                                      2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                      <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                      <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                      <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="growthChart"></div>
                              <div class="text-center fw-semibold pt-3 mb-2">Crescimento da Empresa: 62%</div>
                
                              <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                <div class="d-flex">
                                  <div class="me-2">
                                    <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                  </div>
                                  <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                  </div>
                                </div>
                                <div class="d-flex">
                                  <div class="me-2">
                                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                  </div>
                                  <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/ Receita Total -->
                      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                        <div class="row">
                          <div class="col-6 mb-4">
                            
                          </div>
                         
                
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0">$84,686k</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Feito por Trampaqui
                </div>
              </div>
            </footer>
            <!-- / Footer -->
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