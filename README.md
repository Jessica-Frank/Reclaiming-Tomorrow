# Reclaiming Tomorrow
A capstone project by Jessica Frank, Kristin Catell, Henry Huerta, Atsoupe Bessou-kpeglo, and Kayla Kirkly.

Reclaiming Tomorrow simplifies recycling for those eager to start but unsure where to go. Finding information on local recycling centers can be a challenge when there is often no central resource to find this information. Our website simplifies the recycling process by providing a map of local recycling centers that accept your materials and information about county recycling programs. We also give users the opportunity to share their reviews of recycling centers and earn rewards by recycling through our recycling rewards program. Admins can edit any data on the website to update and correct information.

## Technology
Languages: PHP, MYSQL, HTML, CSS, and Javascript

Libraries: Bootstrap and Leaflet

Tools: XAMPP

This project contains code taken from PHPMailer and Composer

## Usage
- This project can be hosted locally with XAMPP by changing by changing the settings that locate the Apache root directory to match the directory this project has been installed in. 
- Most of the website will require that the database is set up, which can be done by accessing phpMyAdmin (the database management tool included with XAMPP) and running the reclaiming_tomorrow_db.sql file located in the main directory for this project.
- For the password reset component to work, you should need to change the email and password used if the credentials are changed from the public data in this repository. That data can be changed in /verify/mailer.php
Note: this project assumes that the default database credentials have not been changed. If you have changed your credentials this project may not work.
