# All Stars my shop

"How To Cook" is a template of a website displaying ads using  LARAVEL v8, HTML, CSS, PHP and MySQL. You can :
- authentificate : sign-in, sign-up, log out, log as admin or user
- manage CRUD : use an admin page to manage your database and see all your users
- create profile for each user and display adds, create / edit / delete them 

It's a collaborative website where you can offer cooking classes for a fee or just participate in cooking classes. 

## Installation

#### Install PHP and Apache

Download the latest PHP 5 ZIP package from www.php.net/downloads.php.
Copy ```C:\php\php.ini-development``` to ```C:\php\php.ini```

Define the extension directory:```extension_dir = "C:/php/ext"```. 

Enable extensions: 
```extension=mysql``` and ```extension=pdo_mysql```

Configure PHP as an Apache module : 

Ensure Apache is not running (use ```net stop  Apache2.2```from the command line and open its ```confhttpd.conf``` configuration file in an editor. The following lines should be changed:

On line 239, add index.php as a default file name:

```DirectoryIndex index.php index.html```

At the bottom of the file, add the following lines (change the PHP file locations if necessary):

```# PHP5 module```

```LoadModule php5_module "c:/php/php5apache2_2.dll"```

```AddType application/x-httpd-php .php```

```PHPIniDir "C:/php"```

Save the configuration file and test it from the command line (Start > Run > cmd):

```cd Apache2bin```

```httpd -t```

#### Install mySQL

You also need to install ```mySQL``` : https://dev.mysql.com/doc/mysql-installation-excerpt/8.0/en/windows-install-archive.html

#### Install composer

```brew install composer```

#### Install library

Read composer.json and install all libraries 

## Usage

```bash
php artisan serve
```
Then open a browser with the url :

```http://127.0.0.1:8000/home/page0```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
