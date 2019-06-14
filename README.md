## Todo App is a Todo List Application.

Laravel Blog is a complete blogging content management system.  

- - - -

### Features: 

1.	Blog Category 
2.	Blog Tag
3.	Blog Posts with soft delete
4.	Searching Post with keywords
5.	Mail Subscribe
6.	Social network share options
7.	Multiple Users - Admin and Writers with permissions
8.	A Complete blog with a lot of features 


## Technology

1.	Programming Language: PHP >7.2
2.	Web Framework: Laravel >5.4
3.	Database: MySQL
4.	Front End Design: HTML5, CSS3, Bootstrap

 - - - -
 This is Complete Blog System 
 
 # Installation
 First clone the project. Than run
     
     composer update 
     OR 
     composer install
     
 Depending on your OS this command may be in different format.
 
 ## Configuration
 Than you can create your .env file as it is in [Laravel 5 documentation](http://laravel.com/docs/master) or can use this sample:
     
     APP_ENV=local
     APP_DEBUG=true
     APP_KEY=your_key_here 
 
     DB_HOST=db_host
     DB_DATABASE=database_name
     DB_USERNAME=database_user
     DB_PASSWORD=database_password
 
     CACHE_DRIVER=array
     SESSION_DRIVER=file
 
     EMAIL_ADDRESS=application_email@domain.com
     EMAIL_PASSWORD=email_password
 
 Put your database host, username and password. ```EMAIL_ADDRESS``` is the application mailing service address. ```EMAIL_PASSWORD``` is the password for the mailbox. I am using this way of configuration due to the mail.php config file commit. I do not want to distribute my email and password ;).
 
 For more details about the .env file, check [Laravel's documentation](http://laravel.com/docs/master) or just Google about it. There is a plenty of info out there.
 
 ## Run API Key Generate
     
     php artisan key:generate
    
    
 ## Run the migrations
 First create your database and set the proper driver in the ```config/database.php``` file.
 Use the Laravel's artisan console with the common commands to run the migrations. First cd to the project directory and depending from your OS run 
     
     php artisan migrate
    
     
     
 ## Add some dummy data
 This project has seeders which provide the initial and some dummy data necessary for the project to run.
 Use: 
     
     php artisan db:seed
      OR 
     php artisan migrate:refresh -seed
     
 to run the migrations.
 
 
 ## For Autoload php files
 
     composer dump-autoload
     
     
 ## For Clear Cache and Storage
     
         php artisan config:clear
         php artisan cache:clear
     
     
 ## Your first login
     
Email: admin@domain.com
Password: 123456

Admin Create New Users
New users default password: password

## Contributing

Md Anisur Rahman

Web Programmer


http://anis.wdpfr36.website/

AS Well AS

Web Developer 
R-creation 
Chattogram, Bangladesh


## Security Vulnerabilities

If you discover a security vulnerability within the project, please send an e-mail to aanis434@gmail.com. All security vulnerabilities will be promptly addressed.

## License

The application is open-sourced.
