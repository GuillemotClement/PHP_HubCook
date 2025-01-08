![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

---

# HubCook - Planificateur de repas intelligent

HubCook est une application web de gestion de menus hebdomadaires développée en PHP natif. Elle permet aux utilisateurs de planifier leurs repas, gérer leurs courses et partager leurs recettes favorites.

## 🚀 Fonctionnalités

### Planification des repas
- Génération aléatoire de menus hebdomadaires
- Personnalisation manuelle des menus
- Visualisation du planning de la semaine

### Gestion des recettes
- Ajout et modification de recettes personnelles
- Système de notation et commentaires
- Filtrage et recherche avancée
- Favoris et collections personnelles

### Liste de courses
- Génération automatique selon les recettes sélectionnées
- Organisation par catégories
- Export et partage de listes

## 💻 Stack Technique

### Backend
- PHP 8.4
- PostgreSQL
- Architecture MVC

### Frontend
- HTML5
- Tailwind CSS
- JavaScript

### Outils & Qualité
- Composer pour la gestion des dépendances
- CI/CD avec GitHub Actions
- PHPUnit pour les tests
- PSR-12 pour les standards de code
- Gestion des versions avec Git

## 🛠 Installation

### Prérequis
- PHP 8.4
- PostgreSQL
- Composer
- Node.js & npm (pour Tailwind)

### Installation

1. Cloner le repository
```bash
git clone https://github.com/votre-username/hubcook.git
cd hubcook
```

2. Installer les dépendances PHP
```bash
composer install
```

3. Installer les dépendances frontend
```bash
npm install
```

4. Configurer la base de données
```bash
# Copier le fichier d'exemple de configuration
cp .env.example .env

# Éditer le fichier avec vos paramètres
nano .env
```

5. Initialiser la base de données
```bash
php bin/console db:migrate
php bin/console db:seed  # Optionnel, pour les données de test
```

6. Lancer le serveur de développement
```bash
php -S localhost:8000 -t public
```

## 🧪 Tests

```bash
# Lancer tous les tests
composer test

# Lancer les tests avec couverture
composer test:coverage
```

## 🤝 Contribution

Les contributions sont les bienvenues ! Voici comment vous pouvez contribuer :

1. Fork le projet
2. Créer une branche (`git checkout -b feature/amazing-feature`)
3. Commit vos changements (`git commit -m 'feat: add amazing feature'`)
4. Push sur la branche (`git push origin feature/amazing-feature`)
5. Ouvrir une Pull Request

### Conventions de commit

Nous utilisons les [Conventional Commits](https://www.conventionalcommits.org/) :

- `feat`: Nouvelle fonctionnalité
- `fix`: Correction de bug
- `docs`: Documentation
- `style`: Formatage, semi-colons manquants, etc.
- `refactor`: Refactoring du code
- `test`: Tests
- `chore`: Maintenance

## 📝 License

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

