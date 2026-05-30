<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="/images/atas.png">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0e1a; --surface: #111827; --surface2: #1a2235;
            --accent: #00d4aa; --accent2: #3b82f6; --danger: #ff4d6d;
            --text: #e2e8f0; --muted: #64748b; --border: rgba(255,255,255,0.06);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }

        .navbar {
            position: sticky; top: 0; z-index: 100;
            background: rgba(10,14,26,0.85); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 32px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .navbar-logo {
            font-family: 'Syne', sans-serif; font-weight: 800; font-size: 18px;
            letter-spacing: -0.5px; display: flex; align-items: center; gap: 10px;
        }
        .navbar-logo .dot {
            width: 8px; height: 8px; background: var(--accent);
            border-radius: 50%; box-shadow: 0 0 10px var(--accent); animation: pulse 2s infinite;
        }
        @keyframes pulse { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.6; transform: scale(1.3); } }
        .navbar-right { display: flex; align-items: center; gap: 12px; }
        .navbar-user { font-size: 13px; color: var(--muted); }
        .navbar-user span { color: var(--text); font-weight: 500; }
        .btn-nav {
            font-size: 13px; font-weight: 600; color: var(--muted);
            text-decoration: none; border: 1px solid rgba(255,255,255,0.1);
            padding: 7px 16px; border-radius: 8px; transition: all 0.2s;
        }
        .btn-nav:hover { color: var(--text); border-color: rgba(255,255,255,0.2); }
        .btn-logout {
            background: rgba(255,77,109,0.12); color: var(--danger);
            border: 1px solid rgba(255,77,109,0.25); padding: 7px 16px;
            border-radius: 8px; font-size: 13px; font-weight: 500;
            cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.2s;
        }
        .btn-logout:hover { background: rgba(255,77,109,0.2); }

        .main { max-width: 1200px; margin: 0 auto; padding: 40px 32px; }

        .stats-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 32px; }
        .stat-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: 16px; padding: 32px 28px; position: relative;
            overflow: hidden; min-height: 140px;
            display: flex; flex-direction: column; justify-content: space-between;
        }
        .stat-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 3px; background: linear-gradient(90deg, var(--accent), var(--accent2));
        }
        .stat-label { font-size: 11px; color: var(--muted); text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600; margin-bottom: 16px; }
        .stat-value { font-family: 'Syne', sans-serif; font-size: 56px; font-weight: 800; color: var(--accent); line-height: 1; }
        .stat-value.stat-text { font-size: 22px; font-weight: 700; color: var(--accent2); line-height: 1.3; }
        .stat-value.stat-online {
            font-size: 16px; font-weight: 600; color: var(--accent); display: flex; align-items: center; gap: 8px;
        }
        .stat-value.stat-online::before {
            content: ''; width: 10px; height: 10px; background: var(--accent);
            border-radius: 50%; box-shadow: 0 0 10px var(--accent); animation: pulse 2s infinite;
        }

        .section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
        .section-title { font-family: 'Syne', sans-serif; font-size: 18px; font-weight: 700; display: flex; align-items: center; gap: 10px; }
        .section-title .badge {
            background: rgba(0,212,170,0.12); color: var(--accent);
            border: 1px solid rgba(0,212,170,0.2);
            font-size: 11px; padding: 2px 8px; border-radius: 20px;
            font-family: 'DM Sans', sans-serif; font-weight: 500;
        }

        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 20px; padding: 28px; margin-bottom: 24px; }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 12px; color: var(--muted); text-transform: uppercase; letter-spacing: 0.8px; font-weight: 500; }
        .form-group input {
            background: var(--surface2); border: 1px solid var(--border);
            border-radius: 10px; padding: 11px 14px; color: var(--text);
            font-size: 14px; font-family: 'DM Sans', sans-serif; transition: all 0.2s; outline: none; width: 100%;
        }
        .form-group input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(0,212,170,0.1); }
        .form-group input::placeholder { color: var(--muted); }
        .form-group input[type="date"]::-webkit-calendar-picker-indicator { filter: invert(0.5); cursor: pointer; }
        .form-full { grid-column: 1 / -1; }

        .file-input-wrapper { position: relative; }
        .file-input-wrapper input[type="file"] { opacity: 0; position: absolute; inset: 0; cursor: pointer; width: 100%; }
        .file-label {
            background: var(--surface2); border: 1px dashed rgba(0,212,170,0.3);
            border-radius: 10px; padding: 11px 14px; font-size: 14px; color: var(--muted);
            display: flex; align-items: center; gap: 8px; transition: all 0.2s; cursor: pointer;
        }
        .file-label:hover { border-color: var(--accent); color: var(--accent); }

        .btn-submit {
            background: linear-gradient(135deg, var(--accent), #00b894);
            color: #0a0e1a; border: none; padding: 12px 28px; border-radius: 10px;
            font-size: 14px; font-weight: 700; font-family: 'Syne', sans-serif;
            cursor: pointer; transition: all 0.2s; letter-spacing: 0.3px;
        }
        .btn-submit:hover { transform: translateY(-1px); box-shadow: 0 8px 25px rgba(0,212,170,0.3); }

        .alert { border-radius: 10px; padding: 12px 16px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 10px; }
        .alert-success { background: rgba(0,212,170,0.1); border: 1px solid rgba(0,212,170,0.2); color: var(--accent); }
        .alert-error { background: rgba(255,77,109,0.1); border: 1px solid rgba(255,77,109,0.2); color: var(--danger); }

        .table-wrapper { overflow-x: auto; border-radius: 12px; border: 1px solid var(--border); }
        table { width: 100%; border-collapse: collapse; }
        thead { background: var(--surface2); }
        th { padding: 13px 16px; text-align: left; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); font-weight: 600; white-space: nowrap; }
        td { padding: 14px 16px; font-size: 14px; border-top: 1px solid var(--border); }
        tr:hover td { background: rgba(255,255,255,0.02); }

        .code-badge {
            font-family: 'Syne', monospace; font-size: 12px; font-weight: 700;
            background: rgba(59,130,246,0.12); color: var(--accent2);
            border: 1px solid rgba(59,130,246,0.2);
            padding: 4px 10px; border-radius: 6px; letter-spacing: 0.5px; white-space: nowrap;
        }
        .pdf-link { color: var(--accent); text-decoration: none; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 5px; transition: opacity 0.2s; }
        .pdf-link:hover { opacity: 0.7; }
        .btn-delete {
            background: rgba(255,77,109,0.1); color: var(--danger);
            border: 1px solid rgba(255,77,109,0.2); padding: 6px 12px;
            border-radius: 7px; font-size: 12px; font-weight: 600;
            cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.2s;
        }
        .btn-delete:hover { background: rgba(255,77,109,0.2); border-color: rgba(255,77,109,0.4); }
        .empty-state { text-align: center; padding: 48px; color: var(--muted); }
        .empty-state .icon { font-size: 36px; margin-bottom: 10px; }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="navbar-logo">
        <div class="dot"></div>
        CertAdmin
    </div>
    <div class="navbar-right">
        <a href="{{ route('home') }}" class="btn-nav" id="txt-btn-home">← Halaman Utama</a>
        <a href="{{ route('admin.list') }}" class="btn-nav" id="txt-btn-manage">⚙ Kelola Admin</a>
        <div class="navbar-user" id="txt-login-as">Login sebagai <span>{{ Auth::user()->name }}</span></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout" id="txt-btn-logout">Logout</button>
        </form>
    </div>
</nav>

<div class="main">

    @if(session('success'))
        <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-error">✕ {{ $errors->first() }}</div>
    @endif

    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label" id="txt-stat-total">Total Sertifikat</div>
            <div class="stat-value">{{ $certificates->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label" id="txt-stat-last">Terakhir Ditambah</div>
            <div class="stat-value stat-text">{{ $certificates->first()?->created_at?->format('d M Y') ?? '—' }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label" id="txt-stat-status">Status Sistem</div>
            <div class="stat-value stat-online" id="txt-stat-online">Online</div>
        </div>
    </div>

    <div class="card">
        <div class="section-header">
            <div class="section-title" id="txt-add-title">Tambah Sertifikat <span class="badge">New</span></div>
        </div>
        <form method="POST" action="{{ route('certificates.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label id="txt-label-code">Kode Sertifikat</label>
                    <div style="display:flex; align-items:center; gap:8px;">
                        <input type="text" name="certificate_code_1" placeholder="AbCD"
                            value="{{ old('certificate_code_1') }}"
                            style="letter-spacing:2px; text-align:center;" maxlength="10" required>
                        <span style="color:var(--muted); font-size:20px; font-weight:700; flex-shrink:0;">—</span>
                        <input type="text" name="certificate_code_2" placeholder="EfGHiJ"
                            value="{{ old('certificate_code_2') }}"
                            style="letter-spacing:2px; text-align:center;" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label id="txt-label-name">Nama Peserta</label>
                    <input type="text" name="name" id="txt-input-name" placeholder="Nama lengkap" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label id="txt-label-birth">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" required>
                </div>
                <div class="form-group">
                    <label id="txt-label-course">Nama Course</label>
                    <input type="text" name="course" id="txt-input-course" placeholder="Nama kursus" value="{{ old('course') }}" required>
                </div>
                <div class="form-group form-full">
                    <label id="txt-label-pdf">File PDF Sertifikat</label>
                    <div class="file-input-wrapper">
                        <div class="file-label">
                            <span>📎</span>
                            <span id="file-name">Pilih file PDF (maks. 5MB)</span>
                        </div>
                        <input type="file" name="certificate_pdf" accept=".pdf" required
                            onchange="document.getElementById('file-name').textContent = this.files[0]?.name || document.getElementById('file-name').dataset.placeholder">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-submit" id="txt-btn-add">+ Tambah Sertifikat</button>
        </form>
    </div>

    <div class="card">
        <div class="section-header">
            <div class="section-title" id="txt-table-title">Data Sertifikat <span class="badge">{{ $certificates->count() }} data</span></div>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th id="txt-th-code">Kode</th>
                        <th id="txt-th-name">Nama</th>
                        <th id="txt-th-birth">Tanggal Lahir</th>
                        <th id="txt-th-course">Course</th>
                        <th id="txt-th-file">File</th>
                        <th id="txt-th-action">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($certificates as $cert)
                        <tr>
                            <td><span class="code-badge">{{ $cert->certificate_code }}</span></td>
                            <td>{{ $cert->name }}</td>
                            <td style="color: var(--muted);">{{ \Carbon\Carbon::parse($cert->birth_date)->format('d M Y') }}</td>
                            <td>{{ $cert->course }}</td>
                            <td><a href="{{ asset('storage/'.$cert->certificate_pdf) }}" target="_blank" class="pdf-link">📄 <span class="txt-view-pdf">Lihat PDF</span></a></td>
                            <td>
                                <form method="POST" action="{{ route('certificates.delete', $cert->id) }}"
                                    onsubmit="return confirm(window._confirmDelete || 'Hapus sertifikat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete txt-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="icon">📭</div>
                                    <p id="txt-empty">Belum ada data sertifikat.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
const translations = {
    id: { btnHome:'← Halaman Utama', btnManage:'⚙ Kelola Admin', loginAs:'Login sebagai', btnLogout:'Logout', statTotal:'Total Sertifikat', statLast:'Terakhir Ditambah', statStatus:'Status Sistem', statOnline:'Online', addTitle:'Tambah Sertifikat', labelCode:'Kode Sertifikat', labelName:'Nama Peserta', inputName:'Nama lengkap', labelBirth:'Tanggal Lahir', labelCourse:'Nama Course', inputCourse:'Nama kursus', labelPdf:'File PDF Sertifikat', filePlaceholder:'Pilih file PDF (maks. 5MB)', btnAdd:'+ Tambah Sertifikat', tableTitle:'Data Sertifikat', thCode:'Kode', thName:'Nama', thBirth:'Tanggal Lahir', thCourse:'Course', thFile:'File', thAction:'Aksi', viewPdf:'Lihat PDF', deleteTxt:'Hapus', confirmDelete:'Hapus sertifikat ini?', empty:'Belum ada data sertifikat.' },
    en: { btnHome:'← Home', btnManage:'⚙ Manage Admins', loginAs:'Logged in as', btnLogout:'Logout', statTotal:'Total Certificates', statLast:'Last Added', statStatus:'System Status', statOnline:'Online', addTitle:'Add Certificate', labelCode:'Certificate Code', labelName:'Participant Name', inputName:'Full name', labelBirth:'Date of Birth', labelCourse:'Course Name', inputCourse:'Course name', labelPdf:'Certificate PDF File', filePlaceholder:'Choose PDF file (max. 5MB)', btnAdd:'+ Add Certificate', tableTitle:'Certificate Data', thCode:'Code', thName:'Name', thBirth:'Date of Birth', thCourse:'Course', thFile:'File', thAction:'Action', viewPdf:'View PDF', deleteTxt:'Delete', confirmDelete:'Delete this certificate?', empty:'No certificate data yet.' },
    ko: { btnHome:'← 홈으로', btnManage:'⚙ 관리자 관리', loginAs:'로그인: ', btnLogout:'로그아웃', statTotal:'총 인증서', statLast:'마지막 추가', statStatus:'시스템 상태', statOnline:'온라인', addTitle:'인증서 추가', labelCode:'인증서 코드', labelName:'참가자 이름', inputName:'전체 이름', labelBirth:'생년월일', labelCourse:'과정 이름', inputCourse:'과정 이름', labelPdf:'인증서 PDF 파일', filePlaceholder:'PDF 파일 선택 (최대 5MB)', btnAdd:'+ 인증서 추가', tableTitle:'인증서 데이터', thCode:'코드', thName:'이름', thBirth:'생년월일', thCourse:'과정', thFile:'파일', thAction:'작업', viewPdf:'PDF 보기', deleteTxt:'삭제', confirmDelete:'이 인증서를 삭제하시겠습니까?', empty:'인증서 데이터가 없습니다.' },
    ja: { btnHome:'← ホームへ', btnManage:'⚙ 管理者管理', loginAs:'ログイン中: ', btnLogout:'ログアウト', statTotal:'証明書合計', statLast:'最後に追加', statStatus:'システム状態', statOnline:'オンライン', addTitle:'証明書を追加', labelCode:'証明書コード', labelName:'参加者名', inputName:'氏名', labelBirth:'生年月日', labelCourse:'コース名', inputCourse:'コース名', labelPdf:'証明書PDFファイル', filePlaceholder:'PDFファイルを選択（最大5MB）', btnAdd:'+ 証明書を追加', tableTitle:'証明書データ', thCode:'コード', thName:'名前', thBirth:'生年月日', thCourse:'コース', thFile:'ファイル', thAction:'操作', viewPdf:'PDFを見る', deleteTxt:'削除', confirmDelete:'この証明書を削除しますか？', empty:'証明書データがありません。' },
    it: { btnHome:'← Home', btnManage:'⚙ Gestione Admin', loginAs:'Accesso come', btnLogout:'Esci', statTotal:'Totale Certificati', statLast:'Ultimo Aggiunto', statStatus:'Stato Sistema', statOnline:'Online', addTitle:'Aggiungi Certificato', labelCode:'Codice Certificato', labelName:'Nome Partecipante', inputName:'Nome completo', labelBirth:'Data di Nascita', labelCourse:'Nome Corso', inputCourse:'Nome corso', labelPdf:'File PDF Certificato', filePlaceholder:'Scegli file PDF (max. 5MB)', btnAdd:'+ Aggiungi Certificato', tableTitle:'Dati Certificato', thCode:'Codice', thName:'Nome', thBirth:'Data di Nascita', thCourse:'Corso', thFile:'File', thAction:'Azione', viewPdf:'Vedi PDF', deleteTxt:'Elimina', confirmDelete:'Eliminare questo certificato?', empty:'Nessun dato certificato.' },
    es: { btnHome:'← Inicio', btnManage:'⚙ Gestionar Admins', loginAs:'Sesión como', btnLogout:'Cerrar sesión', statTotal:'Total Certificados', statLast:'Último Agregado', statStatus:'Estado del Sistema', statOnline:'En línea', addTitle:'Agregar Certificado', labelCode:'Código de Certificado', labelName:'Nombre del Participante', inputName:'Nombre completo', labelBirth:'Fecha de Nacimiento', labelCourse:'Nombre del Curso', inputCourse:'Nombre del curso', labelPdf:'Archivo PDF del Certificado', filePlaceholder:'Elegir archivo PDF (máx. 5MB)', btnAdd:'+ Agregar Certificado', tableTitle:'Datos de Certificado', thCode:'Código', thName:'Nombre', thBirth:'Fecha de Nacimiento', thCourse:'Curso', thFile:'Archivo', thAction:'Acción', viewPdf:'Ver PDF', deleteTxt:'Eliminar', confirmDelete:'¿Eliminar este certificado?', empty:'Aún no hay datos de certificado.' },
    fr: { btnHome:'← Accueil', btnManage:'⚙ Gérer les Admins', loginAs:'Connecté en tant que', btnLogout:'Déconnexion', statTotal:'Total Certificats', statLast:'Dernier Ajouté', statStatus:'Statut Système', statOnline:'En ligne', addTitle:'Ajouter un Certificat', labelCode:'Code du Certificat', labelName:'Nom du Participant', inputName:'Nom complet', labelBirth:'Date de Naissance', labelCourse:'Nom du Cours', inputCourse:'Nom du cours', labelPdf:'Fichier PDF du Certificat', filePlaceholder:'Choisir un fichier PDF (max. 5MB)', btnAdd:'+ Ajouter Certificat', tableTitle:'Données des Certificats', thCode:'Code', thName:'Nom', thBirth:'Date de Naissance', thCourse:'Cours', thFile:'Fichier', thAction:'Action', viewPdf:'Voir PDF', deleteTxt:'Supprimer', confirmDelete:'Supprimer ce certificat ?', empty:'Aucune donnée de certificat.' },
    de: { btnHome:'← Startseite', btnManage:'⚙ Admins verwalten', loginAs:'Angemeldet als', btnLogout:'Abmelden', statTotal:'Zertifikate gesamt', statLast:'Zuletzt hinzugefügt', statStatus:'Systemstatus', statOnline:'Online', addTitle:'Zertifikat hinzufügen', labelCode:'Zertifikatscode', labelName:'Teilnehmername', inputName:'Vollständiger Name', labelBirth:'Geburtsdatum', labelCourse:'Kursname', inputCourse:'Kursname', labelPdf:'Zertifikat-PDF-Datei', filePlaceholder:'PDF-Datei auswählen (max. 5MB)', btnAdd:'+ Zertifikat hinzufügen', tableTitle:'Zertifikatsdaten', thCode:'Code', thName:'Name', thBirth:'Geburtsdatum', thCourse:'Kurs', thFile:'Datei', thAction:'Aktion', viewPdf:'PDF ansehen', deleteTxt:'Löschen', confirmDelete:'Dieses Zertifikat löschen?', empty:'Keine Zertifikatsdaten vorhanden.' },
    pt: { btnHome:'← Início', btnManage:'⚙ Gerenciar Admins', loginAs:'Logado como', btnLogout:'Sair', statTotal:'Total de Certificados', statLast:'Último Adicionado', statStatus:'Status do Sistema', statOnline:'Online', addTitle:'Adicionar Certificado', labelCode:'Código do Certificado', labelName:'Nome do Participante', inputName:'Nome completo', labelBirth:'Data de Nascimento', labelCourse:'Nome do Curso', inputCourse:'Nome do curso', labelPdf:'Arquivo PDF do Certificado', filePlaceholder:'Escolher arquivo PDF (máx. 5MB)', btnAdd:'+ Adicionar Certificado', tableTitle:'Dados do Certificado', thCode:'Código', thName:'Nome', thBirth:'Data de Nascimento', thCourse:'Curso', thFile:'Arquivo', thAction:'Ação', viewPdf:'Ver PDF', deleteTxt:'Excluir', confirmDelete:'Excluir este certificado?', empty:'Nenhum dado de certificado ainda.' },
    ar: { btnHome:'الرئيسية →', btnManage:'⚙ إدارة المشرفين', loginAs:'مسجل دخول كـ', btnLogout:'تسجيل الخروج', statTotal:'إجمالي الشهادات', statLast:'آخر إضافة', statStatus:'حالة النظام', statOnline:'متصل', addTitle:'إضافة شهادة', labelCode:'رمز الشهادة', labelName:'اسم المشارك', inputName:'الاسم الكامل', labelBirth:'تاريخ الميلاد', labelCourse:'اسم الدورة', inputCourse:'اسم الدورة', labelPdf:'ملف PDF للشهادة', filePlaceholder:'اختر ملف PDF (بحد أقصى 5MB)', btnAdd:'+ إضافة شهادة', tableTitle:'بيانات الشهادة', thCode:'الرمز', thName:'الاسم', thBirth:'تاريخ الميلاد', thCourse:'الدورة', thFile:'الملف', thAction:'الإجراء', viewPdf:'عرض PDF', deleteTxt:'حذف', confirmDelete:'هل تريد حذف هذه الشهادة؟', empty:'لا توجد بيانات شهادة بعد.' },
    zh: { btnHome:'← 首页', btnManage:'⚙ 管理员管理', loginAs:'登录为', btnLogout:'退出', statTotal:'证书总数', statLast:'最后添加', statStatus:'系统状态', statOnline:'在线', addTitle:'添加证书', labelCode:'证书代码', labelName:'参与者姓名', inputName:'全名', labelBirth:'出生日期', labelCourse:'课程名称', inputCourse:'课程名称', labelPdf:'证书PDF文件', filePlaceholder:'选择PDF文件（最大5MB）', btnAdd:'+ 添加证书', tableTitle:'证书数据', thCode:'代码', thName:'姓名', thBirth:'出生日期', thCourse:'课程', thFile:'文件', thAction:'操作', viewPdf:'查看PDF', deleteTxt:'删除', confirmDelete:'删除此证书？', empty:'暂无证书数据。' },
    ru: { btnHome:'← Главная', btnManage:'⚙ Управление администраторами', loginAs:'Вход как', btnLogout:'Выйти', statTotal:'Всего сертификатов', statLast:'Последнее добавление', statStatus:'Статус системы', statOnline:'Онлайн', addTitle:'Добавить сертификат', labelCode:'Код сертификата', labelName:'Имя участника', inputName:'Полное имя', labelBirth:'Дата рождения', labelCourse:'Название курса', inputCourse:'Название курса', labelPdf:'PDF-файл сертификата', filePlaceholder:'Выберите PDF-файл (макс. 5МБ)', btnAdd:'+ Добавить сертификат', tableTitle:'Данные сертификатов', thCode:'Код', thName:'Имя', thBirth:'Дата рождения', thCourse:'Курс', thFile:'Файл', thAction:'Действие', viewPdf:'Посмотреть PDF', deleteTxt:'Удалить', confirmDelete:'Удалить этот сертификат?', empty:'Нет данных о сертификатах.' },
    hi: { btnHome:'← मुख्य पृष्ठ', btnManage:'⚙ एडमिन प्रबंधन', loginAs:'लॉगिन: ', btnLogout:'लॉग आउट', statTotal:'कुल सर्टिफिकेट', statLast:'अंतिम जोड़ा गया', statStatus:'सिस्टम स्थिति', statOnline:'ऑनलाइन', addTitle:'सर्टिफिकेट जोड़ें', labelCode:'सर्टिफिकेट कोड', labelName:'प्रतिभागी का नाम', inputName:'पूरा नाम', labelBirth:'जन्म तिथि', labelCourse:'कोर्स का नाम', inputCourse:'कोर्स का नाम', labelPdf:'सर्टिफिकेट PDF फ़ाइल', filePlaceholder:'PDF फ़ाइल चुनें (अधिकतम 5MB)', btnAdd:'+ सर्टिफिकेट जोड़ें', tableTitle:'सर्टिफिकेट डेटा', thCode:'कोड', thName:'नाम', thBirth:'जन्म तिथि', thCourse:'कोर्स', thFile:'फ़ाइल', thAction:'क्रिया', viewPdf:'PDF देखें', deleteTxt:'हटाएं', confirmDelete:'इस सर्टिफिकेट को हटाएं?', empty:'अभी तक कोई सर्टिफिकेट डेटा नहीं।' },
    tr: { btnHome:'← Ana Sayfa', btnManage:'⚙ Admin Yönetimi', loginAs:'Giriş yapıldı: ', btnLogout:'Çıkış Yap', statTotal:'Toplam Sertifika', statLast:'Son Eklenen', statStatus:'Sistem Durumu', statOnline:'Çevrimiçi', addTitle:'Sertifika Ekle', labelCode:'Sertifika Kodu', labelName:'Katılımcı Adı', inputName:'Tam adı', labelBirth:'Doğum Tarihi', labelCourse:'Kurs Adı', inputCourse:'Kurs adı', labelPdf:'Sertifika PDF Dosyası', filePlaceholder:'PDF dosyası seçin (maks. 5MB)', btnAdd:'+ Sertifika Ekle', tableTitle:'Sertifika Verileri', thCode:'Kod', thName:'Ad', thBirth:'Doğum Tarihi', thCourse:'Kurs', thFile:'Dosya', thAction:'İşlem', viewPdf:'PDF Görüntüle', deleteTxt:'Sil', confirmDelete:'Bu sertifikayı silmek istiyor musunuz?', empty:'Henüz sertifika verisi yok.' },
    ms: { btnHome:'← Halaman Utama', btnManage:'⚙ Urus Admin', loginAs:'Log masuk sebagai', btnLogout:'Log Keluar', statTotal:'Jumlah Sijil', statLast:'Terakhir Ditambah', statStatus:'Status Sistem', statOnline:'Dalam Talian', addTitle:'Tambah Sijil', labelCode:'Kod Sijil', labelName:'Nama Peserta', inputName:'Nama penuh', labelBirth:'Tarikh Lahir', labelCourse:'Nama Kursus', inputCourse:'Nama kursus', labelPdf:'Fail PDF Sijil', filePlaceholder:'Pilih fail PDF (maks. 5MB)', btnAdd:'+ Tambah Sijil', tableTitle:'Data Sijil', thCode:'Kod', thName:'Nama', thBirth:'Tarikh Lahir', thCourse:'Kursus', thFile:'Fail', thAction:'Tindakan', viewPdf:'Lihat PDF', deleteTxt:'Padam', confirmDelete:'Padam sijil ini?', empty:'Tiada data sijil lagi.' },
};
const fallback = 'en';
function getLang(code) { return translations[code] || translations[fallback]; }

function applyTranslation(code) {
    const t = getLang(code);
    document.getElementById('txt-btn-home').textContent = t.btnHome;
    document.getElementById('txt-btn-manage').textContent = t.btnManage;
    document.getElementById('txt-btn-logout').textContent = t.btnLogout;
    document.getElementById('txt-stat-total').textContent = t.statTotal;
    document.getElementById('txt-stat-last').textContent = t.statLast;
    document.getElementById('txt-stat-status').textContent = t.statStatus;
    document.getElementById('txt-stat-online').textContent = t.statOnline;
    document.getElementById('txt-label-code').textContent = t.labelCode;
    document.getElementById('txt-label-name').textContent = t.labelName;
    document.getElementById('txt-input-name').placeholder = t.inputName;
    document.getElementById('txt-label-birth').textContent = t.labelBirth;
    document.getElementById('txt-label-course').textContent = t.labelCourse;
    document.getElementById('txt-input-course').placeholder = t.inputCourse;
    document.getElementById('txt-label-pdf').textContent = t.labelPdf;
    const fn = document.getElementById('file-name');
    fn.dataset.placeholder = t.filePlaceholder;
    if (!fn.dataset.hasFile) fn.textContent = t.filePlaceholder;
    document.getElementById('txt-btn-add').textContent = t.btnAdd;
    document.getElementById('txt-th-code').textContent = t.thCode;
    document.getElementById('txt-th-name').textContent = t.thName;
    document.getElementById('txt-th-birth').textContent = t.thBirth;
    document.getElementById('txt-th-course').textContent = t.thCourse;
    document.getElementById('txt-th-file').textContent = t.thFile;
    document.getElementById('txt-th-action').textContent = t.thAction;
    document.querySelectorAll('.txt-view-pdf').forEach(el => el.textContent = t.viewPdf);
    document.querySelectorAll('.txt-delete').forEach(el => el.textContent = t.deleteTxt);
    window._confirmDelete = t.confirmDelete;
    const empty = document.getElementById('txt-empty');
    if (empty) empty.textContent = t.empty;
    const loginAsEl = document.getElementById('txt-login-as');
    if (loginAsEl) {
        const nameSpan = loginAsEl.querySelector('span');
        const name = nameSpan ? nameSpan.textContent : '';
        loginAsEl.textContent = t.loginAs + ' ';
        const newSpan = document.createElement('span');
        newSpan.textContent = name;
        loginAsEl.appendChild(newSpan);
    }
    const addTitle = document.getElementById('txt-add-title');
    if (addTitle) {
        const badge = addTitle.querySelector('.badge');
        addTitle.textContent = t.addTitle + ' ';
        if (badge) addTitle.appendChild(badge);
    }
    const tableTitle = document.getElementById('txt-table-title');
    if (tableTitle) {
        const badge = tableTitle.querySelector('.badge');
        const badgeText = badge ? badge.textContent : '';
        tableTitle.textContent = t.tableTitle + ' ';
        if (badge) { badge.textContent = badgeText; tableTitle.appendChild(badge); }
    }
}

window.addEventListener('DOMContentLoaded', function() {
    const savedLang = localStorage.getItem('lang') || 'id';
    applyTranslation(savedLang);
    const fileInput = document.querySelector('input[type="file"]');
    if (fileInput) fileInput.addEventListener('change', function() {
        const fn = document.getElementById('file-name');
        fn.dataset.hasFile = this.files[0] ? '1' : '';
        fn.textContent = this.files[0]?.name || fn.dataset.placeholder;
    });
});
</script>
</body>
</html>
