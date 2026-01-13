#!/bin/bash
echo "Installing hooks in Docker…"

# Frontend
docker run --rm -v "$PWD/frontend":/app -w /app node:24 sh -c "npm install && npx husky install"

# Mobile
docker run --rm -v "$PWD/mobile":/app -w /app node:24 sh -c "npm install && npx husky install"

# Backend
docker run --rm -v "$PWD/backend":/app -w /app php:8.2-cli sh -c "composer install --no-interaction --prefer-dist"
