<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

## Support Ticket System

### Overview

The Support Ticket System is a web application built with Laravel that allows customers to submit issues and receive support from admin users. It features email notifications for both customers and admins, ensuring smooth communication regarding tickets. This application helps in efficient ticket management and improves user experience.

### Features

- **User Authentication**:
  - Users can register and log in as either Admin or Customer.
  
- **Ticket Management**:
  - Customers can create, view, and manage their tickets.
  - Admins can view all tickets, respond to customer tickets, and close tickets.

- **Email Notifications**:
  - Admins receive email notifications when a new ticket is created.
  - Customers receive email notifications when their ticket is closed.

### Requirements

- Two types of users: **Admin** and **Customer**.
- Customers can open tickets to submit their issues.
- Tickets are visible in both the admin and customer panels.
- Admins can respond to customer tickets.
- Customers can open new tickets for further issues.

### Installation

Follow the steps below to set up the project locally:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/masudrana03/support-ticket-coding-test.git
    ```

2. **Change directory**:
    ```bash
    cd support-ticket-coding-test
    ```

3. **Copy the environment file**:
    ```bash
    cp .env.example .env
    ```

4. **Install dependencies**:
    ```bash
    composer install && npm install
    ```

5. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

6. **Run migrations and seed the database**:
    ```bash
    php artisan migrate --seed
    ```

7. **Serve the application**:
    ```bash
    php artisan serve
    ```

### One-Click Setup Command

For a quicker setup, you can run the following command:

```bash
git clone https://github.com/masudrana03/support-ticket-coding-test.git && cd support-ticket-coding-test && cp .env.example .env && composer install && npm install && php artisan key:generate && php artisan migrate --seed && php artisan serve
```

### Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
