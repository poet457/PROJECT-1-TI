# Deploy EDUXCHANGE (Laravel 12 + Inertia React) ke Vercel

Project ini Laravel 12 + Inertia.js (React) + Vite, dan sudah punya `vercel.json` +
`api/index.php` yang mengarahkan request ke Laravel lewat runtime PHP komunitas
(`vercel-php`). Vercel itu platform *serverless* — bukan server PHP biasa — jadi
ada beberapa hal yang WAJIB disiapkan supaya Laravel jalan di sana.

## 0. Yang sudah aku benerin di project kamu

- **`public/build` sudah di-build** (`npm install && npm run build`) dan
  ditaruh di folder ini. Vercel **tidak** menjalankan `npm run build` untuk kamu
  di setup `vercel.json` yang sekarang (route-nya cuma php runtime + static
  file server) — kalau folder ini kosong, semua CSS/JS di web kamu bakal 404.
- **`.gitignore`** aku hapus baris `/public/build`-nya, supaya folder hasil
  build ini bisa ke-commit ke Git (Vercel ambil file dari commit, bukan dari
  laptop kamu).
- **`.vercelignore`** aku tambahin supaya `/vendor` dan `/node_modules`
  tidak ikut ke-upload (Composer akan install ulang dependency PHP otomatis
  di server Vercel, jadi vendor lokal tidak perlu diupload).

Cara pakai: copy folder `public/build`, file `.gitignore`, dan `.vercelignore`
dari paket ini ke folder project kamu (timpa yang lama), lalu:

```bash
git add public/build .gitignore .vercelignore
git commit -m "chore: build assets untuk deploy Vercel"
git push
```

**Catatan penting:** setiap kali kamu ubah kode di `resources/js` atau
`resources/css`, kamu harus jalankan `npm run build` lagi dan commit ulang
folder `public/build` sebelum push — karena Vercel tidak build ulang
otomatis di setup ini.

## 1. Siapkan database MySQL yang bisa diakses dari internet

Vercel tidak punya database bawaan dan filesystem-nya tidak permanen, jadi
`DB_HOST=127.0.0.1` di `.env` kamu **tidak akan jalan** di Vercel — itu cuma
untuk XAMPP di laptop kamu. Kamu butuh MySQL yang online. Beberapa opsi yang
punya free tier:

- **Railway** (railway.app) — paling gampang untuk MySQL, tinggal add plugin MySQL
- **Aiven** — free tier MySQL
- **Clever Cloud** — ada plan gratis untuk MySQL kecil
- **TiDB Serverless** — kompatibel MySQL

Setelah database dibuat, kamu akan dapat: host, port, nama database, username,
password. Simpan ini untuk langkah env variables di bawah.

## 2. Import project ke Vercel

1. Buka https://vercel.com/new
2. Import repo GitHub `poet457/PROJECT-1-TI`
3. Di step "Configure Project": **Framework Preset pilih "Other"** (jangan
   biarkan Vercel auto-detect Vite, nanti dia coba build ulang dengan cara
   yang salah). Build Command & Output Directory kosongkan saja / biarkan
   default, karena `vercel.json` kamu yang mengatur build lewat runtime PHP.

## 3. Set Environment Variables di Vercel

Di halaman project → **Settings → Environment Variables**, tambahkan semua ini
(pilih scope "Production", tambahkan juga ke "Preview" kalau perlu):

| Key | Value |
|---|---|
| `APP_NAME` | `EDUXCHANGE` |
| `APP_ENV` | `production` |
| `APP_KEY` | isi dari `.env` lokal kamu — baris `APP_KEY=base64:...` (jangan generate baru kalau sudah ada data, karena data terenkripsi pakai key lama akan rusak) |
| `APP_DEBUG` | `false` |
| `APP_URL` | URL Vercel kamu, misal `https://project-1-ti.vercel.app` |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | host MySQL online kamu |
| `DB_PORT` | `3306` (atau sesuai provider) |
| `DB_DATABASE` | nama database |
| `DB_USERNAME` | username |
| `DB_PASSWORD` | password |
| `SESSION_DRIVER` | `cookie` |
| `CACHE_STORE` | `array` |
| `QUEUE_CONNECTION` | `sync` |
| `LOG_CHANNEL` | `stderr` |
| `VIEW_COMPILED_PATH` | `/tmp` |
| `APP_CONFIG_CACHE` | `/tmp/config.php` |
| `APP_EVENTS_CACHE` | `/tmp/events.php` |
| `APP_PACKAGES_CACHE` | `/tmp/packages.php` |
| `APP_ROUTES_CACHE` | `/tmp/routes.php` |
| `APP_SERVICES_CACHE` | `/tmp/services.php` |

**Kenapa banyak yang diarahkan ke `/tmp`?** Serverless function di Vercel
filesystem-nya *read-only*, kecuali folder `/tmp`. Laravel secara default mau
nulis cache/log/session ke folder `storage/`, dan itu akan error di Vercel
kalau tidak dialihkan. Ini kenapa `SESSION_DRIVER` juga dipaksa `cookie`
(bukan `file`/`database` bawaan) dan `LOG_CHANNEL` diarahkan ke `stderr`
(supaya log muncul di Vercel Function Logs, bukan ditulis ke file).

## 4. Jalankan migration ke database online

Setelah database online siap dan kamu tahu kredensialnya, dari laptop kamu:

```bash
cd PROJECT-1-TI
# edit .env lokal sementara, arahkan DB_HOST dkk ke database online
php artisan migrate --force
# (opsional kalau ada seeder)
php artisan db:seed --force
```

Migration **tidak otomatis jalan** saat deploy di Vercel (tidak ada langkah
build command untuk itu di `vercel.json` kamu), jadi ini harus dijalankan
manual dari laptop sebelum/sesudah deploy, setiap ada migration baru.

## 5. Deploy

Klik **Deploy** di Vercel. Build akan: install dependency PHP lewat Composer
(runtime `vercel-php@0.6.2`, cocok untuk PHP 8.2 sesuai `composer.json` kamu),
lalu serve `api/index.php` sebagai entry point Laravel, dan file di
`public/build`, `public/css`, `public/js`, `public/images` disajikan sebagai
static file — sesuai routing yang sudah ada di `vercel.json`.

Kalau build gagal atau halaman error, cek **Deployments → pilih deployment →
Function Logs** di dashboard Vercel — itu tempat error PHP/Laravel muncul
(karena `LOG_CHANNEL=stderr`).

## 6. Setelah deploy berhasil

Cek beberapa hal ini di web yang sudah live:
- Halaman utama & login/register bisa dibuka (test koneksi DB)
- CSS/JS ke-load dengan benar (test hasil build tadi)
- Coba daftar akun baru & login (test session cookie)

---

### Kalau nanti masih bermasalah

Deploy Laravel ke Vercel itu memang bukan cara "resmi" yang didukung Laravel
(Laravel didesain untuk server PHP yang selalu nyala, bukan serverless), jadi
kadang ada hal kecil yang meleset tergantung struktur project. Alternatif yang
jauh lebih mulus untuk aplikasi Laravel+MySQL seperti ini kalau Vercel bikin
pusing: **Railway** atau **Hostinger/shared hosting PHP** — keduanya
mendukung Laravel secara native tanpa perlu semua penyesuaian di atas.
