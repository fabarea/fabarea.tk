---
title: Premier pas avec ES6 et Backbone
tags:
    - javascript
    - es6
    - babel
    - grunt
    - backbone
---

**TL;TR retour d'expérience sur un mini-application basée sur ES6 et Backbone en terre promise!**

Un petit retour sur un développement que j'ai fait dernièrement en JavaScript et dont je suis **assez** satisfait au point que j'aimerais en parler.

La demande du client allait dans le sens d'une mini applications qui devait se greffer sur un site existant et qui présentait un questionnaire, rempli interactivement question après question par l'utilisateur.

Dans un premier temps, je me suis embarquée dans [ES6](https://github.com/lukehoban/es6features), le successeur de ES5 qui est le JavaScript tel que nous connaissons / écrivons. Cela permet de mieux organiser son code avec des classes, des templates, des modules, etc.. Bref tout ce que nous aimons et qui professionnalise l'application.

Comme tous les navigateurs ne supportent pas ES6, le code est passé à la moulinette via un `transpiler` et puis **servit en version ES5 au navigateur** qui le rend ainsi parfaitement compatible. À mesure que les navigateurs progresserons dans le support de ES6, la couche de compatibilité se verra réduite jusqu'à disparaître. Un des `transpiler` phare du moment est [Babel](http://babeljs.io/) qui était anciennement connu sous le nom de `6to5`. Pour faire de la transpilation à la volée, j'utilise [Grunt](http://gruntjs.com/) que je maîtrise et qui fonctionne bien pour mes besoins. Je me suis inspiré de [ce projet](https://github.com/Couto/babel-runners-example) qui démontre ce processus avec une variété d'autres outils, [Gulp](http://gulpjs.com/) par exemple.

Parallèlement, je voulais appuyer ma min-application sur un système d'événement JavaScript. Lorsque l'utilisateur clique sur un bouton par exemple, un événement est émis. Les bons écouteurs se chargent de réagir et déclenche des actions. Cette approche à l'avantage de découpler l'application. En fouillant un peu, je suis tombé sur [ce projet](https://github.com/addyosmani/todomvc-backbone-es6) qui a été une grande **source d'inspiration** et qui montrent l'écriture du fameux Todo en ES6 et Backbone. Backbone est une librairie JS qui fournit une Vue-Modèle couplé à un système de dispatching d'événement. Ce que je cherchais... Cela permet d'écrire du code du plus haut niveau que, pour comparer, avec jQuery où on raisonne en terme de DOM avec les effets de bord qui vont avec. Pour un bref aperçu voici la [version commentée](https://github.com/addyosmani/todomvc-backbone-es6/blob/gh-pages/js/todo-app.js).

En résumé, dans les plus:

* **légerté**: le code fait moins de 80K tout compris, mon code + les librairies, bas de gros bateaux à charger pour le navigateur (mobile).
* **pluggable**: le code s'intègre comme une mini-application sur un site existant
* **maintenable**: ES6 réduit drastiquement le code "boilerplate".

Dans les moins:

* **transpiler**: même si rapide, cela ajoute une couche et tout n'est pas "transilable" mais si une grande majorité est couvert.

Je guette aussi le projet [Aurelia](http://aurelia.io/). L'approche va plus loin et demande d'entrer dans un framework, donc plus "radical" bien qui très proche du standard ES6 et ES7 dans sa philosophie.

Ma version du code, très humblement:<br/>
[https://github.com/visol/ext-easyvote_smartvote/tree/master/Resources/Public/JavaScript/App](https://github.com/visol/ext-easyvote_smartvote/tree/master/Resources/Public/JavaScript/App)

This article is [available](/en/blog/2015/05/07/first-steps-with-es6-and-backbone/) in English also.
