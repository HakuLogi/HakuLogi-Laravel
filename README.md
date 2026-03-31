
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

---

# How to add permissions using Spatie/Laravel-Permission package?

[PermissionSeeder.php](./database/seeders/PermissionSeeder.php) is the file to add permissions.
If you would like to add roles, and change permissions, you can do it in the same file. 
Re-run the migration or seed command to apply the changes.

For more information, refer to [Spatie Permissions Documentation](https://spatie.be/docs/laravel-permission/v7)

### Can i add permission outside of the seeder?

Yes, you can add permission outside of the seeder by using the following command:
```
php artisan permission:create-permission <permission_name>
```

More about Artisan Command for Permissions, refer to [Spatie Permissions Documentation](https://spatie.be/docs/laravel-permission/v7/basic-usage/artisan)

### What about adding new permissions through a button click or something?

Yes, you can add new permissions through a button click or something by creating a controller and a route for it. 
You can use the `Permission::create()` method to create a new permission.

But this is <font size="5" color="red"><b> - NOT RECOMMENDED - </b></font> for production use.

### What is the default permission for new users? How do i change my own role?

The default role for new users is `user`.
To change the default role for all new users, refer to [UserObserver.php](./app/Observers/UserObserver.php).

Since there is only 2 roles (`admin` and `user`), you can't change your own role through the UI.
To change your own role, you need to do it manually either through tinker or by editing the database directly.
After that, you need to clear the cache by following either command:
```
php artisan permission:cache-reset
```
or
```
php artisan cache:clear
```

If your role is an `super-admin` then there will be a user management page where you can change other users' roles.
