<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>BFM</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="BFM-50-e-zara" type="image/BFM-50-e-zara" href="{{ asset('assets/img/BFM-50-e-zara') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{route('dashboard')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/BFM-50-e-zara.png') }}" alt="">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            @hasrole('admin')
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Utilisateur">Gestion d'Utilisateur</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('ajoutUser') }}" class="menu-link">
                    <div data-i18n="Without navbar">Ajouter Utilisateur</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('listUser') }}" class="menu-link">
                    <div data-i18n="Without navbar">Liste Utilisateur</div>
                  </a>
                </li>
              </ul>
            </li>
            @endrole
            @hasrole('admin')
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Gestion de direction">Gestion de direction</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('ajoutDirection') }}" class="menu-link">
                    <div data-i18n="Without navbar">Ajouter une direction</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('listeDirection') }}" class="menu-link">
                    <div data-i18n="Without menu">Liste des directions</div>
                  </a>
                  </a>
                </li>
              </ul>
            </li>
            @endrole
            @hasrole('admin')
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Gestion de Service</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('ajoutService') }}" class="menu-link">
                    <div data-i18n="Basic Inputs">Ajouter service</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('listService') }}" class="menu-link">
                    <div data-i18n="Input groups">Liste Service</div>
                  </a>
                </li>
              </ul>
            </li>
            @endrole
            @hasanyrole('admin|manager|secretaire')
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Projet">Gestion des Projet</div>
              </a>
              <ul class="menu-sub">
              @hasanyrole('admin|manager')
                <li class="menu-item">
                  <a href="{{ route('ajoutProjet') }}" class="menu-link">
                    <div data-i18n="Without navbar">Ajouter Projet</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('listProjet') }}" class="menu-link">
                    <div data-i18n="Without navbar">Liste Projet</div>
                  </a>
                </li>
                @else
                <li class="menu-item">
                  <a href="{{ route('listProjet') }}" class="menu-link">
                    <div data-i18n="Without navbar">Liste Projet</div>
                  </a>
                </li>
                @endhasanyrole
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Tache">Gestion des tâches</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('ajoutTache') }}" class="menu-link">
                    <div data-i18n="Accordion">Ajouter Tâche</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('listTache') }}" class="menu-link">
                    <div data-i18n="Alerts">Liste des tâches</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- User interface -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Autres</span></li>
            <li class="menu-item">
              <a
                href="{{ route('logout') }}"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Documentation">Se déconnecter</div>
              </a>
            </li>
            @else
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Tache">Gestion des tâches</div>
              </a>
              <ul class="menu-sub">
                @hasanyrole('admin|manager|secretaire')
                  <li class="menu-item">
                    <a href="{{ route('ajoutTache') }}" class="menu-link">
                      <div data-i18n="Accordion">Ajouter Tâche</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('listTache') }}" class="menu-link">
                      <div data-i18n="Alerts">Liste des tâches</div>
                    </a>
                  </li>
                @else
                <li class="menu-item">
                  <a href="{{ route('listTache') }}" class="menu-link">
                    <div data-i18n="Alerts">Liste des tâches</div>
                  </a>
                </li>
                @endhasanyrole
              </ul>
            </li>
            
            <!-- User interface -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Autres</span></li>
            <li class="menu-item">
              <a
                href="{{ route('logout') }}"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Documentation">Se déconnecter</div>
              </a>
            </li>
            @endhasanyrole
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <span></span>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('assets/img/avatars/1.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('assets/img/avatars/1.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <small class="text-muted">Bonjour</small>
                            <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Mon profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Se deconnecter</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">{{ $slot }}</div>
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
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
