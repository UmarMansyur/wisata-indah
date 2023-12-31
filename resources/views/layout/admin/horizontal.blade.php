<header class="topbar">
  <div class="with-vertical">
    <nav class="navbar navbar-expand-lg p-0">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav quick-links d-none d-lg-flex">
        <li class="nav-item dropdown-hover d-none d-lg-block">
          <a class="nav-link" href="AppEmail.html">Email</a>
        </li>
      </ul>

      <div class="d-block d-lg-none">
        <img src="/assets/images/logos/dark-logo.svg" width="180" alt="" />
      </div>
      <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="p-2">
          <i class="ti ti-dots fs-7"></i>
        </span>
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between">
          <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center"
            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
            aria-controls="offcanvasWithBothOptions">
            <i class="ti ti-align-justified fs-7"></i>
          </a>
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            <li class="nav-item dropdown">
              <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div class="d-flex align-items-center">
                  <div class="user-profile-img">
                    <img src="{{ file_exists(url('storage/' . Auth::user()->thumbnail)) ? url('storage/' . Auth::user()->thumbnail) :  Auth::user()->thumbnail }}" class="rounded-circle" width="35" height="35" alt="" />
                  </div>
                </div>
              </a>
              <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                  <div class="py-3 px-7 pb-0">
                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                  </div>
                  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <img src="{{ file_exists(url('storage/' . Auth::user()->thumbnail)) ? url('storage/' . Auth::user()->thumbnail) :  Auth::user()->thumbnail }}" class="rounded-circle" width="80" height="80" alt="" />
                    <div class="ms-3">
                      <h5 class="mb-1 fs-3">{{ Auth::user()->username }}</h5>
                      <span class="mb-1 d-block">Administrator</span>
                      <p class="mb-0 d-flex align-items-center gap-2">
                        <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                      </p>
                    </div>
                  </div>
                  <div class="d-grid py-4 px-7 pt-8">
                    <a href="{{ route('logout')}}" class="btn btn-outline-primary">Log Out</a>
                  </div>
                </div>

              </div>
            </li>
            <li>
              <a href="{{ route('logout')}}" class="nav-link nav-icon-hover mt-1 ms-2">
                <i class="ti ti-power fs-6"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
      aria-labelledby="offcanvasWithBothOptionsLabel">
      <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
          <img src="/assets/images/logos/favicon.ico" alt="" class="img-fluid" />
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" data-simplebar="" style="height: calc(100vh - 80px)">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="AppEmail.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Email</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="app-header with-horizontal">
    <nav class="navbar navbar-expand-xl container-fluid p-0">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="nav-item d-none d-xl-block">
          <a href="../index.html" class="text-nowrap nav-link">
            <img src="/assets/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
            <img src="/assets/images/logos/light-logo.svg" class="light-logo" width="180" alt="" />
          </a>
        </li>
        <li class="nav-item d-none d-xl-block">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="ti ti-search"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav quick-links d-none d-xl-flex">
        <li class="nav-item dropdown-hover d-none d-lg-block">
          <a class="nav-link" href="AppEmail.html">Email</a>
        </li>
      </ul>
      <div class="d-block d-xl-none">
        <a href="../index.html" class="text-nowrap nav-link">
          <img src="/assets/images/logos/dark-logo.svg" width="180" alt="" />
        </a>
      </div>
      <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="p-2">
          <i class="ti ti-dots fs-7"></i>
        </span>
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
          <a href="javascript:void(0)"
            class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
            <i class="ti ti-align-justified fs-7"></i>
          </a>
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            <li class="nav-item dropdown">
              <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div class="d-flex align-items-center">
                  <div class="user-profile-img">
                    <img src="{{ file_exists(url('storage/' . Auth::user()->thumbnail)) ? url('storage/' . Auth::user()->thumbnail) :  Auth::user()->thumbnail }}" class="rounded-circle" width="35" height="35" alt="" />
                  </div>
                </div>
              </a>
              <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                  <div class="py-3 px-7 pb-0">
                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                  </div>
                  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <img src="{{ file_exists(url('storage/' . Auth::user()->thumbnail)) ? url('storage/' . Auth::user()->thumbnail) :  Auth::user()->thumbnail }}" class="rounded-circle" width="80" height="80" alt="" />
                    <div class="ms-3">
                      <h5 class="mb-1 fs-3">{{ Auth::user()->username }}</h5>
                      <span class="mb-1 d-block">Administrator</span>
                      <p class="mb-0 d-flex align-items-center gap-2">
                        <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                      </p>
                    </div>
                  </div>
                  <div class="d-grid py-4 px-7 pt-8">
                    <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log Out</a>
                  </div>
                </div>

              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</header>
<aside class="left-sidebar with-horizontal">
  <!-- Sidebar scroll-->
  <div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar container-fluid">
      <ul id="sidebarnav">
        <!-- ============================= -->
        <!-- Home -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <!-- =================== -->
        <!-- Dashboard -->
        <!-- =================== -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span>
              <i class="ti ti-home-2"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="../index.html" class="sidebar-link">
                <i class="ti ti-aperture"></i>
                <span class="hide-menu">Modern</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="Index2.html" class="sidebar-link">
                <i class="ti ti-shopping-cart"></i>
                <span class="hide-menu">eCommerce</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="Index3.html" class="sidebar-link">
                <i class="ti ti-currency-dollar"></i>
                <span class="hide-menu">NFT</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="Index4.html" class="sidebar-link">
                <i class="ti ti-cpu"></i>
                <span class="hide-menu">Crypto</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="Index5.html" class="sidebar-link">
                <i class="ti ti-activity-heartbeat"></i>
                <span class="hide-menu">General</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="Index6.html" class="sidebar-link">
                <i class="ti ti-playlist"></i>
                <span class="hide-menu">Music</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- Apps -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Apps</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span>
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">Apps</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="AppCalendar.html" class="sidebar-link">
                <i class="ti ti-calendar"></i>
                <span class="hide-menu">Calendar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="AppsKanban.html" class="sidebar-link">
                <i class="ti ti-layout-kanban"></i>
                <span class="hide-menu">Kanban</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="AppChat.html" class="sidebar-link">
                <i class="ti ti-message-dots"></i>
                <span class="hide-menu">Chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="AppEmail.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Email</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="AppContact.html" class="sidebar-link">
                <i class="ti ti-phone"></i>
                <span class="hide-menu">Contact Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="AppContact2.html" class="sidebar-link">
                <i class="ti ti-list-details"></i>
                <span class="hide-menu">Contact List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="AppNotes.html" class="sidebar-link">
                <i class="ti ti-notes"></i>
                <span class="hide-menu">Notes</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="AppInvoice.html" class="sidebar-link">
                <i class="ti ti-file-text"></i>
                <span class="hide-menu">Invoice</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="PageUserProfile.html" class="sidebar-link">
                <i class="ti ti-user-circle"></i>
                <span class="hide-menu">User Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="BlogPosts.html" class="sidebar-link">
                <i class="ti ti-article"></i>
                <span class="hide-menu">Posts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="BlogDetail.html" class="sidebar-link">
                <i class="ti ti-details"></i>
                <span class="hide-menu">Detail</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ECOShop.html" class="sidebar-link">
                <i class="ti ti-shopping-cart"></i>
                <span class="hide-menu">Shop</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ECOShopDetail.html" class="sidebar-link">
                <i class="ti ti-basket"></i>
                <span class="hide-menu">Shop Detail</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ECOProductList.html" class="sidebar-link">
                <i class="ti ti-list-check"></i>
                <span class="hide-menu">List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ECOCheckout.html" class="sidebar-link">
                <i class="ti ti-brand-shopee"></i>
                <span class="hide-menu">Checkout</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- PAGES -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">PAGES</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span>
              <i class="ti ti-notebook"></i>
            </span>
            <span class="hide-menu">Pages</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="PageFAQ.html" class="sidebar-link">
                <i class="ti ti-help"></i>
                <span class="hide-menu">FAQ</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="PageAccountSettings.html" class="sidebar-link">
                <i class="ti ti-user-circle"></i>
                <span class="hide-menu">Account Setting</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="PagePricing.html" class="sidebar-link">
                <i class="ti ti-currency-dollar"></i>
                <span class="hide-menu">Pricing</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="WidgetsCards.html" class="sidebar-link">
                <i class="ti ti-cards"></i>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="WidgetsBanners.html" class="sidebar-link">
                <i class="ti ti-ad"></i>
                <span class="hide-menu">Banner</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="WidgetsCharts.html" class="sidebar-link">
                <i class="ti ti-chart-bar"></i>
                <span class="hide-menu">Charts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="../LandingPage.html" class="sidebar-link">
                <i class="ti ti-app-window"></i>
                <span class="hide-menu">Landing Page</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- UI -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">UI</span>
        </li>
        <!-- =================== -->
        <!-- UI Elements -->
        <!-- =================== -->
        <li class="sidebar-item mega-dropdown">
          <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-layout-grid"></i>
            </span>
            <span class="hide-menu">UI</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="UIAccordian.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Accordian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIBadge.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Badge</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIButtons.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIDropdowns.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Dropdowns</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIModals.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Modals</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UITab.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Tab</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UITooltipPopover.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Tooltip & Popover</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UINotification.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Notification</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIProgressbar.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Progressbar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIPagination.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Pagination</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UITypography.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIBootstrap.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Bootstrap UI</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIBreadcrumb.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Breadcrumb</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIOffcanvas.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Offcanvas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UILists.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Lists</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIGrid.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Grid</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UICarousel.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Carousel</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UIScrollspy.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Scrollspy</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UISpinner.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Spinner</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="UILink.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Link</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- Forms -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Forms</span>
        </li>
        <!-- =================== -->
        <!-- Forms -->
        <!-- =================== -->
        <li class="sidebar-item">
          <a class="sidebar-link two-column has-arrow" href="#" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-file-text"></i>
            </span>
            <span class="hide-menu">Forms</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <!-- form elements -->
            <li class="sidebar-item">
              <a href="FormInputs.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Forms Input</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormInputGroups.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Input Groups</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormInputGrid.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Input Grid</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormCheckboxRadio.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Checkbox & Radios</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormBootstrapTouchspin.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Bootstrap Touchspin</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormBootstrapSwitch.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Bootstrap Switch</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormSelect2.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Select2</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormDualListbox.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Dual Listbox</span>
              </a>
            </li>
            <!-- form inputs -->
            <li class="sidebar-item">
              <a href="FormBasic.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Basic Form</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormVertical.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Form Vertical</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormHorizontal.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Form Horizontal</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormActions.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Form Actions</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormRowSeparator.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Row Separator</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormBordered.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Form Bordered</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="FormDetail.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Form Detail</span>
              </a>
            </li>
            <!-- form wizard -->
            <li class="sidebar-item">
              <a href="FormWizard.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Form Wizard</span>
              </a>
            </li>
            <!-- Quill Editor -->
            <li class="sidebar-item">
              <a href="FormEditorQuill.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Quill Editor</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- Tables -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Tables</span>
        </li>
        <!-- =================== -->
        <!-- Bootstrap Table -->
        <!-- =================== -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-layout-sidebar"></i>
            </span>
            <span class="hide-menu">Tables</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="TableBasic.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Basic Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="TableDarkBasic.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Dark Basic Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="TableSizing.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Sizing Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="TableLayoutColoured.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Coloured Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="TableDatatableBasic.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Basic Initialisation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="TableDatatableAPI.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">API</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="TableDatatableAdvanced.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Advanced Initialisation</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- Charts -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Charts</span>
        </li>
        <!-- =================== -->
        <!-- Apex Chart -->
        <!-- =================== -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-chart-pie"></i>
            </span>
            <span class="hide-menu">Charts</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="ChartApexLine.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Line Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ChartApexArea.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Area Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ChartApexBar.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Bar Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ChartApexPie.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Pie Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ChartApexRadial.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Radial Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="ChartApexRadar.html" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Radar Chart</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ============================= -->
        <!-- Icons -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Icons</span>
        </li>
        <!-- =================== -->
        <!-- Tabler Icon -->
        <!-- =================== -->
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="IconTabler.html" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">Icon</span>
          </a>
        </li>
        <!-- multi level -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
            <span class="rounded-3">
              <iconify-icon icon="solar:airbuds-case-minimalistic-line-duotone" class="ti"></iconify-icon>
            </span>
            <span class="hide-menu">Multi DD</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Page 1</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link has-arrow">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Page 2</span>
              </a>
              <ul aria-expanded="false" class="collapse second-level">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">
                    <i class="ti ti-circle"></i>
                    <span class="hide-menu">Page 2.1</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">
                    <i class="ti ti-circle"></i>
                    <span class="hide-menu">Page 2.2</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">
                    <i class="ti ti-circle"></i>
                    <span class="hide-menu">Page 2.3</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">
                <i class="ti ti-circle"></i>
                <span class="hide-menu">Page 3</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>