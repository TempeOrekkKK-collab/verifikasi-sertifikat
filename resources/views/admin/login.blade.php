<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" type="image/png" href="/images/atas.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #eef4ff, #dfefff); min-height: 100vh; display: flex; flex-direction: column; }
        .navbar { background: white; padding: 0 40px; height: 70px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .logo { font-size: 22px; font-weight: bold; color: #114b5f; text-decoration: none; }
        .wrap { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .card { border: none; border-radius: 24px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); width: 100%; max-width: 460px; padding: 48px 40px; }
        .logo-img { width: 180px; display: block; margin: 0 auto 24px; border-radius: 12px; }
        .card h2 { font-size: 24px; font-weight: 800; color: #114b5f; text-align: center; margin-bottom: 6px; }
        .card .sub { text-align: center; color: #888; font-size: 14px; margin-bottom: 28px; }
        .form-label { font-weight: 600; color: #114b5f; font-size: 14px; }
        .form-control { border-radius: 10px; padding: 12px 14px; border: 1.5px solid #e0e0e0; font-size: 14px; }
        .form-control:focus { border-color: #114b5f; box-shadow: 0 0 0 3px rgba(17,75,95,0.1); }
        .pw-wrapper { position: relative; }
        .pw-wrapper .form-control { padding-right: 44px; }
        .pw-toggle { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 16px; color: #888; }
        .btn-login { background: #114b5f; color: white; border: none; border-radius: 10px; padding: 13px; font-size: 15px; font-weight: 700; width: 100%; cursor: pointer; transition: all 0.2s; margin-top: 8px; }
        .btn-login:hover { background: #0d3a4a; transform: translateY(-1px); box-shadow: 0 8px 20px rgba(17,75,95,0.2); }
        .back-link { text-align: center; margin-top: 16px; font-size: 13px; color: #888; }
        .back-link a { color: #114b5f; font-weight: 600; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ route('home') }}" class="logo">VerifyCert</a>
</nav>

<div class="wrap">
    <div class="card">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
        <h2 id="txt-title">Admin Login</h2>
        <p class="sub" id="txt-sub">Masuk ke dashboard sertifikat</p>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" id="txt-label-email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="admin@gmail.com" autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" id="txt-label-password">Password</label>
                <div class="pw-wrapper">
                    <input type="password" name="password" id="pw-login"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••">
                    <button type="button" class="pw-toggle" onclick="toggleVis('pw-login', this)">👁</button>
                </div>
                @error('password') <div class="invalid-feedback" style="display:block;">{{ $message }}</div> @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-muted" style="font-size:13px;" for="remember" id="txt-remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn-login" id="txt-btn-login">Login</button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}" id="txt-back">← Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>

<script>
const translations = {
    id: { title:'Admin Login', sub:'Masuk ke dashboard sertifikat', labelEmail:'Email', labelPassword:'Password', remember:'Ingat saya', btnLogin:'Login', back:'← Kembali ke Halaman Utama' },
    en: { title:'Admin Login', sub:'Sign in to the certificate dashboard', labelEmail:'Email', labelPassword:'Password', remember:'Remember me', btnLogin:'Login', back:'← Back to Home' },
    ko: { title:'관리자 로그인', sub:'인증서 대시보드에 로그인', labelEmail:'이메일', labelPassword:'비밀번호', remember:'로그인 상태 유지', btnLogin:'로그인', back:'← 홈으로 돌아가기' },
    ja: { title:'管理者ログイン', sub:'証明書ダッシュボードにサインイン', labelEmail:'メールアドレス', labelPassword:'パスワード', remember:'ログイン状態を保持', btnLogin:'ログイン', back:'← ホームに戻る' },
    it: { title:'Accesso Admin', sub:'Accedi alla dashboard dei certificati', labelEmail:'Email', labelPassword:'Password', remember:'Ricordami', btnLogin:'Accedi', back:'← Torna alla Home' },
    es: { title:'Inicio de Sesión Admin', sub:'Inicia sesión en el panel de certificados', labelEmail:'Correo electrónico', labelPassword:'Contraseña', remember:'Recuérdame', btnLogin:'Iniciar sesión', back:'← Volver al inicio' },
    fr: { title:'Connexion Admin', sub:'Connectez-vous au tableau de bord', labelEmail:'E-mail', labelPassword:'Mot de passe', remember:'Se souvenir de moi', btnLogin:'Se connecter', back:'← Retour à l\'accueil' },
    de: { title:'Admin-Anmeldung', sub:'Am Zertifikat-Dashboard anmelden', labelEmail:'E-Mail', labelPassword:'Passwort', remember:'Angemeldet bleiben', btnLogin:'Anmelden', back:'← Zurück zur Startseite' },
    pt: { title:'Login Admin', sub:'Acesse o painel de certificados', labelEmail:'E-mail', labelPassword:'Senha', remember:'Lembrar de mim', btnLogin:'Entrar', back:'← Voltar ao início' },
    ar: { title:'تسجيل دخول المشرف', sub:'تسجيل الدخول إلى لوحة تحكم الشهادات', labelEmail:'البريد الإلكتروني', labelPassword:'كلمة المرور', remember:'تذكرني', btnLogin:'تسجيل الدخول', back:'→ العودة إلى الصفحة الرئيسية' },
    zh: { title:'管理员登录', sub:'登录证书管理面板', labelEmail:'电子邮件', labelPassword:'密码', remember:'记住我', btnLogin:'登录', back:'← 返回首页' },
    ru: { title:'Вход администратора', sub:'Войдите в панель управления сертификатами', labelEmail:'Электронная почта', labelPassword:'Пароль', remember:'Запомнить меня', btnLogin:'Войти', back:'← На главную' },
    hi: { title:'एडमिन लॉगिन', sub:'सर्टिफिकेट डैशबोर्ड में साइन इन करें', labelEmail:'ईमेल', labelPassword:'पासवर्ड', remember:'मुझे याद रखें', btnLogin:'लॉगिन करें', back:'← मुख्य पृष्ठ पर वापस जाएं' },
    tr: { title:'Admin Girişi', sub:'Sertifika panosuna giriş yapın', labelEmail:'E-posta', labelPassword:'Şifre', remember:'Beni hatırla', btnLogin:'Giriş Yap', back:'← Ana sayfaya dön' },
    nl: { title:'Admin Inloggen', sub:'Meld u aan bij het certificaten dashboard', labelEmail:'E-mail', labelPassword:'Wachtwoord', remember:'Onthoud mij', btnLogin:'Inloggen', back:'← Terug naar startpagina' },
    pl: { title:'Logowanie Administratora', sub:'Zaloguj się do panelu certyfikatów', labelEmail:'E-mail', labelPassword:'Hasło', remember:'Zapamiętaj mnie', btnLogin:'Zaloguj się', back:'← Wróć do strony głównej' },
    sv: { title:'Admin Inloggning', sub:'Logga in på certifikatpanelen', labelEmail:'E-post', labelPassword:'Lösenord', remember:'Kom ihåg mig', btnLogin:'Logga in', back:'← Tillbaka till startsidan' },
    th: { title:'เข้าสู่ระบบผู้ดูแล', sub:'ลงชื่อเข้าใช้แดชบอร์ดใบรับรอง', labelEmail:'อีเมล', labelPassword:'รหัสผ่าน', remember:'จดจำฉัน', btnLogin:'เข้าสู่ระบบ', back:'← กลับหน้าหลัก' },
    vi: { title:'Đăng nhập Admin', sub:'Đăng nhập vào bảng điều khiển chứng chỉ', labelEmail:'Email', labelPassword:'Mật khẩu', remember:'Nhớ tôi', btnLogin:'Đăng nhập', back:'← Về trang chủ' },
    ms: { title:'Log Masuk Admin', sub:'Log masuk ke papan pemuka sijil', labelEmail:'E-mel', labelPassword:'Kata laluan', remember:'Ingat saya', btnLogin:'Log Masuk', back:'← Kembali ke Halaman Utama' },
    fa: { title:'ورود مدیر', sub:'وارد داشبورد گواهینامه شوید', labelEmail:'ایمیل', labelPassword:'رمز عبور', remember:'مرا به خاطر بسپار', btnLogin:'ورود', back:'→ بازگشت به صفحه اصلی' },
    uk: { title:'Вхід адміністратора', sub:'Увійдіть до панелі сертифікатів', labelEmail:'Електронна пошта', labelPassword:'Пароль', remember:'Запам\'ятати мене', btnLogin:'Увійти', back:'← На головну' },
    ro: { title:'Autentificare Admin', sub:'Conectați-vă la panoul de certificate', labelEmail:'E-mail', labelPassword:'Parolă', remember:'Ține-mă minte', btnLogin:'Conectare', back:'← Înapoi la pagina principală' },
    cs: { title:'Přihlášení administrátora', sub:'Přihlaste se do panelu certifikátů', labelEmail:'E-mail', labelPassword:'Heslo', remember:'Zapamatovat si mě', btnLogin:'Přihlásit se', back:'← Zpět na hlavní stránku' },
    hu: { title:'Adminisztrátori bejelentkezés', sub:'Jelentkezzen be a tanúsítvány-irányítópultra', labelEmail:'E-mail', labelPassword:'Jelszó', remember:'Emlékezz rám', btnLogin:'Bejelentkezés', back:'← Vissza a főoldalra' },
    el: { title:'Σύνδεση Διαχειριστή', sub:'Συνδεθείτε στον πίνακα πιστοποιητικών', labelEmail:'Email', labelPassword:'Κωδικός πρόσβασης', remember:'Να με θυμάσαι', btnLogin:'Σύνδεση', back:'← Επιστροφή στην αρχική' },
    da: { title:'Admin Login', sub:'Log ind på certifikat-dashboardet', labelEmail:'E-mail', labelPassword:'Adgangskode', remember:'Husk mig', btnLogin:'Log ind', back:'← Tilbage til startsiden' },
    fi: { title:'Järjestelmänvalvojan kirjautuminen', sub:'Kirjaudu todistuspaneeliin', labelEmail:'Sähköposti', labelPassword:'Salasana', remember:'Muista minut', btnLogin:'Kirjaudu sisään', back:'← Takaisin etusivulle' },
    no: { title:'Admin Innlogging', sub:'Logg inn på sertifikat-dashbordet', labelEmail:'E-post', labelPassword:'Passord', remember:'Husk meg', btnLogin:'Logg inn', back:'← Tilbake til forsiden' },
    he: { title:'כניסת מנהל', sub:'התחבר ללוח הבקרה של התעודות', labelEmail:'דוא"ל', labelPassword:'סיסמה', remember:'זכור אותי', btnLogin:'כניסה', back:'→ חזרה לדף הבית' },
};

window.addEventListener('DOMContentLoaded', function() {
    const lang = localStorage.getItem('lang') || 'id';
    const t = translations[lang] || translations['en'];
    document.getElementById('txt-title').textContent = t.title;
    document.getElementById('txt-sub').textContent = t.sub;
    document.getElementById('txt-label-email').textContent = t.labelEmail;
    document.getElementById('txt-label-password').textContent = t.labelPassword;
    document.getElementById('txt-remember').textContent = t.remember;
    document.getElementById('txt-btn-login').textContent = t.btnLogin;
    document.getElementById('txt-back').textContent = t.back;
});

function toggleVis(id, btn) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
    btn.textContent = input.type === 'password' ? '👁' : '🙈';
}
</script>
</body>
</html>
