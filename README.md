# TinyBloggers - A News Blog Application

[![Live Demo](https://img.shields.io/badge/Live-Demo-brightgreen)](http://tinyblogger.alchosting.xyz/) ![License](https://img.shields.io/badge/license-MIT-blue)

## Table of Contents
- [Project Overview](#project-overview)
- [Key Features](#key-features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Running the Project](#running-the-project)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [Contact](#contact)

## Project Overview
TinyBloggers is a news blog platform where admins can post articles, and users can view and search content. It features OTP verification during login for both admins and users, and content moderation that ensures inappropriate posts cannot be published. This project aims to provide a safe and secure platform for news articles, ensuring only verified users and admins can interact with the system.

## Key Features
- **User/Admin Login with OTP Verification**: Secure login process that includes a one-time password sent to the user's email.
- **Content Moderation**: Automatic flagging of inappropriate content with an error message: _"The content is inappropriate, please edit and publish again."_
- **Account Verification**: Users must verify their email during registration before gaining access to the platform.
- **Admin Panel**: Full access to manage posts, topics, and users.
- **Search and View Posts**: Posts can be searched by topic or keywords, with trending and recent posts displayed on the homepage.

## Technologies Used

This project is built using a variety of technologies:

- ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white) HTML
- ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white) CSS
- ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black) JavaScript
- ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white) PHP
- ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white) MySQL
- ![Apache](https://img.shields.io/badge/Apache-D22128?style=flat&logo=apache&logoColor=white) Apache
- ![Composer](https://img.shields.io/badge/Composer-885630?style=flat&logo=composer&logoColor=white) Composer

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Venkat-Siva-Prasad-Reddy-Eppagunta/TinyBlogger.git
2. Navigate to the project directory:
   ```bash
   cd tinybloggers
3. Install dependencies using Composer:
   ```bash
   composer install
4. Set up the MySQL database and import the SQL file.
5. Update the configuration file for database and email settings.

## Running the Project
1. Start the Apache and MySQL services (if using XAMPP, start them from the control panel).
2. Open your browser and go to `http://localhost/tinybloggers` to access the application.

## Usage

### User/OTP Verification
- **Registration**: New users must verify their email to activate their account.
- **Login**: Users and admins must verify their login with an OTP sent to their registered email.
- **Post Login**: Upon successful OTP verification, users can access their panel to view posts, while admins can manage posts, users, and topics.

### Admin Panel
- **Manage Users**: Admins can add, update, or delete users.
- **Manage Posts and Topics**: Admins can create, update, or delete posts and topics.
- **Content Moderation**: If an admin tries to publish inappropriate content, the post will be flagged as unpublished, and an error message will be displayed: _"The content is inappropriate, please edit and publish again."_

### Common Tasks
Here are some common tasks that users and admins might perform:

- **Creating a New Post**:
  1. Log in to the admin panel.
  2. Navigate to the "Posts" section.
  3. Click on "Add New Post".
  4. Fill in the details and hit "Publish".

- **Resetting Your Password**:
  1. Go to the login page.
  2. Click on "Forgot Password".
  3. Enter your email address and check your inbox for the reset link.

## Screenshots

Here are some screenshots of the application:

## Screenshots

### Home Page
<img src="/Project/Home%20Page.png" alt="Home Page" width="300" style="margin-right: 20px;"/>

### Admin Panel
<img src="/Project/Admin%20Pannel.png" alt="Admin Panel" width="300" style="margin-right: 20px;"/>

### Post Page
<img src="/Project/Post%20page.png" alt="Post Page" width="300" style="margin-right: 20px;"/>

### Register Page
<img src="/Project/Register%20Page.png" alt="Register Page" width="300" style="margin-right: 20px;"/>

### Login Page
<img src="/Project/Login%20Page.png" alt="Login Page" width="300" style="margin-right: 20px;"/>

### OTP Verify Page
<img src="/Project/otp%20verify.png" alt="OTP Verify Page" width="300" style="margin-right: 20px;"/>


## Contributing

We welcome contributions! Here’s how you can help:
1. Fork the repository.
2. Create a new branch for your feature or fix.
3. Make your changes.
4. Submit a pull request.

## Contact

- **Venkat Siva Prasad Reddy Eppagunta**
- GitHub: [![GitHub](https://img.shields.io/badge/GitHub-Venkat_Siva_Prasa_Reddy_Eppagunta-black?style=flat&logo=github&logoColor=white)](https://github.com/Venkat-Siva-Prasad-Reddy-Eppagunta)
- LinkedIn: [![LinkedIn](https://img.shields.io/badge/LinkedIn-Venka_Siva_Prasa_Reddy_Eppagunta-blue?style=flat&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/venkata-siva-prasad-reddy-eppagunta-1b25ab168/)

