@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Role: {{ $role->name }}</h2>

    <form action="/role/{{ $role->id }}/permissions" method="POST">
        @csrf
        @method('PUT')

        @foreach($modules as $module)
            <div class="module">
                <h3>{{ $module->name }}</h3>
                <ul>
                    @foreach($module->permissions as $permission)
                        <li>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                   @if(in_array($permission->id, $rolePermissions)) checked @endif>
                            {{ $permission->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save Permissions</button>
    </form>
</div>
@endsection
