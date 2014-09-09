<?php
/**
 * Author: Rottenwood
 * Date Created: 10.09.14 1:47
 */

namespace Rottenwood\VacancyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Functional tests for Api Controller
 * @package Rottenwood\VacancyBundle\Tests\Controller
 */
class ApiControllerTest extends WebTestCase {

    /**
     * Test of POST request to /api/language/list
     */
    public function testGetDepartmentsAction() {
        $client = static::createClient();

        $request = $client->request('POST', '/api/language/list');
        $response = $client->getResponse()->getContent();

        $this->assertContains('russian', $response);
    }
} 