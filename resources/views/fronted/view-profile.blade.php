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

                                @if ($user && $user->file != '')
                                    <img src="{{ asset('/storage/assets/uploads/' . $user->file) }}"
                                        class="w-40-px h-40-px object-fit-cover rounded-circle" alt="User Image">
                                @else
                                    <img src="{{ url('fronted/images/user.png') }}"
                                        class="w-40-px h-40-px object-fit-cover rounded-circle" alt="User Image">
                                @endif
                            </button>

                            <!-- Dropdown menu -->
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <ul class="to-top-list">
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="{{ url('add-user') }}">
                                            <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                            {{-- <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon> --}}
                                            My Profile</a>
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
                <h6 class="fw-semibold mb-0">View Profile</h6>
                <ul class="d-flex align-items-center gap-2">
                    {{-- <li class="fw-medium">
                        <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">View Profile</li> --}}
                </ul>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                        <div class="pb-24 ms-16 mb-24 me-16 mt-0">
                            <div class="text-center border border-top-0 border-start-0 border-end-0">
                                <!-- User Profile Picture -->
                                <img src="{{ $user->file ? asset('storage/assets/uploads/' . $user->file) : asset('fronted/images/asset/asset-img1.png') }}"
                                    alt="Profile Picture"
                                    class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">

                                <!-- User Full Name -->
                                <h6 class="mb-0 mt-16">{{ $user->firstname }} {{ $user->lastname }}</h6>

                                <!-- User Email -->
                                <span class="text-secondary-light mb-16">{{ $user->email }}</span>
                            </div>

                            <div class="mt-24">
                                <h6 class="text-xl mb-16">Personal Info</h6>
                                <ul>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">First Name</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->firstname }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Last Name</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->lastname }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Email</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->email }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Phone</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->phone }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">City</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->city }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">State</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->state }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">address</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->address }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Pincode</span>
                                        <span class="w-70 text-secondary-light fw-medium">: {{ $user->pincode }}</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Reporting Manager</span>
                                        <span class="w-70 text-secondary-light fw-medium">
                                            :
                                            @if($user->reporting_manager_id)
                                                {{ optional($users->firstWhere('id', $user->reporting_manager_id))->firstname }} {{ optional($users->firstWhere('id', $user->reporting_manager_id))->lastname }}
                                            @else
                                                Not assigned
                                            @endif
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Role</span>
                                        <span class="w-70 text-secondary-light fw-medium">:      @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                               <label class="badge bg-danger" style="color: white">{{ $v }}</label>
                                            @endforeach
                                          @endif</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-body p-24">
                            <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center px-24 active"
                                        id="pills-edit-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-edit-profile" type="button" role="tab"
                                        aria-controls="pills-edit-profile" aria-selected="true">
                                        Edit Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center px-24"
                                        id="pills-change-passwork-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-change-passwork" type="button" role="tab"
                                        aria-controls="pills-change-passwork" aria-selected="false" tabindex="-1">
                                        Change Password
                                    </button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center px-24" id="pills-notification-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-notification" type="button"
                                        role="tab" aria-controls="pills-notification" aria-selected="false"
                                        tabindex="-1">
                                        Notification Settings
                                    </button>
                                </li> --}}
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                                    aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                    <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                                    <!-- Upload Image Start -->
                                    {{-- <div class="mb-24 mt-16">
                                        <div class="avatar-upload">
                                                <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                                    <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                        <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                                    </label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- Upload Image End -->
                                    <form action="{{ route('user.updateProfile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="file" class="form-label">Image</label>
                                                    <input type="file"
                                                        class="form-control @error('file') is-invalid @enderror"
                                                        id="file" name="file">
                                                    @error('file')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="firstname"
                                                        class="form-label fw-semibold text-primary-light text-sm mb-8">First
                                                        Name <span class="text-danger-600">*</span></label>
                                                    <input type="text" class="form-control radius-8" id="firstname"
                                                        name="firstname" placeholder="Enter First Name"
                                                        value="{{ old('firstname', $user->firstname) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="lastname"
                                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Last
                                                        Name <span class="text-danger-600">*</span></label>
                                                    <input type="text" class="form-control radius-8" id="lastname"
                                                        name="lastname" placeholder="Enter Last Name"
                                                        value="{{ old('lastname', $user->lastname) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="email"
                                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                                        <span class="text-danger-600">*</span></label>
                                                    <input type="email" class="form-control radius-8" id="email"
                                                        name="email" placeholder="Enter email address"
                                                        value="{{ old('email', $user->email) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="phone"
                                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Phone</label>
                                                    <input type="tel" class="form-control radius-8" id="phone"
                                                        name="phone" placeholder="Enter phone number"
                                                        value="{{ old('phone', $user->phone) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="state" class="form-label">State</label>
                                                    <select class="form-control @error('state') is-invalid @enderror"
                                                        id="state" name="state" required>
                                                        <option value="">Select State</option>
                                                        <option value="Punjab"
                                                            {{ old('state', $user->state) == 'Punjab' ? 'selected' : '' }}>
                                                            Punjab</option>
                                                        <option value="Himachal Pardesh"
                                                            {{ old('state', $user->state) == 'Himachal Pardesh' ? 'selected' : '' }}>
                                                            Himachal Pardesh</option>
                                                        <option value="Jammu and kashmir"
                                                            {{ old('state', $user->state) == 'Jammu and kashmir' ? 'selected' : '' }}>
                                                            Jammu and kashmir</option>
                                                    </select>
                                                    @error('state')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="city" class="form-label">City</label>
                                                    <select class="form-select @error('city') is-invalid @enderror"
                                                        id="city" name="city" required>
                                                        <option value="" disabled selected>Select City</option>
                                                        <option value="Jalandhar"
                                                            {{ old('city', $user->city) == 'Jalandhar' ? 'selected' : '' }}>
                                                            Jalandhar</option>
                                                        <option value="Amritsar"
                                                            {{ old('city', $user->city) == 'Amritsar' ? 'selected' : '' }}>
                                                            Amritsar</option>
                                                        <option value="Delhi"
                                                            {{ old('city', $user->city) == 'Delhi' ? 'selected' : '' }}>
                                                            Delhi</option>
                                                    </select>
                                                    @error('city')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="pincode" class="form-label">Pin code</label>
                                                    <input type="text"
                                                        class="form-control @error('pincode') is-invalid @enderror"
                                                        id="pincode" name="pincode" placeholder="144008"
                                                        value="{{ old('pincode', $user->pincode) }}" required>
                                                    @error('pincode')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address" name="address" placeholder="Enter Address"
                                                        value="{{ old('address', $user->address) }}" required>
                                                    @error('address')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="reporting_manager_id">Reporting Manager</label>
                                                    <select class="form-control @error('reporting_manager_id') is-invalid @enderror" id="reporting_manager_id" name="reporting_manager_id">
                                                        <option value="" disabled selected>Select Reporting Manager</option>
                                                        @foreach ($users as $manager) <!-- Loop through each user in the collection -->
                                                            <option value="{{ $manager->id }}" {{ old('reporting_manager_id', $user->reporting_manager_id) == $manager->id ? 'selected' : '' }}>
                                                                {{ $manager->firstname }} {{ $manager->lastname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('reporting_manager_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="form-group">
                                                <label for="reporting_manager_id">Reporting Manager</label>
                                                <select class="form-control @error('reporting_manager_id') is-invalid @enderror" id="reporting_manager_id" name="reporting_manager_id">
                                                    <option value="" disabled selected>Select Reporting Manager</option>
                                                    @foreach ($users as $manager) // Loop through each user in the collection
                                                        <option value="{{ $manager->id }}" {{ old('reporting_manager_id', $user->reporting_manager_id) == $manager->id ? 'selected' : '' }}>
                                                            {{ $manager->firstname }} {{ $manager->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('reporting_manager_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}



                                            <div class="col-sm-12">
                                                <div class="mb-20">
                                                    <label class="form-label">Role</label>
                                                    <div class="row">
                                                        @foreach ($roles as $role)
                                                            <div class="col-md-3 mt-3">
                                                                <label>
                                                                    <input type="checkbox" class="form-check-input"
                                                                           name="roles[]"
                                                                           value="{{ $role->name }}"
                                                                           {{ in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())) ? 'checked' : '' }}>
                                                                    {{ $role->name }}
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
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                            <a href="{{ url('list-user')}}"
                                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">Cancel</a>
                                            <button type="submit"
                                                class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">Save</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade" id="pills-change-passwork" role="tabpanel"
                                aria-labelledby="pills-change-passwork-tab" tabindex="0">
                                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                <form method="POST" action="{{ route('profile.change-password') }}">
                                    @csrf <!-- Laravel CSRF protection -->

                                    <!-- Current Password -->
                                    <div class="mb-20">
                                        <label for="current-password" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Current Password <span class="text-danger-600">*</span>
                                        </label>
                                        <input type="password" name="current_password" class="form-control radius-8" id="current-password"
                                            placeholder="Enter Current Password*" required>
                                    </div>

                                    <!-- New Password -->
                                    <div class="mb-20">
                                        <label for="new-password" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            New Password <span class="text-danger-600">*</span>
                                        </label>
                                        <input type="password" name="new_password" class="form-control radius-8" id="new-password"
                                            placeholder="Enter New Password*" required>
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div class="mb-20">
                                        <label for="new-password_confirmation" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Confirm New Password <span class="text-danger-600">*</span>
                                        </label>
                                        <input type="password" name="new_password_confirmation" class="form-control radius-8" id="new-password_confirmation"
                                            placeholder="Confirm New Password*" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </form>

                            </div>


                                <div class="tab-pane fade" id="pills-notification" role="tabpanel"
                                    aria-labelledby="pills-notification-tab" tabindex="0">
                                    <div
                                        class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                        <label for="companzNew"
                                            class="position-absolute w-100 h-100 start-0 top-0"></label>
                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                            <span
                                                class="form-check-label line-height-1 fw-medium text-secondary-light">Company
                                                News</span>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="companzNew">
                                        </div>
                                    </div>
                                    <div
                                        class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                        <label for="pushNotifcation"
                                            class="position-absolute w-100 h-100 start-0 top-0"></label>
                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                            <span
                                                class="form-check-label line-height-1 fw-medium text-secondary-light">Push
                                                Notification</span>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="pushNotifcation" checked>
                                        </div>
                                    </div>
                                    <div
                                        class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                        <label for="weeklyLetters"
                                            class="position-absolute w-100 h-100 start-0 top-0"></label>
                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                            <span
                                                class="form-check-label line-height-1 fw-medium text-secondary-light">Weekly
                                                News Letters</span>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="weeklyLetters" checked>
                                        </div>
                                    </div>
                                    <div
                                        class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                        <label for="meetUp" class="position-absolute w-100 h-100 start-0 top-0"></label>
                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                            <span
                                                class="form-check-label line-height-1 fw-medium text-secondary-light">Meetups
                                                Near you</span>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="meetUp">
                                        </div>
                                    </div>
                                    <div
                                        class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                        <label for="orderNotification"
                                            class="position-absolute w-100 h-100 start-0 top-0"></label>
                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                            <span
                                                class="form-check-label line-height-1 fw-medium text-secondary-light">Orders
                                                Notifications</span>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="orderNotification" checked>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
@endsection
