<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222211500 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_service (service_code VARCHAR(255) NOT NULL, app_code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(4) DEFAULT NULL, sub_type VARCHAR(4) DEFAULT NULL, last_modified DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_CC01A9F723B1538 (app_code), PRIMARY KEY(service_code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application (app_code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, app_group VARCHAR(90) DEFAULT NULL, app_type VARCHAR(90) DEFAULT NULL, description LONGTEXT DEFAULT NULL, app_cost DOUBLE PRECISION DEFAULT NULL, last_modified DATETIME NOT NULL, PRIMARY KEY(app_code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_service ADD CONSTRAINT FK_CC01A9F723B1538 FOREIGN KEY (app_code) REFERENCES application (app_code)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_service DROP FOREIGN KEY FK_CC01A9F723B1538');
        $this->addSql('DROP TABLE app_service');
        $this->addSql('DROP TABLE application');
    }
}
