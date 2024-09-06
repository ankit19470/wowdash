
@extends('fronted.layout.main')
@section('main-container')
<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
      <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
      <a href="index.html" class="sidebar-logo">
        <img src="{{url('fronted/logo/dw_logo.png')}}" alt="site logo" class="light-logo">
        <img src="{{url('fronted/images/logo-light.png')}}" alt="site logo" class="dark-logo">
        <img src="{{url('fronted/images/logo-icon.png')}}" alt="site logo" class="logo-icon">
      </a>
    </div>
    <div class="sidebar-menu-area">
      <ul class="sidebar-menu" id="sidebar-menu">
        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
            <span>Dashboard</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="index.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> AI</a>
            </li>
            <li>
              <a href="index-2.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> CRM</a>
            </li>
            <li>
              <a href="index-3.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> eCommerce</a>
            </li>
            <li>
              <a href="index-4.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Cryptocurrency</a>
            </li>
            <li>
              <a href="index-5.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Investment</a>
            </li>
          </ul>
        </li> --}}
        {{-- <li class="sidebar-menu-group-title">Application</li> --}}
        {{-- <li>
          <a href="email.html">
            <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
            <span>Email</span>
          </a>
        </li> --}}
        {{-- <li>
          <a href="chat-message.html">
            <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
            <span>Chat</span>
          </a>
        </li> --}}
        {{-- <li>
          <a href="calendar-main.html">
            <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
            <span>Calendar</span>
          </a>
        </li> --}}
        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
            <span>Invoice</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="invoice-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List</a>
            </li>
            <li>
              <a href="invoice-preview.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Preview</a>
            </li>
            <li>
              <a href="invoice-add.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add new</a>
            </li>
            <li>
              <a href="invoice-edit.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Edit</a>
            </li>
          </ul>
        </li> --}}

        {{-- <li class="sidebar-menu-group-title">Application</li> --}}

        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
            <span>Components</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="typography.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Typography</a>
            </li>
            <li>
              <a href="colors.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Colors</a>
            </li>
            <li>
              <a href="button.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Button</a>
            </li>
            <li>
              <a href="dropdown.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i> Dropdown</a>
            </li>
            <li>
              <a href="alert.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Alerts</a>
            </li>
            <li>
              <a href="card.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Card</a>
            </li>
            <li>
              <a href="carousel.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Carousel</a>
            </li>
            <li>
              <a href="avatar.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Avatars</a>
            </li>
            <li>
              <a href="progress.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Progress bar</a>
            </li>
            <li>
              <a href="tabs.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Tab & Accordion</a>
            </li>
            <li>
              <a href="pagination.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Pagination</a>
            </li>
            <li>
              <a href="badges.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Badges</a>
            </li>
            <li>
              <a href="tooltip.html"><i class="ri-circle-fill circle-icon text-lilac-600 w-auto"></i> Tooltip & Popover</a>
            </li>
            <li>
              <a href="videos.html"><i class="ri-circle-fill circle-icon text-cyan w-auto"></i> Videos</a>
            </li>
            <li>
              <a href="star-rating.html"><i class="ri-circle-fill circle-icon text-indigo w-auto"></i> Star Ratings</a>
            </li>
            <li>
              <a href="tags.html"><i class="ri-circle-fill circle-icon text-purple w-auto"></i> Tags</a>
            </li>
            <li>
              <a href="list.html"><i class="ri-circle-fill circle-icon text-red w-auto"></i> List</a>
            </li>
            <li>
              <a href="calendar.html"><i class="ri-circle-fill circle-icon text-yellow w-auto"></i> Calendar</a>
            </li>
            <li>
              <a href="radio.html"><i class="ri-circle-fill circle-icon text-orange w-auto"></i> Radio</a>
            </li>
            <li>
              <a href="switch.html"><i class="ri-circle-fill circle-icon text-pink w-auto"></i> Switch</a>
            </li>
            <li>
              <a href="image-upload.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Upload</a>
            </li>
          </ul>
        </li> --}}
        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="heroicons:document" class="menu-icon"></iconify-icon>
            <span>Forms</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="form.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Input Forms</a>
            </li>
            <li>
              <a href="form-layout.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Input Layout</a>
            </li>
            <li>
              <a href="form-validation.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Form Validation</a>
            </li>
          </ul>
        </li> --}}
        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
            <span>Table</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="table-basic.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Basic Table</a>
            </li>
            <li>
              <a href="table-data.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Data Table</a>
            </li>
          </ul>
        </li> --}}
        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>
            <span>Chart</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="line-chart.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Line Chart</a>
            </li>
            <li>
              <a href="column-chart.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Column Chart</a>
            </li>
            <li>
              <a href="pie-chart.html"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Pie Chart</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="widgets.html">
            <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
            <span>Widgets</span>
          </a>
        </li> --}}
        <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
            <span>Users</span>
          </a>
          <ul class="sidebar-submenu">
            {{-- <li>
              <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Users List</a>
            </li> --}}

            <li>
              <a href="{{url('add-user')}}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add User</a>
            </li>
    <li>
              <a href="{{url('list-user')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List User</a>
            </li>
            {{-- <li>
              <a href="view-profile.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> View Profile</a>
            </li> --}}
          </ul>
        </li>

        {{-- <li class="sidebar-menu-group-title">Application</li> --}}
{{--
        <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>
            <span>Authentication</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="sign-in.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Sign In</a>
            </li>
            <li>
              <a href="sign-up.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Sign Up</a>
            </li>
            <li>
              <a href="forgot-password.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Forgot Password</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="gallery.html">
            <iconify-icon icon="solar:gallery-wide-linear" class="menu-icon"></iconify-icon>
            <span>Gallery</span>
          </a>
        </li>
        <li>
          <a href="pricing.html">
            <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>
            <span>Pricing</span>
          </a>
        </li>
        <li>
          <a href="faq.html">
            <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>
            <span>FAQs.</span>
          </a>
        </li> --}}
        {{-- <li>
          <a href="error.html">
            <iconify-icon icon="streamline:straight-face" class="menu-icon"></iconify-icon>
            <span>404</span>
          </a>
        </li>
        <li>
          <a href="terms-condition.html">
            <iconify-icon icon="octicon:info-24" class="menu-icon"></iconify-icon>
            <span>Terms & Conditions</span>
          </a>
        </li> --}}
        {{-- <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
            <span>Settings</span>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="company.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Company</a>
            </li>
            <li>
              <a href="notification.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Notification</a>
            </li>
            <li>
              <a href="notification-alert.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Notification Alert</a>
            </li>
            <li>
              <a href="theme.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Theme</a>
            </li>
            <li>
              <a href="currencies.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Currencies</a>
            </li>
            <li>
              <a href="language.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Languages</a>
            </li>
            <li>
              <a href="payment-gateway.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Payment Gateway</a>
            </li>
          </ul>
        </li> --}}
      </ul>
    </div>
  </aside>
  <main class="dashboard-main">
    <div class="navbar-header">
    <div class="row align-items-center justify-content-between">
      <div class="col-auto">
        <div class="d-flex flex-wrap align-items-center gap-4">
          <button type="button" class="sidebar-toggle">
            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
          </button>
          <button type="button" class="sidebar-mobile-toggle">
            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
          </button>
          <form class="navbar-search">
            <input type="text" name="search" placeholder="Search">
            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
          </form>
        </div>
      </div>
      <div class="col-auto">
        <div class="d-flex flex-wrap align-items-center gap-3">
          <button type="button" data-theme-toggle class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
          <div class="dropdown d-none d-sm-inline-block">
            <button class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown">
              <img src="assets/images/lang-flag.png" alt="image" class="w-24 h-24 object-fit-cover rounded-circle">
            </button>
            <div class="dropdown-menu to-top dropdown-menu-sm">
              <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                <div>
                  <h6 class="text-lg text-primary-light fw-semibold mb-0">Choose Your Language</h6>
                </div>
              </div>

              <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">
                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="english">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag1.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">English</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="english">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="japan">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag2.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Japan</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="japan">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="france">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag3.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">France</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="france">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="germany">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag4.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Germany</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="germany">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="korea">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag5.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">South Korea</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="korea">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="bangladesh">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag6.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Bangladesh</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="bangladesh">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="india">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag7.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">India</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="india">
                </div>
                <div class="form-check style-check d-flex align-items-center justify-content-between">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="canada">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="assets/images/flags/flag8.png" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Canada</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="canada">
                </div>
              </div>
            </div>
          </div><!-- Language dropdown end -->

          <div class="dropdown">
            <button class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown">
              <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
            </button>
            <div class="dropdown-menu to-top dropdown-menu-lg p-0">
              <div class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                <div>
                  <h6 class="text-lg text-primary-light fw-semibold mb-0">Message</h6>
                </div>
                <span class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
              </div>

             <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                    <img src="assets/images/notification/profile-3.png" alt="">
                    <span class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there i’m...</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end">
                  <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                  <span class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                </div>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                    <img src="assets/images/notification/profile-4.png" alt="">
                    <span class="w-8-px h-8-px  bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there i’m...</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end">
                  <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                  <span class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">2</span>
                </div>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                    <img src="assets/images/notification/profile-5.png" alt="">
                    <span class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there i’m...</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end">
                  <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                  <span class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                </div>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                    <img src="assets/images/notification/profile-6.png" alt="">
                    <span class="w-8-px h-8-px bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there i’m...</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end">
                  <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                  <span class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                </div>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                    <img src="assets/images/notification/profile-7.png" alt="">
                    <span class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there i’m...</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end">
                  <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                  <span class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                </div>
              </a>

             </div>
              <div class="text-center py-12 px-16">
                  <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All Message</a>
              </div>
            </div>
          </div><!-- Message dropdown end -->

          <div class="dropdown">
            <button class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown">
              <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
            </button>
            <div class="dropdown-menu to-top dropdown-menu-lg p-0">
              <div class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                <div>
                  <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
                </div>
                <span class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
              </div>

             <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                    <iconify-icon icon="bitcoin-icons:verify-outline" class="icon text-xxl"></iconify-icon>
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Congratulations</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile has been Verified. Your profile has been Verified</p>
                  </div>
                </div>
                <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                    <img src="assets/images/notification/profile-1.png" alt="">
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Ronald Richards</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can stitch between artboards</p>
                  </div>
                </div>
                <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                    AM
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Arlene McCoy</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to prototyping</p>
                  </div>
                </div>
                <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                    <img src="assets/images/notification/profile-2.png" alt="">
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Annette Black</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to prototyping</p>
                  </div>
                </div>
                <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
              </a>

              <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                  <span class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                    DR
                  </span>
                  <div>
                    <h6 class="text-md fw-semibold mb-4">Darlene Robertson</h6>
                    <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to prototyping</p>
                  </div>
                </div>
                <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
              </a>
             </div>

              <div class="text-center py-12 px-16">
                  <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All Notification</a>
              </div>

            </div>
          </div><!-- Notification dropdown end -->

          <div class="dropdown">
            <button class="d-flex justify-content-center align-items-center rounded-circle" type="button" data-bs-toggle="dropdown">
              <img src="assets/images/user.png" alt="image" class="w-40-px h-40-px object-fit-cover rounded-circle">
            </button>
            <div class="dropdown-menu to-top dropdown-menu-sm">
              <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                <div>
                  <h6 class="text-lg text-primary-light fw-semibold mb-2">Shaidul Islam</h6>
                  <span class="text-secondary-light fw-medium text-sm">Admin</span>
                </div>
                <button type="button" class="hover-text-danger">
                  <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                </button>
              </div>
              <ul class="to-top-list">
                <li>
                  <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="view-profile.html">
                  <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>  My Profile</a>
                </li>
                <li>
                  <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="email.html">
                  <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon>  Inbox</a>
                </li>
                <li>
                  <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="company.html">
                  <iconify-icon icon="icon-park-outline:setting-two" class="icon text-xl"></iconify-icon>  Setting</a>
                </li>
                <li>
                  <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" href="javascript:void(0)">
                  <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>  Log Out</a>
                </li>
              </ul>
            </div>
          </div><!-- Profile dropdown end -->
        </div>
      </div>
    </div>
  </div>

    <div class="dashboard-main-body">

      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Basic Table</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Basic Table</li>
    </ul>
  </div>

      <div class="card basic-data-table">
        <div class="card-header">
          <h5 class="card-title mb-0">Default Datatables</h5>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">PinCode</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if($user->file != "")
                                    <img src="{{ asset('/storage/assets/uploads/'.$user->file) }}" width="50" height="50" alt="">
                                @endif
                            </td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->pincode }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->state }}</td>
                            <td>
                                <!-- Add action buttons here (e.g., Edit, Delete) -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
      </div>
    </div>

    <footer class="d-footer">
    <div class="row align-items-center justify-content-between">
      <div class="col-auto">
        <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
      </div>
      <div class="col-auto">
        <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
      </div>
    </div>
  </footer>
  </main>

@endsection
