
---

#### This is the reader's manual for using and editing this software project as you may like!

---  

<br/>

# About the Project  

This is a **PHP** server based ERP package which focuses on functions regarding inventory management of a library as well as the students/librarians and teachers dealing with the setup. There is also a superadmin panel which can be accessed to manipulate the credentials of the users as well as managing the list.

The basic functions include :
- Librarian management who accesses the system
  
- Teacher and student list management
  
- Book inventory management
  
- Return/Issue of the books (*to be implemented*)


---

## Prerequisites before using this software :

1. Make sure you have a web server environment correctly setup on your local/remote machine.  
   
2. XAMPP is the recommended Apache and MySQL distribuition tested to be working with the project.  
   
3. You have access to a web browser present on the server machine to test or the remote client machine connected to the network.
   
   

---

## Compiling and Running :

1. Put the contents of this repository into a folder of your choice in the **htdocs** location (*or similar document root location of your web server*) of your webserver installation.
     
2. Import MySQL database from "database_backup" folder into your MySQL server installation.
     
3. After making sure both database and htdocs are present, fire up the mysql server and web server on the host machine.
     
4.  From the local browser or remote browser, navigate to the web address of the website and open `home.php` to begin with.

---

### Important Usage Instructions : 

- You can use the username "administrator" and password "adminpass" to login to the super-admin panel for the first time.
From there, you can create/manage new accounts to work upon.

- **Allow the popups to run on the site** (if your browser blocks them) as the operations would be impossible without the JS popups which achieve the functionality. The site wouldnt work correctly without allowing the popups to arrive.

- You can also edit the SQL server address and credentials in the connection objects on respective pages if they are different for your setup.

---

## Screenshots

<p float="left">
   <img src="https://github.com/sunnysoni97/sunnysoni97.github.io/blob/master/static/skills_applied/portfolio_screencaps/libman_screencaps/cap1.png?raw=true" alt="libman php screenshot 1" width=300px />
    &emsp;
   <img src="https://github.com/sunnysoni97/sunnysoni97.github.io/blob/master/static/skills_applied/portfolio_screencaps/libman_screencaps/cap2.png?raw=true" alt="libman php screenshot 2" width=300px />
</p>
<p float="left">

   <img src="https://github.com/sunnysoni97/sunnysoni97.github.io/blob/master/static/skills_applied/portfolio_screencaps/libman_screencaps/cap3.png?raw=true" alt="libman php screenshot 3" width=300px />
    &emsp;
   <img src="https://github.com/sunnysoni97/sunnysoni97.github.io/blob/master/static/skills_applied/portfolio_screencaps/libman_screencaps/cap4.png?raw=true" alt="libman php screenshot 4" width=300px />

</p>
   
   <img src="https://github.com/sunnysoni97/sunnysoni97.github.io/blob/master/static/skills_applied/portfolio_screencaps/libman_screencaps/cap5.png?raw=true" alt="libman php screenshot 5" width=300px />


---

## Note for the Developers : 

- `home.php` is the entry point of the website.

- Names of all the pages and popups are easy to understand their functionality. They can be edited as per the developer's requirements.

- You can complete the `issue_book.php`,`return_book.php` as well as `view_log.php` to complete the described functionality of book issue/return operations. Make the approriate changes in the database schema as well to comply with the front-end changes.
  
---

Feel free to try out my project, make your own implementations, suggest changes and modification and help in improving my project. :)

---

**P.S.** : *Hail the internet for all the awesome resources and information present on anything you want to learn. My whole hearted gratitude to everybody who made it possible for me to complete this project of mine.* :)

---
