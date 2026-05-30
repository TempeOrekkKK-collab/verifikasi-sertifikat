<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Certificate Verification</title>
<link rel="icon" type="image/png" href="/images/atas.png">
<style>
*{ margin:0; padding:0; box-sizing:border-box; }
body{ font-family:Arial,sans-serif; background:linear-gradient(135deg,#eef4ff,#dfefff); min-height:100vh; }

.navbar{
    width:100%; background:white; padding:0 60px; height:70px;
    display:flex; justify-content:space-between; align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.06);
}
.logo{ font-size:28px; font-weight:bold; color:#114b5f; }
.navbar-right{ display:flex; align-items:center; gap:12px; }

.lang-wrapper{ position:relative; }
.lang-btn{
    display:flex; align-items:center; gap:8px; height:42px; padding:0 14px;
    border:1.5px solid #d6d6d6; border-radius:10px; background:white;
    font-size:14px; cursor:pointer; color:#333; font-family:Arial,sans-serif;
    transition:border-color 0.2s; white-space:nowrap;
}
.lang-btn:hover{ border-color:#114b5f; }
.lang-dropdown{
    display:none; position:absolute; top:calc(100% + 8px); right:0;
    background:white; border:1.5px solid #e0e0e0; border-radius:12px;
    box-shadow:0 8px 24px rgba(0,0,0,0.1); min-width:180px; z-index:999;
    overflow-y:auto; max-height:400px;
}
.lang-dropdown.open{ display:block; }
.lang-option{
    display:flex; align-items:center; gap:10px;
    padding:10px 16px; font-size:14px; cursor:pointer; color:#333; transition:background 0.15s;
}
.lang-option:hover{ background:#f0f4f8; }
.lang-option.active{ background:#eef9f6; color:#114b5f; font-weight:600; }

.nav-btn{
    display:flex; align-items:center; height:42px; padding:0 18px;
    background:#114b5f; color:white; text-decoration:none;
    border-radius:10px; font-size:14px; white-space:nowrap;
}

.hero{ width:100%; min-height:90vh; display:flex; justify-content:center; align-items:center; padding:50px; }
.card{ width:100%; max-width:1100px; background:white; border-radius:30px; padding:60px; box-shadow:0 15px 40px rgba(0,0,0,0.08); }
.badge{ display:inline-block; background:#114b5f; color:white; padding:10px 18px; border-radius:30px; margin-bottom:25px; font-size:14px; }
.hero-image{ width:100%; text-align:center; margin-bottom:30px; }
.hero-image img{ width:240px; max-width:100%; }
.card h1{ font-size:52px; color:#114b5f; margin-bottom:20px; text-align:center; }
.desc{ text-align:center; color:#666; line-height:1.8; margin-bottom:35px; font-size:17px; }
label{ display:block; margin-bottom:10px; margin-top:20px; font-weight:bold; color:#114b5f; }
input{ width:100%; padding:17px; border-radius:14px; border:1px solid #d6d6d6; font-size:16px; }
button[type="submit"]{ width:100%; padding:18px; border:none; border-radius:14px; background:#114b5f; color:white; margin-top:30px; font-size:17px; cursor:pointer; }
button[type="submit"]:hover{ opacity:0.92; }
.code-group{ display:flex; align-items:center; gap:15px; }
.code-group input{ flex:1; text-align:center; font-size:22px; font-weight:bold; letter-spacing:2px; }
.dash{ font-size:28px; font-weight:bold; color:#114b5f; }
.info-box{ margin-top:30px; background:#f7fbff; border-left:5px solid #114b5f; padding:20px; border-radius:15px; color:#555; line-height:1.8; }
.footer{ text-align:center; padding:25px; color:#666; }
.highlight{ color:#114b5f; font-weight:bold; }
</style>
</head>
<body>

<div class="navbar">
    <div class="logo">VerifyCert</div>
    <div class="navbar-right">
        <div class="lang-wrapper">
            <button class="lang-btn" onclick="toggleLang()">
                <span id="lang-flag">🇮🇩</span>
                <span id="lang-label">Indonesia</span>
                <span>▾</span>
            </button>
            <div class="lang-dropdown" id="lang-dropdown">
                <div class="lang-option" onclick="setLang('id','🇮🇩','Indonesia',this)">🇮🇩 Indonesia</div>
                <div class="lang-option" onclick="setLang('en','🇺🇸','English',this)">🇺🇸 English</div>
                <div class="lang-option" onclick="setLang('ko','🇰🇷','Korean',this)">🇰🇷 Korean</div>
                <div class="lang-option" onclick="setLang('ja','🇯🇵','Japanese',this)">🇯🇵 Japanese</div>
                <div class="lang-option" onclick="setLang('it','🇮🇹','Italian',this)">🇮🇹 Italian</div>
                <div class="lang-option" onclick="setLang('es','🇪🇸','Spanish',this)">🇪🇸 Spanish</div>
                <div class="lang-option" onclick="setLang('fr','🇫🇷','French',this)">🇫🇷 French</div>
                <div class="lang-option" onclick="setLang('de','🇩🇪','German',this)">🇩🇪 German</div>
                <div class="lang-option" onclick="setLang('pt','🇧🇷','Portuguese',this)">🇧🇷 Portuguese</div>
                <div class="lang-option" onclick="setLang('ar','🇸🇦','Arabic',this)">🇸🇦 Arabic</div>
                <div class="lang-option" onclick="setLang('zh','🇨🇳','Chinese',this)">🇨🇳 Chinese</div>
                <div class="lang-option" onclick="setLang('ru','🇷🇺','Russian',this)">🇷🇺 Russian</div>
                <div class="lang-option" onclick="setLang('hi','🇮🇳','Hindi',this)">🇮🇳 Hindi</div>
                <div class="lang-option" onclick="setLang('tr','🇹🇷','Turkish',this)">🇹🇷 Turkish</div>
                <div class="lang-option" onclick="setLang('nl','🇳🇱','Dutch',this)">🇳🇱 Dutch</div>
                <div class="lang-option" onclick="setLang('pl','🇵🇱','Polish',this)">🇵🇱 Polish</div>
                <div class="lang-option" onclick="setLang('sv','🇸🇪','Swedish',this)">🇸🇪 Swedish</div>
                <div class="lang-option" onclick="setLang('th','🇹🇭','Thai',this)">🇹🇭 Thai</div>
                <div class="lang-option" onclick="setLang('vi','🇻🇳','Vietnamese',this)">🇻🇳 Vietnamese</div>
                <div class="lang-option" onclick="setLang('ms','🇲🇾','Malay',this)">🇲🇾 Malay</div>
                <div class="lang-option" onclick="setLang('fa','🇮🇷','Persian',this)">🇮🇷 Persian</div>
                <div class="lang-option" onclick="setLang('uk','🇺🇦','Ukrainian',this)">🇺🇦 Ukrainian</div>
                <div class="lang-option" onclick="setLang('ro','🇷🇴','Romanian',this)">🇷🇴 Romanian</div>
                <div class="lang-option" onclick="setLang('cs','🇨🇿','Czech',this)">🇨🇿 Czech</div>
                <div class="lang-option" onclick="setLang('hu','🇭🇺','Hungarian',this)">🇭🇺 Hungarian</div>
                <div class="lang-option" onclick="setLang('el','🇬🇷','Greek',this)">🇬🇷 Greek</div>
                <div class="lang-option" onclick="setLang('da','🇩🇰','Danish',this)">🇩🇰 Danish</div>
                <div class="lang-option" onclick="setLang('fi','🇫🇮','Finnish',this)">🇫🇮 Finnish</div>
                <div class="lang-option" onclick="setLang('no','🇳🇴','Norwegian',this)">🇳🇴 Norwegian</div>
                <div class="lang-option" onclick="setLang('he','🇮🇱','Hebrew',this)">🇮🇱 Hebrew</div>
            </div>
        </div>
        <a href="/login" class="nav-btn" id="nav-login-btn">Login Admin</a>
    </div>
</div>

<div class="hero">
<div class="card">
<div class="badge" id="txt-badge">Official Certificate Verification System</div>
<div class="hero-image">
    <img src="/images/logo.png" alt="Logo">
</div>
<h1 id="txt-title">Verify Your Certificate</h1>
<p class="desc" id="txt-desc">Enter your full name and unique certificate code to verify and securely download your official certificate PDF document.</p>

<form action="/verify" method="POST">
@csrf
<label id="txt-label-code">Kode Identifikasi Kredensial</label>
<div class="code-group">
    <input type="text" id="code1" name="code_1" placeholder="" required>
    <span class="dash">-</span>
    <input type="text" id="code2" name="code_2" placeholder="" required>
</div>
<label id="txt-label-name">Identitas Siswa</label>
<input type="text" name="name" id="txt-input-name" placeholder="Masukkan nama lengkap" required>
<label id="txt-label-birth">Tanggal Lahir</label>
<input type="date" name="birth_date" required>
<button type="submit" id="txt-btn-verify">Verifikasi Kredensial</button>
</form>

<div class="info-box" id="txt-infobox">This verification platform helps users validate official certificates securely and download authorized PDF certification documents.</div>
</div>
</div>

<div class="footer">© 2026 <span class="highlight">Rachel Certificate Verification System</span></div>

<script>
const translations = {
    id:{ badge:'Official Certificate Verification System', title:'Verifikasi Sertifikat Anda', desc:'Masukkan nama lengkap dan kode sertifikat unik Anda untuk memverifikasi dan mengunduh dokumen PDF sertifikat resmi Anda.', labelCode:'Kode Identifikasi Kredensial', labelName:'Identitas Siswa', labelBirth:'Tanggal Lahir', inputName:'Masukkan nama lengkap', btnVerify:'Verifikasi Kredensial', infobox:'Platform verifikasi ini membantu pengguna memvalidasi sertifikat resmi secara aman.', loginBtn:'Login Admin' },
    en:{ badge:'Official Certificate Verification System', title:'Verify Your Certificate', desc:'Enter your full name and unique certificate code to verify and securely download your official certificate PDF document.', labelCode:'Credential Identification Code', labelName:'Student Identity', labelBirth:'Date of Birth', inputName:'Enter your full name', btnVerify:'Verify Credentials', infobox:'This verification platform helps users validate official certificates securely and download authorized PDF certification documents.', loginBtn:'Admin Login' },
    ko:{ badge:'공식 자격증 확인 시스템', title:'자격증을 확인하세요', desc:'성명과 고유 자격증 코드를 입력하여 공식 자격증 PDF를 확인하고 다운로드하세요.', labelCode:'자격증 식별 코드', labelName:'학생 신원', labelBirth:'생년월일', inputName:'성명을 입력하세요', btnVerify:'자격증 확인', infobox:'이 플랫폼은 공식 자격증을 안전하게 검증합니다.', loginBtn:'관리자 로그인' },
    ja:{ badge:'公式証明書確認システム', title:'証明書を確認する', desc:'氏名と固有の証明書コードを入力して、公式証明書PDFを確認・ダウンロードしてください。', labelCode:'証明書識別コード', labelName:'学生の身元', labelBirth:'生年月日', inputName:'氏名を入力してください', btnVerify:'証明書を確認する', infobox:'このプラットフォームは公式証明書を安全に検証します。', loginBtn:'管理者ログイン' },
    it:{ badge:'Sistema Ufficiale di Verifica Certificati', title:'Verifica il tuo Certificato', desc:'Inserisci il tuo nome completo e il codice certificato per verificare e scaricare il tuo certificato PDF ufficiale.', labelCode:'Codice Identificazione', labelName:'Identità Studente', labelBirth:'Data di Nascita', inputName:'Inserisci il nome completo', btnVerify:'Verifica Credenziali', infobox:'Questa piattaforma aiuta gli utenti a convalidare i certificati ufficiali in modo sicuro.', loginBtn:'Login Admin' },
    es:{ badge:'Sistema Oficial de Verificación de Certificados', title:'Verifica tu Certificado', desc:'Ingresa tu nombre completo y código de certificado único para verificar y descargar tu documento PDF oficial.', labelCode:'Código de Identificación', labelName:'Identidad del Estudiante', labelBirth:'Fecha de Nacimiento', inputName:'Ingresa tu nombre completo', btnVerify:'Verificar Credenciales', infobox:'Esta plataforma ayuda a los usuarios a validar certificados oficiales de forma segura.', loginBtn:'Login Admin' },
    fr:{ badge:'Système Officiel de Vérification des Certificats', title:'Vérifiez votre Certificat', desc:'Entrez votre nom complet et votre code de certificat unique pour vérifier et télécharger votre document PDF officiel.', labelCode:'Code d\'Identification', labelName:'Identité de l\'Étudiant', labelBirth:'Date de Naissance', inputName:'Entrez votre nom complet', btnVerify:'Vérifier les Identifiants', infobox:'Cette plateforme aide les utilisateurs à valider les certificats officiels en toute sécurité.', loginBtn:'Connexion Admin' },
    de:{ badge:'Offizielles Zertifikat-Verifizierungssystem', title:'Zertifikat verifizieren', desc:'Geben Sie Ihren vollständigen Namen und Ihren eindeutigen Zertifikatscode ein, um Ihr offizielles Zertifikat-PDF zu verifizieren und herunterzuladen.', labelCode:'Identifikationscode', labelName:'Identität des Studenten', labelBirth:'Geburtsdatum', inputName:'Vollständigen Namen eingeben', btnVerify:'Anmeldedaten verifizieren', infobox:'Diese Plattform hilft Benutzern, offizielle Zertifikate sicher zu validieren.', loginBtn:'Admin-Login' },
    pt:{ badge:'Sistema Oficial de Verificação de Certificados', title:'Verifique seu Certificado', desc:'Digite seu nome completo e código de certificado único para verificar e baixar seu documento PDF oficial.', labelCode:'Código de Identificação', labelName:'Identidade do Aluno', labelBirth:'Data de Nascimento', inputName:'Digite seu nome completo', btnVerify:'Verificar Credenciais', infobox:'Esta plataforma ajuda os usuários a validar certificados oficiais com segurança.', loginBtn:'Login Admin' },
    ar:{ badge:'نظام التحقق الرسمي من الشهادات', title:'تحقق من شهادتك', desc:'أدخل اسمك الكامل ورمز الشهادة الفريد للتحقق وتنزيل وثيقة PDF الرسمية.', labelCode:'رمز التعريف', labelName:'هوية الطالب', labelBirth:'تاريخ الميلاد', inputName:'أدخل اسمك الكامل', btnVerify:'التحقق من بيانات الاعتماد', infobox:'تساعد هذه المنصة المستخدمين على التحقق من صحة الشهادات الرسمية بأمان.', loginBtn:'تسجيل دخول المشرف' },
    zh:{ badge:'官方证书验证系统', title:'验证您的证书', desc:'输入您的全名和唯一证书代码，以验证并安全下载您的官方证书PDF文档。', labelCode:'证书识别码', labelName:'学生身份', labelBirth:'出生日期', inputName:'输入您的全名', btnVerify:'验证凭证', infobox:'该平台帮助用户安全验证官方证书。', loginBtn:'管理员登录' },
    ru:{ badge:'Официальная система проверки сертификатов', title:'Проверьте свой сертификат', desc:'Введите ваше полное имя и уникальный код сертификата для проверки и загрузки официального PDF-документа.', labelCode:'Код идентификации', labelName:'Личность студента', labelBirth:'Дата рождения', inputName:'Введите полное имя', btnVerify:'Проверить данные', infobox:'Эта платформа помогает пользователям безопасно проверять официальные сертификаты.', loginBtn:'Вход для администратора' },
    hi:{ badge:'आधिकारिक प्रमाण पत्र सत्यापन प्रणाली', title:'अपना प्रमाण पत्र सत्यापित करें', desc:'अपने आधिकारिक प्रमाण पत्र PDF को सत्यापित करने और डाउनलोड करने के लिए अपना पूरा नाम और अद्वितीय कोड दर्ज करें।', labelCode:'पहचान कोड', labelName:'छात्र पहचान', labelBirth:'जन्म तिथि', inputName:'अपना पूरा नाम दर्ज करें', btnVerify:'प्रमाण पत्र सत्यापित करें', infobox:'यह प्लेटफॉर्म उपयोगकर्ताओं को आधिकारिक प्रमाण पत्र सुरक्षित रूप से सत्यापित करने में मदद करता है।', loginBtn:'एडमिन लॉगिन' },
    tr:{ badge:'Resmi Sertifika Doğrulama Sistemi', title:'Sertifikanızı Doğrulayın', desc:'Resmi sertifika PDF belgenizi doğrulamak ve indirmek için tam adınızı ve benzersiz sertifika kodunuzu girin.', labelCode:'Kimlik Kodu', labelName:'Öğrenci Kimliği', labelBirth:'Doğum Tarihi', inputName:'Tam adınızı girin', btnVerify:'Kimlik Bilgilerini Doğrula', infobox:'Bu platform, kullanıcıların resmi sertifikaları güvenli şekilde doğrulamasına yardımcı olur.', loginBtn:'Admin Girişi' },
    nl:{ badge:'Officieel Certificaat Verificatiesysteem', title:'Verifieer uw Certificaat', desc:'Voer uw volledige naam en unieke certificaatcode in om uw officiële certificaat-PDF te verifiëren en te downloaden.', labelCode:'Identificatiecode', labelName:'Studentidentiteit', labelBirth:'Geboortedatum', inputName:'Voer uw volledige naam in', btnVerify:'Referenties verifiëren', infobox:'Dit platform helpt gebruikers officiële certificaten veilig te valideren.', loginBtn:'Admin Login' },
    pl:{ badge:'Oficjalny System Weryfikacji Certyfikatów', title:'Zweryfikuj swój Certyfikat', desc:'Wprowadź swoje pełne imię i unikalny kod certyfikatu, aby zweryfikować i pobrać oficjalny dokument PDF.', labelCode:'Kod Identyfikacyjny', labelName:'Tożsamość Studenta', labelBirth:'Data Urodzenia', inputName:'Wprowadź pełne imię', btnVerify:'Zweryfikuj dane', infobox:'Ta platforma pomaga użytkownikom bezpiecznie weryfikować oficjalne certyfikaty.', loginBtn:'Logowanie Administratora' },
    sv:{ badge:'Officiellt Certifikatverifieringssystem', title:'Verifiera ditt Certifikat', desc:'Ange ditt fullständiga namn och unika certifikatkod för att verifiera och ladda ner ditt officiella certifikat-PDF.', labelCode:'Identifikationskod', labelName:'Studentidentitet', labelBirth:'Födelsedatum', inputName:'Ange ditt fullständiga namn', btnVerify:'Verifiera uppgifter', infobox:'Denna plattform hjälper användare att säkert validera officiella certifikat.', loginBtn:'Admin Inloggning' },
    th:{ badge:'ระบบตรวจสอบใบรับรองอย่างเป็นทางการ', title:'ตรวจสอบใบรับรองของคุณ', desc:'กรอกชื่อเต็มและรหัสใบรับรองเฉพาะของคุณเพื่อยืนยันและดาวน์โหลดเอกสาร PDF อย่างเป็นทางการ', labelCode:'รหัสการระบุตัวตน', labelName:'ตัวตนของนักเรียน', labelBirth:'วันเกิด', inputName:'กรอกชื่อเต็มของคุณ', btnVerify:'ยืนยันข้อมูล', infobox:'แพลตฟอร์มนี้ช่วยให้ผู้ใช้ตรวจสอบใบรับรองอย่างเป็นทางการได้อย่างปลอดภัย', loginBtn:'เข้าสู่ระบบผู้ดูแล' },
    vi:{ badge:'Hệ thống xác minh chứng chỉ chính thức', title:'Xác minh chứng chỉ của bạn', desc:'Nhập họ tên đầy đủ và mã chứng chỉ duy nhất để xác minh và tải xuống tài liệu PDF chứng chỉ chính thức.', labelCode:'Mã nhận dạng', labelName:'Danh tính học sinh', labelBirth:'Ngày sinh', inputName:'Nhập họ tên đầy đủ', btnVerify:'Xác minh thông tin', infobox:'Nền tảng này giúp người dùng xác minh chứng chỉ chính thức một cách an toàn.', loginBtn:'Đăng nhập Admin' },
    ms:{ badge:'Sistem Pengesahan Sijil Rasmi', title:'Sahkan Sijil Anda', desc:'Masukkan nama penuh dan kod sijil unik anda untuk mengesahkan dan memuat turun dokumen PDF sijil rasmi anda.', labelCode:'Kod Pengenalan', labelName:'Identiti Pelajar', labelBirth:'Tarikh Lahir', inputName:'Masukkan nama penuh anda', btnVerify:'Sahkan Kelayakan', infobox:'Platform ini membantu pengguna mengesahkan sijil rasmi dengan selamat.', loginBtn:'Log Masuk Admin' },
    fa:{ badge:'سیستم تأیید رسمی گواهینامه', title:'گواهینامه خود را تأیید کنید', desc:'نام کامل و کد منحصر به فرد گواهینامه خود را وارد کنید تا گواهینامه PDF رسمی خود را تأیید و دانلود کنید.', labelCode:'کد شناسایی', labelName:'هویت دانش‌آموز', labelBirth:'تاریخ تولد', inputName:'نام کامل خود را وارد کنید', btnVerify:'تأیید مدارک', infobox:'این پلتفرم به کاربران کمک می‌کند تا گواهینامه‌های رسمی را به طور ایمن تأیید کنند.', loginBtn:'ورود مدیر' },
    uk:{ badge:'Офіційна система перевірки сертифікатів', title:'Перевірте свій сертифікат', desc:'Введіть своє повне ім\'я та унікальний код сертифіката для перевірки та завантаження офіційного PDF-документа.', labelCode:'Ідентифікаційний код', labelName:'Особистість студента', labelBirth:'Дата народження', inputName:'Введіть повне ім\'я', btnVerify:'Перевірити дані', infobox:'Ця платформа допомагає користувачам безпечно перевіряти офіційні сертифікати.', loginBtn:'Вхід для адміністратора' },
    ro:{ badge:'Sistem Oficial de Verificare a Certificatelor', title:'Verificați-vă Certificatul', desc:'Introduceți numele complet și codul unic al certificatului pentru a verifica și descărca documentul PDF oficial.', labelCode:'Cod de identificare', labelName:'Identitatea studentului', labelBirth:'Data nașterii', inputName:'Introduceți numele complet', btnVerify:'Verificați datele', infobox:'Această platformă ajută utilizatorii să valideze certificatele oficiale în siguranță.', loginBtn:'Autentificare Admin' },
    cs:{ badge:'Oficiální systém ověřování certifikátů', title:'Ověřte svůj certifikát', desc:'Zadejte své celé jméno a jedinečný kód certifikátu pro ověření a stažení oficiálního dokumentu PDF.', labelCode:'Identifikační kód', labelName:'Identita studenta', labelBirth:'Datum narození', inputName:'Zadejte celé jméno', btnVerify:'Ověřit přihlašovací údaje', infobox:'Tato platforma pomáhá uživatelům bezpečně ověřovat oficiální certifikáty.', loginBtn:'Přihlášení administrátora' },
    hu:{ badge:'Hivatalos tanúsítvány-ellenőrző rendszer', title:'Ellenőrizze tanúsítványát', desc:'Adja meg teljes nevét és egyedi tanúsítványkódját a hivatalos tanúsítvány PDF dokumentum ellenőrzéséhez és letöltéséhez.', labelCode:'Azonosító kód', labelName:'Diák személyazonossága', labelBirth:'Születési dátum', inputName:'Adja meg teljes nevét', btnVerify:'Hitelesítő adatok ellenőrzése', infobox:'Ez a platform segít a felhasználóknak a hivatalos tanúsítványok biztonságos érvényesítésében.', loginBtn:'Adminisztrátori bejelentkezés' },
    el:{ badge:'Επίσημο Σύστημα Επαλήθευσης Πιστοποιητικών', title:'Επαληθεύστε το Πιστοποιητικό σας', desc:'Εισαγάγετε το πλήρες όνομά σας και τον μοναδικό κωδικό πιστοποιητικού για επαλήθευση και λήψη του επίσημου PDF.', labelCode:'Κωδικός Ταυτοποίησης', labelName:'Ταυτότητα Μαθητή', labelBirth:'Ημερομηνία Γέννησης', inputName:'Εισαγάγετε το πλήρες όνομά σας', btnVerify:'Επαλήθευση Στοιχείων', infobox:'Αυτή η πλατφόρμα βοηθά τους χρήστες να επικυρώνουν επίσημα πιστοποιητικά με ασφάλεια.', loginBtn:'Σύνδεση Διαχειριστή' },
    da:{ badge:'Officielt Certifikat Verifikationssystem', title:'Verificer dit Certifikat', desc:'Indtast dit fulde navn og unikke certifikatkode for at verificere og downloade dit officielle certifikat-PDF.', labelCode:'Identifikationskode', labelName:'Studenteridentitet', labelBirth:'Fødselsdato', inputName:'Indtast dit fulde navn', btnVerify:'Verificer oplysninger', infobox:'Denne platform hjælper brugere med sikkert at validere officielle certifikater.', loginBtn:'Admin Login' },
    fi:{ badge:'Virallinen Sertifikaatin Vahvistusjärjestelmä', title:'Vahvista sertifikaattisi', desc:'Syötä koko nimesi ja yksilöllinen sertifikaattikoodi vahvistaaksesi ja ladataksesi virallisen sertifikaatti-PDF-asiakirjan.', labelCode:'Tunnistuskoodi', labelName:'Opiskelijan henkilöllisyys', labelBirth:'Syntymäaika', inputName:'Syötä koko nimesi', btnVerify:'Vahvista tiedot', infobox:'Tämä alusta auttaa käyttäjiä vahvistamaan viralliset sertifikaatit turvallisesti.', loginBtn:'Järjestelmänvalvojan kirjautuminen' },
    no:{ badge:'Offisielt Sertifikat Verifiseringssystem', title:'Verifiser sertifikatet ditt', desc:'Skriv inn ditt fulle navn og unike sertifikatkode for å bekrefte og laste ned ditt offisielle sertifikat-PDF.', labelCode:'Identifikasjonskode', labelName:'Studentidentitet', labelBirth:'Fødselsdato', inputName:'Skriv inn ditt fulle navn', btnVerify:'Verifiser opplysninger', infobox:'Denne plattformen hjelper brukere med å validere offisielle sertifikater på en sikker måte.', loginBtn:'Admin Innlogging' },
    he:{ badge:'מערכת אימות תעודות רשמית', title:'אמת את התעודה שלך', desc:'הזן את שמך המלא וקוד התעודה הייחודי כדי לאמת ולהוריד את מסמך ה-PDF הרשמי שלך.', labelCode:'קוד זיהוי', labelName:'זהות התלמיד', labelBirth:'תאריך לידה', inputName:'הזן את שמך המלא', btnVerify:'אמת פרטים', infobox:'פלטפורמה זו עוזרת למשתמשים לאמת תעודות רשמיות בבטחה.', loginBtn:'כניסת מנהל' },
};

function toggleLang() {
    document.getElementById('lang-dropdown').classList.toggle('open');
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.lang-wrapper')) {
        document.getElementById('lang-dropdown').classList.remove('open');
    }
});

function applyTranslation(code) {
    const t = translations[code];
    if (!t) return;
    document.getElementById('txt-badge').textContent = t.badge;
    document.getElementById('txt-title').textContent = t.title;
    document.getElementById('txt-desc').textContent = t.desc;
    document.getElementById('txt-label-code').textContent = t.labelCode;
    document.getElementById('txt-label-name').textContent = t.labelName;
    document.getElementById('txt-label-birth').textContent = t.labelBirth;
    document.getElementById('txt-input-name').placeholder = t.inputName;
    document.getElementById('txt-btn-verify').textContent = t.btnVerify;
    document.getElementById('txt-infobox').textContent = t.infobox;
    document.getElementById('nav-login-btn').textContent = t.loginBtn;
}

function setLang(code, flag, label, el) {
    localStorage.setItem('lang', code);
    localStorage.setItem('lang-flag', flag);
    localStorage.setItem('lang-label', label);
    document.getElementById('lang-flag').textContent = flag;
    document.getElementById('lang-label').textContent = label;
    document.getElementById('lang-dropdown').classList.remove('open');
    document.querySelectorAll('.lang-option').forEach(o => o.classList.remove('active'));
    el.classList.add('active');
    applyTranslation(code);
}

window.addEventListener('DOMContentLoaded', function() {
    const savedLang = localStorage.getItem('lang') || 'id';
    const savedFlag = localStorage.getItem('lang-flag') || '🇮🇩';
    const savedLabel = localStorage.getItem('lang-label') || 'Indonesia';
    document.getElementById('lang-flag').textContent = savedFlag;
    document.getElementById('lang-label').textContent = savedLabel;
    document.querySelectorAll('.lang-option').forEach(o => {
        o.classList.remove('active');
        if (o.textContent.trim().includes(savedLabel)) o.classList.add('active');
    });
    applyTranslation(savedLang);
});
</script>
</body>
</html>
