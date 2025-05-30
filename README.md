# Laravel User Management API

This project is a RESTful API built with Laravel that provides full CRUD operations for managing users, including features like soft deletion, bulk deletion, export to Excel and filtering.

---

## 🚀 Project Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/edisonwong23/LaravelAssssmentTest.git

2. **Clone the repository**
   ```bash
   composer install  
3. **Copy and configure environment file**  
   ```bash
   cp .env.example .env  
   php artisan key:generate
4. **Configure your .env file**
      ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=root
5. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed  
6. **Serve the application**
   ```bash
   php artisan serve  

7. **Composer require maatwebsite/excel**
   ```bash
   composer require maatwebsite/excel  
8. **PHP artisan test**
    ```bash
    php artisan test
9. **L5 Swagger Installation**
    ```bash
    $ php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
    $ php artisan l5-swagger:generate
## 
| Method | Endpoint                | Description                                 |
| ------ | ----------------------- | ------------------------------------------- |
| GET    | `/api/users`            | List users with optional filter by `status` |
| POST   | `/api/users`            | Create a new user                           |
| GET    | `/api/users/{id}`       | Show a specific user                        |
| PUT    | `/api/users/{id}`       | Update a user                               |
| DELETE | `/api/users/{id}`       | Soft delete a user                          |
| POST   | `/api/users/bulkdelete` | Bulk soft delete users                      |
| GET    | `/api/users/export`     | Export users to Excel                       |


| Field          | Type   | Required                        | Notes                  |
| -------------- | ------ | ------------------------------- | ---------------------- |
| `name`         | string | Yes                             |                        |
| `email`        | string | Yes                             | Must be unique         |
| `phone_number` | string | Yes                             | Must be unique         |
| `status`       | string | Yes                             | `active` or `inactive` |
| `password`     | string | Yes (create), Optional (update) | Minimum 8 characters   |


## 📂 **Assumptions and Design Choices**
No Authentication: All endpoints are publicly accessible for demonstration purposes.

Soft Deletes: Users are soft deleted, allowing for possible future restoration.

Validation Requests: Laravel FormRequest classes are used to handle validation logic cleanly.

Bulk Operations: Bulk deletion accepts a JSON array of IDs.

Excel Export: Data can be exported using Laravel Excel.

Testing: Feature and unit tests are included for core functionality.

Status Handling: status field is a string (active or inactive) stored directly in the database.

Password Hashing: Passwords are automatically hashed when provided.

## ✅ Documentation

- The API is documented using Swagger UI and available at:  
  [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)

- All endpoints include parameters, responses, and schema references.

- Setup and usage instructions are provided in this README.

This ensures that the project is easily understandable, installable, and testable by any developer.


## 🧪 **Running Tests**

Ensure the test environment is configured and run:
```bash
php artisan test
```
📎 Dependencies
Laravel 10+

Laravel Excel

PHP 8.1+

SQLite (for testing)

PHPUnit


---

Let me know if you want it customized further (e.g., links, Postman collection, or GitHub Actions for CI).
