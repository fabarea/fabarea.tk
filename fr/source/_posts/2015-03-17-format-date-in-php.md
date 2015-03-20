---
title: Formatter une date en PHP
tags:
    - php
    - date
---


Le formatage des dates en PHP fait partie de ces choses qui s'avère plus tordu / compliqué que prévu. Le cas est simple, il s'agit d'afficher une date en tenant compte du contexte linguistique. Regardons tout d'abord l'objet `\DateTime()`

```
$date = new \DateTime();
print $date->format("d F Y"); // 20 Mar.2015
```

Mmm... Cela marche mais malheureusement pour nous, le retour de la méthode `format` est en anglais uniquement.

Pour traduire une date, il faut utiliser la fonction ``strftime`` qui utilse les locales  du système. A note que la syntaxe du formatage est différente qui se présente avec des pourcents "%" et des autres symboles.

```
setlocale(LC_TIME, "fr_FR");
print strftime("%A %B %G"); // Vendredi mars 2015
```

En combinant l'approche objet et la fonction ``strftime``, cela offre une solution plus élégante.


```
setlocale(LC_TIME, "fr_FR");
$date = new \DateTime();
print strftime("%A %B %G", $date->getTimestamp());
// Vendredi mars 2015
```

Hélas cette solutio n'est pas finale, car la fonction ``strftime`` a des limitations et ne fonctionne pas correctement avec un temps antérieur à 1970.


Finalement l'approche la plus sûre est l'utilisation d'une extension PHP "[Intl][Intl]" qui est spécialisée dans cette tâche. Un rapide exemple:

```
$date = new \DateTime();

$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
$formatter->setPattern('E d.M.Y');

print $formatter->format($date); // ven. 20.3.2015
```

CQFD!

Cet article [est disponible](/en/blog/2015/03/17/format-date-in-php/) en anglais également.


[Intl]: http://php.net/intl
