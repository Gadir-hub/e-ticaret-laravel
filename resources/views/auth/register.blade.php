<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol - MarketPlace</title>
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
        
        .register-container {
            width: 100%;
            max-width: 480px;
        }
        
        .register-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
            padding: 3rem;
            border: 1px solid #f1f3f4;
            backdrop-filter: blur(10px);
        }
        
        .brand-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .brand-icon {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            display: block;
        }
        
        .brand-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.025em;
        }
        
        .brand-subtitle {
            color: #6b7280;
            font-size: 0.95rem;
            margin: 0;
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
        
        .form-select {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            background: #fafbfc;
            transition: all 0.2s ease;
        }
        
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: #ffffff;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
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
        
        .role-option {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #fafbfc;
        }
        
        .role-option:hover {
            border-color: #3b82f6;
            background: #f8fafc;
        }
        
        .role-option.selected {
            border-color: #3b82f6;
            background: #eff6ff;
        }
        
        .role-icon {
            font-size: 1.25rem;
            color: #3b82f6;
            margin-right: 0.75rem;
        }
        
        .role-title {
            font-weight: 600;
            color: #1f2937;
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }
        
        .role-description {
            color: #6b7280;
            font-size: 0.85rem;
            margin: 0;
        }
        
        .login-link {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        
        .login-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        
        .terms-text {
            font-size: 0.8rem;
            color: #6b7280;
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .input-group-text {
            background: transparent;
            border: 1.5px solid #e5e7eb;
            border-right: none;
        }
        
        .input-group .form-control {
            border-left: none;
        }
        
        .feature-badge {
            background: #10b981;
            color: white;
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
<div class="register-container">
    <div class="register-card">
        <div class="brand-header">
            <i class="fas fa-store brand-icon"></i>
            <h1 class="brand-title">MarketGadir</h1>
            <p class="brand-subtitle">Profesyonel Ticaret Platformu</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Lütfen bilgilerinizi kontrol edin</strong>
                <ul class="mb-0 mt-2 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Kullanıcı Adı</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-user text-muted"></i>
                    </span>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Kullanıcı adınızı girin">
                </div>
                <div class="form-text text-muted mt-1">Bu kullanıcı adı ile sisteme giriş yapacaksınız</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="En az 6 karakterli şifre girin">
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Şifrenizi tekrar girin">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label mb-3">Hesap Tipi</label>
                
                <div class="role-option {{ old('role') == 'alici' ? 'selected' : '' }}" onclick="selectRole('alici')">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-shopping-basket role-icon"></i>
                        <div>
                            <div class="role-title">Alıcı Hesabı</div>
                            <p class="role-description">Ürün satın almak istiyorum</p>
                        </div>
                    </div>
                </div>
                
                <div class="role-option {{ old('role') == 'satici' ? 'selected' : '' }}" onclick="selectRole('satici')">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-store role-icon"></i>
                        <div>
                            <div class="role-title">Satıcı Hesabı <span class="feature-badge">PRO</span></div>
                            <p class="role-description">Ürün satmak istiyorum</p>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="role" id="role" value="{{ old('role') }}" required>
                <div class="form-text text-muted mt-2">
                    <small>
                        <strong>Alıcı:</strong> Sadece alışveriş yapabilir<br>
                        <strong>Satıcı:</strong> Ürün ekleyip satış yapabilir, mağaza açabilir
                    </small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                <i class="fas fa-user-plus me-2"></i>Hesap Oluştur
            </button>
        </form>

        <div class="text-center">
            <p class="text-muted mb-2">
                Zaten hesabınız var mı? 
                <a href="{{ route('login') }}" class="login-link">Giriş yapın</a>
            </p>
            <p class="terms-text">
                Hesap oluşturarak <a href="#" class="text-decoration-none">Kullanım Koşulları</a> ve 
                <a href="#" class="text-decoration-none">Gizlilik Politikası</a>'nı kabul etmiş olursunuz.
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function selectRole(role) {
        document.getElementById('role').value = role;
        
        // Remove selected class from all options
        document.querySelectorAll('.role-option').forEach(option => {
            option.classList.remove('selected');
        });
        
        // Add selected class to clicked option
        event.currentTarget.classList.add('selected');
    }
    
    // Initialize selected role on page load
    document.addEventListener('DOMContentLoaded', function() {
        const currentRole = document.getElementById('role').value;
        if (currentRole) {
            document.querySelectorAll('.role-option').forEach(option => {
                if (option.querySelector('.role-title').textContent.includes(
                    currentRole === 'alici' ? 'Alıcı' : 'Satıcı'
                )) {
                    option.classList.add('selected');
                }
            });
        }
    });
</script>
</body>
</html>