@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Kullanıcılar</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Yeni Kullanıcı Ekle</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>İsim</th><th>Email</th><th>Rol</th><th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rol }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
