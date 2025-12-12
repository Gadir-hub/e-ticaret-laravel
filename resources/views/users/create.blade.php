@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Yeni Kullanıcı Ekle</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>İsim</label>
            <input type="text" name="isim" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Şifre</label>
            <input type="password" name="sifre" class="form-control">
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option value="vatandaş">Vatandaş</option>
                <option value="kurtarma">Kurtarma Ekibi</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Ekle</button>
    </form>
</div>
@endsection
