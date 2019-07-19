## Starter
A Laravel/VueJs starter project template without the distraction of a complicated development environment.

### Installation
Clone from repo
```
git clone git@github.com:putheng/laravel-vue-starter-template.git project-name
```
cd to project directory
```
cd project-name
```

Require this package with composer.
```
composer install
```

Require this package with npm.
```
npm install
```

### Config default base path 
Go to `js/bootstrap.js`

```
window.axios.defaults.baseURL = 'https://api.example.com';
```

#### Artisan create menu group
```
php artisan vue:group Admin
```

#### Artisan create menu item
```
php artisan vue:menu Admin\Profile\Password
```

#### Artisan vuex setup
```
php artisan vuex:fetch admin/fetchUser --endpoint=/api/admin/user --state=user
```