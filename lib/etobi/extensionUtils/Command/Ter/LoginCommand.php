<?php

namespace etobi\extensionUtils\Command\Ter;

use etobi\extensionUtils\Controller\SelfController;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TerLoginCommand checks if a username and password are valid credentials for TYPO3 SOAP API
 *
 * @author Christian Zenker <christian.zenker@599media.de>
 */
class LoginCommand extends AbstractAuthenticatedTerCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('ter:login-test')
            ->setDefinition(array())
            ->setDescription('Checks if a username and password are valid credentials for TYPO3 SOAP API')
            //@TODO: longer help text
//            ->setHelp()
        ;
        $this->configureSoapOptions();
        $this->configureCredentialOptions();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $loginRequest = $this->getRequestObject('\\etobi\\extensionUtils\\T3oSoap\\LoginRequest');
        $result = $loginRequest->checkCredentials();

        if($result) {
            $output->writeln('Your credentials are valid.');
            return 0;
        } else {
            $output->writeln('<error>Your credentials are invalid.</error>');
            return 1;
        }
    }
}