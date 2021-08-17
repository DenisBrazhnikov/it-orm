<?php

namespace App\Command;

use App\Entity\Manufacturer;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestOrmCommand extends Command
{
    protected static $defaultName = 'app:test-orm';
    protected static $defaultDescription = 'Add a short description for your command';

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure(): void
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $manufacturer = new Manufacturer();
        $manufacturer->setName('Manufacturer '. time());

        $car = new Car();
        $car->setName('Car '. time());
        $car->setManufacturer($manufacturer);

        $this->em->persist($manufacturer);
        $this->em->persist($car);
        $this->em->flush();

        $output->write('Car: '. $car->getName() . ', Manufacturer: '. $manufacturer->getName());

        return Command::SUCCESS;
    }
}
