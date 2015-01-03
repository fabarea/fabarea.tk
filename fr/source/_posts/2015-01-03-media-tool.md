---
title: Media extension - identifier les fichiers doublons!
tags:
    - media
    - typo3 cms
---

Je développe déjà depuis quelques temps une [extension][media] pour la gestion des média pour [TYPO3 CMS][cms] avec comme point fort l'ergonomie et le traitement avancés des metadata.

Je viens d'ajouter un nouvel outil qui permet la détection de fichiers doublons. Cela permet par exemple d'identifier un même fichier qui aurait été uploadé par inadvertance plusieurs fois par un utilisateur et qui serait à double dans le storage. L'outils produit une liste qui affiche ces doublons, ensuite, il est possible de sélectionner les fichiers qui sont à supprimer.

Cet ajout vient compléter la liste des outils existants. Il y avait la possibilité déjà de repérer les fichiers manquants ou des enregistrements à double dans la base de donné.


### En images

Ouverture du paneau des outils:

![](images/2015-01-03/2015-01-03_1025.png)


Sélection de l'outil:

![](images/2015-01-03/2015-01-03_1030.png)

Sélection des doublons:

![](images/2015-01-03/2015-01-03_1031.png)

### Installation

Pour tester cette fonctionnalité, il faut récupérer les sources depuis le [dépôt Git][git-media], en attendant sa publication sur le [TER][ter], ainsi que mettre à jour de l'extension [Vidi][vidi] qui est le moteur sous-jacent à Media.


    # Clone du master de Vidi
    cd typo3conf/ext
    git clone git://git.typo3.org/TYPO3CMS/Extensions/vidi.git

    # Clone du master de Media
    cd typo3conf/ext
    git clone git://git.typo3.org/TYPO3CMS/Extensions/media.git

### Sponsor

Cette fonctionnalité a été sponsorisé par [Visol][visol] que je remercie chaleureusement.

Cet article [est disponible](fr/blog/2015/01/03/media-tool) en anglais également.

[media]: https://forge.typo3.org/projects/extension-media/
[vidi]: https://forge.typo3.org/projects/extension-vidi/
[cms]:http://demo.typo3.org/
[ter]:http://typo3.org/extensions/repository/
[git-media]: https://git.typo3.org/TYPO3CMS/Extensions/media.git
[visol]:http://www.visol.ch/