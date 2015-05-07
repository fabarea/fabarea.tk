---
title: First steps with ES6 and Backbone
tags:
    - javascript
    - es6
    - babel
    - grunt
    - backbone
---

**TL;TR Feedback on a mini-application based on ES6 and Backbone in promise land!**

Here is a small feedback on a development that I made recently in JavaScript and I'm **pretty** happy to the extend I would like to talk about it.

As a quick background, the Customer asked for a mini-applications that has to be plugged onto an existing website. The application basically had to displayed a questionnaire interactively filled out by the User question by question.

At first, I embarked in [ES6](https://github.com/lukehoban/es6features), the successor of ES5 which is the JavaScript we know / write today. This next iteration of the language allows to better organize the code with classes, templates, modules, etc .. In short all that we love and what professionalize the application.

Since all browsers do not support ES6, the code is passed through a `transpiler`. Eventually the ES5 version is served to the browser which makes it **perfectly compatible**. As browser vendors move forward in ES6 support, compatibility layer will be reduced until it can be fully removed. A famous `transpiler` gaining a lot of attraction at the moment is [Babel](http://babeljs.io/) which was formerly known as ` 6to5`. To make transpilation on the fly, I use [Grunt](http://gruntjs.com/) that works well for my needs. I was inspired by [the project](https://github.com/Couto/babel-runners-example) demonstrating this process with a variety of other tools, [Gulp](http://gulpjs.com/ ) for example.

Meanwhile, I wanted to build the application upon the driven event approach. As example, when the user clicks a button, an event is fired. The adequate listener is responsible to react and triggers actions. This approach has the advantage of decoupling the application. Digging a little, I came across [the project](https://github.com/addyosmani/todomvc-backbone-es6) which was a great **source of inspiration**. It illustrates the famous Todo example using ES6 and Backbone. Backbone is a JS library that provides a view-model supported by an event dispatching system. Exactly what I was looking for ... This allows to write high level code not to compare with jQuery where we have to think at the level of the DOM with all side effects it has. For a brief overview here is the [annotated version](https://github.com/addyosmani/todomvc-backbone-es6/blob/gh-pages/js/todo-app.js).

In summary, the pros:

* **Light and fast**: the code is less than 80K all included, my code + libraries
* **Pluggable**: it can be loaded on a existing / running web site (no radical architecture design)
* **Maintainable**: ES6 drastically reduces the "boilerplate" code.

In less:

* **Transpiler**: even if fast, it adds a layer and not all is "transpilable" to ES5 - although the large majority is covered.

I also keep an eye on the project [Aurelia](http://aurelia.io/). The approach goes further and requires to dive into a framework, but with the promise to stick to the ES6 and ES7 standards.

My humble [version]([https://github.com/visol/ext-easyvote_smartvote/tree/master/Resources/Public/JavaScript/App](https://github.com/visol/ext-easyvote_smartvote/tree/master/Resources/Public/JavaScript/App)) of the code - still in development<br/>

This article is [available](/fr/blog/2015/05/07/first-steps-with-es6-and-backbone/) in French also.
