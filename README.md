# 🚀 Iftixor Portfolio - Backend Developer

<div align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&pause=1000&color=00D9FF&center=true&vCenter=true&width=435&lines=Backend+Developer;PHP+%7C+MySQL+%7C+API;Portfolio+Website;O'zbek+Dasturchi" alt="Typing SVG" />
</div>

## 🌟 Loyiha haqida

Bu zamonaviy backend developer uchun portfolio websayti. PHP da yozilgan, serverga yuklash bilan darhol ishlay boshlaydi. Responsive dizayn va zamonaviy UI/UX bilan.

## 🛠️ Texnologiyalar

### Backend
- **PHP 7.4+** - Asosiy backend til
- **JSON** - Ma'lumotlar saqlash
- **Apache/Nginx** - Web server

### Frontend
- **HTML5** - Markup
- **TailwindCSS** - CSS framework
- **JavaScript** - Interaktivlik
- **Font Awesome** - Ikonlar

## 🚀 Xususiyatlar

- ✨ **Zamonaviy Dizayn** - Chiroyli va responsive UI
- 📱 **Mobile First** - Barcha qurilmalarda ishlaydi
- ⚡ **Tez Yuklash** - Optimallashtirilgan kod
- 🎨 **Smooth Animatsiyalar** - Interaktiv tajriba
- 📧 **Aloqa Formasi** - To'g'ridan-to'g'ri xabar yuborish
- 🌐 **SEO Optimized** - Qidiruv tizimlariga moslashtirilgan
- 🔒 **Xavfsizlik** - Asosiy himoya choralari

## 📁 Loyiha Strukturasi

```
Iftixor_blog/
├── index.php              # Asosiy fayl
├── pages/                 # Sahifalar
│   ├── home.php          # Bosh sahifa
│   ├── about.php         # Men haqimda
│   ├── projects.php      # Loyihalar
│   ├── blog.php          # Blog
│   └── contact.php       # Aloqa
├── assets/               # Statik fayllar
│   ├── css/
│   ├── js/
│   └── images/
├── data/                 # Ma'lumotlar
│   └── contacts.json     # Aloqa ma'lumotlari
├── .htaccess            # Apache konfiguratsiya
└── README.md            # Loyiha haqida
```

## 🔧 O'rnatish

### Talablar
- PHP 7.4 yoki yuqori
- Apache/Nginx web server
- mod_rewrite yoqilgan bo'lishi

### Oddiy o'rnatish
```bash
# Loyihani yuklab oling
git clone https://github.com/iftixor/portfolio.git
cd Iftixor_blog

# Web serverga joylashtiring
# Apache uchun: /var/www/html/
# Nginx uchun: /usr/share/nginx/html/

# Ruxsatlarni sozlang
chmod 755 -R .
chmod 777 data/

# Brauzerda oching
# http://localhost/Iftixor_blog
```

### cPanel orqali
1. Fayllarni zip qilib yuklab oling
2. cPanel File Manager orqali public_html ga joylashtiring
3. Zip faylni ochib oling
4. data/ papkasiga yozish ruxsatini bering (755)

## 🌐 Sahifalar

### Bosh sahifa (/)
- Hero section
- Texnik ko'nikmalar
- So'nggi loyihalar

### Men haqimda (/about)
- Shaxsiy ma'lumotlar
- Ish tajribasi
- Mutaxassislik sohalari

### Loyihalar (/projects)
- Barcha loyihalar
- Texnologiyalar bo'yicha filter
- GitHub va demo havolalar

### Blog (/blog)
- Texnik maqolalar
- Backend development maslahatlari
- Newsletter obunasi

### Aloqa (/contact)
- Aloqa formasi
- Ijtimoiy tarmoq havolalari
- FAQ bo'limi

## 📊 Xususiyatlar

- **Responsive Design**: Barcha qurilmalarda mukammal ko'rinish
- **Fast Loading**: Optimallashtirilgan kod va resurslar
- **SEO Friendly**: Qidiruv tizimlariga moslashtirilgan
- **Contact Form**: Xabarlar JSON faylga saqlanadi
- **Security**: Asosiy himoya choralari qo'llanilgan

## 🎨 Sozlash

### Shaxsiy ma'lumotlarni o'zgartirish
1. `pages/home.php` - Bosh sahifadagi ma'lumotlar
2. `pages/about.php` - Shaxsiy va professional ma'lumotlar
3. `pages/projects.php` - Loyihalar ro'yxati
4. `index.php` - Asosiy navigatsiya

### Dizaynni sozlash
- TailwindCSS klasslarini o'zgartiring
- `assets/css/` papkasiga qo'shimcha CSS qo'shing
- Font Awesome ikonlarini almashtiring

### Aloqa ma'lumotlari
`pages/contact.php` faylida:
- Email manzil
- Telefon raqam
- Ijtimoiy tarmoq havolalari

## 🚀 Hosting

### Shared Hosting
1. Barcha fayllarni public_html ga yuklang
2. data/ papkasiga yozish ruxsati bering
3. .htaccess fayli mavjudligini tekshiring

### VPS/Dedicated Server
```bash
# Apache uchun
sudo cp -r Iftixor_blog /var/www/html/
sudo chown -R www-data:www-data /var/www/html/Iftixor_blog
sudo chmod 755 -R /var/www/html/Iftixor_blog
sudo chmod 777 /var/www/html/Iftixor_blog/data

# Nginx uchun
sudo cp -r Iftixor_blog /usr/share/nginx/html/
sudo chown -R nginx:nginx /usr/share/nginx/html/Iftixor_blog
```

## 📱 Mobile Optimization

- Responsive grid system
- Touch-friendly navigation
- Optimized images
- Fast loading on mobile networks

## 🔒 Xavfsizlik

- XSS himoyasi
- CSRF himoyasi
- File upload xavfsizligi
- Input validation
- SQL injection himoyasi (agar DB ishlatilsa)

## 🤝 Hissa qo'shish

1. Loyihani fork qiling
2. Feature branch yarating (`git checkout -b feature/yangi-xususiyat`)
3. O'zgarishlarni commit qiling (`git commit -m 'Yangi xususiyat qo'shildi'`)
4. Branch ga push qiling (`git push origin feature/yangi-xususiyat`)
5. Pull Request oching

## 📝 Litsenziya

Bu loyiha MIT litsenziyasi ostida. Batafsil ma'lumot uchun [LICENSE](LICENSE) faylini ko'ring.

## 📞 Aloqa

**Iftixor** - Backend Developer

- 📧 Email: iftixor@example.com
- 💼 LinkedIn: [linkedin.com/in/iftixor](https://linkedin.com/in/iftixor)
- 🐙 GitHub: [github.com/iftixor](https://github.com/iftixor)
- 📱 Telegram: [@iftixor](https://t.me/iftixor)

---

<div align="center">
  <p>❤️ bilan yaratildi - Iftixor tomonidan</p>
  <p>⭐ Agar loyiha yoqsa, star bosishni unutmang!</p>
</div>