# 🍽️ MessMate: Hostel Mess Committee Helper

MessMate is a web application that helps the hostel mess committee to manage the mess efficiently. It provides a platform for the mess committee to get feedback, view & update the mess menu, and manaage inventory of the raw materials used in mess. The application is built using PhP, MySQL, HTML, CSS, and JavaScript.

## 📚 Table of Contents  

- [Features](#features)
- [Installation](#installation)
- [License](#license)

## 🚀 Features

- **Feedback System**: Students can provide feedback on the mess food quality, cleanliness, etc.
- **Mess Menu**: Mess committee can view and update the mess menu.
- **Inventory Management**: Mess committee can manage the inventory of raw materials used in the mess.
- **Admin Panel**: Admin can view the feedback, mess menu, and inventory.
- **User Authentication**: Users need to login to provide feedback and request to alter mess manu.

## ⚙️ Installation

1. Clone the repository

```bash
git clone https://github.com/bhupesh98/mess-mate.git
```

2. Import the database

- Create a new database in MySQL
- Import the `project_sql_queries.sql` file to the database

3. Update the database credentials

- Create `config.php` file
- Update the database credentials as show as follows:

```php
<?php
// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'your_database_name');
?>
```

4. Run the application

- Install Apache and MySQL server using [XAMPP](https://www.apachefriends.org/index.html)
- Move the project folder to the Apache server directory usually in `C:\xampp\htdocs`
- Start the Apache and MySQL server
- Open the browser and go to `http://localhost/mess-mate`

> [!Note]: Seed the database with some data before running the application present in `project_sql_queries.sql` commented at the end of the file.

## 📝 License

This project is licensed under the MIT License - see the [LICENCE](LICENCE) file for details.  
