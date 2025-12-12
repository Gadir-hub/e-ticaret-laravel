<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - MarketPlace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 440px;
        }
        
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
            padding: 3rem;
            border: 1px solid #f1f3f4;
            backdrop-filter: blur(10px);
        }
        
        .brand-logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .brand-logo i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            display: block;
        }
        
        .brand-logo h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
            letter-spacing: -0.025em;
        }
        
        .brand-logo p {
            color: #6b7280;
            font-size: 0.9rem;
            margin: 0.5rem 0 0 0;
            font-weight: 400;
        }
        
        .form-label {
            font-weight: 500;
            color: #374151;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #fafbfc;
        }
        
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: #ffffff;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border: none;
            border-radius: 10px;
            padding: 0.875rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 10px rgba(37, 99, 235, 0.2);
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem 1.25rem;
            font-size: 0.9rem;
        }
        
        .alert-danger {
            background: #fef2f2;
            color: #dc2626;
            border-left: 4px solid #dc2626;
        }
        
        .alert-success {
            background: #f0fdf4;
            color: #16a34a;
            border-left: 4px solid #16a34a;
        }
        
        .form-check-input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }
        
        .form-check-label {
            font-size: 0.9rem;
            color: #6b7280;
        }
        
        .register-link {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        
        .register-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #9ca3af;
            font-size: 0.9rem;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 2rem 0 0 0;
        }
        
        .feature-list li {
            padding: 0.5rem 0;
            color: #6b7280;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        
        .feature-list li i {
            color: #10b981;
            margin-right: 0.75rem;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <div class="brand-logo">
            <i class="fas fa-store"></i>
            <h1>MarketGadir</h1>
            <p>Profesyonel Ticaret Platformu</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                @foreach($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Kullanıcı Adı</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i class="fas fa-user text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Kullanıcı adınızı girin">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" class="form-control border-start-0" id="password" name="password" required placeholder="Şifrenizi girin">
                </div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Beni hatırla</label>
                </div>
                <a href="#" class="text-decoration-none text-sm text-muted">Şifremi unuttum?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fas fa-sign-in-alt me-2"></i>Giriş Yap
            </button>
        </form>

        <div class="divider">veya</div>

        <p class="text-center text-muted mb-0">
            Hesabınız yok mu? 
            <a href="{{ route('register') }}" class="register-link">Hesap oluşturun</a>
        </p>

        <ul class="feature-list">
            <li><i class="fas fa-check"></i> Güvenli giriş</li>
            <li><i class="fas fa-check"></i> 7/24 erişim</li>
            <li><i class="fas fa-check"></i> Profesyonel araçlar</li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>