@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Kullanıcı Düzenle</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>İsim</label>
            <input type="text" name="isim" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option value="vatandaş" {{ $user->rol == 'vatandaş' ? 'selected' : '' }}>Vatandaş</option>
                <option value="kurtarma" {{ $user->rol == 'kurtarma' ? 'selected' : '' }}>Kurtarma Ekibi</option>
                <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">İptal</a>
    </form>
</div>
@endsection
