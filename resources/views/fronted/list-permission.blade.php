
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


          </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)">
                {{-- <iconify-icon icon="gear:-group-outline" class="menu-icon"></iconify-icon> --}}
                <iconify-icon icon="mdi:cog-outline" class="menu-icon"></iconify-icon>
                <span>Roles & Permission</span>
            </a>
            <ul class="sidebar-submenu">


                <li>
                    <a href="{{ url('add-permission') }}"><i
                            class="ri-circle-fill circle-icon text-info-main w-auto"></i> Permission</a>
                </li>
                <li>
                    <a href="{{ url('list-permission') }}"><i
                            class="ri-circle-fill circle-icon text-info-main w-auto"></i> List Permission</a>
                </li>
                <li>
                    <a href="{{ url('add-role') }}"><i
                            class="ri-circle-fill circle-icon text-info-main w-auto"></i> add role</a>
                </li>
                <li><a href="{{ url('list-role') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> List Role</a></li>


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
                    <div class="dropdown">
                        <button class="d-flex justify-content-center align-items-center rounded-circle" type="button" data-bs-toggle="dropdown">
                            <img src="{{ url('fronted/images/user.png') }}" alt="User Image" class="w-40-px h-40-px object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">

                            <ul class="to-top-list">


                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" href="/logout">
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
    <h6 class="fw-semibold mb-0">Permission List</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">

      </li>

    </ul>
  </div>

      <div class="card basic-data-table">

        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Permission Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            {{-- <a href={{"/update-permission/".$permission->id}} class="text-primary bi bi-pencil"></a> --}}
                            <a href={{"/update-permission/".$permission->id }} class="text-primary bi bi-pencil"></a>

                                <a class="text-danger bi bi-trash deleteUser" data-id="{{ $permission->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                </a>
                        </td>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this permission?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- JavaScript to handle form action update -->
<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // The button that triggered the modal
        var permissionId = button.getAttribute('data-id'); // Get permission ID

        // Update the form action with the correct permission ID
        var form = document.getElementById('deleteForm');
        form.action = "/permissions/" + permissionId;
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
