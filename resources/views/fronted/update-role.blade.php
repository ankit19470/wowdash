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
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Users</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ url('add-user') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Add User</a></li>
                        <li><a href="{{ url('list-user') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List User</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="mdi:cog-outline" class="menu-icon"></iconify-icon>
                        <span>Roles & Permission</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ url('add-module') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add Module</a></li>

                        <li><a href="{{ url('add-permission') }}"><i
                                    class="ri-circle-fill circle-icon text-info-main w-auto"></i> Permission</a></li>
                        <li><a href="{{ url('list-permission') }}"><i
                                    class="ri-circle-fill circle-icon text-info-main w-auto"></i> List Permission</a></li>
                        <li><a href="{{ url('add-role') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Add Role</a></li>
                        <li><a href="{{ url('list-role') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List Role</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <main class="dashboard-main">
        {{-- <div class="navbar-header">
            <!-- Navbar content remains the same -->
        </div> --}}
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
                                            href="{{ route('profile.view') }}">
                                            <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon> My
                                            Profile</a>
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
                <h6 class="fw-semibold mb-0">Update Role</h6>
                <ul class="d-flex align-items-center gap-2">
                    <!-- Additional buttons or links can go here -->
                </ul>
            </div>
            {{-- Display success or error messages --}}
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
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $role->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for=""></label>
                                <div class="row">
                                    @foreach ($modules as $module)
                                        <div class="col-md-12">
                                            <h6>{{ $module->module }}</h6>
                                            <div class="row">
                                                @foreach ($permissions as $permission)
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permissions[]" value="{{ $permission->name }}"
                                                                data-permission="{{ $permission->name }}"
                                                                data-role-permission="{{ $role->hasPermissionTo('new1') }}"
                                                                {{ $role->permissions->pluck('name')->contains($permission->name) ? 'checked' : '' }}>
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}
                            {{--

                            <div class="mb-3">
                                <label for="">Permissions</label>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox"
                                                    class="form-check-input"
                                                    name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    {{ $role->permissions->pluck('name')->contains($permission->name) ? 'checked' : '' }}>
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            <div class="mb-3">
                                <label for="">Roles & Permissions</label>
                                <label class="ms-3">
                                    <input type="checkbox" class="form-check-input select-all-modules"> Select All
                                </label>
                                <div class="row mt-2">
                                    @foreach ($modules as $module)
                                        <div class="col-md-12 mt-3">
                                            <div class="row">
                                                @if ($module->permissions->isNotEmpty())
                                                    <div class="col-md-12 mb-2">
                                                        <label>
                                                            <input type="checkbox" class="form-check-input select-module"
                                                                id="module-{{ $module->id }}"
                                                                data-module-id="{{ $module->id }}">
                                                            <span class="fw-bold">{{ $module->module }}</span>
                                                        </label>
                                                    </div>
                                                    @foreach ($module->permissions as $permission)
                                                        <div class="col-md-3">
                                                            <label>
                                                                <input type="checkbox"
                                                                    class="form-check-input permission-checkbox"
                                                                    name="permissions[]" value="{{ $permission->name }}"
                                                                    data-module-id="{{ $module->id }}"
                                                                    id="permission-{{ $module->id }}-{{ $permission->name }}"
                                                                    {{ $role->permissions->pluck('name')->contains($permission->name) ? 'checked' : '' }}>
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    {{-- <p>No permissions available for this module.</p> --}}
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>





                            <button type="submit" class="btn btn-primary">Update Role</button>
                            <a href="{{ route('list-role') }}" class="btn btn-secondary">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="d-footer">
            <!-- Footer content remains the same -->
        </footer>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllModulesCheckbox = document.querySelector('.select-all-modules');

            // Event listener for "Select All Modules"
            selectAllModulesCheckbox.addEventListener('change', function() {
                const isChecked = selectAllModulesCheckbox.checked;

                // Select or deselect all module checkboxes
                document.querySelectorAll('.select-module').forEach(moduleCheckbox => {
                    moduleCheckbox.checked = isChecked; // Check or uncheck the module checkbox

                    // Select or deselect all permissions for this module
                    const permissionsForModule = document.querySelectorAll(
                        `input[data-module-id="${moduleCheckbox.dataset.moduleId}"]`);
                    permissionsForModule.forEach(permission => {
                        permission.checked = isChecked; // Sync permission checkbox
                    });
                });
            });

            // Event listeners for individual module checkboxes
            document.querySelectorAll('.select-module').forEach(moduleCheckbox => {
                moduleCheckbox.addEventListener('change', function() {
                    const permissionsForModule = document.querySelectorAll(
                        `input[data-module-id="${moduleCheckbox.dataset.moduleId}"]`);

                    // Set permissions checked status based on module checkbox
                    permissionsForModule.forEach(permission => {
                        permission.checked = moduleCheckbox
                        .checked; // Sync permission checkboxes
                    });
                });
            });

            // Event listener for individual permission checkboxes
            document.querySelectorAll('.permission-checkbox').forEach(permissionCheckbox => {
                permissionCheckbox.addEventListener('change', function() {
                    const moduleId = this.getAttribute('data-module-id');
                    const moduleCheckbox = document.querySelector(`#module-${moduleId}`);
                    const allPermissions = document.querySelectorAll(
                        `input[data-module-id="${moduleId}"].permission-checkbox`);

                    // Check if all permissions for the module are checked
                    const allChecked = [...allPermissions].every(checkbox => checkbox.checked);

                    // Update the module checkbox based on permissions
                    moduleCheckbox.checked = allChecked;
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
