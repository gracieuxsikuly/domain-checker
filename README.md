
# 🔍 Domain Checker — Laravel + Livewire

Une application Laravel simple et puissante qui permet de :

- Vérifier la **disponibilité** d’un nom de domaine (`ex: gracieux.org`)
- Afficher la **liste de toutes les extensions disponibles** ou prises
- Afficher le **prix de chaque extension**
- Utilise `WHOIS`, `Livewire` et `Bootstrap` pour une interface rapide et élégante

---

## 🚀 Fonctionnalités

✅ Vérification en temps réel de la disponibilité des domaines  
✅ Base de données des extensions avec leurs prix  
✅ Résultat dynamique avec Livewire  
✅ Design propre et responsive avec Bootstrap 5  
✅ Code structuré avec services et composants Livewire

---

## 🛠️ Technologies utilisées

- [Laravel 12](https://laravel.com/)
- [Livewire 3](https://livewire.laravel.com/)
- [Bootstrap 5](https://getbootstrap.com/)
- [PHP WHOIS library](https://github.com/io-developer/php-whois)

---

## 📦 Installation

1. Clone le projet :
```bash
git clone https://github.com/ton-utilisateur/domain-checker.git
cd domain-checker
```

2. Installe les dépendances PHP :
```bash
composer install
```

3. Copie le fichier `.env` :
```bash
cp .env.example .env
```

4. Génére ta clé d'application :
```bash
php artisan key:generate
```

5. Configure ta base de données dans `.env` :
```
DB_DATABASE=domain_checker
DB_USERNAME=root
DB_PASSWORD=
```

6. Lance les migrations + seed :
```bash
php artisan migrate --seed
```

7. Lance le serveur local :
```bash
php artisan serve
```

---

## 🧪 Comment utiliser

1. Accède à `http://127.0.0.1:8000`
2. Entrez un nom (ex: `gracieux`)
3. Cliquez sur **Vérifier**
4. Résultat :
   - Disponibilité de `gracieux.org`
   - Liste de toutes les autres extensions avec ✅ / ❌ et le **prix**

---

## 🖼️ Capture d’écran

> ![screenshot](https://your-screenshot-link.png) *(à remplacer si besoin)*

---

## 📂 Structure du projet

- `app/Http/Livewire/DomainChecker.php` – Composant Livewire principal
- `resources/views/livewire/domain-checker.blade.php` – Vue Livewire
- `app/Services/DomainCheckerService.php` – Service métier pour vérifier les domaines
- `app/Models/Extension.php` – Modèle pour les extensions de domaines
- `database/seeders/ExtensionSeeder.php` – Données de base pour les TLDs

---

## 📘 Exemple d’extensions disponibles

| Extension | Prix (USD) |
|-----------|------------|
| .com      | 12.00      |
| .org      | 10.00      |
| .net      | 11.00      |
| .info     | 9.00       |
| .xyz      | 6.00       |

---

## 🧰 Commandes utiles

```bash
php artisan migrate:fresh --seed     # Recrée la base et recharge les extensions
php artisan make:livewire Nom        # Créer un nouveau composant
```

---

## 👨‍💻 Auteur

**Gracieux Sikuly**  
📧 graciersikuly@gmail.com  
🔗 [LinkedIn](https://linkedin.com/in/gracieux-sikuly-4aba2118b)  
🐙 [GitHub](https://github.com/gracieuxsikuly)

---

## 📝 Licence

Ce projet est open-source sous licence MIT. Tu peux l’utiliser, le modifier, le redistribuer librement.

---

## ✅ À venir (idées d’amélioration)

- 🔒 Intégration d’un système de réservation de domaines
- 🌐 Support des domaines géographiques (.cd, .fr, etc.)
- 👤 Interface admin pour gérer les extensions et leurs prix
