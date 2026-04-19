# 🍔 Canteen Management System

## Project Objective
The Canteen Management System is a web-based application designed to automate food ordering and management within a college or institutional canteen.

**Key Objectives:**
- Allow students to register and log in securely
- Enable users to browse food items and place orders online
- Provide real-time order tracking and status updates
- Maintain a structured database of users, food items, and orders
- Reduce manual ordering and waiting time in canteens
- Improve efficiency and accuracy in order management

This project demonstrates backend API development, database management, and frontend integration using PHP and MySQL.

---

## Team Members

| Sr. | Registration Number | Name              |
|-----|---------------------|-------------------|
| 1   | RA2411028030040           | Aman Singh         |
| 2   | RA2411028030042           | Akshit Bishnoi     |
| 3   | RA2411028030043           | Madhav Sharma      |


---

## Repository Folder Structure

| Sr. | Description         | Link                                      |
|-----|---------------------|-------------------------------------------|
| 1   | **Project Code**     | [📁 `/src`](./src)                       |
| 2   | **Project Report**   | [📄 `Project_Report.pdf`](./Project_Report.pdf) |
| 3   | **Project PPT**      | [📊 `Project_Presentation.pptx`](./Project_Presentation.pptx) |

---

## 📁 Detailed Folder Structure (Project Code)

```plaintext
canteen-management-system/
├── src/
│   ├── backend/              # PHP APIs (login, register, orders)
│   │   ├── login_api.php
│   │   ├── register_api.php
│   │   ├── get_users.php
│   │   └── order_api.php
│   │
│   ├── frontend/             # UI Pages
│   │   ├── login.php
│   │   ├── register.php
│   │   ├── dashboard.php
│   │   ├── menu.php
│   │   ├── orders.php
│   │   └── thankyou.php
│   │
│   ├── assets/               # Images, icons
│   ├── css/                  # Stylesheets
│   ├── js/                   # JavaScript files
│   ├── config/               # DB connection
│   │   └── db.php
│   │
│   └── database/
│       └── canteen_db.sql    # Database schema
│
├── docs/
│   ├── Project_Report.pdf
│   └── Project_Presentation.pptx
│
├── screenshots/              # UI screenshots
└── README.md
```
## 📸 UI Screenshots

### 🔐 Login Page
![Login Page](images/login.png)

### 📝 Register Page
![Register Page](images/register.png)

### 🍔 Menu Page
![Menu](images/menu.png)

### 📦 Orders Page
![Orders](images/orders.png)

### ✅ Thank You Page
![Thank You](images/thankyou.png)


---

## Steps to Run the Project

### Prerequisites
- XAMPP / WAMP / LAMP
- PHP 8+
- MySQL
- Web Browser (Chrome recommended)

---

### Step-by-Step Installation

#### 1. Clone Repository
```bash
git clone https://github.com/imadhavsharma/canteen-management-system.git
