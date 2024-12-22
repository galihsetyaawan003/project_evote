E-Voter System

This repository contains the E-Voter System, a web application built using Laravel and the SB Admin Boilerplate. The system is designed to streamline electronic voting processes with intuitive user management and comprehensive features for handling candidates and voters.

Features

1. User Management

Admin can create, update, and delete user accounts.

Role-based access control (Admin, Voter, etc.).

Secure authentication and authorization system.

2. Candidate Management

Add, update, and remove candidates.

Display candidate profiles with relevant information.

Manage candidate eligibility and status.

3. Voter Management

Register and manage voter details.

Secure voting process ensuring one vote per user.

Track voting activity and status.

4. Dashboard

Comprehensive dashboard for admins to monitor activities.

Real-time statistics on voters, candidates, and voting outcomes.

5. Responsive Design

Fully responsive interface, accessible on desktops, tablets, and mobile devices.

Technologies Used

Framework: Laravel (PHP)

Frontend: SB Admin Bootstrap Template

Database: MySQL

Version Control: Git

Installation

Prerequisites

PHP >= 8.0

Composer

MySQL

Node.js & npm (for frontend assets)

Steps

Clone the repository:

git clone https://github.com/your-username/e-voter.git
cd e-voter

Install dependencies:

composer install
npm install
npm run dev

Configure environment variables:

Copy .env.example to .env:

cp .env.example .env

Update .env file with your database and other configurations.

Run database migrations and seeders:

php artisan migrate --seed

Start the development server:

php artisan serve

Access the application at:

http://localhost:8000

Usage

Login as an admin to configure the system.

Manage users, candidates, and voters through the admin dashboard.

Start and monitor the voting process.

Contribution

We welcome contributions to improve this project. To contribute:

Fork the repository.

Create a new branch for your feature/bugfix:

git checkout -b feature-name

Commit your changes and push to your forked repository.

Submit a pull request.

License

This project is open-source and available under the MIT License.

Contact

For any inquiries, please contact:

Email: galihsetyaawan003@gmail.com

GitHub: galihsetyaawan003.gmail

Thank you for checking out the E-Voter System. We hope it helps make your voting process more efficient and secure!