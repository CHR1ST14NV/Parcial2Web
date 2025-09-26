# syntax=docker/dockerfile:1.6

#############################
# PHP + Apache registration site
#############################
FROM php:8.2-apache AS parcial_php

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libzip-dev \
    && docker-php-ext-install opcache \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod expires headers rewrite

COPY php/conf.d/ /usr/local/etc/php/conf.d/

WORKDIR /var/www/html
COPY --chown=www-data:www-data php/public/ ./

#############################
# Node.js + Express registration site
#############################
FROM node:20-alpine AS node_deps
WORKDIR /srv/app
COPY node/package*.json ./
RUN npm install --omit=dev --no-audit --no-fund

FROM node:20-alpine AS node_dev
ENV NODE_ENV=development
WORKDIR /srv/app
COPY node/package*.json ./
RUN npm install --no-audit --no-fund
COPY node/ ./
RUN chown -R node:node /srv/app
USER node
EXPOSE 3000
CMD ["npm", "run", "dev"]

FROM node:20-alpine AS parcial_js
ENV NODE_ENV=production
WORKDIR /srv/app
COPY --from=node_deps /srv/app/node_modules ./node_modules
COPY node/ ./
RUN chown -R node:node /srv/app
USER node
EXPOSE 3000
CMD ["node", "server.js"]

