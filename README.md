
# REST API Test - NAMA_TEST_NAGA

## 1. Apa itu REST API?

**REST (Representational State Transfer)** adalah sebuah arsitektur untuk membangun layanan web yang memungkinkan komunikasi antar sistem menggunakan protokol HTTP. REST API adalah aplikasi yang menerapkan prinsip-prinsip REST untuk melakukan pertukaran data antara server dan client, di mana data umumnya dikirim dalam format JSON atau XML.

Beberapa prinsip dasar dari REST API adalah:
- **Stateless**: Setiap permintaan dari client ke server harus berisi semua informasi yang diperlukan untuk memahami permintaan tersebut.
- **Client-Server**: Model komunikasi antara client (pengguna) dan server (penyedia layanan).
- **Cacheable**: Data yang dikirim dari server dapat di-cache untuk meningkatkan performa.
- **Uniform Interface**: Menggunakan standar HTTP seperti GET, POST, PUT, DELETE, dan PATCH untuk berinteraksi dengan sumber daya.

## 2. Apa itu CORS dan bagaimana cara menanganinya di backend?

**CORS (Cross-Origin Resource Sharing)** adalah mekanisme yang memungkinkan pembatasan atau kontrol akses antara domain yang berbeda dalam permintaan HTTP. Biasanya, ketika frontend mencoba mengakses API di server yang berada di domain lain, browser akan memblokirnya karena kebijakan **same-origin**.

Untuk menangani CORS di backend Laravel, dapat menggunakan middleware CORS yang sudah tersedia melalui package seperti `barryvdh/laravel-cors`. Berikut adalah langkah-langkah untuk mengonfigurasikan CORS di Laravel:

1. Install package CORS:
   ```bash
   composer require barryvdh/laravel-cors
   ```

2. Tambahkan middleware CORS di `app/Http/Kernel.php`:
   ```php
   'cors' => \Barryvdh\Cors\HandleCors::class,
   ```

3. Konfigurasi file `config/cors.php` sesuai dengan kebutuhan, misalnya mengizinkan akses dari domain frontend tertentu:
   ```php
   'allowed_origins' => ['https://yourfrontenddomain.com'],
   ```

## 3. Jelaskan perbedaan antara SQL dan NoSQL database

**SQL Database (Relational Database)**:
- Menggunakan skema yang tetap (structured schema) untuk data yang disimpan.
- Menggunakan tabel dengan kolom dan baris untuk menyimpan data.
- Memiliki bahasa query standar yaitu **SQL** (Structured Query Language).
- Contoh: MySQL, PostgreSQL, Oracle.

**NoSQL Database (Non-relational Database)**:
- Tidak menggunakan skema tetap; data disimpan dalam berbagai format seperti dokumen, key-value pairs, graph, atau columnar.
- Lebih fleksibel untuk menangani data yang tidak terstruktur atau semi-terstruktur.
- Cocok untuk skala besar dan aplikasi dengan kebutuhan data yang dinamis.
- Contoh: MongoDB, Cassandra, Redis.

## 4. Apa yang anda ketahui tentang middleware?

**Middleware** adalah lapisan perangkat lunak yang berada di antara aplikasi dan server atau database yang bertugas untuk menangani request dan response. Middleware memungkinkan kita untuk melakukan berbagai operasi sebelum dan sesudah request diproses oleh aplikasi.

Beberapa kegunaan middleware adalah:
- **Autentikasi dan otorisasi**: Memastikan bahwa pengguna yang mengakses API telah login dan memiliki hak akses yang tepat.
- **Validasi data**: Memeriksa apakah data yang diterima sesuai dengan format yang diharapkan.
- **CORS**: Mengizinkan atau membatasi akses dari domain tertentu.
- **Logging**: Mencatat aktivitas request dan response.

Middleware sering digunakan dalam berbagai framework seperti **Express.js**, **Flask**, dan **Laravel**.