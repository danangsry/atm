## Instal Composer

Jika belum menginstall composer download composer di [sini](https://getcomposer.org/Composer-Setup.exe) lalu install.
Untuk memastikan composer sudah terinstall anda dapat menjalankan perintah di cmd.

```
composer -v
```

## Running aplikasi

-   Buka folder direktori laravel.
-   Buka folder **skema_db**, buka file **atm.sql** lalu jalankan di MySQL phpmyadmin
-   Rename file **.env.example** menjadi **.env**
-   Edit file **.env** dan sesuaikan konfigurasi database anda contoh

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=atm
DB_USERNAME=(username anda)
DB_PASSWORD=(password anda)
```

-   Klik kanan dan pilih **Open in terminal**
-   Jalankan perintah

```
- composer install
- php artisan db:seed
```

-   Untuk menjalankan aplikasi jalankan perintah

```
composer artisan serve
```

User login : **akun1** sampai **akun10** (10 user)
password : **123**
