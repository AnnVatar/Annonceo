<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

abstract class BaseFixture extends Fixture{
    private $manager;
    protected $faker;

    // méthode pour générer les entités
    // à implémenter par les classes enfant
    abstract protected function loadData(ObjectManager $manager);

    // méthode utilisée par le système de fixtures
    // Enregistre le Manager, initialise Faker et appelle loadData()
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create('fr_FR');
        $this->loadData($manager);
    }

    // Execute $count fois la fonction $factory
    // $factory doit créer et retourner une entité
    protected function createMany(int $count, callable $factory)
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = $factory($i);

            if (null === $entity) {
                throw new \LogicException('L\'Entité doit être retournée');
            }

            $this->manager->persist($entity);
        }
    }
}