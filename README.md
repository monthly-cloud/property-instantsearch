# property-instantsearch

[![Join the chat at https://gitter.im/monthly-cloud/property-instantsearch](https://badges.gitter.im/monthly-cloud/property-instantsearch.svg)](https://gitter.im/monthly-cloud/property-instantsearch?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
InstantSearch.js + Vue for property listings

[Demo available here](http://property-instantsearch.monthly.cloud/)

# Requirements
- https://laravel.com/docs/5.5/installation#server-requirements
- composer (https://getcomposer.org/)
- npm (https://www.npmjs.com/get-npm)

# Installation
Install composer dependencies
```
composer install
```
Generate application key
```
php artisan key:generate
```
Install npm packages:
```
npm install
```
Build fron-end:
```
npm run dev
```

Setup your .env files with:
```
ALGOLIA_APP_ID=2HAXEGZ41H
ALGOLIA_SEARCH=5200e463393ec7e08e44d56bad01a7d2
```

Run it
```
php artisan serve
```
