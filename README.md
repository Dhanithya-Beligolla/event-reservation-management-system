
# Event Management System

This is a web-based Event Management System designed for an event management company to streamline the process of managing users, bookings, and events. It includes functionality for both **customers** and **admins**, allowing seamless interaction and management.

---

## Features

### **Customer**
1. **User Registration & Login**:
   - Customers can register with their full name, email, mobile number, and password.
   - Secure login to access their dashboard.

2. **Dashboard**:
   - Displays the customer's details and provides navigation to:
     - **View Events**: Browse and book events.
     - **View My Bookings**: View, update, or delete their bookings.

3. **Booking Events**:
   - Customers can book events by selecting an event and filling out their details in a pre-filled booking form.

4. **Manage Bookings**:
   - Customers can view all their bookings.
   - Update mobile numbers or delete bookings if needed.

---

### **Admin**
1. **Admin Registration & Login**:
   - Admins can register and log in to manage the system.

2. **Admin Dashboard**:
   - Provides navigation to:
     - **View All Users**: Display a list of all registered customers.
     - **Manage Events**:
       - View all events.
       - Create, update, or delete events.
     - **View All Bookings**: Display all bookings with details.

---

## Project Structure

```
event-management-system/
│
├── index.php                 # Homepage with Admin and Customer login options
├── admin-login-page.php      # Admin login page
├── admin-register-page.php   # Admin registration page
├── admin-dashboard.php       # Admin dashboard
├── registerpage.php          # Customer registration page
├── login-page.php            # Customer login page
├── dashboard.php             # Customer dashboard
├── events.php                # Customer events page
├── booking-form.php          # Customer booking form
├── my-bookings.php           # Customer bookings page
├── view-users.php            # Admin view users page
├── view-events.php           # Admin manage events page
├── create-event.php          # Admin create event page
├── update-event.php          # Admin update event page
├── delete-event.php          # Admin delete event page
├── view-bookings.php         # Admin view bookings page
│
├── css/
│   ├── styles.css            # Styling for the project
│
├── php/
│   ├── db.php                # Database connection
│   ├── register.php          # Customer registration logic
│   ├── login.php             # Customer login logic
│   ├── admin-register.php    # Admin registration logic
│   ├── admin-login.php       # Admin login logic
│   ├── add-booking.php       # Booking submission logic
│   ├── update-booking.php    # Booking update logic
│   ├── delete-booking.php    # Booking deletion logic
│   ├── admin-logout.php      # Admin logout
│   ├── logout.php            # Customer logout
│
├── icons/                    # Icons for the homepage
│   ├── admin-icon.png        # Icon for Admin login card
│   ├── customer-icon.png     # Icon for Customer login card
```

---

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL (via phpMyAdmin)
- **Server**: XAMPP

---

## Database Schema

### 1. **`users` Table**
Stores customer information:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mobilenumber VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

### 2. **`admins` Table**
Stores admin credentials:
```sql
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

### 3. **`events` Table**
Stores event information:
```sql
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    venue VARCHAR(255) NOT NULL
);
```

### 4. **`bookings` Table**
Stores customer bookings:
```sql
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    mobilenumber VARCHAR(15) NOT NULL,
    booking_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (event_id) REFERENCES events(id)
);
```

---

## Setup Instructions

### 1. Install XAMPP
1. Download and install **XAMPP** from [Apache Friends](https://www.apachefriends.org/).
2. Start the Apache and MySQL services from the XAMPP control panel.

---

### 2. Clone or Download the Project
1. Clone the repository or download it as a ZIP file.
   - To Clone:
   copy this and run in your terminal or cmd
   ```
   git clone https://github.com/Dhanithya-Beligolla/event-reservation-management-system.git
   ```
3. Place the project folder in the `htdocs` directory of your XAMPP installation:
   ```
   C:/xampp/htdocs/event-management-system/
   ```

---

### 3. Import the Database
1. Open [phpMyAdmin](http://localhost/phpmyadmin/) in your browser.
2. Create a new database named `event_management`.
3. Run above queries to create tables.

---

### 4. Configure the Database Connection
1. Open `php/db.php` and configure the database connection:
   ```php
   $host = "localhost";
   $username = "root";
   $password = ""; // Leave empty if using XAMPP default
   $dbname = "event_management";

   $conn = new mysqli($host, $username, $password, $dbname);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ```

---

### 5. Access the Project
1. Open your browser and navigate to:
   ```
   http://localhost/event-management-system/
   ```

2. Use the homepage to log in as either an **Admin** or a **Customer**.

---

## Admin Functionality

### 1. Register as Admin
Navigate to `admin-register-page.php` to register a new admin account.

### 2. Login as Admin
Navigate to `admin-login-page.php` and log in with your admin credentials.

### 3. Manage Events
- Navigate to the **Admin Dashboard**.
- Use the links to view, create, update, or delete events.

### 4. Manage Users and Bookings
- View all registered users and their details.
- View all bookings made by customers.

---

## Customer Functionality

### 1. Register as Customer
Navigate to `registerpage.php` to register as a customer.

### 2. Login as Customer
Navigate to `login-page.php` and log in with your customer credentials.

### 3. Book Events
- View available events and click **Book Now** to book an event.
- Enter your mobile number and submit the booking.

### 4. Manage Bookings
- Navigate to **My Bookings** to view, update, or delete your bookings.

---

## Icons

Icons used in the project are stored in the `icons/` folder:
- **Admin Login Icon**: `admin-icon.png`
- **Customer Login Icon**: `customer-icon.png`

Download suitable icons from [Icons8](https://icons8.com/) or [Font Awesome](https://fontawesome.com/).

---

## Contribution Guidelines

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request with a clear description of your changes.

---

## License

This project is open-source and available for personal and educational use.

---
