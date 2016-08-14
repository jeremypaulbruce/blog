@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-2">

        @if (true === $isNewRecord)
            <h2>Create User</h2>
        @else
            <h2>Edit User</h2>
        @endif

    </div>

    @include('common.errors')

    {{--TODO - use a form builder class--}}
    <form action="{{ url('/admin/user/'.$user->id) }}" method="POST" class="form-horizontal">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="user" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="user" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" id="user-email" class="form-control" value="{{ $user->email }}" required>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>
                    @if (true === $isNewRecord)
                        Add User
                    @else
                        Update User
                    @endif
                </button>
            </div>
        </div>

    </form>

@endsection