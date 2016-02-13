# Fast Static Site

> When you need to create a simple company static website and you want to use php and a lot of less and javascript files this project could be the right choice cause produce minimal html, css and js ready to store in production to keep high server performance.

### The goal

* Push in your production server only the html minified version of php your php files.
* Push in your production server or CDN all statics and minified files.

### Warning

> Obviously to create .html files webserver needs right file privilege (or simply do a chmod 777)

##### Develop with php

* Write the frontend with a smart template engine as [Twig](http://twig.sensiolabs.org/doc/templates.html#)
* Everytime you open the file (index.php) in your browser, php create a minified version of the output (index.html) & replace the URLS of static resources (if you need to store them in a CDN)

##### Develop with less / js

* From console use $ grunt watch so, everytime that you update a file the combine and compress files (the goal is to produce only one css and one js file super compressed to speed up browser rendering).

### The problem

> If you need to add a blog section in your blog or a backend html files is not the right choise so use some javascript frameworks as angular to do that (as I reccomended) or place a CMS as wordpress in a separate folder (as /news but this not the philosofy of this project).

### Install dependecies

There are a lot of dependencies so this is the boring part:

##### Bower (package manager to frontend libraries):

Install bower: [bower install](http://bower.io/#install-bower)

Install bower dependencies:
```sh
$ bower install
```

##### Node & npm (node package manager, used with grunt)

Install node:
[node install](https://changelog.com/install-node-js-with-homebrew-on-os-x/)
or [node install](https://docs.npmjs.com/getting-started/installing-node)

Install node dependencies:
```sh
$ npm install
```

##### Install composer (php package manager)

Install composer:
[composer install](https://getcomposer.org/doc/00-intro.md)
or [composer install](http://fedojo.com/installing-brew-php-composer-wp-cli-mac-osx/)

Install composer dependencies:
```sh
$ composer install
```

### Folder explanation

├── js 				-> Folder of your javascripts
├── less 			-> Folder of less files
├── static 			-> Folder of minified static files
│   ├── css
│   ├── fonts
│   ├── img
│   └── js
├── Gruntfile.js 	-> The grunt task config file that minify css and js
├── inc 			-> The project php logic
├── index.php   	-> An example php file
├── index.html  	-> The html file ready for production
└── views 			-> Folder of Twig php template
    ├── base
    │   └── base.html
    ├── index.html