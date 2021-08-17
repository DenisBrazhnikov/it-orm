<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210816192407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars ADD manufacturer_id INT NOT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14A23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturers (id)');
        $this->addSql('CREATE INDEX IDX_95C71D14A23B42D ON cars (manufacturer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14A23B42D');
        $this->addSql('DROP INDEX IDX_95C71D14A23B42D ON cars');
        $this->addSql('ALTER TABLE cars DROP manufacturer_id');
    }
}
