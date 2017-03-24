<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 24/03/2017
 * Time: 16:04
 */

namespace ApplicationTest\Controller;


use Application\Controller\ContactController;
use Application\Service\ContactServiceInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ContactControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();

        $this->contactService = $this->getMockBuilder(ContactServiceInterface::class)
                ->disableOriginalConstructor()
                ->disableOriginalClone()
                ->getMock();

        /** @var ServiceManager $sm */
        $sm = $this->getApplication()->getServiceManager();
        $sm->setAllowOverride(true);

        $sm->setService(ContactServiceInterface::class, $this->contactService);
    }

    public function testListActionCanBeAccessed()
    {
        $this->contactService
            ->expects($this->once())
            ->method('getAll')
            ->willReturn([]);

        $this->dispatch('/contacts', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName(ContactController::class); // as specified in router's controller name alias
        $this->assertControllerClass('ContactController');
        $this->assertMatchedRouteName('contact');
    }
}