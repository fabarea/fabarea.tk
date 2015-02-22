---
title: Publication automatique sur le TER depuis Github
tags:
    - ter
    - github
---

Etant le mainteneur [de plusieurs extensions][extensions] pour TYPO3 CMS, j'ai toujours trouvé la phase de "release" sur le [TER][ter] un peu fastidieuse. En fait, L'opération est plus compliquée qu'il n'y paraît. Il ne faut ménager aucun détail sous peine de "manquer la coche", entre les tags Git, les messages de commit, le bon numéro de version. Pour ne pas se fourvoyer, j'ai une check-list que je suis étape par étape. Si tout se passe bien, la procédure prend entre 10 et 15 minutes par extension.

J'avais déjà dans le collimateur plusieurs tentatives qui visaient à automatiser l'upload sur le TER via des Webhooks que propose Github. Il y avait entre autre l'approche de [Kay Strobach][kay] avec cette [ébauche][pov] de code.

Pour mes besoins, l'idée sous-jacente était de déclencher l'upload via la création d'un tag Git. Ayant discuté la chose avec [mon collègue Adrien][collègue], nous avons suivi l'approche qui est expliquée de manière approfondie dans [un article][article] écrit par [Claus Due][claus]. La verbosité de l'article peut laisser transparaître quelque chose de compliquer. Il n'en est rien! La mise en place se résume en quelques étapes.

### Tâches préparatoires

* Créer un sous-domaine, e.g. http://release.example.com
* Cloner l'extension [https://github.com/Ecodev/fluidtypo3-gizzle](https://github.com/Ecodev/fluidtypo3-gizzle), le dossier "web" devant être à la racine du Document Root.
* Ajouter un webhook pour le projet sur GitHub
 * URL: http://release.example.com/?settings=settings/ExtensionRelease.yml
 * Secret: 12356
* Transférer la clé des extension à un member "release" sur [typo3.org](typo3.org). Cette étape est optionnelle mais conseillée.

### Tâches de publication

* Mettre à jour le numéro de version dans le fichier `ext_emconf.php` et `composer.json`.
* Créer un tag et pousser ce tag avec la commande `git push --tags`, l'extension est uploadé sur TER avec un message générique qui pointe ver le log de Github. Très pratique!

### Quelques copies d'écran

![](/images/2015-02-20/2015-02-20_2202.png)

La mise en place du webhook

----------

![](/images/2015-02-20/2015-02-20_2203.png)

L'analyse du paylod permet de vérifier ce qui a été envoyé au Webhook.

----------

![](/images/2015-02-20/2015-02-20_2204.png)

Le retour du Webhook qui correspond au message envoyé par le TER.

Cet article [est disponible](/en/blog/2015/02/20/automatic-ter-release) en anglais également.

[extensions]:/fr/blog/2015/02/10/github-migration/
[article]:https://github.com/Ecodev/fluidtypo3-gizzle.
[kay]:http://blog.kay-strobach.de/
[collègue]:https://plus.google.com/+AdrienCrivelli/posts
[pov]:https://github.com/kaystrobach/TYPO3TerHook/
[claus]:https://twitter.com/namelesscoder
[ter]:http://typo3.org/extensions/repository/
