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

/**
 * Fixtures for database
 * @package Rottenwood\VacancyBundle\DataFixtures\ORM
 */
class LoadVacancyData implements FixtureInterface {

    /** @var ObjectManager $om */
    private $om;

    /**
     * Loading fixtures into database
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager) {
        $this->om = $objectManager;

        $headDepartment = $this->createDepartment('head');
        $financialDepartment = $this->createDepartment('financial');
        $itDepartment = $this->createDepartment('it');

        $russian = $this->createLanguage('russian');
        $french = $this->createLanguage('french');

        // CEO vacancy
        $ceoVacancy = $this->createVacancy($headDepartment, 'CEO', 'We seek chief executive officer with criminal background.');
        $this->createTranslation($ceoVacancy, $russian, 'Исполнительный директор',
            'Срочно ищем человека который возьмет на себя вину в суде.');
        $this->createTranslation($ceoVacancy, $french, 'Directeur exécutif',
            'Le directeur exécutif est chargé de la gestion et de l’administration de l’Agence, à l’exclusion de la chambre de recours.');

        $baristaVacancy = $this->createVacancy($headDepartment, 'CBO', 'We seek chief barista officer to make coffee every morning.');
        $this->createTranslation($baristaVacancy, $russian, 'Директор по приготовлению кофе', 'Ищем директора по приготовлению кофе для всего офиса.');
        $this->createTranslation($baristaVacancy, $french, 'Directeur de café',
            'Le directeur de café est chargé de la gestion et de l’administration de l’Agence.');

        // Financialists
        $financialVacancy = $this->createVacancy($financialDepartment, 'Accountant', 'We seek accountant, but first of all a Minister of Finance’s close friend.');
        $this->createTranslation($financialVacancy, $russian, 'Бухгалтер',
            'Ищем бухгалтера с опытом подделки первичной документации и связями в министерстве финансов.');
        $this->createTranslation($financialVacancy, $french, 'Comptable',
            'Au sein du centre d’études et de services partagé, vous prenez la responsabilité de la comptabilité d’une de nos sociétés françaises.');

        // PHP Developer vacancies
        $developerVacancy = $this->createVacancy($itDepartment, 'PHP Developer',
            'We are searching for a PHP Developer to be a part of our progressive team, specializing mainly on duct taping, crutches and bicycles.');
        $this->createTranslation($developerVacancy, $russian, 'Разработчик PHP', 'Мы ищем разработчика, который не знает о том, что в версии PHP 5.3 был добавлен оператор goto.');
        $this->createTranslation($developerVacancy, $french, 'Développeur PHP', 'Vous recherchez une équipe jeune et dynamique,
        un espace pour libérer vos talents et une entreprise où la qualité et les avancées technologiques prennent une place importante, REJOIGNEZ-NOUS!');

        $developerJuniorVacancy = $this->createVacancy($itDepartment, 'PHP Developer Junior',
            'We are searching for a PHP Developer to be a part of our progressive team, specializing mainly on duct taping, crutches and bicycles.');
        $this->createTranslation($developerJuniorVacancy, $russian, 'Младший Разработчик PHP', 'Мы ищем разработчика, который не знает о том, что в версии PHP 5.3 был добавлен оператор goto.');
        $this->createTranslation($developerJuniorVacancy, $french, 'Développeur PHP Jeune', 'Vous recherchez une équipe jeune et dynamique,
        un espace pour libérer vos talents et une entreprise où la qualité et les avancées technologiques prennent une place importante, REJOIGNEZ-NOUS!');

        // QAs
        $testerVacancy = $this->createVacancy($itDepartment, 'ASM QA Engineer',
            'We are searching for a QA engineer to write unit and functional tests on Assambler language.');
        $this->createTranslation($testerVacancy, $russian, 'Тестировщик ASM', 'Мы ищем тестировщика для написания функциональных и юнит-тестов на Ассэмблере.');
        $this->createTranslation($testerVacancy, $french, 'QA Ingénieur', 'Je suis recruteuse indépendante spécialisée dans l’IT');

        $testerJuniorVacancy = $this->createVacancy($itDepartment, 'ASM QA Engineer Junior', 'We are searching for a QA engineer to write unit and functional tests on Assambler language.');
        $this->createTranslation($testerJuniorVacancy, $russian, 'Младший Тестировщик ASM', 'Мы ищем тестировщика для написания функциональных и юнит-тестов на Ассэмблере.');
        $this->createTranslation($testerJuniorVacancy, $french, 'QA Ingénieur Jeune', 'Je suis recruteuse indépendante spécialisée dans l’IT');

        // Test vacancy without translation
        $fixtureVacancy = $this->createVacancy($itDepartment, 'Fixture Engineer',
            'Test vacancy without translation to other languages.');

        $this->om->flush();
    }

    /**
     * Create new department
     * @param string $name
     * @return Department
     */
    private function createDepartment($name) {
        $object = new Department();
        $object->setName($name);

        $this->om->persist($object);

        return $object;
    }

    /**
     * Create new language
     * @param string $name
     * @return Language
     */
    private function createLanguage($name) {
        $object = new Language();
        $object->setName($name);

        $this->om->persist($object);

        return $object;
    }

    /**
     * Create new vacancy
     * @param Department $department
     * @param string $title
     * @param string $description
     * @return Vacancy
     */
    private function createVacancy(Department $department, $title, $description) {
        $object = new Vacancy();
        $object->setDepartment($department);
        $object->setTitle($title);
        $object->setDescription($description);

        $this->om->persist($object);

        return $object;
    }

    /**
     * Create new translation to vacancy
     * @param Vacancy  $vacancy
     * @param Language $language
     * @param string   $title
     * @param string   $description
     * @return Translation
     */
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
