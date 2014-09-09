<?php
/**
 * Author: Rottenwood
 * Date Created: 09.09.14 15:11
 */

namespace Rottenwood\VacancyBundle\Controller;

use Rottenwood\VacancyBundle\Entity\Vacancy;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller {

    public function getVacanciesAction($department = 1, $language = '') {
        $em = $this->getDoctrine()->getManager();
        $vacanciesDefaultLang = $em->getRepository("RottenwoodVacancyBundle:Vacancy")->findByDepartment($department);

        if ($language) {
            $vacancies = $this->getDoctrine()->getRepository('RottenwoodVacancyBundle:Translation')->findTranslations
            ($vacanciesDefaultLang, $language);
        }

        if (!isset($vacancies)) {
            $vacancies = $vacanciesDefaultLang;
        }

        $result = array();

        foreach ($vacancies as $vacancy) {
            /** @var Vacancy $vacancy */
            $result[]["title"] = $vacancy->getTitle();
            $result[]["description"] = $vacancy->getDescription();
        }

        return new JsonResponse($result);
    }
} 
