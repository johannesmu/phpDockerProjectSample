# Sample Project
## Installation
Make a directory on your system and open your terminal in the directory and then clone this project
```
clone https://github.com/johannesmu/phpDockerProjectSample .
```
### Run using Docker Desktop
#### Building an image
```
docker build -t php8dev .
```
after build is finished you can create the containers using
```
docker compose up
```
#### Using Xampp
copy the contents of the www folder into your www folder in your Xampp installation

Once your containers are running, open [http://localhost:8082](http://localhost:8082) in your browser and log into *PhpMyAdmin* using the credentials set in the docker-compose.yml file. 

If you are using Xampp, open [http://localhost/phpmyadmin](http://localhost/phpmyadmi) and log into *PhpMyAdmin*. 

Create a user in *PhpMyAdmin* for your database (in this case it's called "**db_data**"). The user should be given no global privileges and only data privileges for the database **db_data** or the database that you are using.

## Adding .htaccess file
You will need to add a file in the root directory of your website. The root directory is usually where the index.php file resides.
### Docker
You need to create this file inside the "www" directory
### Xampp
You need to create this file in the root directory of your website. On Windows it is usually C:\Xampp\htdocs
### File Content
In the file you need to set the credentials needed to connect to the database as environment variables.
```
# username is the username of the user connecting to database
SetEnv dbuser username
# password is the password of the user connecting to database
SetEnv dbpass password
# db_data is the name of the database we are using for this project
SetEnv dbname db_data
# db is the host name for the database in docker (defined as a service in docker-compose.yml)
# if you are using Xampp the host should be localhost
SetEnv dbhost db