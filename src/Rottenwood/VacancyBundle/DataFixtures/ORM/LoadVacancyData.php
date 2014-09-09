<?php
/**
 * Author: Rottenwood
 * Date Created: 09.09.14 10:07
 */

namespace Rottenwood\VacancyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rottenwood\VacancyBundle\Entity\Department;
use Rottenwood\VacancyBundle\Entity\Language;
use Rottenwood\VacancyBundle\Entity\Translation;
use Rottenwood\VacancyBundle\Entity\Vacancy;

class LoadVacancyData implements FixtureInterface {

    /** @var ObjectManager $om */
    private $om;

    public function load(ObjectManager $objectManager) {
        $this->om = $objectManager;

        $headDepartment = $this->createDepartment('head');
        $financialDepartment = $this->createDepartment('financial');
        $itDepartment = $this->createDepartment('it');

        $russian = $this->createLanguage('russian');
        $french = $this->createLanguage('french');

        $ceoVacancy = $this->createVacancy($headDepartment, 'CEO', 'We seek chef executive officer with criminal
        background.');

        $this->createTranslation($ceoVacancy, $russian, 'Исполнительный директор',
            'Срочно ищем человека который возьмет на себя вину в суде.');

        $this->om->flush();
    }

    private function createDepartment($name) {
        $object = new Department();
        $object->setName($name);

        $this->om->persist($object);

        return $object;
    }

    private function createLanguage($name) {
        $object = new Language();
        $object->setName($name);

        $this->om->persist($object);

        return $object;
    }

    private function createVacancy($department, $title, $description) {
        $object = new Vacancy();
        $object->setDepartment($department);
        $object->setTitle($title);
        $object->setDescription($description);

        $this->om->persist($object);

        return $object;
    }

    private function createTranslation(Vacancy $vacancy, Language $language, $title, $description) {
        $object = new Translation();
        $object->setTitle($title);
        $object->setDescription($description);
        $object->setLanguage($language);
        $object->setVacancy($vacancy);

        $this->om->persist($object);

        return $object;
    }
} 
