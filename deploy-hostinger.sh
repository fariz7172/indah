#!/bin/bash

# ============================================
# Deployment Script untuk Hostinger
# Laravel Indah Internet Application
# ============================================

set -e  # Exit on error

echo "=== Laravel Indah Internet - Deployment ke Hostinger ==="
echo ""

# Konfigurasi
DOMAIN_DIR="/home/u674511048/domains/farizahmad.com/public_html/indahmyrepublic"
REPO_URL="https://github.com/fariz7172/indah.git"
BRANCH="farizahmad.github.io"

# Step 1: Backup existing files (jika ada)
echo "[1/10] Backup existing files..."
if [ -d "$DOMAIN_DIR/backup" ]; then
    rm -rf "$DOMAIN_DIR/backup"
fi
if [ -d "$DOMAIN_DIR/app" ]; then
    mkdir -p "$DOMAIN_DIR/backup"
    cp -r "$DOMAIN_DIR"/* "$DOMAIN_DIR/backup/" 2>/dev/null || true
    echo "✓ Backup created at $DOMAIN_DIR/backup"
else
    echo "✓ No existing files to backup"
fi

# Step 2: Clone repository
echo ""
echo "[2/10] Cloning repository dari GitHub..."
cd "$DOMAIN_DIR"
if [ -d ".git" ]; then
    echo "Git repository sudah ada, melakukan pull..."
    git pull origin $BRANCH
else
    echo "Cloning fresh repository..."
    git clone -b $BRANCH $REPO_URL .
fi
echo "✓ Repository cloned/updated"

# Step 3: Install Composer dependencies
echo ""
echo "[3/10] Installing Composer dependencies..."
if [ -f "composer.json" ]; then
    composer install --optimize-autoloader --no-dev --no-interaction
    echo "✓ Composer dependencies installed"
else
    echo "⚠ composer.json not found!"
fi

# Step 4: Setup .env file
echo ""
echo "[4/10] Configuring environment file..."
if [ ! -f ".env" ]; then
    if [ -f ".env.example" ]; then
        cp .env.example .env
        echo "✓ .env file created from .env.example"
    else
        echo "⚠ Creating new .env file..."
        touch .env
    fi
fi

# Update .env with production settings
cat > .env << 'EOF'
APP_NAME="Indah Internet"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_TIMEZONE=Asia/Jakarta
APP_URL=https://indahmyrepublic.farizahmad.com

APP_LOCALE=id
APP_FALLBACK_LOCALE=id
APP_FAKER_LOCALE=id_ID

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u674511048_indah
DB_USERNAME=u674511048_indah
DB_PASSWORD=!FarizAhmad123456

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
EOF

echo "✓ .env file configured"

# Step 5: Generate application key
echo ""
echo "[5/10] Generating application key..."
php artisan key:generate --force
echo "✓ Application key generated"

# Step 6: Run database migrations
echo ""
echo "[6/10] Running database migrations..."
php artisan migrate --force
echo "✓ Database migrations completed"

# Step 7: Seed database (optional - uncomment if needed)
# echo ""
# echo "[7/10] Seeding database..."
# php artisan db:seed --force
# echo "✓ Database seeded"

# Step 7: Create storage symlink
echo ""
echo "[7/10] Creating storage symlink..."
php artisan storage:link
echo "✓ Storage symlink created"

# Step 8: Optimize Laravel
echo ""
echo "[8/10] Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo "✓ Laravel optimized"

# Step 9: Set permissions
echo ""
echo "[9/10] Setting file permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
echo "✓ File permissions set"

# Step 10: Create .htaccess for subdomain root
echo ""
echo "[10/10] Creating .htaccess file..."
cat > .htaccess << 'HTACCESS'
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
HTACCESS
echo "✓ .htaccess file created"

# Deployment completed
echo ""
echo "======================================"
echo "🎉 DEPLOYMENT BERHASIL!"
echo "======================================"
echo ""
echo "Aplikasi Anda sekarang dapat diakses di:"
echo "👉 https://indahmyrepublic.farizahmad.com"
echo ""
echo "Langkah selanjutnya:"
echo "1. Test aplikasi di browser"
echo "2. Check storage/logs/laravel.log jika ada error"
echo "3. Pastikan semua fitur berfungsi dengan baik"
echo ""
echo "Untuk update di masa depan, jalankan:"
echo "  cd $DOMAIN_DIR"
echo "  git pull origin $BRANCH"
echo "  composer install --optimize-autoloader --no-dev"
echo "  php artisan migrate --force"
echo "  php artisan optimize"
echo ""
