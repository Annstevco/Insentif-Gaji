Sistem ini berdasar oleh laravel, maka sebelum aplikasi dijalankan harus dipastikan untuk menginstall laravel terlebih dahulu.
Berikut panduan untuk menginstall laravel: https://laravel.com/docs/10.x/installation

jika sudah menginstall laravel maka selanjutnya adalah menginstall dependencies berikut pada terminal project yang telah dibuat:
Laravael Breeze : composer require laravel/breeze --dev
php artisan breeze:install

Setelahnya import database "insentifproject.sql" ke dalam database mysql anda dan ubah koneksi database yang ada pada file .env di project.

Jika telah selesai maka jalankan Apache dan MySql pada Xampp dan bukalah terminal pada project yang telah dibuat.

Jalankan perintah "php artisan migrate" lalu "php artisan serve"

Maka program telah dijalankan dan bisa memasukkan info admin dan user yang didapat dari database "insentifproject.sql"

Untuk detail mengenai program dapat dilihan dalam video youtube ini : 
https://youtu.be/TR7G4kJcWys
