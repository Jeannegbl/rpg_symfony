<h1>Projet RPG Symfony</h1>

<h2>Introduction</h2>

<p>Ce projet est la mise en application de Symfony en lien avec la base de donnée pour faire un CRUD (Create, Read, Update, Delete).
<br><br>
Le but ici est de pouvoir, en lien avec la base de donnée, créer la fiche d'un personnage pour des jeux de rôles.
<br><br>
Ce dernier ce compose d'un nom, une description, une date d'anniversaire, un niveau, des points expériences et des points de vies.<br>
En plus de cela, cette table est lié à un type, des compétences ainsi qu'un avatar créer via Avataaars.js
<br><br>
En plus de pouvoir visualiser notre fiche de personnage, nous pouvons créer un personnage ainsi que des types. Nous pouvons aussi les modifier et les effacer.
</p>


<h2>Installation</h2>

<p>Pour installer ce projet il faut tout d'abord cloner ce dépot. Dans votre terminal faite : <code>git clone</code> et rajouter le lien que vous souhaiter entre le SSH, HTTPS ou GitHib CLI trouvable en cliquant sur le bouton vert <code>Code</code>
<br><br>
Par la suite, il ne faut pas oublier d'installer les modules manquants en écrivant ceci dans le terminal : <code>composer install</code>.
<br><br>
Ensuite il faut modifier le nom du fichier<code>.env.sample</code> en <code>.env</code> et modifier son contenu au niveau des lignes suivantes : 
<br><br><img src="BDD-env.png"></img><br><br>
Dans ce ficher, il faut mettre les informations lié à votre base de données en enlever le commentaire (l'hashtag) selon ce que vous utiliser : sqlite, mysql ou bien postgresql. Les informations seront à completer avec votre nom de compte, votre mot de base ainsi que le nom de la base de donnée que vous voulez créer.
<br><br>
De plus, il faut créer la base de donnée en écrivant dans le terminal : <br><code>php bin/console doctrine:database:create</code>.
<br><br>
Enfin, il faut faire une migration des informations vers cette base de donnée : <br><code>php bin/console doctrine:migrations:migrate</code>
<br><br>
Le projet est ainsi installer, pour accéder au site, qui tourne localement sur votre ordinateur il faut écrire dans le terminal <code>symfony server:start</code>.<br>Le server ce met en route et pour accéder au site, soit vous cliquer sur le lien donner dans le terminal soit dans votre navigateur vous écriver <code>localhost:8000/</code>.
<br><br>
Vous voici arriver sur la page d'accueil ! Laisser vous guider par les boutons et créer vos personnages et vos types.
<br><br>
Il est recommandé de créer en premier lieu des types avant la création de personnage pour avoir accès à une réalisation complète de votre fiche de personnage sans passer par la modification.
</p>