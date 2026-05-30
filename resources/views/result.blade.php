<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verification Result</title>
<link rel="icon" type="image/png" href="/images/atas.png">
<style>
*{ margin:0; padding:0; box-sizing:border-box; }
body{ font-family:Arial; background:linear-gradient(135deg,#f4f7fb,#dce8f2); min-height:100vh; }
.navbar{ background:white; padding:0 60px; height:70px; display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 10px rgba(0,0,0,0.05); }
.logo{ font-size:24px; font-weight:bold; color:#114b5f; }
.navbar-right{ display:flex; align-items:center; gap:12px; }
.lang-wrapper{ position:relative; }
.lang-btn{ display:flex; align-items:center; gap:8px; height:42px; padding:0 14px; border:1.5px solid #d6d6d6; border-radius:10px; background:white; font-size:14px; cursor:pointer; color:#333; font-family:Arial,sans-serif; transition:border-color 0.2s; white-space:nowrap; }
.lang-btn:hover{ border-color:#114b5f; }
.lang-dropdown{ display:none; position:absolute; top:calc(100% + 8px); right:0; background:white; border:1.5px solid #e0e0e0; border-radius:12px; box-shadow:0 8px 24px rgba(0,0,0,0.1); min-width:180px; z-index:999; overflow-y:auto; max-height:400px; }
.lang-dropdown.open{ display:block; }
.lang-option{ display:flex; align-items:center; gap:10px; padding:10px 16px; font-size:14px; cursor:pointer; color:#333; transition:background 0.15s; }
.lang-option:hover{ background:#f0f4f8; }
.lang-option.active{ background:#eef9f6; color:#114b5f; font-weight:600; }
.container{ width:100%; display:flex; justify-content:center; padding:50px 20px; }
.card{ width:100%; max-width:900px; background:white; padding:40px; border-radius:25px; box-shadow:0 10px 40px rgba(0,0,0,0.08); }
.success{ color:#198754; font-size:34px; margin-bottom:10px; }
.failed{ color:#dc3545; font-size:34px; margin-bottom:10px; }
.desc{ color:#666; margin-bottom:30px; line-height:1.7; }
.info{ background:#f8fafc; padding:20px; border-radius:15px; margin-bottom:25px; }
.info p{ margin-bottom:12px; color:#444; }
.label{ color:#114b5f; font-weight:bold; }
.buttons{ display:flex; gap:15px; margin-top:30px; }
.btn{ flex:1; text-align:center; padding:15px; border-radius:12px; text-decoration:none; color:white; font-weight:bold; }
.back{ background:#6c757d; }
.download{ background:#114b5f; }
.footer{ text-align:center; padding:30px; color:#666; }
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
    </div>
</div>

<div class="container">
<div class="card">

@if($certificate)
    <h1 class="success" id="txt-status">✔ VERIFIED CERTIFICATE</h1>
    <p class="desc" id="txt-desc">This certificate has been successfully verified.</p>
    <div class="info">
        <p><span class="label" id="txt-fullname">Full Name:</span> {{ $certificate->name }}</p>
        <p><span class="label" id="txt-code">Certificate Code:</span> {{ $certificate->certificate_code }}</p>
        <p><span class="label" id="txt-course">Course:</span> {{ $certificate->course }}</p>
        <p><span class="label" id="txt-birth">Birth Date:</span> {{ $certificate->birth_date }}</p>
    </div>
    @if($certificate->certificate_pdf)
        <div class="buttons">
            <a href="{{ asset('storage/'.$certificate->certificate_pdf) }}" target="_blank" class="btn download" id="txt-btn-open">Open PDF</a>
            <a href="/" class="btn back" id="txt-btn-back">Back</a>
        </div>
    @else
        <a href="/" class="btn back" id="txt-btn-back">Back</a>
    @endif
@else
    <h1 class="failed" id="txt-status">✖ CERTIFICATE NOT FOUND</h1>
    <p class="desc" id="txt-desc">Data not found in the system.</p>
    <div class="buttons">
        <a href="/" class="btn back" id="txt-btn-back">Back</a>
    </div>
@endif

</div>
</div>

<div class="footer">© 2026 <strong>Rachel Certificate Verification System</strong></div>

<script>
const isVerified = {{ $certificate ? 'true' : 'false' }};
const translations = {
    id:{ verified:'✔ SERTIFIKAT TERVERIFIKASI', notFound:'✖ SERTIFIKAT TIDAK DITEMUKAN', descVerified:'Sertifikat ini telah berhasil diverifikasi.', descNotFound:'Data tidak ditemukan di sistem.', fullName:'Nama Lengkap:', code:'Kode Sertifikat:', course:'Kursus:', birth:'Tanggal Lahir:', btnOpen:'Buka PDF', btnBack:'Kembali' },
    en:{ verified:'✔ VERIFIED CERTIFICATE', notFound:'✖ CERTIFICATE NOT FOUND', descVerified:'This certificate has been successfully verified.', descNotFound:'Data not found in the system.', fullName:'Full Name:', code:'Certificate Code:', course:'Course:', birth:'Birth Date:', btnOpen:'Open PDF', btnBack:'Back' },
    ko:{ verified:'✔ 자격증 확인됨', notFound:'✖ 자격증을 찾을 수 없음', descVerified:'이 자격증은 성공적으로 확인되었습니다.', descNotFound:'시스템에서 데이터를 찾을 수 없습니다.', fullName:'성명:', code:'자격증 코드:', course:'과정:', birth:'생년월일:', btnOpen:'PDF 열기', btnBack:'뒤로' },
    ja:{ verified:'✔ 証明書が確認されました', notFound:'✖ 証明書が見つかりません', descVerified:'この証明書は正常に確認されました。', descNotFound:'システムにデータが見つかりません。', fullName:'氏名：', code:'証明書コード：', course:'コース：', birth:'生年月日：', btnOpen:'PDFを開く', btnBack:'戻る' },
    it:{ verified:'✔ CERTIFICATO VERIFICATO', notFound:'✖ CERTIFICATO NON TROVATO', descVerified:'Questo certificato è stato verificato con successo.', descNotFound:'Dati non trovati nel sistema.', fullName:'Nome Completo:', code:'Codice Certificato:', course:'Corso:', birth:'Data di Nascita:', btnOpen:'Apri PDF', btnBack:'Indietro' },
    es:{ verified:'✔ CERTIFICADO VERIFICADO', notFound:'✖ CERTIFICADO NO ENCONTRADO', descVerified:'Este certificado ha sido verificado exitosamente.', descNotFound:'Datos no encontrados en el sistema.', fullName:'Nombre Completo:', code:'Código de Certificado:', course:'Curso:', birth:'Fecha de Nacimiento:', btnOpen:'Abrir PDF', btnBack:'Volver' },
    fr:{ verified:'✔ CERTIFICAT VÉRIFIÉ', notFound:'✖ CERTIFICAT NON TROUVÉ', descVerified:'Ce certificat a été vérifié avec succès.', descNotFound:'Données non trouvées dans le système.', fullName:'Nom Complet:', code:'Code du Certificat:', course:'Cours:', birth:'Date de Naissance:', btnOpen:'Ouvrir PDF', btnBack:'Retour' },
    de:{ verified:'✔ ZERTIFIKAT VERIFIZIERT', notFound:'✖ ZERTIFIKAT NICHT GEFUNDEN', descVerified:'Dieses Zertifikat wurde erfolgreich verifiziert.', descNotFound:'Daten nicht im System gefunden.', fullName:'Vollständiger Name:', code:'Zertifikatscode:', course:'Kurs:', birth:'Geburtsdatum:', btnOpen:'PDF öffnen', btnBack:'Zurück' },
    pt:{ verified:'✔ CERTIFICADO VERIFICADO', notFound:'✖ CERTIFICADO NÃO ENCONTRADO', descVerified:'Este certificado foi verificado com sucesso.', descNotFound:'Dados não encontrados no sistema.', fullName:'Nome Completo:', code:'Código do Certificado:', course:'Curso:', birth:'Data de Nascimento:', btnOpen:'Abrir PDF', btnBack:'Voltar' },
    ar:{ verified:'✔ تم التحقق من الشهادة', notFound:'✖ الشهادة غير موجودة', descVerified:'تم التحقق من هذه الشهادة بنجاح.', descNotFound:'لم يتم العثور على البيانات في النظام.', fullName:'الاسم الكامل:', code:'رمز الشهادة:', course:'الدورة:', birth:'تاريخ الميلاد:', btnOpen:'فتح PDF', btnBack:'رجوع' },
    zh:{ verified:'✔ 证书已验证', notFound:'✖ 未找到证书', descVerified:'该证书已成功验证。', descNotFound:'系统中未找到数据。', fullName:'全名：', code:'证书代码：', course:'课程：', birth:'出生日期：', btnOpen:'打开PDF', btnBack:'返回' },
    ru:{ verified:'✔ СЕРТИФИКАТ ПОДТВЕРЖДЁН', notFound:'✖ СЕРТИФИКАТ НЕ НАЙДЕН', descVerified:'Этот сертификат успешно верифицирован.', descNotFound:'Данные не найдены в системе.', fullName:'Полное имя:', code:'Код сертификата:', course:'Курс:', birth:'Дата рождения:', btnOpen:'Открыть PDF', btnBack:'Назад' },
    hi:{ verified:'✔ प्रमाण पत्र सत्यापित', notFound:'✖ प्रमाण पत्र नहीं मिला', descVerified:'यह प्रमाण पत्र सफलतापूर्वक सत्यापित किया गया है।', descNotFound:'सिस्टम में डेटा नहीं मिला।', fullName:'पूरा नाम:', code:'प्रमाण पत्र कोड:', course:'कोर्स:', birth:'जन्म तिथि:', btnOpen:'PDF खोलें', btnBack:'वापस' },
    tr:{ verified:'✔ SERTİFİKA DOĞRULANDI', notFound:'✖ SERTİFİKA BULUNAMADI', descVerified:'Bu sertifika başarıyla doğrulandı.', descNotFound:'Sistemde veri bulunamadı.', fullName:'Tam Ad:', code:'Sertifika Kodu:', course:'Kurs:', birth:'Doğum Tarihi:', btnOpen:'PDF Aç', btnBack:'Geri' },
    nl:{ verified:'✔ CERTIFICAAT GEVERIFIEERD', notFound:'✖ CERTIFICAAT NIET GEVONDEN', descVerified:'Dit certificaat is succesvol geverifieerd.', descNotFound:'Gegevens niet gevonden in het systeem.', fullName:'Volledige naam:', code:'Certificaatcode:', course:'Cursus:', birth:'Geboortedatum:', btnOpen:'PDF openen', btnBack:'Terug' },
    pl:{ verified:'✔ CERTYFIKAT ZWERYFIKOWANY', notFound:'✖ CERTYFIKAT NIE ZNALEZIONY', descVerified:'Ten certyfikat został pomyślnie zweryfikowany.', descNotFound:'Danych nie znaleziono w systemie.', fullName:'Pełne imię:', code:'Kod certyfikatu:', course:'Kurs:', birth:'Data urodzenia:', btnOpen:'Otwórz PDF', btnBack:'Wróć' },
    sv:{ verified:'✔ CERTIFIKAT VERIFIERAT', notFound:'✖ CERTIFIKAT EJ HITTAT', descVerified:'Detta certifikat har verifierats framgångsrikt.', descNotFound:'Data hittades inte i systemet.', fullName:'Fullständigt namn:', code:'Certifikatkod:', course:'Kurs:', birth:'Födelsedatum:', btnOpen:'Öppna PDF', btnBack:'Tillbaka' },
    th:{ verified:'✔ ใบรับรองได้รับการยืนยัน', notFound:'✖ ไม่พบใบรับรอง', descVerified:'ใบรับรองนี้ได้รับการยืนยันเรียบร้อยแล้ว', descNotFound:'ไม่พบข้อมูลในระบบ', fullName:'ชื่อเต็ม:', code:'รหัสใบรับรอง:', course:'หลักสูตร:', birth:'วันเกิด:', btnOpen:'เปิด PDF', btnBack:'กลับ' },
    vi:{ verified:'✔ CHỨNG CHỈ ĐÃ XÁC MINH', notFound:'✖ KHÔNG TÌM THẤY CHỨNG CHỈ', descVerified:'Chứng chỉ này đã được xác minh thành công.', descNotFound:'Không tìm thấy dữ liệu trong hệ thống.', fullName:'Họ và tên:', code:'Mã chứng chỉ:', course:'Khóa học:', birth:'Ngày sinh:', btnOpen:'Mở PDF', btnBack:'Quay lại' },
    ms:{ verified:'✔ SIJIL DISAHKAN', notFound:'✖ SIJIL TIDAK DIJUMPAI', descVerified:'Sijil ini telah berjaya disahkan.', descNotFound:'Data tidak dijumpai dalam sistem.', fullName:'Nama Penuh:', code:'Kod Sijil:', course:'Kursus:', birth:'Tarikh Lahir:', btnOpen:'Buka PDF', btnBack:'Kembali' },
    fa:{ verified:'✔ گواهینامه تأیید شد', notFound:'✖ گواهینامه یافت نشد', descVerified:'این گواهینامه با موفقیت تأیید شد.', descNotFound:'داده‌ای در سیستم یافت نشد.', fullName:'نام کامل:', code:'کد گواهینامه:', course:'دوره:', birth:'تاریخ تولد:', btnOpen:'باز کردن PDF', btnBack:'بازگشت' },
    uk:{ verified:'✔ СЕРТИФІКАТ ПІДТВЕРДЖЕНО', notFound:'✖ СЕРТИФІКАТ НЕ ЗНАЙДЕНО', descVerified:'Цей сертифікат успішно підтверджено.', descNotFound:'Дані не знайдено в системі.', fullName:'Повне ім\'я:', code:'Код сертифіката:', course:'Курс:', birth:'Дата народження:', btnOpen:'Відкрити PDF', btnBack:'Назад' },
    ro:{ verified:'✔ CERTIFICAT VERIFICAT', notFound:'✖ CERTIFICAT NEGĂSIT', descVerified:'Acest certificat a fost verificat cu succes.', descNotFound:'Date negăsite în sistem.', fullName:'Nume complet:', code:'Cod certificat:', course:'Curs:', birth:'Data nașterii:', btnOpen:'Deschide PDF', btnBack:'Înapoi' },
    cs:{ verified:'✔ CERTIFIKÁT OVĚŘEN', notFound:'✖ CERTIFIKÁT NENALEZEN', descVerified:'Tento certifikát byl úspěšně ověřen.', descNotFound:'Data nebyla nalezena v systému.', fullName:'Celé jméno:', code:'Kód certifikátu:', course:'Kurz:', birth:'Datum narození:', btnOpen:'Otevřít PDF', btnBack:'Zpět' },
    hu:{ verified:'✔ TANÚSÍTVÁNY ELLENŐRIZVE', notFound:'✖ TANÚSÍTVÁNY NEM TALÁLHATÓ', descVerified:'Ez a tanúsítvány sikeresen ellenőrizve lett.', descNotFound:'Az adatok nem találhatók a rendszerben.', fullName:'Teljes név:', code:'Tanúsítványkód:', course:'Kurzus:', birth:'Születési dátum:', btnOpen:'PDF megnyitása', btnBack:'Vissza' },
    el:{ verified:'✔ ΠΙΣΤΟΠΟΙΗΤΙΚΟ ΕΠΑΛΗΘΕΥΤΗΚΕ', notFound:'✖ ΔΕΝ ΒΡΕΘΗΚΕ ΠΙΣΤΟΠΟΙΗΤΙΚΟ', descVerified:'Αυτό το πιστοποιητικό επαληθεύτηκε επιτυχώς.', descNotFound:'Τα δεδομένα δεν βρέθηκαν στο σύστημα.', fullName:'Πλήρες Όνομα:', code:'Κωδικός Πιστοποιητικού:', course:'Μάθημα:', birth:'Ημερομηνία Γέννησης:', btnOpen:'Άνοιγμα PDF', btnBack:'Πίσω' },
    da:{ verified:'✔ CERTIFIKAT VERIFICERET', notFound:'✖ CERTIFIKAT IKKE FUNDET', descVerified:'Dette certifikat er verificeret.', descNotFound:'Data ikke fundet i systemet.', fullName:'Fulde navn:', code:'Certifikatkode:', course:'Kursus:', birth:'Fødselsdato:', btnOpen:'Åbn PDF', btnBack:'Tilbage' },
    fi:{ verified:'✔ SERTIFIKAATTI VAHVISTETTU', notFound:'✖ SERTIFIKAATTIA EI LÖYDY', descVerified:'Tämä sertifikaatti on vahvistettu.', descNotFound:'Tietoja ei löydy järjestelmästä.', fullName:'Koko nimi:', code:'Sertifikaattikoodi:', course:'Kurssi:', birth:'Syntymäaika:', btnOpen:'Avaa PDF', btnBack:'Takaisin' },
    no:{ verified:'✔ SERTIFIKAT VERIFISERT', notFound:'✖ SERTIFIKAT IKKE FUNNET', descVerified:'Dette sertifikatet er verifisert.', descNotFound:'Data ikke funnet i systemet.', fullName:'Fullt navn:', code:'Sertifikatkode:', course:'Kurs:', birth:'Fødselsdato:', btnOpen:'Åpne PDF', btnBack:'Tilbake' },
    he:{ verified:'✔ התעודה אומתה', notFound:'✖ התעודה לא נמצאה', descVerified:'תעודה זו אומתה בהצלחה.', descNotFound:'הנתונים לא נמצאו במערכת.', fullName:'שם מלא:', code:'קוד תעודה:', course:'קורס:', birth:'תאריך לידה:', btnOpen:'פתח PDF', btnBack:'חזור' },
};

function toggleLang() {
    document.getElementById('lang-dropdown').classList.toggle('open');
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.lang-wrapper')) {
        document.getElementById('lang-dropdown').classList.remove('open');
    }
});

function applyLang(code) {
    const t = translations[code];
    if (!t) return;
    document.getElementById('txt-status').textContent = isVerified ? t.verified : t.notFound;
    document.getElementById('txt-desc').textContent = isVerified ? t.descVerified : t.descNotFound;
    const elName = document.getElementById('txt-fullname');
    const elCode = document.getElementById('txt-code');
    const elCourse = document.getElementById('txt-course');
    const elBirth = document.getElementById('txt-birth');
    const elOpen = document.getElementById('txt-btn-open');
    const elBack = document.getElementById('txt-btn-back');
    if (elName) elName.textContent = t.fullName;
    if (elCode) elCode.textContent = t.code;
    if (elCourse) elCourse.textContent = t.course;
    if (elBirth) elBirth.textContent = t.birth;
    if (elOpen) elOpen.textContent = t.btnOpen;
    if (elBack) elBack.textContent = t.btnBack;
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
    applyLang(code);
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
    applyLang(savedLang);
});
</script>
</body>
</html>
