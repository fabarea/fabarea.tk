---
title: Date format in PHP
tags:
    - php
    - date
---


Formatting dates in PHP is one of those things that is more twisted / complicated than it looks. The case is simple, we want to display a date, taking into account the linguistic context. Let us first look the `\DateTime ()`

```
$date = new \DateTime();
print $date->format("d F Y"); // 20 Mar.2015
```

Mmm ... It works but unfortunately for us, the return of `format` method is in English only.

To translate a date, use the ``strftime`` function which will used the Locales of the system under the hood. However, the formatting syntax is different since it has percent "%" as symbol and different letters.

```
setlocale(LC_TIME, "fr_FR");
print strftime("%A %B %G"); // Vendredi mars 2015
```

By combining the object approach and the ``strftime`` function, this provides a more elegant solution.

```
setlocale(LC_TIME, "fr_FR");
$date = new \DateTime();
print strftime("%A %B %G", $date->getTimestamp());
// Vendredi mars 2015
```

Unfortunately, this is not final solutio because `` strftime`` has limitations and does not work properly with a time prior to 1970.

Finally, the safest approach is to use a PHP extension "[Intl] [Intl]" which is specialized in this task. A quick example:

```
$date = new \DateTime();

$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
$formatter->setPattern('E d.M.Y');

print $formatter->format($date); // ven. 20.3.2015
```

QED!

This article is [available](/fr/blog/2015/03/17/format-date-in-php/) in French also.

[Intl]: http://php.net/intl
