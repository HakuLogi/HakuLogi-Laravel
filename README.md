
# HOW TO RUN (DEV):

Run the following command to pull this repository:
```
git pull https://github.com/HakuLogi/HakuLogi-Laravel.git
```

Setup Composer Modules needed for project:
```
composer install
```

Setup necessary NPM module by running:
```
npm install
```

Decrypt .env.encrypted by running:
```
php artisan env:decrypt --key=<decrypt_key>
```

Generate Application Key (if needed):
```
php artisan key:generate
```

Run Development FE & BE using:
```
composer run dev
```
