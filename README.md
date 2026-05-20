# Insurance Management Website

A web-based insurance management system developed using PHP and MySQL.  
This application helps users manage insurance services, customer information, and policy records through a simple and responsive interface.

---

## Features

- User registration and login
- Insurance policy management
- Customer information management
- Admin dashboard
- User dashboard
- Home Page
- Responsive design
- Secure database connection

---

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/medo5000/assurance.git
```

### 2. Move project to htdocs

Copy the project folder into:

```text
xampp/htdocs/
```

### 3. Create Database

Open phpMyAdmin and create a database named:

```text
assurance_3
```

### 4. Import SQL File

Import the SQL file located in:

```text
assurance_3.sql
```

### 5. Start Server

Run:
- Apache
- MySQL

from XAMPP Control Panel.

### 6. Open in Browser

```text
http://localhost/Assurance
```

---

## Project Structure
- Admin :
```text
Assurance/ADMIN
│
├── assets/
│  ├── css/
│  ├── js/
│  ├── img/
│  └── vendor/
├── doc/
├── tc/
├── index.php
├── login.php
├── config.php
│...
```
- Home Page :
```text
Assurance/homepage
│
├── CLIENT/
├── assets/
│  ├── css/
│  ├── js/
│  ├── img/
│  └── vendor/
├── index.php
├── login.php
├── signup.php
├── config.php
└── login/
  ├── assets/
  ├── css/
  ├── js/
  ├── img/
  └── vendor/
```
- User :
```text
assurance/homepage/CLIENT
│
├── index.php
├── assets/
│  ├── css/
│  ├── js/
│  ├── imag/
│  └── vendor/
├── config.php
├──  assurance.php
│...
```
---

## Screenshots

### Home Page

![Home Page](image/Homepage.png)

### Login page

![Login](image/Login.png)

### Signup page

![Signup](image/Signup.png)

### Admin Dashboard

![Dashboard Admin](image/Admin_Dashboard.png)

### User Dashboard

![Dashboard User](image/User_Dashboard.png)

---

## Future Improvements

- PDF policy generation
- Authentification

---
## Errors
- make sure your config is : 
```text
$db = mysqli_connect("localhost","root","","assurance_3",3307);
```
also put this every config exists on this code for evite errors
- Also I mistake in name files php, so check name file in link (aside in HTML) first after go search for name file php 
---
## Author

AZIZI Mohamed

GitHub: https://github.com/medo5000

---

## License

This project is for educational purposes, and this is my first project.
  
