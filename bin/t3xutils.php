<?php

use etobi\extensionUtils\Command as Command;

require(__DIR__ . '/../lib/autoload.php');
\etobi\extensionUtils\register_autoload();

$console = new \Symfony\Component\Console\Application();
$console->setName('t3xutils');
$console->setVersion(defined('T3XUTILS_VERSION') ? constant('T3XUTILS_VERSION') : '?');

// add a helper set that handles configuration
$config = new \etobi\extensionUtils\ConsoleHelper\ConfigHelper();
// @todo more formats, configurable location
$configFileName = __DIR__ . '/../config.ini';
if(file_exists($configFileName) && is_readable($configFileName)) {
    $config->mergeConfiguration(parse_ini_file($configFileName, true));
}
$console->getHelperSet()->set($config);

// add all available commands
$console->addCommands(array(
    new Command\CheckForUpdateCommand(),
    new Command\T3xCreateCommand(),
    new Command\T3xExtractCommand(),
    new Command\FetchCommand(),
    new Command\InfoCommand(),
    new Command\SelfUpdateCommand(),
    new Command\UpdateInfoCommand(),
    new Command\TerUploadCommand(),
    new Command\TerPingCommand(),
    new Command\TerLoginCommand(),
    new Command\EmconfUpdateCommand(),
    new Command\TerCheckExtensionKeyCommand(),
    new Command\TerRegisterExtensionKeyCommand(),
	new Command\TerDeleteExtensionKeyCommand(),
	new Command\TerSearchAllCommand(),
	new Command\TerSearchUserCommand(),
	new Command\TerSearchExtensionKeyCommand(),
));

// remove the option --version. We need this for extension handling
$options = $console->getDefinition()->getOptions();
unset($options['version']);
$console->getDefinition()->setOptions($options);

$console->run();