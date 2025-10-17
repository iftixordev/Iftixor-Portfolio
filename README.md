# 🚀 Iftixor's Portfolio - Backend Developer

<div align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&pause=1000&color=00D9FF&center=true&vCenter=true&width=435&lines=Backend+Developer;PHP+%7C+Node.js+%7C+Python;API+%7C+Database+%7C+DevOps;Always+learning+new+things" alt="Typing SVG" />
</div>

## 🌟 About This Project

Modern portfolio website showcasing backend development skills with cutting-edge technologies. Built with PHP backend and modern frontend frameworks.

## 🛠️ Tech Stack

### Backend
- **PHP 8.2+** - Core backend language
- **MySQL/PostgreSQL** - Database management
- **Redis** - Caching and session management
- **RESTful APIs** - Clean API architecture
- **JWT Authentication** - Secure user authentication

### Frontend
- **React.js** - Modern UI library
- **TypeScript** - Type-safe JavaScript
- **Tailwind CSS** - Utility-first CSS framework
- **Vite** - Fast build tool
- **Framer Motion** - Smooth animations

### DevOps & Tools
- **Docker** - Containerization
- **Nginx** - Web server
- **Git** - Version control
- **Composer** - PHP dependency management
- **npm/yarn** - Frontend package management

## 🚀 Features

- ✨ **Modern Design** - Clean and responsive UI
- 🔐 **Secure Backend** - JWT authentication and validation
- 📱 **Mobile First** - Responsive design for all devices
- ⚡ **Fast Performance** - Optimized loading and caching
- 🎨 **Smooth Animations** - Interactive user experience
- 📊 **Admin Dashboard** - Content management system
- 🌐 **Multi-language** - Uzbek and English support
- 📧 **Contact Form** - Direct messaging system

## 📁 Project Structure

```
Iftixor_blog/
├── backend/
│   ├── api/
│   │   ├── auth/
│   │   ├── projects/
│   │   ├── contact/
│   │   └── admin/
│   ├── config/
│   ├── models/
│   ├── middleware/
│   └── utils/
├── frontend/
│   ├── src/
│   │   ├── components/
│   │   ├── pages/
│   │   ├── hooks/
│   │   ├── utils/
│   │   └── styles/
│   ├── public/
│   └── dist/
├── database/
│   ├── migrations/
│   └── seeds/
├── docker/
└── docs/
```

## 🔧 Installation

### Prerequisites
- PHP 8.2+
- Node.js 18+
- MySQL/PostgreSQL
- Composer
- Docker (optional)

### Backend Setup
```bash
# Clone repository
git clone https://github.com/iftixor/portfolio.git
cd Iftixor_blog

# Install PHP dependencies
composer install

# Setup environment
cp .env.example .env
# Configure database and other settings

# Run migrations
php artisan migrate --seed
```

### Frontend Setup
```bash
# Navigate to frontend
cd frontend

# Install dependencies
npm install

# Start development server
npm run dev
```

### Docker Setup (Recommended)
```bash
# Build and start containers
docker-compose up -d

# Access application
# Frontend: http://localhost:3000
# Backend API: http://localhost:8000
```

## 🌐 API Endpoints

### Authentication
- `POST /api/auth/login` - User login
- `POST /api/auth/register` - User registration
- `POST /api/auth/refresh` - Refresh token

### Projects
- `GET /api/projects` - Get all projects
- `GET /api/projects/{id}` - Get project details
- `POST /api/projects` - Create project (Admin)
- `PUT /api/projects/{id}` - Update project (Admin)

### Contact
- `POST /api/contact` - Send message
- `GET /api/contact` - Get messages (Admin)

## 🎨 Screenshots

<div align="center">
  <img src="docs/screenshots/home.png" alt="Home Page" width="45%" />
  <img src="docs/screenshots/projects.png" alt="Projects Page" width="45%" />
</div>

## 🚀 Deployment

### Production Build
```bash
# Frontend build
cd frontend
npm run build

# Backend optimization
composer install --optimize-autoloader --no-dev
```

### Server Configuration
- **Web Server**: Nginx/Apache
- **PHP**: PHP-FPM 8.2+
- **Database**: MySQL 8.0+ / PostgreSQL 13+
- **Cache**: Redis 6.0+

## 📊 Performance

- **Lighthouse Score**: 95+
- **Page Load Time**: < 2s
- **API Response Time**: < 200ms
- **Mobile Friendly**: ✅
- **SEO Optimized**: ✅

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Contact

**Iftixor** - Backend Developer

- 📧 Email: iftixor@example.com
- 💼 LinkedIn: [linkedin.com/in/iftixor](https://linkedin.com/in/iftixor)
- 🐙 GitHub: [github.com/iftixor](https://github.com/iftixor)
- 🌐 Portfolio: [iftixor.dev](https://iftixor.dev)

---

<div align="center">
  <p>Made with ❤️ by Iftixor</p>
  <p>⭐ Star this repo if you like it!</p>
</div># Iftixor-Portfolio
