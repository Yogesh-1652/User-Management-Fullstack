# User Management API (Laravel)

This is a Laravel REST API for managing users — providing CRUD operations, validation, and API testing.

## 🚀 Features
- User registration
- User listing (all + single)
- Update user details
- Delete user
- Email uniqueness validation
- API tests using PHPUnit

📁 Project Structure
This repository contains two separate projects:

1️⃣ Backend (Laravel) Details
  The backend is built using Laravel and provides the RESTful API for managing users.
  
  Key components:
  
  Routes → defined in routes/api.php
  
  Includes routes for listing users, creating, updating, deleting, and fetching individual users.
  
  Also includes a custom route for clearing cache/routes if needed.
  
  Models → located in app/Models/User.php
  
  Defines the User model and its attributes.
  
  Controllers → located in app/Http/Controllers/UserController.php
  
  Contains all the core logic for user CRUD operations.
  
  Database connection → handled via the .env file
  
  Make sure to configure the .env with your local or production database settings:
  
  env
  Copy
  Edit
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=user_management
  DB_USERNAME=root
  DB_PASSWORD=
  Migrations → located in database/migrations
  
  Define the schema for the users table.
  
  Factories → located in database/factories/UserFactory.php
  
  Used to seed fake user data for testing.
  
  Feature Tests → located in tests/Feature/UserApiTest.php
  
  Automated tests to ensure API endpoints work correctly.

2️⃣ Frontend (Vue.js)

  Located in the user-management-frontend folder.
  
  Contains all the frontend components such as:
  
  Dashboard: Displays a list of all users.
  
  Create User: Form to add a new user.
  
  Edit User: Form to update existing user details.
  
  Delete User: Option to remove a user.
  
  All frontend components can be found inside the src folder of the Vue project.
  
  The frontend interacts with the backend API to perform CRUD operations.


| Method | Endpoint        | Description     |
| ------ | --------------- | --------------- |
| GET    | /api/users      | List all users  |
| GET    | /api/users/{id} | Get single user |
| POST   | /api/users      | Create new user |
| PUT    | /api/users/{id} | Update user     |
| DELETE | /api/users/{id} | Delete user     |


[[User-Management-fullstack/user-management-backend/resources/screenshots/1.png](https://postimg.cc/PChbwX9Z)](https://i.postimg.cc/RZJg2qTP/1.png)  
[url=https://postimg.cc/xXtmNKKD][img]https://i.postimg.cc/xXtmNKKD/2.png[/img][/url]  
https://postimg.cc/ygS3Gt2s  
https://postimg.cc/JHNDrJ1F  
https://postimg.cc/hXyJtKBK  


“You can import the provided `database/user_management.sql` to preload demo data.”



