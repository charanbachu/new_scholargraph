##Folders
* appengine ----> code folder
* php-5.4.25  ----> php folder
* google_appengine ----> google appengine folder
* database_files ----> database file

##Running

* Keep these three folders in one folder and run the below commands
* `export PATH="$PATH:<<PATH TO google_appengine folder>>/google_appengine"`
eg:
`export PATH="$PATH:/home/batchu/Desktop/Internship Work/Backend/google_appengine"`
* `dev_appserver.py --php_executable_path=php-5.4.25/installdir/bin/php-cgi appengine/`
* Import the registration.sql file in phpMyAdmin, after creating a database named `registration`
* Change the password and username for connecting to MySQL in "appengine/application/config/database.php"
* Run `./run.sh`

##Development and Production separate

* In index.php we have an ENVIRONMENT variable which is set default to development
* To use separate configuration for development server, create a folder application/config/development/. Create a copy of the configuration file you want to use for development and update the values there.
* Using ENVIRONMENT variable in views example : `if (ENVIRONMENT != 'production') require '' else require ''`# new_scholargraph
