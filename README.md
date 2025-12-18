Online Sales Platform

Afetim is a dual-role (seller/buyer) online sales platform built with PHP and MySQL. Sellers can publish products, buyers can place orders, and real-time notifications facilitate communication between parties.
✨ Features
Seller Features

    Publish and manage products

    Track orders

    Send "Shipped" notifications to buyers

    Sales management dashboard

Buyer Features

    Browse and search products

    Create orders

    Receive real-time notifications

    Track order status

System Features

    Dual-role user authentication (Seller/Buyer)

    Real-time notification system

    Order management workflow

    Product catalog management

    Admin dashboard

🚀 Technology Stack

    Backend: PHP 8.x

    Frontend: HTML5, CSS3, JavaScript, Bootstrap 5

    Database: MySQL

    Server: Apache

    Session Management: PHP Sessions

    Security: Password hashing, SQL injection prevention

📦 Installation
Prerequisites

    PHP 8.0 or higher

    MySQL 5.7 or higher

    Apache web server

    Composer (optional)

Setup Steps

    Clone the repository:

bash

git clone http://gitlab.tanersenturk.com.tr/jennifer-dotcom/afetim.git
cd afetim

    Configure database:

    Create MySQL database

    Import database schema from database/schema.sql

    Update database credentials in config/database.php

    Configure application:

bash

cp config/config.example.php config/config.php
# Edit config.php with your settings

    Set permissions:

bash

chmod 755 uploads/
chmod 644 config/config.php

    Access application:

    Open browser: http://localhost/afetim

    Default admin: admin@example.com / password123

🎯 User Workflow
Seller Flow

    Register as seller

    Add products with details

    Manage product listings

    Receive order notifications

    Update order status (Shipped/Delivered)

Buyer Flow

    Register as buyer

    Browse products

    Add to cart and checkout

    Receive order confirmations

    Get shipping notifications

🔧 Project Structure
text

afetim/
├── assets/
│   ├── css/           # Stylesheets
│   ├── js/            # JavaScript files
│   └── images/        # Images and icons
├── config/            # Configuration files
│   └── database.php   # Database settings
├── controllers/       # Business logic
├── models/           # Database models
├── views/            # HTML templates
│   ├── admin/        # Admin panel views
│   ├── seller/       # Seller dashboard views
│   └── buyer/        # Buyer interface views
├── uploads/          # File uploads directory
├── includes/         # Common functions
└── database/         # SQL files
    └── schema.sql    # Database schema

📱 Screenshots

(Add your screenshots here)

    Login Page: Dual role selection

    Seller Dashboard: Product management

    Buyer Interface: Product browsing

    Order Management: Status updates

🔐 Security Features

    Password encryption using password_hash()

    Prepared statements for SQL queries

    XSS prevention

    CSRF protection

    Session management

    File upload validation

📊 Database Schema

Main tables:

    users (with role: seller/buyer)

    products

    orders

    order_items

    notifications

    categories

🚀 Deployment
For Production:

    Update config/config.php with production settings

    Set secure database credentials

    Enable HTTPS

    Configure .htaccess for security

    Set proper file permissions

🤝 Contributing

    Fork the repository

    Create your feature branch (git checkout -b feature/amazing-feature)

    Commit your changes (git commit -m 'Add amazing feature')

    Push to the branch (git push origin feature/amazing-feature)

    Open a Pull Request

📄 License

This project is licensed under the MIT License - see the LICENSE file for details.
📞 Contact & Support

    Project Owner: Gadir

    Repository: http://gitlab.tanersenturk.com.tr/jennifer-dotcom/afetim.git

    Issues: Use GitLab issue tracker

🔄 Future Enhancements

    Mobile application

    Payment gateway integration

    Advanced analytics dashboard

    Multi-language support

    API for third-party integration

Last Updated: November 2025
