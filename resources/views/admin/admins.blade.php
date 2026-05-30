<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Admin</title>
    <link rel="icon" type="image/png" href="/images/atas.png">
    <style>
        :root { --bg:#0a0e1a; --surface:#111827; --surface2:#1a2235; --accent:#00d4aa; --accent2:#3b82f6; --danger:#ff4d6d; --text:#e2e8f0; --muted:#64748b; --border:rgba(255,255,255,0.06); }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'DM Sans',sans-serif; background:var(--bg); color:var(--text); min-height:100vh; }
        .navbar { position:sticky; top:0; z-index:100; background:rgba(10,14,26,0.85); backdrop-filter:blur(20px); border-bottom:1px solid var(--border); padding:0 32px; height:64px; display:flex; align-items:center; justify-content:space-between; }
        .navbar-logo { font-weight:800; font-size:18px; }
        .navbar-right { display:flex; align-items:center; gap:16px; }
        .btn-back { font-size:13px; font-weight:600; color:var(--muted); text-decoration:none; border:1px solid rgba(255,255,255,0.1); padding:7px 16px; border-radius:8px; transition:all 0.2s; }
        .btn-back:hover { color:var(--text); }
        .btn-logout { background:rgba(255,77,109,0.12); color:var(--danger); border:1px solid rgba(255,77,109,0.25); padding:7px 16px; border-radius:8px; font-size:13px; font-weight:500; cursor:pointer; font-family:inherit; transition:all 0.2s; }
        .btn-logout:hover { background:rgba(255,77,109,0.2); }
        .main { max-width:900px; margin:0 auto; padding:40px 32px; }
        .card { background:var(--surface); border:1px solid var(--border); border-radius:20px; padding:28px; margin-bottom:24px; }
        .section-title { font-size:18px; font-weight:700; margin-bottom:20px; display:flex; align-items:center; gap:10px; }
        .badge { background:rgba(0,212,170,0.12); color:var(--accent); border:1px solid rgba(0,212,170,0.2); font-size:11px; padding:2px 8px; border-radius:20px; font-weight:500; }
        .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:16px; }
        .form-group { display:flex; flex-direction:column; gap:6px; }
        .form-group label { font-size:12px; color:var(--muted); text-transform:uppercase; letter-spacing:0.8px; }
        .form-group input { background:var(--surface2); border:1px solid var(--border); border-radius:10px; padding:11px 14px; color:var(--text); font-size:14px; font-family:inherit; outline:none; transition:all 0.2s; width:100%; }
        .form-group input:focus { border-color:var(--accent); box-shadow:0 0 0 3px rgba(0,212,170,0.1); }
        .form-group input::placeholder { color:var(--muted); }
        .pw-wrapper { position:relative; }
        .pw-wrapper input { padding-right:44px; }
        .pw-toggle { position:absolute; right:12px; top:50%; transform:translateY(-50%); background:none; border:none; color:var(--muted); cursor:pointer; font-size:16px; padding:0; line-height:1; }
        .btn-submit { background:linear-gradient(135deg,var(--accent),#00b894); color:#0a0e1a; border:none; padding:12px 28px; border-radius:10px; font-size:14px; font-weight:700; cursor:pointer; transition:all 0.2s; margin-top:4px; }
        .btn-submit:hover { transform:translateY(-1px); box-shadow:0 8px 25px rgba(0,212,170,0.3); }
        .alert { border-radius:10px; padding:12px 16px; margin-bottom:20px; font-size:14px; }
        .alert-success { background:rgba(0,212,170,0.1); border:1px solid rgba(0,212,170,0.2); color:var(--accent); }
        .alert-error { background:rgba(255,77,109,0.1); border:1px solid rgba(255,77,109,0.2); color:var(--danger); }
        .admin-list { display:flex; flex-direction:column; gap:12px; }
        .admin-item { background:var(--surface2); border:1px solid var(--border); border-radius:12px; padding:16px 20px; }
        .admin-top { display:flex; align-items:center; justify-content:space-between; gap:16px; }
        .admin-name { font-weight:600; font-size:15px; margin-bottom:3px; }
        .admin-email { font-size:13px; color:var(--muted); }
        .admin-you { background:rgba(0,212,170,0.12); color:var(--accent); border:1px solid rgba(0,212,170,0.2); font-size:11px; padding:2px 8px; border-radius:20px; margin-left:8px; }
        .admin-actions { display:flex; align-items:center; gap:8px; }
        .btn-change-pw { background:rgba(59,130,246,0.12); color:var(--accent2); border:1px solid rgba(59,130,246,0.2); padding:7px 14px; border-radius:8px; font-size:12px; font-weight:600; cursor:pointer; font-family:inherit; transition:all 0.2s; }
        .btn-change-pw:hover { background:rgba(59,130,246,0.2); }
        .btn-del { background:rgba(255,77,109,0.1); color:var(--danger); border:1px solid rgba(255,77,109,0.2); padding:7px 14px; border-radius:8px; font-size:12px; font-weight:600; cursor:pointer; font-family:inherit; transition:all 0.2s; }
        .btn-del:hover { background:rgba(255,77,109,0.2); }
        .pw-form { margin-top:14px; padding-top:14px; border-top:1px solid var(--border); display:none; gap:10px; flex-wrap:wrap; align-items:flex-end; }
        .pw-form.open { display:flex; }
        .pw-form-group { flex:1; min-width:160px; position:relative; }
        .pw-form-group input { background:var(--bg); border:1px solid var(--border); border-radius:8px; padding:9px 40px 9px 12px; color:var(--text); font-size:13px; font-family:inherit; outline:none; width:100%; }
        .pw-form-group input:focus { border-color:var(--accent2); }
        .btn-save-pw { background:var(--accent2); color:white; border:none; padding:9px 16px; border-radius:8px; font-size:13px; font-weight:600; cursor:pointer; font-family:inherit; white-space:nowrap; }
        .btn-cancel-pw { background:var(--muted); color:white; border:none; padding:9px 16px; border-radius:8px; font-size:13px; font-weight:600; cursor:pointer; font-family:inherit; white-space:nowrap; }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="navbar-logo" id="txt-page-title">⚙ Manajemen Admin</div>
    <div class="navbar-right">
        <a href="{{ route('dashboard') }}" class="btn-back" id="txt-btn-back">← Dashboard</a>
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

    <div class="card">
        <div class="section-title" id="txt-add-title">Tambah Admin Baru <span class="badge">New</span></div>
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label id="txt-label-name">Nama</label>
                    <input type="text" name="name" id="txt-input-name" placeholder="Nama admin" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label id="txt-label-email">Email</label>
                    <input type="email" name="email" id="txt-input-email" placeholder="email@gmail.com" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label id="txt-label-pw">Password</label>
                    <div class="pw-wrapper">
                        <input type="password" name="password" id="new-pw1" placeholder="Min. 8 karakter" required>
                        <button type="button" class="pw-toggle" onclick="toggleVis('new-pw1',this)">👁</button>
                    </div>
                </div>
                <div class="form-group">
                    <label id="txt-label-confirm-pw">Konfirmasi Password</label>
                    <div class="pw-wrapper">
                        <input type="password" name="password_confirmation" id="new-pw2" placeholder="Ulangi password" required>
                        <button type="button" class="pw-toggle" onclick="toggleVis('new-pw2',this)">👁</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-submit" id="txt-btn-add">+ Tambah Admin</button>
        </form>
    </div>

    <div class="card">
        <div class="section-title" id="txt-list-title">Daftar Admin <span class="badge">{{ $admins->count() }} akun</span></div>
        <div class="admin-list">
            @foreach($admins as $admin)
            <div class="admin-item">
                <div class="admin-top">
                    <div>
                        <div class="admin-name">
                            {{ $admin->name }}
                            @if($admin->id === Auth::id())
                                <span class="admin-you txt-you">Kamu</span>
                            @endif
                        </div>
                        <div class="admin-email">{{ $admin->email }}</div>
                    </div>
                    <div class="admin-actions">
                        <button class="btn-change-pw txt-change-pw" onclick="togglePw({{ $admin->id }})">🔑 Ganti Password</button>
                        @if($admin->id !== Auth::id())
                        <form method="POST" action="{{ route('admin.delete', $admin->id) }}"
                            onsubmit="return confirm(window._confirmDeleteAdmin || 'Hapus admin ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-del txt-delete">Hapus</button>
                        </form>
                        @endif
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.change-password', $admin->id) }}" class="pw-form" id="pw-form-{{ $admin->id }}">
                    @csrf @method('PUT')
                    <div class="pw-form-group">
                        <input type="password" name="password" id="pw-new-{{ $admin->id }}" placeholder="Password baru" required>
                        <button type="button" class="pw-toggle" onclick="toggleVis('pw-new-{{ $admin->id }}',this)">👁</button>
                    </div>
                    <div class="pw-form-group">
                        <input type="password" name="password_confirmation" id="pw-confirm-{{ $admin->id }}" placeholder="Konfirmasi password" required>
                        <button type="button" class="pw-toggle" onclick="toggleVis('pw-confirm-{{ $admin->id }}',this)">👁</button>
                    </div>
                    <button type="submit" class="btn-save-pw txt-save-pw">Simpan</button>
                    <button type="button" class="btn-cancel-pw txt-cancel-pw" onclick="togglePw({{ $admin->id }})">Batal</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
const translations = {
    id: { pageTitle:'⚙ Manajemen Admin', btnBack:'← Dashboard', btnLogout:'Logout', addTitle:'Tambah Admin Baru', labelName:'Nama', inputName:'Nama admin', labelEmail:'Email', inputEmail:'email@gmail.com', labelPw:'Password', labelConfirmPw:'Konfirmasi Password', inputPw:'Min. 8 karakter', inputConfirmPw:'Ulangi password', btnAdd:'+ Tambah Admin', listTitle:'Daftar Admin', you:'Kamu', changePw:'🔑 Ganti Password', deleteTxt:'Hapus', savePw:'Simpan', cancelPw:'Batal', confirmDelete:'Hapus admin ini?' },
    en: { pageTitle:'⚙ Admin Management', btnBack:'← Dashboard', btnLogout:'Logout', addTitle:'Add New Admin', labelName:'Name', inputName:'Admin name', labelEmail:'Email', inputEmail:'email@gmail.com', labelPw:'Password', labelConfirmPw:'Confirm Password', inputPw:'Min. 8 characters', inputConfirmPw:'Repeat password', btnAdd:'+ Add Admin', listTitle:'Admin List', you:'You', changePw:'🔑 Change Password', deleteTxt:'Delete', savePw:'Save', cancelPw:'Cancel', confirmDelete:'Delete this admin?' },
    ko: { pageTitle:'⚙ 관리자 관리', btnBack:'← 대시보드', btnLogout:'로그아웃', addTitle:'새 관리자 추가', labelName:'이름', inputName:'관리자 이름', labelEmail:'이메일', inputEmail:'email@gmail.com', labelPw:'비밀번호', labelConfirmPw:'비밀번호 확인', inputPw:'최소 8자', inputConfirmPw:'비밀번호 반복', btnAdd:'+ 관리자 추가', listTitle:'관리자 목록', you:'나', changePw:'🔑 비밀번호 변경', deleteTxt:'삭제', savePw:'저장', cancelPw:'취소', confirmDelete:'이 관리자를 삭제하시겠습니까?' },
    ja: { pageTitle:'⚙ 管理者管理', btnBack:'← ダッシュボード', btnLogout:'ログアウト', addTitle:'新しい管理者を追加', labelName:'名前', inputName:'管理者名', labelEmail:'メールアドレス', inputEmail:'email@gmail.com', labelPw:'パスワード', labelConfirmPw:'パスワードの確認', inputPw:'最低8文字', inputConfirmPw:'パスワードを繰り返す', btnAdd:'+ 管理者を追加', listTitle:'管理者一覧', you:'あなた', changePw:'🔑 パスワード変更', deleteTxt:'削除', savePw:'保存', cancelPw:'キャンセル', confirmDelete:'この管理者を削除しますか？' },
    es: { pageTitle:'⚙ Gestión de Admins', btnBack:'← Dashboard', btnLogout:'Cerrar sesión', addTitle:'Agregar Nuevo Admin', labelName:'Nombre', inputName:'Nombre del admin', labelEmail:'Correo electrónico', inputEmail:'email@gmail.com', labelPw:'Contraseña', labelConfirmPw:'Confirmar Contraseña', inputPw:'Mín. 8 caracteres', inputConfirmPw:'Repetir contraseña', btnAdd:'+ Agregar Admin', listTitle:'Lista de Admins', you:'Tú', changePw:'🔑 Cambiar Contraseña', deleteTxt:'Eliminar', savePw:'Guardar', cancelPw:'Cancelar', confirmDelete:'¿Eliminar este admin?' },
    fr: { pageTitle:'⚙ Gestion des Admins', btnBack:'← Tableau de bord', btnLogout:'Déconnexion', addTitle:'Ajouter un Nouvel Admin', labelName:'Nom', inputName:'Nom de l\'admin', labelEmail:'E-mail', inputEmail:'email@gmail.com', labelPw:'Mot de passe', labelConfirmPw:'Confirmer le mot de passe', inputPw:'Min. 8 caractères', inputConfirmPw:'Répéter le mot de passe', btnAdd:'+ Ajouter Admin', listTitle:'Liste des Admins', you:'Vous', changePw:'🔑 Changer le mot de passe', deleteTxt:'Supprimer', savePw:'Sauvegarder', cancelPw:'Annuler', confirmDelete:'Supprimer cet admin ?' },
    de: { pageTitle:'⚙ Admin-Verwaltung', btnBack:'← Dashboard', btnLogout:'Abmelden', addTitle:'Neuen Admin hinzufügen', labelName:'Name', inputName:'Admin-Name', labelEmail:'E-Mail', inputEmail:'email@gmail.com', labelPw:'Passwort', labelConfirmPw:'Passwort bestätigen', inputPw:'Mind. 8 Zeichen', inputConfirmPw:'Passwort wiederholen', btnAdd:'+ Admin hinzufügen', listTitle:'Admin-Liste', you:'Sie', changePw:'🔑 Passwort ändern', deleteTxt:'Löschen', savePw:'Speichern', cancelPw:'Abbrechen', confirmDelete:'Diesen Admin löschen?' },
    pt: { pageTitle:'⚙ Gerenciamento de Admins', btnBack:'← Dashboard', btnLogout:'Sair', addTitle:'Adicionar Novo Admin', labelName:'Nome', inputName:'Nome do admin', labelEmail:'E-mail', inputEmail:'email@gmail.com', labelPw:'Senha', labelConfirmPw:'Confirmar Senha', inputPw:'Mín. 8 caracteres', inputConfirmPw:'Repetir senha', btnAdd:'+ Adicionar Admin', listTitle:'Lista de Admins', you:'Você', changePw:'🔑 Alterar Senha', deleteTxt:'Excluir', savePw:'Salvar', cancelPw:'Cancelar', confirmDelete:'Excluir este admin?' },
    ar: { pageTitle:'⚙ إدارة المشرفين', btnBack:'← لوحة التحكم', btnLogout:'تسجيل الخروج', addTitle:'إضافة مشرف جديد', labelName:'الاسم', inputName:'اسم المشرف', labelEmail:'البريد الإلكتروني', inputEmail:'email@gmail.com', labelPw:'كلمة المرور', labelConfirmPw:'تأكيد كلمة المرور', inputPw:'٨ أحرف على الأقل', inputConfirmPw:'كرر كلمة المرور', btnAdd:'+ إضافة مشرف', listTitle:'قائمة المشرفين', you:'أنت', changePw:'🔑 تغيير كلمة المرور', deleteTxt:'حذف', savePw:'حفظ', cancelPw:'إلغاء', confirmDelete:'هل تريد حذف هذا المشرف؟' },
    zh: { pageTitle:'⚙ 管理员管理', btnBack:'← 仪表板', btnLogout:'退出', addTitle:'添加新管理员', labelName:'姓名', inputName:'管理员姓名', labelEmail:'电子邮件', inputEmail:'email@gmail.com', labelPw:'密码', labelConfirmPw:'确认密码', inputPw:'最少8个字符', inputConfirmPw:'重复密码', btnAdd:'+ 添加管理员', listTitle:'管理员列表', you:'你', changePw:'🔑 修改密码', deleteTxt:'删除', savePw:'保存', cancelPw:'取消', confirmDelete:'删除此管理员？' },
    ru: { pageTitle:'⚙ Управление администраторами', btnBack:'← Панель управления', btnLogout:'Выйти', addTitle:'Добавить нового администратора', labelName:'Имя', inputName:'Имя администратора', labelEmail:'Электронная почта', inputEmail:'email@gmail.com', labelPw:'Пароль', labelConfirmPw:'Подтвердите пароль', inputPw:'Мин. 8 символов', inputConfirmPw:'Повторите пароль', btnAdd:'+ Добавить администратора', listTitle:'Список администраторов', you:'Вы', changePw:'🔑 Изменить пароль', deleteTxt:'Удалить', savePw:'Сохранить', cancelPw:'Отмена', confirmDelete:'Удалить этого администратора?' },
    ms: { pageTitle:'⚙ Pengurusan Admin', btnBack:'← Papan Pemuka', btnLogout:'Log Keluar', addTitle:'Tambah Admin Baru', labelName:'Nama', inputName:'Nama admin', labelEmail:'E-mel', inputEmail:'email@gmail.com', labelPw:'Kata laluan', labelConfirmPw:'Sahkan Kata laluan', inputPw:'Min. 8 aksara', inputConfirmPw:'Ulang kata laluan', btnAdd:'+ Tambah Admin', listTitle:'Senarai Admin', you:'Anda', changePw:'🔑 Tukar Kata laluan', deleteTxt:'Padam', savePw:'Simpan', cancelPw:'Batal', confirmDelete:'Padam admin ini?' },
};

window.addEventListener('DOMContentLoaded', function() {
    const lang = localStorage.getItem('lang') || 'id';
    const t = translations[lang] || translations['en'];

    document.getElementById('txt-page-title').textContent = t.pageTitle;
    document.getElementById('txt-btn-back').textContent = t.btnBack;
    document.getElementById('txt-btn-logout').textContent = t.btnLogout;
    document.getElementById('txt-label-name').textContent = t.labelName;
    document.getElementById('txt-input-name').placeholder = t.inputName;
    document.getElementById('txt-label-email').textContent = t.labelEmail;
    document.getElementById('txt-input-email').placeholder = t.inputEmail;
    document.getElementById('txt-label-pw').textContent = t.labelPw;
    document.getElementById('txt-label-confirm-pw').textContent = t.labelConfirmPw;
    document.getElementById('new-pw1').placeholder = t.inputPw;
    document.getElementById('new-pw2').placeholder = t.inputConfirmPw;
    document.getElementById('txt-btn-add').textContent = t.btnAdd;
    document.querySelectorAll('.txt-you').forEach(el => el.textContent = t.you);
    document.querySelectorAll('.txt-change-pw').forEach(el => el.textContent = t.changePw);
    document.querySelectorAll('.txt-delete').forEach(el => el.textContent = t.deleteTxt);
    document.querySelectorAll('.txt-save-pw').forEach(el => el.textContent = t.savePw);
    document.querySelectorAll('.txt-cancel-pw').forEach(el => el.textContent = t.cancelPw);
    window._confirmDeleteAdmin = t.confirmDelete;

    const addTitle = document.getElementById('txt-add-title');
    if (addTitle) { const b = addTitle.querySelector('.badge'); addTitle.textContent = t.addTitle + ' '; if(b) addTitle.appendChild(b); }
    const listTitle = document.getElementById('txt-list-title');
    if (listTitle) { const b = listTitle.querySelector('.badge'); const bt = b ? b.textContent : ''; listTitle.textContent = t.listTitle + ' '; if(b) { b.textContent = bt; listTitle.appendChild(b); } }
});

function toggleVis(id, btn) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
    btn.textContent = input.type === 'password' ? '👁' : '🙈';
}
function togglePw(id) { document.getElementById('pw-form-' + id).classList.toggle('open'); }
</script>
</body>
</html>
