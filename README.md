# Microframework

 **Server Requirements** <br/>
 - PHP >= 7.2.0
 - PHP PDO Extension
 - PHP XML Extension
 
 **Install Dependencies** <br />
 - Run command:<br/> _composer install_
 
 **Script SQL Database** <br />
  - Script for create database:<br/> _app/config/banco.sql_
  
 **Local Development Server** <br/>
 - Run command:<br/> _php -S localhost:9999_
 
 **Set up database connection** <br/>
 - Remove the **.example** extension from the **.env**<br/> file and enter the information for your database:<br/>
 _DB_CONNECTION=mysql_ <br/>
 _DB_HOST=yourhost_ <br/>
 _DB_DATABASE=yourdatabasename_ <br/>
 _DB_USERNAME=yourusername_ <br/>
 _DB_PASSWORD=yourpassowrd_