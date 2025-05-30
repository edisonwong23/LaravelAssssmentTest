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
## 📚 API Endpoints Documentation
| Method | Endpoint                | Description                  | Request Body / Query Params                                                        | Response                      |
| ------ | ----------------------- | ---------------------------- | ---------------------------------------------------------------------------------- | ----------------------------- |
| GET    | `/api/users`            | List all users               | Optional: `status` (query) to filter by active/inactive                            | JSON array of users           |
| POST   | `/api/users`            | Create a new user            | JSON with `name`, `email`, `phone_number`, `password`, `status`                    | Created user data + message   |
| GET    | `/api/users/{id}`       | Get details of a single user | None                                                                               | User data                     |
| PUT    | `/api/users/{id}`       | Update an existing user      | JSON with fields to update (`name`, `email`, `phone_number`, `password`, `status`) | Updated user data + message   |
| DELETE | `/api/users/{id}`       | Soft delete a user           | None                                                                               | Deletion confirmation message |
| POST   | `/api/users/bulkdelete` | Bulk delete users            | JSON with `ids` array of user IDs                                                  | Bulk deletion confirmation    |
| GET    | `/api/users/export`     | Export users to Excel file   | None                                                                               | Excel file download           |

## 📂 **Assumptions and Design Choices**
Soft Deletes: Users are soft deleted to allow recovery if needed and to maintain historical data integrity.

Validation: Strict validation rules are applied on user data (email uniqueness, phone number uniqueness, required fields) to ensure data consistency.

Password Handling: Passwords are hashed securely using bcrypt before storage; password updates are optional.

API Resource Routing: Used Laravel resource routes for RESTful API design to standardize endpoints.

Bulk Delete: Provided bulk delete functionality via a POST endpoint for efficient batch operations.

Filtering and Pagination: Filtering by status is supported to allow clients to query active or inactive users; pagination can be added as needed.

Export to Excel: Users can be exported to Excel format for reporting and data analysis.

No Authentication: API endpoints are publicly accessible for simplicity in this implementation; adding authentication is recommended for production.

Error Handling: Validation errors return HTTP 422 with descriptive messages; missing data or invalid requests respond with appropriate status codes.
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
## 📎 Dependencies
- PHP 8.1+
- Laravel 10+
- Laravel Excel
- PHPUnit
- MySQL (used for both development and testing)


---

Let me know if you want it customized further (e.g., links, Postman collection, or GitHub Actions for CI).
