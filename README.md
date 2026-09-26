# Personal Task Manager

Project Code: WST21-PM-2026-SF
Student Name: CABALLERO, JANE ALTHIA B.
Course & Year: BS Information Technology - 2nd Year
Database Used: MySQL

Features:
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## About
A simple Laravel-based Personal Task Manager that lets a user create, view, edit,
delete, and update the status (Pending/Completed) of their tasks. Built following
the Routes → Controller → Model → Database → Blade pattern.

## Tech Stack
- Laravel
- MySQL
- Blade templates

## Setup Instructions
1. Clone this repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and set your database credentials
4. Run `php artisan key:generate`
5. Create a MySQL database named `personal_task_manager`
6. Run `php artisan migrate`
7. Run `php artisan serve`
8. Visit `http://127.0.0.1:8000/tasks`