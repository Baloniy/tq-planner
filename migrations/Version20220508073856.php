<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508073856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments CHANGE level_requirement level_requirement SMALLINT DEFAULT NULL, CHANGE bonus bonus JSON NOT NULL, CHANGE summons summons JSON NOT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE `set` equipment_set VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE level_requirement level_requirement SMALLINT NOT NULL, CHANGE bonus bonus JSON DEFAULT NULL, CHANGE summons summons JSON DEFAULT NULL, CHANGE equipment_set `set` VARCHAR(255) DEFAULT NULL');
    }
}
