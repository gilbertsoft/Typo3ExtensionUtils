# TYPO3 Extension Utils

This is (or should get) a collection of CLI utilities for TYPO3 CMS Extension. Goal is to be able to do common tasks
while developing extensions from the cli. All tools work without a fully functional TYPO3 installation. Actually the
TYPO3 CMS core isn't needed at all for this utilities.


## Features:

* √ Upload an extension by given path to the TER (TYPO3 Extension Repository)
* (coming) Delete an extension in a certain version from TER
* (coming) Update the MD5 sums in ext_emconf.php
* (coming) Extract extension from a .t3x file
* (coming) Create a .t3x from a extension path


### Upload Extension to TER

Usage:

	./bin/uploadExtension.php <typo3.org-username> <typo3.org-password> <extensionKey> "<uploadComment>" <pathToExtension>

Example:

	./bin/uploadExtension.php eTobi.de 'mySecretPassword' foobar "Minor Bugfixes and cleanup" /var/www/foobar/typo3conf/ext/foobar/