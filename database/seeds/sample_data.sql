USE portfolio_db;

-- Insert sample projects
INSERT INTO projects (title, description, technologies, github_url, demo_url, image_url) VALUES
('E-commerce API', 'RESTful API for e-commerce platform with JWT authentication, payment integration, and admin dashboard', '["PHP", "MySQL", "Redis", "JWT", "Stripe API"]', 'https://github.com/iftixor/ecommerce-api', 'https://demo.iftixor.dev/ecommerce', '/images/ecommerce.jpg'),

('Task Management System', 'Full-stack task management application with real-time notifications and team collaboration features', '["Node.js", "Express", "MongoDB", "Socket.io", "React"]', 'https://github.com/iftixor/task-manager', 'https://tasks.iftixor.dev', '/images/tasks.jpg'),

('Blog CMS', 'Content Management System with multi-language support, SEO optimization, and advanced admin panel', '["PHP", "Laravel", "MySQL", "Vue.js", "TailwindCSS"]', 'https://github.com/iftixor/blog-cms', 'https://blog.iftixor.dev', '/images/blog.jpg'),

('Microservices Architecture', 'Scalable microservices setup with Docker, API Gateway, and service discovery', '["Docker", "Nginx", "PHP", "Node.js", "Redis", "PostgreSQL"]', 'https://github.com/iftixor/microservices', null, '/images/microservices.jpg');

-- Insert sample skills
INSERT INTO skills (name, level, category, icon) VALUES
('PHP', 95, 'Backend', 'php'),
('MySQL', 90, 'Database', 'mysql'),
('Node.js', 85, 'Backend', 'nodejs'),
('React', 88, 'Frontend', 'react'),
('Docker', 80, 'DevOps', 'docker'),
('Redis', 85, 'Database', 'redis'),
('Laravel', 92, 'Framework', 'laravel'),
('Express.js', 87, 'Framework', 'express'),
('MongoDB', 82, 'Database', 'mongodb'),
('TypeScript', 85, 'Language', 'typescript');

-- Insert admin user (password: admin123)
INSERT INTO users (username, email, password, role) VALUES
('admin', 'admin@iftixor.dev', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');