<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Blog Laravel

## Introduction

Ces instructions décrivent la procédure à suivre pour installer le projet sur une machine local pour le développement et les tests.

## Récupération du projet 

Pour seulement récupérer le projet créé, comme en cas de changement de machine de développement, il faut cloner le projet par ligne de commande. 

Pour cela, il faut ouvrir un terminal et aller dans le répertoire où le projet va se trouver, puis lancer la commande suivante :

```bash
git clone https://github.com/Morganedid/Blog_Laravel.git
```

---

## A. Installation

Dans cette section, il y a les différentes étapes à suivre afin d'avoir un environnement de développement fonctionnel.

### 1. Installer PHP, Composer, Git, NodeJS et NPM sur votre machine. Procédure pour Windows :


#### a. Installlation de PHP

1. Télécharger le dernier package de [fichiers Zip non thread-safe](https://www.php.net/downloads.php) pour Windows (à l'heure actuelle PHP 8.3.3).
2. Décompressez les fichiers dans un répertoire nommé `PHP` sur votre machine.
3. Dupliquer le fichier `php.ini-development` et le renomer en `php.ini`.
4. Ouvrir le fichier `php.ini` et décomenter les lignes suivantes en enlevant le point virgule au début des lignes :
```bash
;extension=mbstring
;extension=openssl
;extension=zip
;extension=fileinfo
;extension=pdo_mysql
```
Ces lignes permettent d'activer les extensons Mbstring, OpenSSL, zip, FileInfo et pdo_mysql requises par MySQL (Base de données, expliqué plus bas), Laravel et Composer.

5. Pour vérifier que PHP est bien installé, lancer la commande suivante pour afficher la version :
```bash
php -v
```
ou
```bash
php --version
```
La version de PHP devrait s'afficher, pour ma part la version 8.3.3.

#### b. Installation de Composer

1. Télécharger et exécuter Composer-Setup.exe sur le site de [Composer](https://getcomposer.org/download/).
2. Suivre la procédure d'installation et choisir la version de PHP (installé précédemment) à utiliser.
3. De la même manière que pour PHP, lancer la commande pour afficher la version pour vérifier l'installation :
```bash
composer -v
```
ou
```bash
composer --version
```

#### c. Installation de NodeJs et NPM

1. Télécharger sur le site [NodeJS](https://nodejs.org/en) le `fichier .exe` de la dernière version `LTS` et l'exécuter à la fin du téléchargement.
2. De la même manière que pour PHP et Composer, lancer la commande pour afficher la version pour vérifier l'installation :
```bash
npm -v
node -v
```
ou
```bash
npm --version
node --version
```

#### d. Installation de Git

Installer Git permettra d'utiliser les différentes commandes pour manipuler le projet avec le dépôt où il sera partager (clone, commit, push, pull, ...).

Télécharger [Git](https://git-scm.com/download/win) et exécuter le `fichier .exe`.
Pour vérifier l'installation :
```bash
git --version
```

### 2. Création du projet Laravel

Pour créer le projet sous Laravel, lancer la commande suivante (dernier élément de la commande correspondant au nom du projet) :
```bash
composer create-project laravel/laravel Blog_Laravel
```

Pour tester le projet dans l'environnement local, j'utilise le serveur de développement intégré de PHP, en lançant la commande suivante dans le répertoire du projet (Blog_Laravel) :
```bash
php artisan serve
```
Dans le terminal, suite à l'exécution de cette commande, l'URL suivante m'est proposée pour visualiser le résultat du projet : 
http://127.0.0.1:8000/

Avec cette commande, le projet affiche déjà une page web, celle créé par défaut en créant le projet Laravel.
Cette commande va être utiliser durant tout le développement pour permettre de tester les différent ajouts et modificaions.

### 3. Création d'un dépôt Git et intégrer le projet dans le dépôt

Un dépôt Git a été créé sur GitHub pour y déposer le projet, afin de permettre le partage du code. Pour intégrer le projet, voici la série de commande git à effectuer :

1. Pour `initialiser` le dossier du projet :
```bash
git init
```
2. Pour ajouter à l'`index` (ou au `stage`), la liste des modifications préparées :
```bash
git add .
```
3. Pour transférer les fichiers en attente dans l'index vers le `Head`, avec le message qui permet de savoir à quoi correspondent les ajouts/modifications :
```bash
git commit -m "init projet : code de base Framework Laravel"
```
4. Pour établir la connexion avec le dépôt Git créé :
```bash
git remote add origin https://github.com/Morganedid/Blog_Laravel.git
```
5. Pour envoyer les fichiers dans le dépôt Git :
```bash
git push origin main
```

### 4. Intégration de Vue 3 en composition API

Afin d'intégrer Vue 3 au projet Laravel, toujours dans un terminal et dans le dossier du projet, voici les différentes étapes et commandes à suivre :
1. Installer `Laravel Mix` pour simplifier le processus de la pipeline d'actifs (Webpack) en utilisant npm :
```bash
npm install
npm install laravel-mix --save-dev
```

2. Installation Vue 3
```bash
npm install vue@latest
```

3. Lors de la création du projet avec Laravel, le fichier `vite.config.js` s'est créé. Supprimer-le et créer un nouveau fichier en le nommant `webpack.mix.cjs`.

4. Ajouter à ce nouveau fichier le contenu suivant :
```bash
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
  .vue()
  .css('resources/css/app.css', 'public/css')
  .sourceMaps(); // Enable source maps for debugging

```
5. Dans le fichier `package.json`, remplacer les lignes suivantes :
```bash
    "type": "module",
    "scripts": {
        "dev": "vite",
        "build": "vite build"
    },
```

par

```bash
    "type": "commonjs",
    "scripts": {
        "dev": "npm run development",
        "development": "mix",
        "watch": "mix watch",
        "prod": "npm run production",
        "production": "mix --production"
    },
```

6. Installer vue-loader, un chargeur pour webpack qui permet de créer des compsants Vue dans un format appelé SFC (Single-File Components)
```bash
npm install vue-loader@latest --save-dev
```
7. Afin de tester la bonne intégration de Vue 3 sur le projet, créer un exemple de composant à afficher, comme ceci :
- Commencer par créer un dossier `components` dans le répertoire `.\ressources\js`.

- Créer un fichier dans le dossier récemment créé, `ExampleComponent.vue` pour l'exemple, et y ajouter le code suivant :
```bash
<!-- resources/js/components/ExampleComponent.vue -->
    <template>
        <div>
            <h1>{{ message }}</h1>
        </div>
    </template>
  
  <script>
  export default {
    data () {
      return {
        message : "Bienvenue sur Vue 3"
      }
    }
  }
  </script>
```

- Remplacer le code du fichier `app.js` du répertoire `.\ressources\js` par le code suivant :
```bash
// 1. On importe createApp
import { createApp } from "vue"

// 2. On importe ExampleComponent.vue
import ExampleComponent from "./components/ExampleComponent.vue"

// 3. On monte l'application Vue sur l'élément #app
createApp(ExampleComponent).mount("#app")
```

- Remplacer le code du fichier `welcome.blade.php` du répertoire `.\ressources\views` par :
```bash
<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>
  <head>
      <title>Laravel Vue 3 Composition API</title>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
      <div id="app" class="underline mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
          <example-component></example-component>
      </div>
      <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
```
- Suite à ces différentes étapes et pour résoudre les erreurs de compilation, installer `babel` :
```bash
npm install @babel/core @babel/preset-env babel-loader --save-dev
```
Et créer un fichier s'appelant `.babelrc` en ajoutant ces lignes :
```bash
{
    "presets": ["@babel/preset-env"],
    "plugins": ["@babel/plugin-transform-modules-commonjs"]
}
```
8. Pour compiler et tester, lancer la commande suivante :
```bash
npm run dev
```
Cette commande sera à lancer à chaque modification des fichiers `.scss`, `.js` et bien évidemment les fichiers de configuration `webpack.mix.cjs` et `tailwind.config.js`, expliqué juste après pour sa création.

### 5. Intégration de Tailwind CSS et Sass
#### a. Tailwind CSS

Pour intégrer Tailwind CSS au projet, voici les diférentes étapes à suivre : 

1. Installer Tailwind CSS et créer le fichier `tailwind.config.js` :
```bash
npm install -D tailwindcss
npx tailwindcss init
```

2. Configurer les chemins des templates
```bash
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.{php,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

#### a. Sass
`Sass` est le langage d'extension CSS de qualité le plus mature, stable et puissant. Il permet de garder les  feuilles de style bien organisées et facilite le partage de conception au sein et entre projet.

1. Installation :
```bash
npm install -g sass
```
Renommer le répertoire `.\ressources\css` en `.\ressources\sass` ainsi que l'extension du fichier `app.css` en `app.scss`.
Dans le fichier `webpack.mix.cjs`, remplacer la suivante, pour prendre en compte les modifcations précédentes :

```bash
.css('resources/css/app.css', 'public/css')
```

par

```bash
.sass('resources/sass/app.scss', 'public/css')
```

### 6. Installation et création de la base de données MySQL (avec Xampp et Eloquent, ORM inclut dans Laravel)

#### a. Installation MySQL

Pour créer la base de données (BDD), il va falloir d'abord installer un SGBD (Système de Gestion de Base de Données), comme MySQL, pour la stocker et la gérer.
Pour cela, installer l'outil [Xampp](https://www.apachefriends.org/fr/index.html) à télécharger via le site, qui inclut MySQl et un serveur web local (Apache) pour faire fonctionner le SGBD.

1. Comme dit précédemment, télécharger [Xampp](https://www.apachefriends.org/fr/index.html) et exécuter le `fichier .exe`.
2. Une fois installer et l'interface de contrôle de Xampp ouvert, appuyer sur les boutons `Start` de la ligne `Apache` et `MySQL` (ou `PhpMyAdmin` selon la version de Xampp).

Lorsque la base de données sera créée, il sera possible de visualiser les données via PhpMyAdmin par l'intermédiaire de Xampp en cliquant sur le bouton `Admin` correspondant à la ligne ` MySQL`. Cela ouvrira une page sur votre navigateur sur PhpMyAdmin et ainsi voir les différentes base de données créées dessus dont celle du projet `blog_laravel` qui va être créée.

#### b. Création de la base de données

1. Pour commencer, il faut configuer le projet Laravel afin de pouvoir faire le lien entre celui-ci et la base de données MySQL. Pour cela, il faut ouvrir le fichier `.env` du projet qui se situe à la racine du répertoire, puis remplacer le nom de la base de données `DB_DATABASE=laravel` par le nom souhaité, dans notre cas `blog_laravel`.
Toutefois, vérifier que les informations concernant la connection à la base de données soient correctes (ce référé aux informations de votre PhpMyAdmin), me concernant voici les informations concernent la base de données :

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_laravel
DB_USERNAME=root
DB_PASSWORD=
```

4. Passer à la création de la table article.
Un article possède : un titre, un contenu, une catégorie et une image d'illustration (possibilité de rajouter des caractérisques par la suite).
Lancer la commande suivante dans un terminal se situant dans le répertoire du projet Laravel :

```bash
php artisan make:model Article -mfsc
```
Avec les options `-mfsc`, cette commande a créé 5 fichiers :
- un fichier correspondant au modèle de la table, `Article.php`, généré dans le répertoire `.\app\Models`, qui va représenter la table en question sous forme d'objets pour simplifier les manipulations des enregistrements ;
- un fichier de migration, `datetime_create_articles_table.php`, généré dans le répertoire `.\database\migrations`, qui permet de proposer un versionning de la base de données et de permettre dès la première migration de créer la table, `article` ;
- un fichier `seeder`, `ArticleSeeder.php`, généré dans le répertoire `.\database\seeders`, qui permet de "peupler" la base de données avec des données fictives ;
- un fichier `factory`, `ArticleFactory.php`, généré dans le répertoire `.\database\factories`, qui permet de définir un ensemble d'attributs par défaut pour chaque modèle Eloquent, ORM inclut dans Laravel, au lieu de spécifier manuellement la valeur de chaque colonne lors de la création des données de test ;
- un fichier contrôleur, `ArticleController.php`, généré dans le répertoire `.\app\Http\Controller`, qui permet de regrouper la logique de traitement des requêtes associée aux `articles`.

5. Dans le répertoire `.\database\migrations\`, des fichiers de migrations autres que les 2 qui ont été créés par la commande précédente sont déjà présentes, `datetime_create_users_table.php`, `datetime_create_password_reset_tokens_table.php`, `datetime_create_failed_jobs_table.php` et `datetime_create_personal_access_tokens_table.php`.

Par défaut, lors de la création d'un projet Laravel, ces fichiers de migration sont créés. Lors de la migration, ces fichiers vont créer respectivement les tables suivantes : `users`, `password_reset_tokens`, `failed_jobs` et `personal_access_tokens`.

6. Dans le fichier de migration créé précédemment `datetime_create_articles_table.php`, ajouter à la fonction `up` la structure de l'article, à la suite des lignes suivantes `$table->id();`, qui va correspondre à l'identifiant unique de l'article, auto-incrémenté clé primaire, et `$table->timestamps();`, qui correspond à une fonction permettant de stocker la date de création et la date de mise à jour :

```bash
$table->string(column: "titre")->unique();
$table->text(column: "content");
$table->foreignId(column: "categorie_id")
    ->constrained()
    ->onUpdate('restrict')
    ->onDelete('restrict');
$table->string('image');
```

7. Maintenants que les ficheirs de migration sont à jour avec la structure de chaque table, lancer la commande suivante, pour faire la migration et mettre à jour la base de donnée, si la base de données n'existe pas, la commande va vous proposer de la créer pour vous :

```bash
php artisan migrate
```

8. Si PhpMyAdmin est ouvert sur votre navigateur, aller vérifier la création des tables. 
Si les tables ne sont pas créées, une erreur serait survenu lors de l'exécution de la commande précédente.
Dans le cas contraire, toutes les tables sont présentes dans la base de données créées en mêle temps que les premières tables.
Une table supplémentaire a été créée, `migrations`, qui va stocker tous les fichiers de migration dans l'ordre de leur exécution (ordre croissant de leur nom), une sorte de table de versionning pour les fichiers qui ont été exécutés.

### 7. Seeding (Population) et Factories

Lors de la création du modèle et de la migrationde la table `article`, les fichiers permettant de générer automatiquement des données de tests ont été créés, `ArticleSeeder.php`, dans le répertoire `.\databases\seeders`, et `ArticleFactory.php`, dans le répertoire `.\databases\factories`.

1. Dans un premier temps, commencer par modifier le fichier `ArticleFactory.php` qui va permettre de générer les données fictives, en ajoutant les lignes suivantes entre les crochets de `return` : 

```bash
'title' => fake()->unique()->sentence(5),
'content' => fake()->sentence(50),
'category' => fake()->sentence(1),
'image' => $imagePath = fake()->image('public/storage/images', 640, 480, null, false, true, null, false, 'jpg'),
```

2. Avant d'aller plus loin, pour des soucis de fonctionnement en local, concernant l'ajout des images en base de données, il faut ajouter deux lignes dans `.\vendor\fakerphp\faker\src\Faker\Provider\Image.php`, juste en dessous des lignes suivantes :

```bash
$fp = fopen($filepath, 'w');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fp);
```

Lignes à ajouter :

```bash
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
```

3. Ajouter dans le fichier `ArticleSeeder.php` la ligne suivante dans la fonction `run`, qui va permettre d'ajouter ces données dans la table `article` :

```bash
\App\Models\Article::factory(10)->create();
```

4. Pour terminer la génération des données fictives dans la base de données, remplacer le contenu de la méthode `run` du fichier `DatabaseSeeder.php`, fichier généré lors de la création du projet laravel par : 

```bash
$this->call([
    UserSeeder::class,
    ArticleSeeder::class
]);
```
Au sein de ce fichier, il est possible d'utiliser la méthode `call` pour exécuter des classes `seeders`.
Cette pratique permet une meilleure lisibilité du code lorsqu'il y a plusieurs tables où il faut générer des données.

Dans ce cas présent, il y a notre nouvelle table `article` et la table `user` déjà généré lors de la création du projet, hormis son fichier `seeder`. Voici la commande pour le créer :

```bash
php artisan make:seeder UserSeeder
```
Ajouter dans le fichier nouvellement créé, `UserSeeder.php`, le code suivant dans la méthode `run` :

```bash
\App\Models\User::factory(10)->create();
```

5. Maintenant, lancer la commande suivante pour intégrer les données de tests dans la base de données :

```bash
php artisan db:seed
```

Il est possible également d'amorcer la base de données en utilisant la commande suivante :

```bash
php artisan migrate:fresh --seed
```

Cela permet de supprimer toutes les tables et réexécuter toutes les migrations, en plus d'ajouter les données fictives.

## Construit avec

- [Laravel](https://laravel.com/) - Framework PHP
- [Vue 3](https://vuejs.org/) - Framework JS
- [TailwindCSS](https://tailwindcss.com/) - Framework CSS

## Auteur

- **Morgane Didelot**

