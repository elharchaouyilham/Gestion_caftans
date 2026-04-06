# 🎀 IlhamCollection - Location de Caftans de Mariage

Bienvenue sur **IlhamCollection**, une plateforme web moderne et élégante pour la location de caftans et accessoires de mariage.

![Laravel](https://img.shields.io/badge/Laravel-11-red?style=flat-square&logo=laravel)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3-blue?style=flat-square&logo=tailwindcss)
![PHP](https://img.shields.io/badge/PHP-8.1+-purple?style=flat-square&logo=php)
![Status](https://img.shields.io/badge/Status-Production%20Ready-green?style=flat-square)

---

## 📖 À propos

IlhamCollection est une solution complète de gestion et de location de caftans traditionnels et modernes pour les mariages, fiançailles, henné et autres événements. Le site permet aux courpesfrès de :

- 👗 Consulter un catalogue complet de caftans et accessoires
- 📅 Vérifier les disponibilités et réserver en ligne
- 💳 Gérer leurs réservations et passer par l'authentification sécurisée
- 📸 Découvrir des galeries et témoignages de clientes satisfaites

Et pour les administrateurs :
- 📊 Tableau de bord avec statistiques
- 🛍️ Gestion complète du catalogue (CRUD produits et catégories)
- 👥 Management des clients
- 📋 Suivi des réservations

---

## 🚀 Démarrage Rapide

### Prérequis
- **PHP** 8.1 ou supérieur
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js** et **npm** (pour Tailwind CSS)
- **SQLite** ou autre base de données

### Installation

```bash
# 1. Cloner le repository
git clone <url-repository>
cd Gestion_caftans

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances Node
npm install

# 4. Créer le fichier .env
cp .env.example .env

# 5. Générer la clé d'application
php artisan key:generate

# 6. Exécuter les migrations et seeders
php artisan migrate:fresh --seed

# 7. Démarrer le serveur
php artisan serve
```

L'application sera accessible à: **http://127.0.0.1:8000**

---

## 🔐 Identifiants par Défaut

### Compte Admin
```
Email: admin@ilhamcollection.com
Mot de passe: password
```

### Créer un compte Client
- Accédez à: `/register`
- Remplissez le formulaire
- Vous serez auto-connecté après enregistrement

---

## ✨ Fonctionnalités Principales

### 🏠 Pages Publiques
- ✅ **Accueil** - Présentation élégante avec CTA
- ✅ **Catalogue Caftans** - Filtrage par style, type de cérémonie, taille
- ✅ **Catalogue Accessoires** - Bijoux, ceintures, couronnes, etc.
- ✅ **Forfaits Mariage** - Packages complets à prix avantageux
- ✅ **Galerie** - Showcase des réalisations
- ✅ **Témoignages** - Avis authentiques de clientes
- ✅ **Contact** - Formulaire de contact sécurisé

### 🔐 Authentification
- ✅ Enregistrement sécurisé
- ✅ Connexion avec rôles (Admin/Client)
- ✅ Gestion de session
- ✅ "Remember me" functionality
- ✅ Profil utilisateur avec statistiques

### 📅 Réservation
- ✅ Sélection de produits multiples
- ✅ Calendrier interactif
- ✅ Validation des données
- ✅ Confirmation immédiate
- ✅ Statut de réservation (Pending, Confirmed, Cancelled)

### 🛠️ Admin Dashboard
- ✅ Statistiques en temps réel
- ✅ Gestion du catalogue (CRUD)
- ✅ Management des catégories
- ✅ Suivi des clients
- ✅ Gestion des réservations
- ✅ Export de données

---

## 🏗️ Architecture

### Stack Technique
- **Framework**: Laravel 11
- **Frontend**: Blade + Tailwind CSS
- **Base de Données**: SQLite (configurable)
- **Authentication**: Laravel Auth (standard)
- **Validation**: Form Requests + Server-side

### Structure du Projet
```
├── app/
│   ├── Http/Controllers/
│   │   ├── ProductController.php
│   │   ├── ForfaitController.php
│   │   ├── ReservationController.php
│   │   ├── ContactController.php
│   │   ├── Auth/
│   │   │   ├── LoginController.php
│   │   │   └── RegisterController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── CatalogController.php
│   │       ├── ClientController.php
│   │       └── ReservationAdminController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Category.php
│   │   ├── Reservation.php
│   │   ├── Forfait.php
│   │   └── Role.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── pages/
│   │   ├── admin/
│   │   ├── auth/
│   │   ├── client/
│   │   └── layouts/
│   ├── css/
│   └── js/
└── routes/
    └── web.php
```

---

## 🎨 Design & UX

### Palette de Couleurs
- **Doré (Or)**: `#d4af37` - Accent principal (élégance, luxe)
- **Noir**: `#1a1a1a` - Texte et headers
- **Crème**: `#faf9f8` - Arrière-plan doux
- **Blanc**: `#ffffff` - Surfaces principales

### Typographie
- **Serif**: Playfair Display (titres, élégance)
- **Sans-serif**: Lato (corps de texte, lisibilité)

### Design Responsive
- ✅ Mobile-first approach
- ✅ Tablette et Desktop optimisés
- ✅ Navigation adaptative
- ✅ Accésibilité garantie

---

## 📊 Base de Données

### Tables Principales
- **users** - Comptes utilisateurs (clients et admin)
- **roles** - Admin, Client
- **products** - Caftans et accessoires
- **categories** - Catégorisation (Caftans, Accessoires)
- **reservations** - Historique des réservations
- **forfaits** - Packages presdéfinis

### Relations
```
User → Role (Many-to-One)
User → Reservation (One-to-Many)
Product → Category (Many-to-One)
Reservation → Product (Many-to-One)
Reservation → User (Many-to-One)
```

---

## 🔗 Routes Principales

### Public
```
GET  /                    - Accueil
GET  /caftans             - Catalogue caftans
GET  /accessoires         - Catalogue accessoires
GET  /forfaits            - Forfaits mariage
GET  /galerie             - Galerie photos
GET  /temoignages         - Témoignages
GET  /contact             - Formulaire contact
POST /contact             - Soumettre contact
GET  /reservation         - Formulaire réservation
POST /reservation         - Créer réservation
```

### Authentification
```
GET  /login               - Formulaire login (guest only)
POST /login               - Traiter login (guest only)
GET  /register            - Formulaire registration (guest only)
POST /register            - Créer compte (guest only)
POST /logout              - Déconnexion
```

### Client (Authentifié)
```
GET  /profile             - Profil utilisateur
GET  /my-reservations     - Mes réservations
```

### Admin (Authentifié + Role Admin)
```
GET  /admin/dashboard     - Tableau de bord
GET  /admin/catalog       - Gestion produits
GET  /admin/cliente       - Gestion clients
GET  /admin/reservations  - Gestion réservations
```

---

## 📦 Données de Test Pré-chargées

Après `migrate:fresh --seed` :

### Utilisateurs
- 1 Admin: `admin@ilhamcollection.com` / `password`

### Produits
- 6 Caftans avec détails complets
- 4 Accessoires

### Forfaits
- 4 packages prédéfinis avec prix et inclusions

---

## 🧪 Testing

Un guide de test complet est disponible dans [TESTING_GUIDE.md](./TESTING_GUIDE.md)

### Exécuter rapidement
```bash
# Lancer les tests unitaires
php artisan test

# Vérifier les erreurs
php artisan lint
```

---

## 📄 Documentation Complète

- **[IMPLEMENTATION.md](./IMPLEMENTATION.md)** - Détails de l'implémentation
- **[TESTING_GUIDE.md](./TESTING_GUIDE.md)** - Guide de test complet
- **[context.txt](./context.txt)** - Spécifications originales

---

## 🐛 Troubleshooting

### Erreur "SQLSTATE[HY000]: General error"
```bash
php artisan migrate:fresh --seed
```

### Page blanche
```bash
# Activer le debug
echo "APP_DEBUG=true" >> .env
# Vérifier les logs
tail -f storage/logs/laravel.log
```

### Permission denied
```bash
chmod -R 775 storage bootstrap/cache
```

---

## 🔒 Sécurité

- ✅ Protection CSRF sur tous les formulaires
- ✅ Validation côté serveur
- ✅ Middleware d'authentification
- ✅ Hachage des mots de passe (bcrypt)
- ✅ Protection contre l'injection SQL (Eloquent ORM)
- ✅ Middleware de vérification des rôles

---

## 🚀 Déploiement

### Variables d'environnement requises
```env
APP_NAME=IlhamCollection
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votredomaine.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=ilham_collection
DB_USERNAME=root
DB_PASSWORD=xxxxx

MAIL_DRIVER=smtp
MAIL_PORT=587
MAIL_USERNAME=contact@ilhamcollection.com
MAIL_PASSWORD=xxxxx
```

### Checklist de déploiement
- [ ] Cloner le repository
- [ ] Installer dépendances: `composer install --no-dev`
- [ ] Générer clé: `php artisan key:generate`
- [ ] Migrer DB: `php artisan migrate --force`
- [ ] Compiler assets: `npm run build`
- [ ] Mettre en cache: `php artisan config:cache`
- [ ] Configurer le serveur web (Apache/Nginx)
- [ ] Définir permissions correctes sur storage/

---

## 📞 Support et Contact

Pour toute question ou problème:
- Email: `contact@ilhamcollection.com`
- Téléphone: `+212 (0) 5 XX XX XX XX`
- Adresse: Casablanca, Maroc

---

## 📝 License

IlhamCollection est protégé par les droits d'auteur. Tous droits réservés © 2026.

---

## ✅ Statut du Projet

**Version**: 1.0 - Production Ready ✨

Toutes les fonctionnalités décrites dans le cahier des charges ont été implémentées et testées.

---

**Dernière mise à jour**: 26 Mars 2026
**Développé avec** ❤️ **par l'équipe IlhamCollection**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
