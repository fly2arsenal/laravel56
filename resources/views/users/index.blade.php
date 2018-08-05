@extends('layouts.admin')

@section('title', 'List members')

@section('content')
    @parent
    <div class="box">
        @if(count($users) > 0)
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th> 
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <th class="text-center">{{ $user->created_at->format('m/d/Y') }}</th>
                        <td class="text-center action-table" style="width:260px;">
                            <div class="btn-group">
                                <a href="{{ route("users.edit", $user->id) }}" type="button"
                                   class="btn btn-primary">Edit</a>
                            </div>
                            <div class="btn-group">
                                {{ Form::open(array('url' => route('users.destroy', $user->id), 'method' => 'delete', 'onclick'=>"return confirm('Do you want to delete this?')")) }}
                                <button type="submit" class="btn btn-danger"><span >Delete</span></button>
                                {{ Form::close() }}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">{{ $users->links() }}</div>
        @else
            <h2 class="no-result">No user</h2>
        @endif
    </div>
@stop