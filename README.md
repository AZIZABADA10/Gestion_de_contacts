# Gestion de Contacts – Test Technique Seomaniak (Août 2025)

Ce projet est réalisé dans le cadre du **test technique Seomaniak** pour le recrutement des **stagiaires août 2025**. Il s'agit d'une application Laravel permettant la gestion complète d'un carnet de contacts avec une interface claire, moderne et intuitive.

---

##  Fonctionnalités principales

-  **Ajout**, **modification**, **suppression** de contacts
-  **Recherche** par nom ou numéro de téléphone
-  **Photo de profil** pour chaque contact
-  Interface utilisateur moderne avec **Bootstrap 5** et **Bootstrap Icons**
-  Upload d’images 
-  Validation des données côté serveur

---

##  Stack technique

- **Framework** : Laravel 
- **Langage** : PHP 8.2
- **Base de données** : MySQL
- **Front-end** : Blade + Bootstrap 5
- **Icônes** : Bootstrap Icons 

---

## Routes Laravel

*  `http://localhost:8000/` → Redirection vers `/contacts`
*  `http://localhost:8000/contacts` → Liste de tous les contacts
*  `http://localhost:8000/contacts/create` → Formulaire d’ajout
*  `http://localhost:8000/contacts/5/edit` → Modifier le contact avec ID 5
*  `http://localhost:8000/contacts?search=amine` → Recherche de "amine"

##  Structure du projet

```
Gestion_de_contacts/
├── app/
│   └── Http/Controllers/ContactController.php
├── database/
│   └── migrations/xxxx_create_contacts_table.php
├── public/
│   └── images/         # Dossier pour les photos uploadées
├── resources/
│   └── views/
│       ├── contacts/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       └── layouts/
│           └── app.blade.php
├── routes/
│   └── web.php
├── .env
├── composer.json
└── README.md
```

---

##  Installation locale

### 1. Cloner le projet

```bash
git clone https://github.com/AZIZABADA10/Gestion_de_contacts.git
cd Gestion_de_contacts
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Copier le fichier `.env`

```bash
cp .env.example .env
```

Configurer la base de données :

```env
DB_DATABASE=gestion_de_contacts
DB_USERNAME=root
DB_PASSWORD=ton_mot_de_passe
```

### 4. Générer la clé d'application

```bash
php artisan key:generate
```

### 5. Créer la base de données manuellement

Via phpMyAdmin ou CLI MySQL.

### 6. Exécuter les migrations

```bash
php artisan migrate
```

### 7. Lancer le serveur

```bash
php artisan serve
```
 Application disponible sur : [http://localhost:8000](http://localhost:8000)

---
##  Auteur

Développé par **Aziz ABADA**
[GitHub – AZIZABADA10](https://github.com/AZIZABADA10)

