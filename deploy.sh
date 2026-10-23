#!/bin/bash
# ==========================================
# deploy.sh — Server deploy script
# ==========================================
# Usage: ./deploy.sh 2026-10-24-01

set -euo pipefail

cd /srv/recycle

export APP_IMAGE=ghcr.io/kimkundad/recycle-app
export NGINX_IMAGE=ghcr.io/kimkundad/recycle-nginx
export IMAGE_TAG=${1:?usage: ./deploy.sh <IMAGE_TAG>}

compose() { docker compose -f docker-compose.prod.yml "$@"; }

echo "Deploying IMAGE_TAG=$IMAGE_TAG"

compose pull
compose up -d --force-recreate --remove-orphans

# No config:cache: HomeController reads env('reCAPTCHA') and env('line_token')
# directly, and those return null once the config is cached.
# No automatic migrate either; run `php artisan migrate --force` by hand when
# a release needs it.
compose exec -T php php artisan route:cache || echo "route:cache failed, routes stay uncached"
compose exec -T php php artisan view:cache

compose exec -T php php -v | head -1
echo "Deploy complete!"
