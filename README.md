fabarea.tk
==========

fabarea.tk blog

Install Sculpin
===============

Web pages are generated with Sculpin which is a static site generator written in PHP.
It can be installed global as follows:

	curl -O https://download.sculpin.io/sculpin.phar
	chmod +x sculpin.phar
	sudo mv sculpin.phar /usr/bin/sculpin

Development
===========

For local development.

	git clone https://github.com/fudriot/fabarea.tk.git

    # Move to the "en" directory
	cd en/

	# Install Web Components and external dependencies
	sculpin install

	# Start the server
	sculpin generate --watch --server --port=8002


Publish
=======

Publish to production server

	./publish.php

Additionally, you can add a ``--dry`` flag to see the command before real execution.

	./publish.php --dry
