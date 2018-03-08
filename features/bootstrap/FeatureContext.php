<?php

use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo 
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 * 
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext implements Context
{
    /**
     * @var KernelInterface
     */
    private $kernel;
    /**
     * @var \Symfony\Bundle\FrameworkBundle\Console\Application
     */
    private $application;

    /**
     * @var Response|null
     */
    private $response;

    /**
     * FeatureContext constructor.
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        $this->application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $this->application->setAutoExit(false);
    }
    /**
     * @When a test Data base is set
     * Create
     */
    public function aTestDataBaseIsSet()
    {
        $input = new \Symfony\Component\Console\Input\ArrayInput(array(
            'command' => 'doctrine:schema:update',
            '--force' => true,
            '--env' => 'test'
        ));
        $output = null;
        $this->application->run($input, $output);
    }

    /**
     * @Then the test Data base is drop
     */
    public function theTestDataBaseIsDrop()
    {
        $input = new \Symfony\Component\Console\Input\ArrayInput(array(
            'command' => 'doctrine:schema:drop',
            '--force' => true
        ));
        $output = null;
        $this->application->run($input, $output);
    }
}
