username:aditya
password:123

# Anime Merchandise E-Commerce Website

An anime-themed e-commerce platform for selling products like clothing, necklaces, and keychains. This project includes features for customers, sellers, delivery personnel, and admins. Users can also place orders for custom-designed merchandise.

## 🛒 Project Overview

This web application is designed to facilitate the online buying and selling of anime merchandise. The system supports multiple user roles and includes all essential e-commerce features like product listing, order management, admin dashboard, seller management, and delivery tracking.

### 💡 Key Features

- **Customer Site**
  - Browse and search anime-related products
  - Add to cart and place orders
  - Submit custom product orders
  - Track order history

- **Seller Site**
  - Manage products (Add/Edit/Delete)
  - View and fulfill orders
  - Track sales

- **Admin Site**
  - Manage users (customers, sellers, delivery boys)
  - Approve new sellers
  - Handle product categories
  - Site analytics & reports

- **Delivery Boy Site**
  - View assigned deliveries
  - Update delivery status
  - Confirm completed orders

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, Bootstrap, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server Environment:** WAMP64 (Windows, Apache, MySQL, PHP)

## 📦 How to Run

1. **Clone the repository**
   ```bash
   git clone https://github.com/Adi3500/.git
````

2. **Set up WAMP Server**

   * Install [WAMP64](https://www.wampserver.com/en/)
   * Move the project folder to `C:/wamp64/www/`

3. **Database Setup**

   * Open phpMyAdmin at `http://localhost/phpmyadmin`
   * Create a new database (e.g., `anime_store`)
   * Import the provided `.sql` file (if available)

4. **Run the Project**

   * Start WAMP services
   * Visit `http://localhost/your-project-folder/`

## 📁 Project Structure

```
anime-ecommerce/
├── admin/
├── customer/
├── seller/
├── delivery/
├── assets/
├── includes/
├── db/             # Database connection files
└── index.php       # Homepage
```

## 📌 Future Improvements

* Add user review and rating system
* Integrate payment gateway
* Enhance UI/UX with animations
* Enable product filtering and sorting
* Add mobile responsiveness

## 📃 License

This project is for educational purposes only.

---

### 👨‍💻 Developed By

* Aditya Vishwakarma (Currently pursuing MCA, BCA Graduate)

```

