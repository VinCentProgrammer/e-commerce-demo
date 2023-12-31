@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật thông tin
            </div>
            <div class="card-body">

                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <br>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <br>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input class="form-control" type="email" name="email" id="email" disabled
                            value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="roles">Chọn nhóm quyền</label>
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input"
                                    {{ in_array($role->id, $user->roles->pluck('id')->toArray('id'))? 'checked': '' }}
                                    name="role_id[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}">
                                <label class="form-check-label" for="{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" value="Lưu thay đổi" name="btn_update" class="btn btn-primary">Lưu thay
                        đổi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
