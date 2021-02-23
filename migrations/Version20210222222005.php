<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222222005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_service DROP FOREIGN KEY FK_CC01A9F723B1538');
        $this->addSql('ALTER TABLE app_service ADD CONSTRAINT FK_CC01A9F723B1538 FOREIGN KEY (app_code) REFERENCES application (app_code) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_service DROP FOREIGN KEY FK_CC01A9F723B1538');
        $this->addSql('ALTER TABLE app_service ADD CONSTRAINT FK_CC01A9F723B1538 FOREIGN KEY (app_code) REFERENCES application (app_code) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
