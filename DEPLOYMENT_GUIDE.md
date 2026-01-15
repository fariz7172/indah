# 🚀 Panduan Deploy Laravel ke Hostinger

Panduan lengkap untuk deploy aplikasi **Laravel Indah Internet** ke subdomain Hostinger **indahmyrepublic.farizahmad.com**.

---

## 📋 Informasi Server

- **Subdomain**: indahmyrepublic.farizahmad.com
- **Document Root**: `/home/u674511048/domains/farizahmad.com/public_html/indahmyrepublic`
- **SSH**: `ssh -p 65002 u674511048@145.79.14.233`
- **Database**: u674511048_indah
- **DB User**: u674511048_indah

---

## 🎯 Opsi Deployment

### Opsi 1: Automatic Script (Direkomendasikan) ⚡

Gunakan script deployment otomatis yang sudah dibuat.

#### Step 1: Login SSH
```bash
ssh -p 65002 u674511048@145.79.14.233
```
Password: `!FarizAhmad123456`

#### Step 2: Navigate ke directory
```bash
cd /home/u674511048/domains/farizahmad.com/public_html/indahmyrepublic
```

#### Step 3: Download deployment script
```bash
curl -o deploy.sh https://raw.githubusercontent.com/fariz7172/indah/farizahmad.github.io/deploy-hostinger.sh
chmod +x deploy.sh
```

#### Step 4: Jalankan deployment
```bash
./deploy.sh
```

Script akan secara otomatis:
- ✅ Clone repository dari GitHub
- ✅ Install Composer dependencies
- ✅ Setup .env file dengan konfigurasi production
- ✅ Generate application key
- ✅ Run database migrations
- ✅ Create storage symlink
- ✅ Optimize Laravel (cache config, routes, views)
- ✅ Set file permissions
- ✅ Create .htaccess redirect

---

### Opsi 2: Manual Step-by-Step 📝

Jika Anda lebih suka deploy manual, ikuti langkah-langkah berikut:

#### 1. Login SSH
```bash
ssh -p 65002 u674511048@145.79.14.233
```

#### 2. Navigate ke directory dan clone repository
```bash
cd /home/u674511048/domains/farizahmad.com/public_html/indahmyrepublic
git clone -b farizahmad.github.io https://github.com/fariz7172/indah.git .
```

#### 3. Install Composer dependencies
```bash
composer install --optimize-autoloader --no-dev
```

#### 4. Buat file .env
```bash
cp .env.example .env
nano .env
```

Isi dengan konfigurasi berikut:
```env
APP_NAME="Indah Internet"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://indahmyrepublic.farizahmad.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=u674511048_indah
DB_USERNAME=u674511048_indah
DB_PASSWORD=!FarizAhmad123456

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Tekan `Ctrl+X`, lalu `Y`, lalu `Enter` untuk save.

#### 5. Generate application key
```bash
php artisan key:generate --force
```

#### 6. Run migrations
```bash
php artisan migrate --force
```

#### 7. (Optional) Seed database
```bash
php artisan db:seed --force
```

#### 8. Create storage symlink
```bash
php artisan storage:link
```

#### 9. Optimize Laravel
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### 10. Set permissions
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

#### 11. Buat .htaccess di root directory
```bash
cat > .htaccess << 'EOF'
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
EOF
```

---

## 🔍 Verifikasi Deployment

### 1. Test di Browser
Buka browser dan akses:
```
https://indahmyrepublic.farizahmad.com
```

### 2. Check Logs (jika ada error)
```bash
tail -f storage/logs/laravel.log
```

### 3. Test Core Functionality
- ✅ Homepage load dengan styling yang benar
- ✅ Browse packages
- ✅ Admin panel login (jika ada)
- ✅ Database connection (data tampil dengan benar)

---

## 🔄 Update Aplikasi di Masa Depan

Ketika ada update dari local ke GitHub:

#### 1. Login SSH
```bash
ssh -p 65002 u674511048@145.79.14.233
```

#### 2. Navigate dan pull changes
```bash
cd /home/u674511048/domains/farizahmad.com/public_html/indahmyrepublic
git pull origin farizahmad.github.io
```

#### 3. Update dependencies (jika ada perubahan composer.json)
```bash
composer install --optimize-autoloader --no-dev
```

#### 4. Run migrations (jika ada migration baru)
```bash
php artisan migrate --force
```

#### 5. Clear dan rebuild cache
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🛠️ Troubleshooting

### Error: "500 Internal Server Error"
1. Check file permissions:
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

2. Check Laravel logs:
   ```bash
   tail -50 storage/logs/laravel.log
   ```

3. Pastikan .env sudah benar

### Error: "SQLSTATE[HY000] [2002] Connection refused"
- Pastikan database credentials di .env benar
- Check apakah database `u674511048_indah` sudah dibuat di cPanel

### Assets (CSS/JS) tidak load
1. Pastikan build assets sudah di-push ke GitHub:
   ```bash
   # Di local:
   npm run build
   git add public/build
   git commit -m "Add production assets"
   git push
   ```

2. Di server, pull update:
   ```bash
   git pull origin farizahmad.github.io
   ```

### Storage symlink error
- Jika `php artisan storage:link` error, buat manual:
  ```bash
  ln -s ../storage/app/public public/storage
  ```

---

## 📞 Support

Jika mengalami masalah:
1. Check `storage/logs/laravel.log` untuk error details
2. Check Hostinger error logs di cPanel
3. Pastikan semua requirements PHP terpenuhi (PHP 8.1+, required extensions)

---

## ✅ Checklist Deploy

- [ ] SSH connection berhasil
- [ ] Repository di-clone
- [ ] Composer dependencies installed
- [ ] File .env dikonfigurasi
- [ ] Application key generated
- [ ] Database migrations run successfully
- [ ] Storage symlink created
- [ ] Laravel optimized (cache created)
- [ ] File permissions set correctly
- [ ] .htaccess created
- [ ] Website accessible di browser
- [ ] Assets (CSS/JS) load correctly
- [ ] Database connection working
- [ ] Core functionality tested

---

**🎉 Selamat! Aplikasi Anda sudah live di Hostinger!**
