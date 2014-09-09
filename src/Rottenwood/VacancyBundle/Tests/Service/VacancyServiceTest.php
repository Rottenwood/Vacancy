<?php
/**
 * Author: Rottenwood
 * Date Created: 10.09.14 0:33
 */

namespace Rottenwood\VacancyBundle\Tests\Service;

use Rottenwood\VacancyBundle\Service\VacancyService;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Unit tests for VacancyService
 * @package Rottenwood\VacancyBundle\Tests\Service
 */
class VacancyServiceTest extends WebTestCase {

    /**
     * @var EntityManager
     */
    private $_em;
    private $vacancyService;

    /**
     * Setting up kernel and entity manager
     */
    protected function setUp() {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->_em->beginTransaction();
        $this->vacancyService = new VacancyService($this->_em);
    }

    /**
     * Rollback
     */
    public function tearDown() {
        $this->_em->rollback();
    }

    /**
     * Test of getDepartments
     */
    public function testGetDepartments() {
        $testArray = array('head', 'financial', 'it');
        $this->assertEquals($testArray,  $this->vacancyService->getDepartments());
    }

    /**
     * Test of getLanguages
     */
    public function testGetLanguages() {
        $testArray = array('russian', 'french');
        $this->assertEquals($testArray,  $this->vacancyService->getLanguages());
    }

    /**
     * Test of getVacancies
     */
    public function testGetVacancies() {
        $vacancies = $this->vacancyService->getVacancies(2, 0);
        $vacancy = array_pop($vacancies);
        $this->assertEquals('Accountant', $vacancy["title"]);
    }
}
