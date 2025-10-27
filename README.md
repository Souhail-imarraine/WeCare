# WeCare - Healthcare Management System

[![Laravel](https://img.shields.io/badge/Laravel-12.0-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange.svg)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

WeCare is a comprehensive healthcare management system that connects patients with healthcare providers through a modern web platform. Built with Laravel, it provides seamless appointment booking, doctor management, and administrative oversight.

## 🚀 Features

### For Patients
- **User Registration & Authentication** - Secure account creation with detailed health profiles
- **Doctor Discovery** - Browse approved doctors by specialty, location, and consultation fees
- **Appointment Booking** - Real-time availability checking and appointment scheduling
- **Appointment Management** - View, cancel, and track appointment history
- **Profile Management** - Update personal and health information

### For Doctors
- **Professional Registration** - Submit credentials for admin approval
- **Dashboard Analytics** - View consultation statistics and patient demographics
- **Appointment Management** - Accept/decline requests and manage schedules
- **Profile Customization** - Add bio, social media links, and profile images
- **Patient History** - Track consultations and patient interactions

### For Administrators
- **System Overview** - Comprehensive dashboard with platform statistics
- **Doctor Verification** - Review and approve/reject doctor applications
- **User Management** - Monitor and manage patients and doctors
- **Appointment Oversight** - Track all appointments across the platform
- **Email Notifications** - Automated approval/rejection communications

## 🛠️ Technology Stack

- **Backend**: Laravel 12.0
- **Frontend**: Blade Templates, Bootstrap, CSS3
- **Database**: MySQL
- **Authentication**: Laravel Sanctum
- **Email**: Laravel Mail with queue support
- **File Storage**: Local filesystem
- **Session Management**: Database sessions

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM (for asset compilation)
- Web server (Apache/Nginx)

## ⚡ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/wecare.git
   cd wecare
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=wecare
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Import sample data (optional)**
   ```bash
   mysql -u your_username -p wecare < wecare.sql
   ```

8. **Create storage link**
   ```bash
   php artisan storage:link
   ```

9. **Start the application**
   ```bash
   php artisan serve
   npm run dev
   ```

## 🗄️ Database Schema

### Core Tables
- **users** - User authentication and basic information
- **doctors** - Doctor profiles and professional details
- **patients** - Patient health information and demographics
- **appointment_requests** - Appointment booking and management
- **sessions** - User session management

### Key Relationships
- Users have one Doctor or Patient profile
- Doctors receive many AppointmentRequests
- Patients create many AppointmentRequests

## 🔐 Authentication & Authorization

### User Roles
- **Patient**: Book appointments, manage profile
- **Doctor**: Manage appointments, view analytics (requires admin approval)
- **Admin**: Full system access and user management

### Middleware Protection
- `IsPatient` - Protects patient routes
- `IsDoctor` - Protects doctor routes  
- `IsAdmin` - Protects admin routes

## 📧 Email System

Automated email notifications for:
- Doctor application approval
- Doctor application rejection
- Appointment confirmations (configurable)

## 🚦 API Endpoints

### Authentication
```
GET  /login          - Login form
POST /login          - Authenticate user
GET  /register-patient - Patient registration
GET  /register-doctor  - Doctor registration
```

### Patient Routes
```
GET  /patient/dashboard    - Patient dashboard
GET  /patient/doctors      - Browse doctors
POST /patient/book-appointment/{doctor} - Book appointment
GET  /patient/appointments - View appointments
```

### Doctor Routes
```
GET  /doctor/dashboard     - Doctor dashboard
GET  /doctor/requests      - Appointment requests
POST /doctor/requests/{id}/accept - Accept appointment
GET  /doctor/appointments  - Manage appointments
```

### Admin Routes
```
GET  /admin/dashboard      - Admin dashboard
GET  /admin/doctors        - Manage doctors
POST /admin/doctor/{id}/approve - Approve doctor
GET  /admin/patients       - Manage patients
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit
```

## 📁 Project Structure

```
wecare/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin management
│   │   ├── Auth/           # Authentication
│   │   ├── Doctor/         # Doctor functionality
│   │   └── Patient/        # Patient functionality
│   ├── Mail/               # Email templates
│   ├── Models/             # Eloquent models
│   └── Http/Middleware/    # Route protection
├── database/
│   ├── migrations/         # Database schema
│   └── seeders/           # Sample data
├── resources/
│   └── views/             # Blade templates
│       ├── admin/         # Admin interface
│       ├── doctor/        # Doctor interface
│       ├── patient/       # Patient interface
│       └── emails/        # Email templates
└── routes/
    └── web.php            # Application routes
```

## 🔧 Configuration

### Mail Configuration
Update `.env` for email functionality:
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=noreply@wecare.com
```

### Queue Configuration
For email queues:
```bash
php artisan queue:work
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Default Accounts

### Admin Access
- **Email**: admin@gmail.com
- **Password**: password

### Sample Doctor
- **Email**: souhailimarrainedevo@gmail.com
- **Password**: password

### Sample Patient
- **Email**: patient@gmail.com
- **Password**: password

## 📞 Support

For support and questions:
- Create an issue on GitHub
- Email: support@wecare.com

## 🔄 Version History

- **v1.0.0** - Initial release with core functionality
- **v1.1.0** - Added email notifications and admin dashboard
- **v1.2.0** - Enhanced appointment management and doctor profiles

---

**Built with ❤️ for better healthcare management**