<!-- Modal -->
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Modal -->
{{-- <div class="modal fade" id="rolesModal" tabindex="-1" role="dialog" aria-labelledby="rolesModalLabel" aria-hidden="true"> --}}
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="rolesModalLabel">Select Role</h5>
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
        </div>
        <div class="modal-body">
            <p>
                @if ($roles->isNotEmpty())
                    @foreach ($roles as $role)
                        <p>
                            <button type="button" class="btn btn-primary role-select" data-role="{{ $role->name }}"
                                data-role-id="{{ $role->id }}">
                                {{ $role->name }}
                            </button>
                        </p>
                    @endforeach
                @else
                    <li>No roles available.</li>
                @endif
                </ul>
        </div>
    </div>
</div>
{{-- </div> --}}
<script>
    $(document).ready(function() {
        // Check if session 'user_roles' exists and show modal if it does
        @if (session('user_roles'))
            $('#rolesModal').modal('show'); // Show modal if roles exist
            {{ session()->forget('user_roles') }} // Clear roles after showing
        @endif

        // Handle role selection
        $('.role-select').on('click', function() {
            var selectedRoleId = $(this).data('role-id'); // Get the selected role ID
            var selectedRoleName = $(this).data('role'); // Get the selected role name

            // Assign role to session using JavaScript (assume backend will handle session persistence)
            // var sessionRole = selectedRoleName;

            // console.log("session data:", sessionRole);

            // $.ajax({
            //     url: '{{ route('setUserRole') }}', // Adjust the route as needed
            //     method: 'POST',
            //     data: {
            //         role: selectedRoleName,
            //         _token: '{{ csrf_token() }}' // Include CSRF token
            //     },
            //     success: function(response) {
            //         // Handle success, maybe update UI or notify the user
            //         console.log('Role saved:', response);
            //     },
            //     error: function(xhr) {
            //         // Handle error
            //         console.error('Error saving role:', xhr);
            //     }
            // });

            const xhr = new XMLHttpRequest();
            const url = '{{ route('setUserRole') }}'; // Adjust the route as needed
            const token = '{{ csrf_token() }}'; // Include CSRF token

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json'); // Set content type to JSON
            xhr.setRequestHeader('X-CSRF-TOKEN', token); // Set CSRF token header

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Handle success, maybe update UI or notify the user
                    let res = JSON.parse(xhr.responseText);
                    console.log('Role saved:', JSON.parse(xhr.responseText));

                    if(res.success){
                        window.location.href = res.url;
                    }else{
                        alert('Role not recognized: ' + selectedRoleName);
                    }

                } else {
                    // Handle error
                    console.error('Error saving role:', xhr);
                }
            };

            xhr.onerror = function() {
                console.error('Request failed:', xhr);
            };

            // Prepare the data to send
            const data = JSON.stringify({
                role: selectedRoleName
            });

            // Send the request
            xhr.send(data);

        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
        // Check if session 'user_roles' exists
        @if (session('user_roles'))
            $('#rolesModal').modal('show'); // Show modal if roles exist
            {{ session()->forget('user_roles') }} // Clear roles after showing
        @endif

        // Handle role selection
        $('.role-select').on('click', function() {
            var selectedRoleId = $(this).data('role-id'); // Get the selected role ID
            var selectedRoleName = $(this).data('role'); // Get the selected role name

            // Store selected role name in session
            {{ session()->put("user_role", "selectedRoleName") }}; // Note: This won't work as is

            let session = "{{ session()->get('user_role') }}";
            console.log("session data:", session);

            // Debugging: Log selected role information
            console.log('Selected Role ID:', selectedRoleId);
            console.log('Selected Role Name:', selectedRoleName);

            // Redirect based on selected role
            if (session === 'Admin') {
                // Redirect to the user page
                alert("hi admin");
                window.location.href = '/user-page'; // Adjust this URL as necessary
            } else if (session === 'user') {
                alert("hi employee");
                // Redirect to the add-user route
                window.location.href = '/add-user'; // Adjust this URL as necessary
            } else {
                alert('Role not recognized: ' + selectedRoleName); // Fallback alert for unrecognized roles
            }
        });
    });
</script> --}}
{{-- <script>
    $(document).ready(function() {
        // Check if session 'user_roles' exists
        @if (session('user_roles'))
            $('#rolesModal').modal('show'); // Show modal if roles exist
            {{ session()->forget('user_roles') }} // Clear roles after showing
        @endif

        // Handle role selection
        $('.role-select').on('click', function() {
            var selectedRoleId = $(this).data('role-id'); // Get the selected role ID
            var selectedRoleName = $(this).data('role'); // Get the selected role name



            // var selectedRoleName = $(this).data('role'); // Get the selected role name

            $.ajax({
                url: '{{ route('setUserRole') }}', // Adjust the route as needed
                method: 'POST',
                data: {
                    role: selectedRoleName,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    // Handle success, maybe update UI or notify the user
                    console.log('Role saved:', response);
                },
                error: function(xhr) {
                    // Handle error
                    console.error('Error saving role:', xhr);
                }
            });

            let session = "{{ session()->get('user_role') }}"

            console.log("session data:", session);

            // Debugging: Log selected role information
            console.log('Selected Role ID:', selectedRoleId);
            console.log('Selected Role Name:', selectedRoleName);

            // Redirect based on selected role
            if (session === 'Admin') {
                // Redirect to the user page
                alert("hi admin")
                window.location.href = '/user-page'; // Adjust this URL as necessary
            } else if (session === 'user') {
                alert("hi employee")
                // Redirect to the add-user route
                console.log('selectedRoleName')
                window.location.href = '/add-user'; // Adjust this URL as necessary
            } else {
                alert('Role not recognized: ' +
                selectedRoleName); // Fallback alert for unrecognized roles
            }
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        // Check if session 'user_roles' exists
        @if (session('user_roles'))
            $('#rolesModal').modal('show'); // Show modal if roles exist
            {{ session()->forget('user_roles') }} // Clear roles after showing
        @endif

        // Handle role selection
        $('.role-select').on('click', function() {
            var selectedRoleId = $(this).data('role-id'); // Get the selected role ID
            var selectedRoleName = $(this).data('role'); // Get the selected role name


             session()->get("user_role", selectedRoleName);
            let session = session()->put("user_role");

            console.log("session data:", session);

            // Debugging: Log selected role information
            console.log('Selected Role ID:', selectedRoleId);
            console.log('Selected Role Name:', selectedRoleName);

            // Redirect based on selected role
            if (session === 'Admin') {
                // Redirect to the user page
                alert("hi admin")
                window.location.href = '/user-page'; // Adjust this URL as necessary
            } else if (session === 'user') {
                alert("hi employee")
                // Redirect to the add-user route
                console.log('selectedRoleName')
                window.location.href = '/add-user'; // Adjust this URL as necessary
            } else {
                alert('Role not recognized: ' + selectedRoleName); // Fallback alert for unrecognized roles
            }
        });
    });
</script> --}}

{{--
<script>
    $(document).ready(function() {
        // Check if session 'user_roles' exists
        @if (session('user_roles'))
            $('#rolesModal').modal('show'); // Show modal if roles exist
            {{ session()->forget('user_roles') }} // Clear roles after showing
        @endif

        // Handle role selection
        $('.role-select').on('click', function() {
            var selectedRoleId = $(this).data('role-id'); // Get the selected role ID
            var selectedRoleName = $(this).data('role'); // Get the selected role name

            // Store the selected role name in the session
            @php
                session()->put('user_role', '{{ js_escape(selectedRoleName) }}'); // Use a function to escape the name properly
            @endphp

            let sessionRole = "{{ session()->get('user_role') }}"; // Fetch the role from the session

            console.log("session data:", sessionRole);

            // Debugging: Log selected role information
            console.log('Selected Role ID:', selectedRoleId);
            console.log('Selected Role Name:', selectedRoleName);

            // Redirect based on selected role
            if (sessionRole === 'Admin') {
                // Redirect to the user page
                alert("hi admin");
                window.location.href = '/user-page'; // Adjust this URL as necessary
            } else if (sessionRole === 'user') {
                alert("hi employee");
                // Redirect to the add-user route
                console.log('selectedRoleName');
                window.location.href = '/add-user'; // Adjust this URL as necessary
            } else {
                alert('Role not recognized: ' + selectedRoleName); // Fallback alert for unrecognized roles
            }
        });
    });
</script> --}}
