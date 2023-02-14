# G3 Home Cleaning 

### Installation guide:
* Download XAMPP and extract the source code folders to "../xampp/htdocs/".
* Start MySQL on XAMPPthen click on "Admin" button for MySQL.
* Create new database named "home_service" by importing home_service.sql located in "DB" folder from the source code folder.
* Also import test_dataset.sql from the same directory
* In database "home_service", click on Privileges and create new user account named "home_service", set Host name to Local and use password from "/include/dbdetail.php", select only Data for Global Previleges and click "Go" to confirm.
* On XAMPP, click on "Config" for Apache and go to "httpd.conf", look for "DocumentRoot" and add the source code folder name behind.  It should looking something like this:
![example](/assets/img/example.png)

* Save and close, then start Apache
* Open browser and input "localhost" as the URL, press Enter and you are good to go!
