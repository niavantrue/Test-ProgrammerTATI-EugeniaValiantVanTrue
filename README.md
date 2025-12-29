# Sistem Manajemen Log Harian Pegawai - Tugas Intern Programmer TATI

Sistem manajemen log harian pegawai berbasis web yang dibangun dengan Laravel untuk memfasilitasi pencatatan aktivitas harian, verifikasi oleh atasan, dan pelacakan kinerja pegawai dalam hierarki organisasi. Proyek ini merupakan bagian dari tugas internship programmer di TATI.

## Fitur Utama

- **Hierarki Pengguna**: Sistem mendukung struktur hierarki dengan peran Kepala Dinas, Kepala Bidang, dan Staff
- **Pencatatan Log Harian**: Pegawai dapat mencatat aktivitas harian mereka
- **Verifikasi dan Persetujuan**: Atasan dapat menyetujui atau menolak log bawahan
- **Pelacakan Riwayat**: Riwayat verifikasi dan perubahan status log tersimpan
- **Evaluasi Kinerja**: Sistem evaluasi berdasarkan matriks kinerja (diimplementasikan di `KinerjaService`)
- **Import Data JSON**: Logika import data dari file JSON diimplementasikan di service layer
- **Antarmuka Responsif**: UI yang ramah pengguna menggunakan Blade templates dengan Bootstrap 5
- **Otentikasi Aman**: Sistem login dan otorisasi menggunakan Laravel Breeze

## Teknologi yang Digunakan

- **Laravel 11**: Framework PHP untuk backend dan MVC architecture
- **Laravel Breeze**: Package untuk autentikasi dan otorisasi
- **PHP 8.2**: Bahasa pemrograman server-side
- **Blade Templates**: Templating engine Laravel untuk UI
- **MySQL/SQLite**: Sistem database
- **Bootstrap 5**: Framework CSS untuk UI responsif
- **Vite**: Build tool untuk asset frontend
- **PHPUnit**: Framework testing

## Implementasi Khusus Sesuai Tugas

- **No. 3 & 4**: Logika bisnis untuk evaluasi kinerja dan import JSON diimplementasikan di service layer (`app/Services/KinerjaService.php`)
- **Autentikasi**: Menggunakan Laravel Breeze untuk sistem login dan registrasi
- **UI**: Menggunakan Blade templates untuk semua tampilan frontend
- **Service Layer**: Logika import JSON dan perhitungan kinerja dipisahkan di service classes untuk maintainability

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL atau SQLite

## Instalasi

1. **Clone repository**:
   ```bash
   git clone <repository-url>
   cd test-programmertati-eugeniavaliantvantrue
   ```

2. **Install dependencies PHP**:
   ```bash
   composer install
   ```

3. **Install dependencies JavaScript**:
   ```bash
   npm install
   ```

4. **Konfigurasi environment**:
   - Salin file `.env.example` ke `.env`
   - Sesuaikan konfigurasi database di `.env`

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Jalankan migrasi database**:
   ```bash
   php artisan migrate
   ```

7. **Seed database dengan data awal**:
   ```bash
   php artisan db:seed
   ```

8. **Build assets**:
   ```bash
   npm run build
   ```

9. **Jalankan server**:
   ```bash
   php artisan serve
   ```

Aplikasi akan berjalan di `http://localhost:8000`

## Penggunaan

### Login
- Gunakan kredensial yang telah di-seed atau buat akun baru melalui Laravel Breeze

### Untuk Staff:
- Akses menu "Log Harian"
- Tambah log aktivitas harian
- Lihat status persetujuan

### Untuk Atasan (Kepala Bidang/Kepala Dinas):
- Akses menu "Verifikasi Log"
- Setujui atau tolak log bawahan
- Lihat riwayat verifikasi

## Struktur Database

- **users**: Tabel pengguna dengan hierarki (atasan_id, jabatan)
- **log_harians**: Tabel log harian dengan status verifikasi (pending/approved/rejected)
- **migrations**: Migrasi untuk setup database dan relasi

## Struktur Kode

- **app/Models/**: Model Eloquent untuk User dan LogHarian
- **app/Http/Controllers/**: Controller untuk LogHarian dan VerifikasiLog
- **app/Services/**: Service classes untuk logika bisnis (KinerjaService)
- **resources/views/**: Blade templates untuk UI
- **database/migrations/**: Migrasi database
- **database/seeders/**: Seeder untuk data awal
- **tests/**: Unit dan feature tests

## Testing

Jalankan test dengan PHPUnit:
```bash
php artisan test
```
