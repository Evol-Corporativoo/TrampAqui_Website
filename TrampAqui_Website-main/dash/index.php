<?php

include_once('../server/controller/isLogged.php');

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
            <li class="menu-item active">
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
                        <li>
                          <a href="./minhaEmpresa.php?idEmpresa=<?php echo $empresa['idEmpresa']; ?>" class="menu-link">
                            <div data-i18n="Without menu"><?php echo $empresa['nomeEmpresa']; ?></div>
                          </a>
                        </li>
                        <?php }}?>
                      </ul>
                    

                  
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
                      <img src="./assets/img/favicon/favicon.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="./assets/img/favicon/favicon.png" alt class="w-px-40 h-auto rounded-circle" />
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
                                <h5 class="card-title text-primary">Parabéns! 🎉 <?php echo $nomeUsuario; ?></h5>
                                <p class="mb-4">
                                  <?php if($_SESSION['qtde_empresas'] == 0){
                                    echo 'Você deu o primeiro passo para começar a parceria conosco! Lembre-se, que agora você deve cadastrar sua empresa.';
                                  } else {
                                    echo 'Estamos felizes de ter você conosco! Você pode administrar sua empresa aqui pela Dashboard mesmo, e ainda cadastrar mais empresas!';
                                  }?>
                                </p>
                            </div>

                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                              <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                  src="./assets/img/illustrations/man-with-laptop-light.png"
                                  height="140"
                                  alt="Ver Medalha do Usuário"
                                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                  data-app-light-img="illustrations/man-with-laptop-light.png"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <?php 
                        
                          if($_SESSION['qtde_empresas'] == 0){
                            echo('<div class="card">
                            <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                <div class="card-body">
                                  <h5 class="card-title text-primary">Cadastre aqui a sua empresa!</h5>
                                  <p class="mb-4">
                                    Começe a desfrutar das funções do TrampAqui ao cadastrar sua primeira empresa. Não perca tempo!
                                  </p>
                              </div>
  
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                  <a href="./addEmpresa.php">
                                    <button type="submit" class="entrar">Cadastrar Empresa</button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>');
                          }
                        
                        ?>
                      </div>
                      

            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme fixed-bottom">
              <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
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