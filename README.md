# Laravel Livewire Poll App

![Laravel Version](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP Version](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=flat-square&logo=php&logoColor=white)
![Composer Version](https://img.shields.io/badge/Composer-2.x-885630?style=flat-square&logo=composer&logoColor=white)
![MySQL Version](https://img.shields.io/badge/MySQL-9.x-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Livewire Version](https://img.shields.io/badge/Livewire-4.x-4E56A6?style=flat-square&logo=livewire&logoColor=white)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=flat-square)](LICENSE)

<a href="https://github.com/mdinehin/laravel-livewire-poll-app/actions/workflows/tests.yml"><img src="https://github.com/mdinehin/laravel-livewire-poll-app/workflows/Tests/badge.svg" alt="Tests"></a>
<a href="https://github.com/mdinehin/laravel-livewire-poll-app/actions/workflows/coding-standards.yml"><img src="https://github.com/mdinehin/laravel-livewire-poll-app/actions/workflows/coding-standards.yml/badge.svg" alt="Coding Standards"></a>

An interactive polling application built with Laravel 13 and Livewire 4. The application is designed to deliver an accessible and straightforward user experience with real-time input processing, instant inline validation, and a sleek, responsive user interface.

## Preview

![Application demo walkthrough](https://github.com/user-attachments/assets/ebee20b0-4f45-4afa-ac7e-6409b5aac4e7)

## Features

- Live Data Processing: Processes user actions and vote registrations instantly without full page reloads.
- Real-Time Validation: Delivers immediate feedback on form inputs to ensure data integrity and smooth user interactions.
- Sleek Presentation: Designed with modern CSS layout patterns for a fast, responsive, and visually clean UI.

## Prerequisites

The following software dependencies are required:

- PHP 8.3+
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://www.mysql.com/downloads/)

## Installation

1. Clone the repository `git clone https://github.com/mdinehin/laravel-livewire-poll-app.git`
2. Install PHP dependencies with `composer install`
3. Copy the `.env.example` file to `.env` and fill in the database credentials
4. Generate the application key with `php artisan key:generate`
5. Run database migrations with `php artisan migrate`
6. Start the local server by running `php artisan serve`

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to access the application.

## Commands

| Command | Description |
| --- | --- |
| `php artisan test` | Run the tests |
| `php artisan migrate:fresh` | Reset the database |
| `composer types:check` | Perform static code analysis |
