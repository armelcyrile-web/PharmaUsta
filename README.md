# PharmaUSTA

**PharmaUSTA** est une plateforme numérique de gestion et de diffusion des ressources pédagogiques destinée aux étudiants et enseignants de la faculté de pharmacie de l'USTA (Université des Sciences, Technologies et Applications).  
Elle permet de centraliser, organiser, rechercher et télécharger des documents pédagogiques (cours, annales, exposés, etc.) tout en offrant un espace d'administration complet pour la gestion des référentiels, des utilisateurs et des rôles.

---

##  Fonctionnalités

### Espace public
- Page d’accueil avec présentation de la plateforme, statistiques et accès à l’inscription / connexion.
- Inscription sécurisée avec **vérification du matricule** (le matricule doit exister dans la liste des matricules valides pour l’année académique en cours).
- Consultation des ressources **publiées** uniquement.
- Recherche multicritère (titre, mot-clé, année, niveau, UE, ECUE, type).
- Navigation par **arborescence** (Année → Niveau → UE → ECUE → Ressources).
- Prévisualisation et téléchargement de fichiers PDF (compteur de téléchargements).

### Espace utilisateur connecté
- Gestion du profil (nom, prénom, email, mot de passe).
- Accès aux ressources publiées.

### Espace d’administration
- Tableau de bord avec statistiques (utilisateurs, ressources, répartition par statut/année, top téléchargements).
- **Gestion des référentiels** : années académiques, niveaux, UE, ECUE, types de ressources.
- **Gestion des ressources** : création, modification, publication, retrait, suppression, upload de PDF.
- **Gestion des utilisateurs** : liste, recherche, activation/désactivation, suppression, assignation de rôles.
- **Gestion des rôles et permissions** (Spatie) : création de rôles, attribution de permissions.

### Sécurité
- Authentification Laravel (session).
- Contrôle d’accès par permissions Spatie (`gerer-ressources`, `gerer-referentiels`, `gerer-utilisateurs`, `gerer-roles`, `voir-statistiques`).
- Middleware d’authentification et de permission sur toutes les routes sensibles.

---

## 🛠️ Prérequis

- **PHP** >= 8.2
- **Composer** 2.x
- **MySQL** 5.7+ ou MariaDB 10.3+
- **Node.js** et **npm** (pour la compilation des assets)
- **Laravel 12**

---

## ⚙️ Installation

1. **Cloner le dépôt**
   ```bash
   git clone https://https://github.com/armelcyrile-web/PharmaUsta.git
   cd pharmausta
