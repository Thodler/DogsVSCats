# Dogs VS Cats

Mini Site pour Tester un Modèle de Deep Learning
Ce mini site vous permet de tester un modèle de deep learning à l'aide d'une interface web simple. Suivez les instructions ci-dessous pour l'utiliser correctement.

## Prérequis
Python 3.11 ou supérieur doit être installé sur votre machine.
PHP 8 ou supérieur doit également être installé.
Assurez-vous d'avoir un fichier requirements.txt pour installer les bibliothèques Python nécessaires.
Installation
Clonez ce dépôt sur votre machine :

```bash
git clone https://github.com/votre-utilisateur/mini-site-deep-learning.git
```
Accédez au répertoire du projet :

```bash
cd dogs_vs_cats
```

Installez les dépendances Python à l'aide de pip :

```bash
pip install -r requirements.txt
```
Utilisation
Placez votre modèle Keras entraîné dans le répertoire racine du projet et nommez-le **model.keras**.

Lancez le serveur web PHP en exécutant la commande suivante dans le répertoire du projet :

```bash
php -S localhost:8000
```

Accédez à l'adresse http://localhost:8000 dans votre navigateur.

Utilisez l'interface web pour charger des données et tester votre modèle de deep learning.

## Remarque
Assurez-vous que votre modèle Keras est compatible avec la version de Keras installée dans l'environnement Python.