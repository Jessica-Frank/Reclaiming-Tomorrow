# Reclaiming Tomorrow
A capstone project by Jessica Frank, Kristin Cattell, Henry Huerta, Atsoupe Bessou Kpeglo, and Kayla Kirkley.

Reclaiming Tomorrow simplifies recycling for those eager to start but unsure where to go. Finding information on local recycling centers can be a challenge when there is often no central resource to find this information. Our website simplifies the recycling process by providing a map of local recycling centers that accept your materials and information about county recycling programs. We also give users the opportunity to share their reviews of recycling centers and earn rewards by recycling through our recycling rewards program. Admins can edit any data on the website to update and correct information.

Our project was mainly done by creating HTML pages with the help of PHP coding to do MySQL queries and accessing session infomation to keep track of what user is currently logged in and to help put restrictions on certain webpages based on who's logged in. Our interactive map that displays recycling locations was created mainly using JavaScript and Leaflet. Each recycling location that displays on the map was found and stored within our database. Our database also stores all the general information for each of our counties. Smaller, complex functions were done using jQuery and AJAX. The "Forgot Password" function was created using PHPMailer and Composer.

## Technology
Languages: PHP, MySQL, HTML, CSS, and JavaScript

Libraries: Bootstrap, Leaflet, and jQuery/AJAX

Tools: XAMPP

This project contains code taken from PHPMailer and Composer

## Usage
- This project can be hosted locally with XAMPP by changing the settings that locate the Apache root directory to match the directory this project has been installed in. 
- Most of the website will require that the database is set up, which can be done by accessing phpMyAdmin (the database management tool included with XAMPP) and running the reclaiming_tomorrow_db.sql file located in the main directory for this project.
- For the password reset component to work, you should need to change the email and password used if the credentials are changed from the public data in this repository. That data can be changed in /verify/mailer.php
Note: this project assumes that the default database credentials have not been changed. If you have changed your credentials this project may not work.

## How to Access Our Website
1. If you haven't already, install [XAMPP](https://www.apachefriends.org/download.html).
2. Clone the repository by [Git Bashing](https://gitforwindows.org/) in C:\xampp\htdocs using ```git clone https://github.com/Jessica-Frank/Reclaiming-Tomorrow.git```
    - Note: The C drive is the default place where your XAMPP folder will be. If you've changed where to store your XAMPP folder, then go there instead, but your address should always end as *"\xampp\htdocs"*
![Image1](/images/Im5.png)
![Image5](/images/Im1.png)
3. Open XAMPP and click on *"Config"* next to the Apache module
4. Then click on Then click on *"Apache (httpd.conf)"*
![Image2](/images/Im2.png)
5. Within the text file, change the following code and save the changes:
*DocumentRoot "C:/xampp/htdocs"*
*<Directory "C:/xampp/htdocs">*
to
*DocumentRoot "C:/xampp/htdocs/Reclaiming-Tomorrow"*
*<Directory "C:/xampp/htdocs/Reclaiming-Tomorrow">*
![Image3](/images/Im3.png)
6. Restart XAMPP and start the Apache and MySQL modules
![Image4](/images/Im4.png)
7. Open a web browser and type in *"http://localhost/"* as the URL
8. Now you've successfully accessed our website!

## How to Connect the Database to the Website
1. Click on the *"Admin"* action for the MySQL module. You will be redirected to *"http://localhost/phpmyadmin/"* within your web browser.
![Image6](/images/Im6.png)
2. Click on *"Databases"* at the top and create a database named *"reclaiming_tomorrow_db"*
    - You will be redirected to the Structure of the database you've just created.
![Image7](/images/Im7.png)
3. Now click on *"Import"* and choose the *"reclaiming_tomorrow_db.sql"* file within our repository to import to your database.
![Image8](/images/Im8.png)
4. Scroll down and click on *"Import"* and you've now connected the database to the website!