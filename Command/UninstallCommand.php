<?php

namespace Webburza\Sylius\LocationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UninstallCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('webburza:sylius-location-bundle:uninstall')
            ->setDescription('Uninstalls the bundle, removes bundle-specific database tables and permissions.')
            ->setHelp('Usage:  <info>$ bin/console webburza:sylius-location-bundle:uninstall</info>')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Doctrine\ORM\EntityManager $manager */
        $manager = $this->getContainer()->get('doctrine.orm.default_entity_manager');

        $output->writeln('<info>Removing location tables...</info>');
        $this->removeLocationTables($manager);

        $output->writeln('<info>Removing permissions...</info>');
        $this->removePermissions($manager);

        $output->writeln('<info>Uninstallation complete.</info>');
    }

    /**
     * Remove location tables.
     *
     * @param \Doctrine\ORM\EntityManager $manager
     */
    private function removeLocationTables($manager)
    {
        // Check if tables exist
        $schemaManager = $manager->getConnection()->getSchemaManager();

        // Skip if product group table does not exist
        if (!$schemaManager->tablesExist(['webburza_sylius_location'])) {
            return;
        }

        $queries = [
            'ALTER TABLE webburza_sylius_location_type_translation DROP FOREIGN KEY FK_FC2A05E12C2AC5D3',
            'ALTER TABLE webburza_sylius_location_translation DROP FOREIGN KEY FK_3B2F83722C2AC5D3',
            'ALTER TABLE webburza_sylius_location_image DROP FOREIGN KEY FK_7DC32A0A64D218E',
            'ALTER TABLE webburza_sylius_location DROP FOREIGN KEY FK_B50D566DCDAE269',
            'DROP TABLE webburza_sylius_location_type_translation',
            'DROP TABLE webburza_sylius_location_type',
            'DROP TABLE webburza_sylius_location_translation',
            'DROP TABLE webburza_sylius_location_image',
            'DROP TABLE webburza_sylius_location',
        ];

        $manager->beginTransaction();

        foreach ($queries as $query) {
            $statement = $manager->getConnection()->prepare($query);
            $statement->execute();
        }

        $manager->commit();
    }

    /**
     * Remove permission entries.
     *
     * @param \Doctrine\ORM\EntityManager $manager
     */
    private function removePermissions($manager)
    {
        $repository = $this->getContainer()->get('sylius.repository.permission');

        // Get the main node to remove
        $managePermission = $repository->findOneBy(['code' => 'webburza_location.manage.location']);

        if ($managePermission) {
            // Remove permissions
            $manager->remove($managePermission);
            $manager->flush();
        }
    }
}
