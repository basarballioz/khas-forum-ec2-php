# KHAS FORUM WEB APPLICATION
## Project Subject 
### Designing a special web- based forum platform for students at Kadir Has University.

## Solution Approach And What We Can Do ?

- Build a web application where students at Kadir Has University (not necessarily Kadir Has University) can ask each other questions and open topics in various categories and express their thoughts and ideas.

## Which Tech Stacks That We Used ?

- We used Php&MYSQL in back- end purposes and HTML5, CSS3, JS etc. stack for front- end purposes. This site is a dynamic web- site and thats why we used Php and Mysql. (Currently working in our local machine (XAMMP))

## The Steps We Take When We Were Doing The Project: - First, we created our database and required tables to build db infastructure.

- Then we built our website by using HTML5, CSS3, JS and connected to database that we created by using Php language.

## How Does The Site Work ?

- Users of the K- Has Forum can become a member of this site or log into their existing account. Thanks to the member login, users can create any title in the category they want and in this way, they can share their opinions on the subject and also gain knowledge on the opinions of others. Posts entered by users under this topic are saved by time and user name and are displayed to other users.These features are provided by extracting real- time data from the database.

## What Will We Do Now ?

- By creating a instance running php & mysql from organizations like Google Cloud, Azure or Amazon AWS, we'll make this forum platform that we've built locally available to all web users. In this way, we will be able to benefit from the benefits of cloud computing. So, our website will be reachable for all internet users in the web.

## Since the first report,

Previously, we set up our site to run on our own machine. Now, we're going to run this project that we've built on the local machine, in the cloud using the Amazon EC2 service, and anyone who wants to can access our site from outside.

## What Is Amazon EC2 ?

According to Wikipedia, Amazon Elastic Compute Cloud (EC2) is Amazon Web Services' cloud computing platform. The platform was established on August 25, 2006 and allows users to rent virtual computers where they can run their own computer applications.

## We can begin to explain how we migrated our project to the cloud,

First of all, after opening an Amazon account, we need to introduce our credit card and upgrade our account to approved account status.
After upgrading our account to free tier position, we will now be able to use amazon AWS services for free for a certain period of time. - What we need is the EC2 virtual server. Accordingly, we continue by typing Amazon EC2 in the search section.
- We select the launch instance from the screen that appears.

- There will be an area on the screen where we can select which operating system our virtual machine will run. The Linux- based Ubuntu 20.04 (x64) operating system will be selected from this screen. The reason we chose Linux is to be able to run our Php & Mysql project by installing XAMMP or LAMPP on a Linux- based computer. - We select the infrastructure of our machine on the next screen. We can choose hardware such as processor, ram, storage, but since we use free tier, we will continue by selecting the machine in the picture. Then click to "Review and Launch" button.

- After the last checks, we can start our machine. - After downloading our key, we can launch our instance. - We have successfully launched our machine, now we can press view and continue. - Our server is now ready but not accessible from the outside and also does not have a static IP. First, we will make our firewall settings and then define a unique ip address to our site from the Elastic IP section, so the ip will not change over time and will always remain constant. - We enter the "Secuirty Groups" tab on the left. - Our machine's name is launch- wizard- 2, we select it and continue. - Necessary settings must be made in the inbound** rules section. We continue with the " Edit Inbound Rules"** button.

- We add a new "Http" rule on the screen that appears and we always choose "Anywhere" option for SSH and always http, so the server will be accessible from outside.

- Now we need to define a Static IP for our site, for this we go to the Elastic IP tab. - We continue by pressing the Allocate** Elastic IP** address button on the screen that appears. - We leave without changing the default settings

After defining Associate Elastic IP address, we choose our machine and the ip address we have determined.

Our static ip address has been defined. Users who enter this IP address will now be able to access our site directly.

- Now we need to connect to our machine and set up a web server, so we right click on the machine we created in the instances tab and select "connect".

- We will connect using SSH. If you remember, there was a .pem file we downloaded at the beginning. This file is saved on the desktop and thanks to that file we will be able to connect to the server with SSH.

- When connecting to the server we need to use a command prompt that supports SSH. In this step we will use the "Git Bash" terminal.

- We are currently running a terminal in our ubuntu installed machine. With the sudo su command, we can have root privileges in one move.Thanks to the terminal, we can now install a server running Apache, Mysql on our machine, namely XAMPP or LAMPP.

- Be root with the sudo su command, then sudo apt- get update. Let's update before you start our packages with

- We need to stop the apache running by default so, we write the following command to the terminal and do it.

```
sudo /etc/inid.d/apache stop
```

- After stopping apache, we write the necessary lines for XAMMP installation.

```
cd Downloads wget https://www.apachefriends.org/xampp- files/7.0.23/xampp- linux- x64- 7.0.23- 0- installer.run sudo chmod +x xampp- linux- x64- 7.0.23- 0- installer.run (make run file executable) sudo ./xampp- linux- x64- 7.0.23- 0- installer.run (finally run our downloaded file)
```

- Finally after installing apache,we start our server with the command, , sudo /opt/lampp/lampp start

- Our server is running Apache now, but we need to solve some access problems. - With the http settings, we add the following lines and change the access settings for phpmyadmin to "all granted".

nano /opt/lampp/etc/extra/httpd- xampp.conf &lt;LocationMatch "^/(?i:(?:xampp|security|licenses|phpmyadmin|webalizer|server- status|server- info))"&gt; Order deny,allow Allow from all Allow from ::1 127.0.0.0/8
fc00::/7 10.0.0.0/8 172.16.0.0/12 192.168.0.0/16
fe80::/10 169.254.0.0/16 ErrorDocument 403 /error/XAMPP_FORBIDDEN.html.var &lt;/LocationMatch&gt;

- We reset the Apache Web Server sudo /opt/lampp/lampp restart

- Finally, we set the apache security settings sudo /opt/lampp/xampp security

Everything is ready now. All we have to do is connect to the server with FTP program (filezilla for example), copy our files to / opt / lampp / htdocs address and import our database with PhpMyAdmin. - To import our SQL Database, Access PhyMyAdmin at http://IP- Address/phpmyadmin/. Then create a new database named as "online- forum- database". We go to the import tab and select our khasforum.sql file and our database, which we created earlier (in the first report), is now imported. - Our last remaining job, FTP connection. We open FileZilla for file transfer - First we save our .pem file to the FileZilla - We make the necessary settings from the site management section and connect to our server.

- We put all the files of our project that we created earlier into the /opt/lampp/htdocs folder. - After making the necessary settings to connect to our database in the connect.php file, our site is now ready.

## The Distribution Of Tasks: - Project members created a web project by developing a repository on GitHub and writing the SQL codes needed for the project. When doing all this, members of the group used XAMMP, LAMPP, etc. built on their machines. After creating a web application through programs such as this, the project was moved to the Amazon EC2 virtual machine and the platform is now open to anyone.

### Credits: Başar Ballıöz – 20192305055 Aykut Güler – 20161708006 Şeyma Yıldız – 20172305024
### This project was made for IT321 – Cloud Computing
