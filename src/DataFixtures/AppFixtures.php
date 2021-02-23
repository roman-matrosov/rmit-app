<?php

namespace App\DataFixtures;

use App\Entity\Application;
use App\Entity\AppService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
		for ($i=0;$i<50;$i++) {
			$appName = 'application' . $i;
			$application = new Application();
			$application->setAppCode($appName);
			$application->setName($appName);
			$application->setAppGroup($appName);
			$application->setAppType($appName);
			$application->setDescription($appName);
			$application->setAppCost($i);
			
			$appServiceName = 'appservice' . $i;
			$appService = new AppService();
			$appService->setServiceCode($appServiceName);
			$appService->setName($appServiceName);
			$appService->setType($i);
			$appService->setSubType($i);
			$appService->setDescription($appServiceName);
			
			$application->addAppService($appService);
			
			$manager->persist($application);
		}
	
		$manager->flush();
    }
	
	public static function getGroups(): array
	{
		return ['Application'];
	}
}
