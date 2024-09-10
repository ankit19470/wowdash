
@extends('fronted.layout.main')
@section('main-container')

<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
      <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
      <a href="{{url('add-user')}}" class="sidebar-logo">
        <img src="{{url('fronted/logo/dw_logo.png')}}" width="168" height="40" alt="site logo" class="light-logo">
        <img src="{{url('fronted/logo/dw_logo.png')}}" width="168" height="40" alt="site logo" class="dark-logo">
        <img src="{{url('fronted/images/logo-icon.png')}}" alt="site logo" class="logo-icon">
      </a>
    </div>
    <div class="sidebar-menu-area">
      <ul class="sidebar-menu" id="sidebar-menu">

        <li class="dropdown">
          <a href="javascript:void(0)">
            <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
            <span>Users</span>
          </a>
          <ul class="sidebar-submenu">


            <li>
              <a href="{{url('add-user')}}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add User</a>
            </li>
    <li>
              <a href="{{url('list-user')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List User</a>
            </li>
            {{-- <li>
                <a href="{{url('update-user')}}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Update User</a>
              </li> --}}

          </ul>
        </li>
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
              <img src="{{url('fronted/images/lang-flag.png')}}" alt="image" class="w-24 h-24 object-fit-cover rounded-circle">
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
                      <img src="{{url('fronted/images/flags/flag1.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">English</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="english">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="japan">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag2.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Japan</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="japan">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="france">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag3.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">France</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="france">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="germany">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag4.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Germany</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="germany">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="korea">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag5.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">South Korea</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="korea">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="bangladesh">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag6.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">Bangladesh</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="bangladesh">
                </div>

                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="india">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag7.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                      <span class="text-md fw-semibold mb-0">India</span>
                    </span>
                  </label>
                  <input class="form-check-input" type="radio" name="crypto" id="india">
                </div>
                <div class="form-check style-check d-flex align-items-center justify-content-between">
                  <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="canada">
                    <span class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                      <img src="{{url('fronted/images/flags/flag8.png')}}" alt="" class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
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
                    <img src="{{url('fronted/images/notification/profile-3.png')}}" alt="">
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
                    <img src="{{url('fronted/images/notification/profile-4.png')}}" alt="">
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
                    <img src="{{url('fronted/images/notification/profile-5.png')}}" alt="">
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
                    <img src="{{url('fronted/images/notification/profile-6.png')}}" alt="">
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
                    <img src="{{url('fronted/images/notification/profile-7.png')}}" alt="">
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
                    <img src="{{url('fronted/images/notification/profile-1.png')}}" alt="">
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
                    <img src="{{url('fronted/images/notification/profile-2.png')}}" alt="">
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
              <img src="{{url('fronted/images/user.png')}}" alt="image" class="w-40-px h-40-px object-fit-cover rounded-circle">
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
          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="dashboard-main-body">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Update User</h6>
    <ul class="d-flex align-items-center gap-2">
      {{-- <li class="fw-medium">
        <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Update User</li> --}}

    </ul>

  </div>
  {{-- @if($user->file)
  <div class="mb-2">
    <img src="{{ asset('storage/assets/uploads/' . $user->file) }}" alt="User Image" class="img-fluid rounded-circle" style="max-width: 200px; height: auto;">
</div>

@endif --}}
  @if(session('success'))
  <div class="alert alert-primary">
  <p>{{session('success')}}</p>
  </div>
  @endif
  @if(session('error'))
  <div class="alert alert-danger">
  <p>{{session('error')}}</p>
  </div>
  @endif
  <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <script>
                function validateForm() {
                    var isValid = true;
                    var firstname = document.getElementById("firstname").value;
                    var lastname = document.getElementById("lastname").value;
                    var email = document.getElementById("email").value;
                    var password = document.getElementById("password").value;
                    var phone = document.getElementById("phone").value;
                    var pincode = document.getElementById("pincode").value;
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    var phonePattern = /^[6-9]\d{9}$/;
                    var pinPattern = /^\d{6}$/;

                    if (firstname == "" || firstname.length > 255) {
                        alert("First name is required and must be less than 255 characters");
                        isValid = false;
                    }

                    if (lastname == "" || lastname.length > 255) {
                        alert("Last name is required and must be less than 255 characters");
                        isValid = false;
                    }

                    if (!emailPattern.test(email)) {
                        alert("Please enter a valid email address");
                        isValid = false;
                    }

                    if (password && password.length < 6) {
                        alert("Password must be at least 6 characters long");
                        isValid = false;
                    }

                    if (!phonePattern.test(phone)) {
                        alert("Phone number must be 10 digits and start with 6-9");
                        isValid = false;
                    }

                    if (!pinPattern.test(pincode)) {
                        alert("Pin code must be 6 digits");
                        isValid = false;
                    }

                    return isValid;
                }
            </script>
            {{-- <form class="row gy-3 needs-validation" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                @csrf
                @method('PUT') --}}
                <form class="row gy-3 needs-validation" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                    @csrf
                    @method('PUT')

                <div class="col-md-6">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                    @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="Enter First Name" value="{{ old('firstname', $user->firstname) }}" required>
                    @error('firstname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Enter Last Name" value="{{ old('lastname', $user->lastname) }}" required>
                    @error('lastname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="*******">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="+91-8559083842" value="{{ old('phone', $user->phone) }}" required>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="col-md-6">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" placeholder="Enter State" value="{{ old('state', $user->state) }}" required>
                    @error('state')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="col-md-6">
                    <label for="state" class="form-label">State</label>
                    <select class="form-control @error('state') is-invalid @enderror" id="state" name="state" required>
                        <option value="">Select State</option>
                        <option value="Punjab" {{ old('state',$user->state) == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                        <option value="Himachal Pardesh" {{ old('state',$user->state) == 'Himachal Pardesh' ? 'selected' : '' }}>Himachal Pardesh</option>
                        <option value="Jammu and kashmir" {{ old('state',$user->state) == 'Jammu and kashmir' ? 'selected' : '' }}>Jammu and kashmir</option>
                    </select>
                    @error('state')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <select class="form-select @error('city') is-invalid @enderror" id="city" name="city" required>
                        <option value="" disabled selected>Select City</option>

                        <option value="Jalandhar" {{ old('city',$user->city) == 'Jalandhar' ? 'selected' : '' }}>Jalandhar</option>
                        <option value="Amritsar" {{ old('city',$user->city) == 'Amritsar' ? 'selected' : '' }}>Amritsar</option>
                        <option value="Delhi" {{ old('city',$user->city) == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                    </select>
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Enter City" value="{{ old('city', $user->city) }}" required>
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

                <div class="col-md-6">
                    <label for="pincode" class="form-label">Pin code</label>
                    <input type="text" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="144008" value="{{ old('pincode', $user->pincode) }}" required>
                    @error('pincode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter Address" value="{{ old('address', $user->address) }}" required>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <!-- Update User Button -->
                    <button class="btn btn-primary" type="submit">Update User</button>

                    <!-- Cancel Button -->
                    <a href="{{ route('list-user') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // JavaScript to handle form validation feedback
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection
