<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Certificate;

class AdminController extends Controller
{
    // =====================
    // REGISTER (sekali pakai — hanya bisa kalau belum ada user)
    // =====================

    public function showRegister()
    {
        if (User::exists()) {
            return redirect()->route('login')->withErrors(['email' => 'Akun admin sudah ada. Silakan login.']);
        }
        return view('admin.register');
    }

    public function register(Request $request)
    {
        if (User::exists()) {
            return redirect()->route('login')->withErrors(['email' => 'Akun admin sudah ada.']);
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'     => trim($request->name),
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Akun admin berhasil dibuat!');
    }

    // =====================
    // AUTH
    // =====================

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // =====================
    // DASHBOARD & SERTIFIKAT
    // =====================

    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('admin.dashboard', compact('certificates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'certificate_code_1' => 'required|max:10',
            'certificate_code_2' => 'required|max:10',
            'name'               => 'required|string',
            'birth_date'         => 'required|date',
            'course'             => 'required|string',
            'certificate_pdf'    => 'required|file|mimes:pdf|max:5120',
        ], [
            'certificate_code_1.required' => 'Bagian pertama kode wajib diisi.',
            'certificate_code_2.required' => 'Bagian kedua kode wajib diisi.',
            'name.required'               => 'Nama wajib diisi.',
            'birth_date.required'         => 'Tanggal lahir wajib diisi.',
            'course.required'             => 'Nama course wajib diisi.',
            'certificate_pdf.required'    => 'PDF sertifikat wajib diupload.',
            'certificate_pdf.max'         => 'Ukuran PDF maksimal 5MB.',
        ]);

        $code = trim($request->certificate_code_1) . '-' . trim($request->certificate_code_2);

        if (Certificate::where('certificate_code', $code)->exists()) {
            return back()->withInput()->withErrors(['certificate_code_1' => 'Kode sertifikat sudah digunakan.']);
        }

        $pdfPath = $request->file('certificate_pdf')->store('certificates', 'public');

        Certificate::create([
            'certificate_code' => $code,
            'name'             => trim($request->name),
            'birth_date'       => $request->birth_date,
            'course'           => trim($request->course),
            'certificate_pdf'  => $pdfPath,
        ]);

        return back()->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $certificate = Certificate::findOrFail($id);

        if ($certificate->certificate_pdf) {
            \Storage::disk('public')->delete($certificate->certificate_pdf);
        }

        $certificate->delete();
        return back()->with('success', 'Sertifikat berhasil dihapus.');
    }

    // =====================
    // MANAJEMEN ADMIN
    // =====================

    public function adminList()
    {
        $admins = User::latest()->get();
        return view('admin.admins', compact('admins'));
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'     => trim($request->name),
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function adminChangePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required'  => 'Password baru wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $admin = User::findOrFail($id);
        $admin->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password berhasil diubah.');
    }

    public function adminDelete($id)
    {
        // Gak bisa hapus diri sendiri
        if (Auth::id() == $id) {
            return back()->withErrors(['error' => 'Tidak bisa menghapus akun sendiri.']);
        }

        User::findOrFail($id)->delete();
        return back()->with('success', 'Admin berhasil dihapus.');
    }
}
