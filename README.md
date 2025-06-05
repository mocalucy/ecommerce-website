# 🛒 E-commerce Website (Admin + User Interfaces)

This project is a basic PHP-based e-commerce website that includes both **admin** and **user** interfaces. It features product browsing, a shopping cart, and order management, all connected through a MySQL database (`config.php`).

---

## 📂 Structure

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL (configured in `config.php`)

---

## 👤 Admin Panel

- Access via `admin.php`
- **Login credentials**:  
  - Email: `admin@gmail.com`  
  - Password: `qwerty`

### Admin Features

- **Dashboard**: Overview of orders, products, users, and messages  
- **Products**: Add and edit product listings  
- **Orders**: View all confirmed orders and update their status  
- **Users**: View registered user information  
- **Contact**: Read messages submitted through the contact form  

---

## 🛍️ User Interface

- Access via `home.php`

### User Features

- **Login / Register** to add products to cart  
- **Shop**:  
  - Browse all products  
  - Filter by category  
- **Search**:  
  - Use the top-right search icon  
  - Search by product name or brand  
- **Cart**:  
  - View previously added items  
  - Update quantity or remove items  
  - Use "Continue Shopping" to return to the shop  
- **Logout** via the user icon in the top right

---

## 📱 Responsive Design

The website supports multiple screen sizes:
- Desktop  
- Tablet  
- Mobile

---

## ⚙️ Setup Instructions

1. Import the SQL database
2. Edit `config.php` to match your MySQL credentials
3. Run using a PHP server (e.g., XAMPP / MAMP)
4. Open `home.php` in browser for user side or `admin.php` for admin side

---

## 📬 Contact

Maintained by [@mocalucy](https://github.com/mocalucy)  
Feel free to fork or contribute!
