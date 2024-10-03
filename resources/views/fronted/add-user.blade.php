@extends('fronted.layout.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
@section('main-container')
    <aside class="sidebar">
        <button type="button" class="sidebar-close-btn">
            <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
        </button>
        <div>
            <a href="{{ url('add-user') }}" class="sidebar-logo">
                <img src="{{ url('fronted/logo/dw_logo.png') }}" width="168" height="40" alt="site logo"
                    class="light-logo">
                <img src="{{ url('fronted/logo/dw_logo.png') }}" width="168" height="40" alt="site logo"
                    class="dark-logo">
                <img src="{{ url('fronted/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
            </a>
        </div>
        <div class="sidebar-menu-area">
            <ul class="sidebar-menu" id="sidebar-menu">
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="" class="menu-icon"></iconify-icon>
                        <span>Switch</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ url('user-role-show') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Switch Role</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Users</span>
                    </a>
                    <ul class="sidebar-submenu">


                        <li>
                            <a href="{{ url('add-user') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Add User</a>
                        </li>
                        <li>
                            <a href="{{ url('list-user') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List User</a>
                        </li>
                        {{-- <li>
                <a href="{{url('update-user')}}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Update User</a>
              </li> --}}

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        {{-- <iconify-icon icon="gear:-group-outline" class="menu-icon"></iconify-icon> --}}
                        <iconify-icon icon="mdi:cog-outline" class="menu-icon"></iconify-icon>
                        <span>Roles & Permission</span>
                    </a>
                    <ul class="sidebar-submenu">

                        <li><a href="{{ url('add-module') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add Module</a></li>

                        <li>
                            <a href="{{ url('add-permission') }}"><i
                                    class="ri-circle-fill circle-icon text-info-main w-auto"></i> Permission</a>
                        </li>
                        <li>
                            <a href="{{ url('list-permission') }}"><i
                                    class="ri-circle-fill circle-icon text-info-main w-auto"></i> List Permission</a>
                        </li>
                        <li><a href="{{ url('add-role') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Add Role</a></li>
                        <li><a href="{{ url('list-role') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List Role</a></li>
                        {{-- <li>
                <a href="{{url('list-user')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List User</a>
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
                        <!-- Theme toggle button -->
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center">
                        </button>

                        <!-- Profile dropdown -->
                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                                data-bs-toggle="dropdown">

                                @php
                                    $user = auth()->user();
                                @endphp

                                @if($user && $user->file != "")

                                    <img src="{{ asset('/storage/assets/uploads/' . $user->file) }}"
                                         class="w-40-px h-40-px object-fit-cover rounded-circle"
                                         alt="User Image">
                                @else

                                    <img src="{{ url('fronted/images/user.png') }}"
                                         class="w-40-px h-40-px object-fit-cover rounded-circle"
                                         alt="User Image">
                                @endif
                            </button>

                            <!-- Dropdown menu -->
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <ul class="to-top-list">
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="{{ route('profile.view') }}">
                                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>  My Profile</a>
                                      </li>
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                           href="/logout">
                                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log Out
                                        </a>
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
                <h6 class="fw-semibold mb-0">Add User</h6>
                <ul class="d-flex align-items-center gap-2">
                    {{-- <li class="fw-medium">
        <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li> --}}
                    {{-- <li class="fw-medium">Add User</li> --}}

                </ul>
            </div>
            @if (session('success'))
                <div class="alert alert-primary">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
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
                       var address = document.getElementById("zipCode").value;
                                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                var phonePattern = /^[6-9]\d{9}$/;
                                var pinPattern = /^\d{6}$/;
                                var role = document.getElementById("role").value;
                                var reporting_manager_id = document.getElementById("reporting_manager_id").value;


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

                                if (password.length < 6) {
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
                                if (role == "" || role.length > 255) {
                                    alert("Roles is required");
                                    isValid = false;
                                }




                                return isValid;
                            }
                        </script>
                 <form class="row gy-3 needs-validation" action="{{ route('adding') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="col-md-6">
                        <label for="file" class="form-label">Image</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" required>
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="Enter First Name" value="{{ old('firstname') }}" required>
                        @error('firstname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Enter Last Name" value="{{ old('lastname') }}" required>
                        @error('lastname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="*******" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="+91-8559083842" minlength="10" maxlength="10" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select @error('state') is-invalid @enderror" id="state" name="state" required>
                            <option value="" disabled {{ old('state') == '' ? 'selected' : '' }}>Select State</option>
                            <option value="Punjab" {{ old('state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                            <option value="Himachal Pardesh" {{ old('state') == 'Himachal Pardesh' ? 'selected' : '' }}>Himachal Pardesh</option>
                            <option value="Jammu and kashmir" {{ old('state') == 'Jammu and kashmir' ? 'selected' : '' }}>Jammu and kashmir</option>
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
                            <option value="Jalandhar" {{ old('city') == 'Jalandhar' ? 'selected' : '' }}>Jalandhar</option>
                            <option value="Amritsar" {{ old('city') == 'Amritsar' ? 'selected' : '' }}>Amritsar</option>
                            <option value="Delhi" {{ old('city') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                        </select>
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pincode" class="form-label">Pin code</label>
                        <input type="text" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="144008" minlength="6" maxlength="6" value="{{ old('pincode') }}" required>
                        @error('pincode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="enter address" value="{{ old('address') }}" required>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

    <div class="col-md-12">
        <label for="reporting_manager" class="form-label">Reporting Manager</label>
        <select name="reporting_manager_id" id="reporting_manager" class="form-control @error('reporting_manager_id') is-invalid @enderror">
            <option value="">Select Manager</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('reporting_manager_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->firstname }} {{ $user->lastname }}
                </option>
            @endforeach
        </select>
        @error('reporting_manager_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <div class="row">
                            @foreach ($roles as $role_id => $role_name)
                                <div class="col-md-3 mt-3">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="roles[]"
                                        id="role-{{ $role_id }}"
                                        value="{{ $role_id }}"
                                        {{ in_array($role_id, old('roles', $userRole ?? [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role-{{ $role_id }}">
                                        {{ $role_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>




                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="button" onclick="window.location.href='{{ url()->previous() }}'">Cancel</button>
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
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
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
