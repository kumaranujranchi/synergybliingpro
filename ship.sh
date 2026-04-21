#!/bin/bash

# Configuration
SSH_USER="u743570205"
SSH_HOST="82.112.239.57"
SSH_PORT="65002"
REMOTE_PATH="/home/$SSH_USER/domains/honestchoicereview.com/public_html"

echo "🚀 Starting Deployment for Synergy Billing Pro..."

# 1. Push to GitHub
echo "📤 Pushing latest code to GitHub..."
git add .
git commit -m "Deploying latest changes via ship.sh"
git push origin main

# 2. SSH and Pull
echo "🌐 Connecting to Hostinger and pulling changes..."
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST << EOF
    cd $REMOTE_PATH
    echo "📥 Pulling from GitHub..."
    git pull origin main
    
    echo "⚙️ Running Composer..."
    # If composer is installed globally
    composer install --no-dev --optimize-autoloader
    
    echo "🧹 Clearing Caches..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    
    echo "✅ Remote Deployment Finished!"
EOF

echo "🏁 All done! Your site is now up to date."
