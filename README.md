<a href="https://www.buymeacoffee.com/mubeenahmad" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="width: 150px" ></a>

# **Resume Builder Laravel**

## **About Project**
It is a web application that allows users to create, read, update, and delete (CRUD) their resumes. The project would utilize the Laravel framework and include features such as form for users to input their resume information, and the ability to view, edit, and delete their resumes.
<br />

## **How To Run The Project**

<br />

### **Step 1: Install PHP and Web Server**
XAMPP is a free and open-source cross-platform web server. XAMPP is a software package that includes Apache, PHP, and MariaDB (a fork of MySQL). When you install XAMPP, you are installing all of these components at the same time. PHP is included in the package, so you do not need to install it separately.
- Download XAMPP from the Apache Friends website. ([Download XAMPP](https://www.apachefriends.org/download.html))
- Run the downloaded installer file.
- Choose the components you want to install (e.g. Apache, MySQL, PHP).
- Choose the installation location.
- Click "Install" to begin the installation process.

<br />

### **Step 2: Install Composer**
Composer is a dependency manager for PHP and is used to install Laravel and its dependencies. You can download Composer from the given link and install it according to the instructions provided. ([Download Composer](https://getcomposer.org/download/))

<br />

### **Step 3: Clone the Laravel project**
Clone the Laravel project from a repository or download it as a zip file and extract it to your machine.

#### **Copy GitHub repository link**

![Copy GitHub repository link](screenshots/step_1.png)

#### **Open Xampp/htdocs folder and open terminal**

![Open Xampp/htdocs](screenshots/step_2.png)

#### **Clone repository**

![Clone repository](screenshots/step_3.png)

<br />

### **Step 4: Navigate to the Project directory**
Navigate to the root directory of your Laravel project and open terminal.

#### **Open Project directory**

![Navigate to the Project directory](screenshots/step_4.png)

#### **Open terminal**

![Navigate to the Project directory](screenshots/step_5.png)


### **Step 5: Install required dependencies**
Run the following command to install the required dependencies:

    $ composer install

![Run composer install command](screenshots/step_6.png)

### **Step 6: Copy .env.example file**
Copy the .env.example file to a new file called .env.

    $ cp .env.example .env

![Copy .eve.exmaple file to .env file](screenshots/step_7.png)

### **Step 7: Generate Application Key**
Run the following command to generate an application key:

    $ php artisan key:generate

![Run command php artisan key:generate](screenshots/step_8.png)

### **Step 8: Open XAMPP Control Panel and Run Services**
Open XAMPP Control Panel and start Apache and MySQL services.

![XAMPP Control Panel](screenshots/step_9.png)

### **Step 9: Create Database and update the database connection settings**
Open phpMyAdmin and create a new database. In the .env file, update the database connection settings to match your local database setup.

![Create Database](screenshots/step_10.png)

![Update connection setting](screenshots/step_11.png)

### **Step 10: Migrate all migrations**
Run the following command to migrate the database:

    $ php artisan migrate

![Migrate database](screenshots/step_12.png)

### **Step 11: Start Development Server**
Finally, start the development server by running the following command:

    $ php artisan serve

![Start Server](screenshots/step_13.png)

![Start Server](screenshots/step_14.png)

<br />

## **Here are some output images:**


### **Disply all Records**

![Disply Records](screenshots/all_records.png)

### **Create new Records**

![Create new Records](screenshots/create.png)

### **Edit all Records**

![Edit Records](screenshots/edit.png)

### **View Single Records**

![View Records](screenshots/view.png)

<br />

## **Show your support**

Give a ⭐ if you like this website!

<a href="https://www.buymeacoffee.com/mubeenahmad" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;" ></a>