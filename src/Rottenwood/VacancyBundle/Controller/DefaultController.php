<?php

namespace Rottenwood\VacancyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {


        return $this->render('RottenwoodVacancyBundle:Default:index.html.php');
    }
}
