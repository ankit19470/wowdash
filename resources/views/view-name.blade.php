@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assign Permissions to Role: {{ $role->name }}</h2>
    <form action="{{ route('assign.permissions', $role->id) }}" method="POST">
        @csrf
        @foreach($modules as $module)
            <div>
                <h4>{{ $module->name }}</h4>
                @foreach($module->permissions as $permission)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                               @if(in_array($permission->id, $rolePermissions)) checked @endif>
                        {{ $permission->name }}
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Assign Permissions</button>
    </form>
</div>
@endsection
