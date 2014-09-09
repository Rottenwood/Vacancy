<?php

namespace Rottenwood\VacancyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Default Controller
 * @package Rottenwood\VacancyBundle\Controller
 */
class DefaultController extends Controller {

    /**
     * Main page of the application
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {

        return $this->render('RottenwoodVacancyBundle:Default:index.html.php');
    }
}
