@extends('fronted.layout.main')

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
                            <a href="{{ url('user-page') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> view</a>
                        </li>

                        {{-- <li>
                <a href="{{url('update-user')}}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Update User</a>
              </li> --}}
                        {{-- <li>
              <a href="view-profile.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> View Profile</a>
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
                <h6 class="fw-semibold mb-0">User List</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        {{-- <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a> --}}
                    </li>
                    {{-- <li>-</li> --}}
                    {{-- <li class="fw-medium">User Table</li> --}}
                </ul>
            </div>

            <div class="card basic-data-table">
                {{-- <div class="card-header">
          <h5 class="card-title mb-0">Default Datatables</h5>
        </div> --}}
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('users.filter') }}">
                        @csrf

                        <div class="row">
                            <!-- Start Date -->
                            <div class="col-md-5 mb-3">
                                {{-- <label for="start_date" class="form-label">Start Date:</label> --}}
                                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>

                            <!-- End Date -->
                            <div class="col-md-5 mb-3">
                                {{-- <label for="end_date" class="form-label">End Date:</label> --}}
                                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-2 mb-3 ">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>


                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>


                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                {{-- <th scope="col">Image</th> --}}
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                {{-- <th scope="col">Address</th> --}}
                                <th scope="col">PinCode</th>
                                <th scope="col">City</th>

                                <th scope="col">State</th>
                                <th scope="col">Role</th>

                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    {{-- <td>{{ $user->created_at->format('Y-m-d') }}</td> --}}
                                    {{-- <td>
                                @if ($user->file != '')
                                    <img src="{{ asset('/storage/assets/uploads/'.$user->file) }}" width="50" height="50" alt="">
                                @endif
                            </td> --}}
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    {{-- <td>{{ $user->address }}</td> --}}
                                    <td>{{ $user->pincode }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->state }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge bg-danger"
                                                    style="color: white">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    {{-- <td>{{ $user->roles->pluck('name')->implode(', ') }}</td> --}}

                                    {{-- <td>

                                        <a href={{ '/update-user/' . $user->id }} class="text-primary bi bi-pencil"></a>
                                        <a class="text-danger bi bi-trash deleteUser" data-id="{{ $user->id }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this user?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var deleteUserButtons = document.querySelectorAll('.deleteUser');

                deleteUserButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var userId = this.getAttribute('data-id');
                        var deleteForm = document.getElementById('deleteForm');
                        deleteForm.action = '/users/' + userId; // Adjust this to match your route
                    });
                });
            });
        </script>


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
