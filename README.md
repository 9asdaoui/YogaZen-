# YogaZen API

YogaZen is a yoga studio management system that provides a RESTful API for managing courses, subscriptions, and users.

## Table of Contents
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [API Documentation](#api-documentation)
    - [Authentication](#authentication)
    - [Courses](#courses)
    - [Subscriptions](#subscriptions)
- [Scheduled Commands](#scheduled-commands)

## Requirements
- PHP 8.0+
- Laravel 10.x
- Composer
- Database (MySQL, PostgreSQL, etc.)
- JWT Authentication

## Installation
1. Clone the repository:
```bash
git clone https://github.com/yourusername/yogazen.git
cd yogazen
```

2. Install dependencies:
```bash
composer install
```

3. Copy the environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Configure your database in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yogazen
DB_USERNAME=root
DB_PASSWORD=
```

6. Run migrations:
```bash
php artisan migrate
```

7. Generate JWT secret:
```bash
php artisan jwt:secret
```

## Configuration
Make sure to set up your environment variables properly in the `.env` file:

```
APP_NAME=YogaZen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
JWT_SECRET=
```

## API Documentation

### Authentication

#### Register a new user
```
POST /api/register
```
**Request Body**:
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
}
```
**Response**:
```json
{
    "message": "User successfully registered",
    "access_token": "token_here",
    "token_type": "bearer",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
```

#### Login
```
POST /api/login
```
**Request Body**:
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```
**Response**:
```json
{
    "access_token": "token_here",
    "token_type": "bearer",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
```

#### Logout
```
POST /api/logout
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Response**:
```json
{
    "message": "User successfully signed out"
}
```

### Courses

#### Get all courses
```
GET /api/courses
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Create a course
```
POST /api/courses
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "title": "Beginner Yoga",
    "description": "A course for beginners",
    "level": "beginner",
    "duration": "60",
    "price": 49.99
}
```

#### Get a specific course
```
GET /api/courses/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Update a course
```
PUT /api/courses/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "title": "Intermediate Yoga",
    "description": "A course for intermediate students",
    "level": "intermediate",
    "duration": "90",
    "price": 59.99
}
```

#### Delete a course
```
DELETE /api/courses/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

### Subscriptions

#### Get all subscriptions
```
GET /api/subscriptions
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Create a subscription
```
POST /api/subscriptions
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "student_id": 1,
    "type": "monthly",
    "started_at": "2023-01-01",
    "expires_at": "2023-12-31"
}
```

#### Get a specific subscription
```
GET /api/subscriptions/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Update a subscription
```
PUT /api/subscriptions/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "type": "yearly",
    "expires_at": "2024-12-31"
}
```

#### Delete a subscription
```
DELETE /api/subscriptions/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

## Scheduled Commands

The application includes scheduled commands to manage user accounts and subscriptions.

### Archive Inactive Accounts

Archives user accounts that have been inactive for 12 months.

To run manually:
```bash
php artisan yogazen:archive-inactive-accounts
```

### Send Subscription Reminders

Sends email reminders for subscriptions expiring in 3 days.

To run manually:
```bash
php artisan yogazen:subscription-reminders
```

To set up the scheduler to run automatically, add the following to your server's crontab:
```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## License
This project is licensed under the MIT License. YogaZen API

YogaZen is a yoga studio management system that provides a RESTful API for managing courses, subscriptions, and users.

## Table of Contents
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [API Documentation](#api-documentation)
    - [Authentication](#authentication)
    - [Courses](#courses)
    - [Subscriptions](#subscriptions)
- [Scheduled Commands](#scheduled-commands)

## Requirements
- PHP 8.0+
- Laravel 10.x
- Composer
- Database (MySQL, PostgreSQL, etc.)
- JWT Authentication

## Installation
1. Clone the repository:
```bash
git clone https://github.com/yourusername/yogazen.git
cd yogazen
```

2. Install dependencies:
```bash
composer install
```

3. Copy the environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Configure your database in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yogazen
DB_USERNAME=root
DB_PASSWORD=
```

6. Run migrations:
```bash
php artisan migrate
```

7. Generate JWT secret:
```bash
php artisan jwt:secret
```

## Configuration
Make sure to set up your environment variables properly in the `.env` file:

```
APP_NAME=YogaZen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
JWT_SECRET=
```

## API Documentation

### Authentication

#### Register a new user
```
POST /api/register
```
**Request Body**:
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
}
```
**Response**:
```json
{
    "message": "User successfully registered",
    "access_token": "token_here",
    "token_type": "bearer",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
```

#### Login
```
POST /api/login
```
**Request Body**:
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```
**Response**:
```json
{
    "access_token": "token_here",
    "token_type": "bearer",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
```

#### Logout
```
POST /api/logout
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Response**:
```json
{
    "message": "User successfully signed out"
}
```

### Courses

#### Get all courses
```
GET /api/courses
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Create a course
```
POST /api/courses
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "title": "Beginner Yoga",
    "description": "A course for beginners",
    "price": 49.99
}
```

#### Get a specific course
```
GET /api/courses/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Update a course
```
PUT /api/courses/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "title": "Intermediate Yoga",
    "description": "A course for intermediate students",
    "price": 59.99
}
```

#### Delete a course
```
DELETE /api/courses/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

### Subscriptions

#### Get all subscriptions
```
GET /api/subscriptions
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Create a subscription
```
POST /api/subscriptions
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "student_id": 1,
    "plan_type": "monthly",
    "expires_at": "2023-12-31"
}
```

#### Get a specific subscription
```
GET /api/subscriptions/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

#### Update a subscription
```
PUT /api/subscriptions/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```
**Request Body**:
```json
{
    "plan_type": "yearly",
    "expires_at": "2024-12-31"
}
```

#### Delete a subscription
```
DELETE /api/subscriptions/{id}
```
**Headers**:
```
Authorization: Bearer your_token_here
```

## Scheduled Commands

The application includes scheduled commands to manage user accounts and subscriptions.

### Archive Inactive Accounts

Archives user accounts that have been inactive for 12 months.

To run manually:
```bash
php artisan yogazen:archive-inactive-accounts
```

### Send Subscription Reminders

Sends email reminders for subscriptions expiring in 3 days.

To run manually:
```bash
php artisan yogazen:subscription-reminders
```

To set up the scheduler to run automatically, add the following to your server's crontab:
```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## License
This project is licensed under the MIT License.