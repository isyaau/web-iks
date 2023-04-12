<?php

use App\Models\Akun;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Anggota;
use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AnggotaDuaController;
use App\Http\Controllers\AnggotaSatuController;
use App\Http\Controllers\PendaftaranDuaController;
use App\Http\Controllers\PendaftaranSatuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'beranda' => Beranda::where('id', 1)->get(),
        'slider' => Slider::latest()->get(),
        'jumlahSlider' => Slider::latest()->count()

    ]);
});
Route::get('/profil', function () {
    return view('profil', [
        'profil' => Profil::all()
    ]);
});
Route::get('/cek-anggota/hasil', function (Request $request) {
    $cari = $request->input('cari');
    $data = Anggota::where('nama', 'like', '%' . $cari . '%')->get();
    return view('cek_hasil', ['data' => $data]);
});
Route::get('/cek-anggota', function () {
    return view('cek');
});

Route::resource('/pendaftaran-tingkat-1', PendaftaranSatuController::class);
Route::resource('/pendaftaran-tingkat-2', PendaftaranDuaController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard/index', function () {
    if (auth()->user()->role == 1) {
        $jumlahTingkat1 = Anggota::where('tingkat', 1)->count();
        $jumlahTingkat1verif = Anggota::where('tingkat', 1)->where('status', 1)->count();
        $jumlahTingkat1noverif = Anggota::where('tingkat', 1)->where('status', 2)->count();
        $jumlahTingkat2 = Anggota::where('tingkat', 2)->count();
        $jumlahTingkat2verif = Anggota::where('tingkat', 1)->count();
        $jumlahTingkat2noverif = Anggota::where('tingkat', 2)->where('status', 2)->count();
        $jumlahAnggota =  Anggota::all()->count();
        $jumlahAnggotaverif = Anggota::all()->where('status', 1)->count();
        $jumlahAnggotanoverif = Anggota::all()->where('status', 2)->count();
        $jumlahAkun = Akun::all()->count();
        $pendaftarAnggota = Anggota::orderBy('created_at', 'desc')->get();
    } else {
        $jumlahTingkat1 = Anggota::where('tingkat', 1)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahTingkat1verif = Anggota::where('tingkat', 1)->where('status', 1)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahTingkat1noverif = Anggota::where('tingkat', 1)->where('status', 2)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahTingkat2 = Anggota::where('tingkat', 2)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahTingkat2verif = Anggota::where('tingkat', 2)->where('status', 1)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahTingkat2noverif = Anggota::where('tingkat', 2)->where('status', 2)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahAnggota =  Anggota::where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahAnggotaverif = Anggota::where('status', 1)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahAnggotanoverif = Anggota::where('status', 2)->where('cabang_daerah', auth()->user()->cabang_daerah)->count();
        $jumlahAkun = Akun::all()->count();
        $pendaftarAnggota = Anggota::where('cabang_daerah', auth()->user()->cabang_daerah)->orderBy('created_at', 'desc')->get();
    }
    return view('dashboard.index', [
        'jumlahTingkat1' => $jumlahTingkat1,
        'jumlahTingkat1verif' => $jumlahTingkat1verif,
        'jumlahTingkat1noverif' => $jumlahTingkat1noverif,
        'jumlahTingkat2' => $jumlahTingkat2,
        'jumlahTingkat2verif' => $jumlahTingkat2verif,
        'jumlahTingkat2noverif' => $jumlahTingkat2noverif,
        'jumlahAnggota' => $jumlahAnggota,
        'jumlahAnggotaverif' => $jumlahAnggotaverif,
        'jumlahAnggotanoverif' => $jumlahAnggotanoverif,
        'jumlahAkun' => $jumlahAkun,
        'pendaftarAnggota' => $pendaftarAnggota,

    ]);
})->middleware('auth');
Route::resource('/dashboard/pendaftaran/pendaftaran-tk-1', PendaftaranSatuController::class)->middleware('auth');
Route::resource('/dashboard/pendaftaran/pendaftaran-tk-2', PendaftaranDuaController::class)->middleware('auth');
Route::resource('/dashboard/anggota/anggota-tk-1', AnggotaSatuController::class)->middleware('auth');
Route::resource('/dashboard/anggota/anggota-tk-2', AnggotaDuaController::class)->middleware('auth');
Route::resource('/dashboard/visi-misi/visi', VisiController::class)->middleware('auth');
Route::resource('/dashboard/profil', ProfilController::class)->middleware('auth');
Route::resource('/dashboard/slider', SliderController::class)->middleware('auth');
Route::resource('/dashboard/beranda', BerandaController::class)->middleware('auth');
Route::resource('/dashboard/akun', AkunController::class)->middleware('auth');
Route::resource('/dashboard/setting', SettingController::class)->middleware('auth');
