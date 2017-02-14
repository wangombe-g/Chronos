# Cronos
Open source project for scheduled upload of data from multiple databases

# Set up for developer mode
1. Install WAMP, XAMPP or LAMP
2. Install [Composer](https://getcomposer.org/doc/00-intro.md). Composer is a dependancy manager for PHP. Instructions for all patforms are included in the link. P.S. usually, for Windows, you won't need to install anything manually.
3. Clone this project into your web directory.
4. Once cloned navigate to the `web` directory & run `composer install` (if you have installed [Composer](https://getcomposer.org/doc/00-intro.md) globally) or `php composer.phar install` (if [Composer](https://getcomposer.org/doc/00-intro.md) is only installed as instance specific).
 This will restore all Laravel core files. i.e `vendor` folder.
4. Log in to your MySQL and create an empty database.
5. Use a text editor to modify `.env.example` in the following way:
 ```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSDORD=your_database_password
```
and save the file as `.env`.
6. Add the subsequent databases you will be connecting to in the .env file as well. e.g
 ```
DB_DATABASE_ONE=your_database_name_one
DB_DATABASE_TWO=your_database_name_two
```
7. Add the corresponding connections to you `web/config/database.php` file like so: 
 ```

 env('DB_DATABASE_ONE', 'forge') => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_ONE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
 env('DB_DATABASE_TWO', 'forge') => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE_TWO', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
```
This is easier than connecting to the dbs at runntime.
8. While still in your terminal at `cronos/web`, `php artisan migrate` and press enter. This will setup the database tables to be used for this application.
9. Generate a key for your application by typing `php artisan key:generate`
10. Done!

#Updating the project

1. run `git pull origin master` or pull whatever branch you want.
2. Run `composer install`
3. Navigate to `cronos\web` and run migrations using `php artsan migrate`.
4. Test the application before deploying to your users.

#Development mode
1. Navigate to `cronos/web` from your `terminal` or `cmd` and type in `php artisan serve`
2. Use your web browser to access cronos in developer mode by using the link provided in the output of the `terminal` or `cmd`

# Caveat
- This project could be better, really. It was done in a hurry to cater for a very specific need

*Have questions? reach me at eugene@ucourseware.org

# License

cronos is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

# Hosting on a VM/ Apache Server

1. Refer to [this link](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts) for Ubuntu users.
2. Refer to [this link](https://john-dugan.com/wamp-vhost-setup/) for Windows users.