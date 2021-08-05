SETUP PHP
1. Import wa_blast.sql
2. Setting koneksi database & base url di helper/koneksi.php
3. Setting cron job setiap 1 menit dengan command
	`php -q /direktori_script/cron.php >/dev/null 2>&1` atau
	`usr/local/bin/php -q /direktori_script/cron.php >/dev/null 2>&1`


SETUP NODEJS
[heroku.com]
1. Fork repository wa-blast-2
2. Setting Callback Server di app.js dan arahkan ke url aplikasi php dari github
3. Masuk ke heroku.com dan buat akun
4. klik create new app dan buat url
5. ke menu settings, build pack nodejs dan tambahkan https://buildpack-registry.s3.amazonaws.com/buildpacks/jontewks/puppeteer.tgz
6. ke menu deploy
7. tunggu deploy selesai
8. atur link whatsapp gateway pada script php sesuai link heroku yang telah dibuat

[VPS]
1. Setting Callback Server di app.js dan arahkan ke url aplikasi php
2. upload semua script ke folder vps
3. install nodejs dan npm
4. jalankan perintah npm install di folder yang telah diupload
5. install pm2
6. ketikkan pm2 app.js untuk menjalankan script nodejs
7. setup domain dengan menambahkan vhost dengan proxy pass sesuai setting port pada nodejs (default :8000)
8. atur link whatsapp gateway pada script php sesuai domain yang telah dibuat

[LOCAL]
1. Install nodejs dan npm
2. Setting Callback Server di app.js dan arahkan ke url aplikasi php
3. ketik npm install
3. ketik nodemon run untuk menjalankan aplikasi

Untuk Konsultasi Instalasi / Jasa Instalasi atau kostumisasi boleh whatsapp 08990727766, bole la uang kopi dikit dikit hahaha

==THANKS FOR BUYING==
