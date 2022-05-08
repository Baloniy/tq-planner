<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507133948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments ADD item_level SMALLINT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD tag VARCHAR(255) NOT NULL, ADD level_requirement SMALLINT DEFAULT NULL, ADD classification VARCHAR(255) DEFAULT NULL, ADD drops_in VARCHAR(255) DEFAULT NULL, ADD dexterity_requirement SMALLINT DEFAULT NULL, ADD intelligence_requirement SMALLINT DEFAULT NULL, ADD strength_requirement SMALLINT DEFAULT NULL, ADD `set` VARCHAR(255) DEFAULT NULL, ADD act VARCHAR(255) DEFAULT NULL, ADD properties JSON NOT NULL, ADD description TINYTEXT DEFAULT NULL, ADD bonus JSON DEFAULT NULL, ADD summons JSON DEFAULT NULL, ADD created_at DATETIME NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6F6C2544389B783 ON equipments (tag)');
        $this->addSql('CREATE INDEX tag_idx ON equipments (tag)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_6F6C2544389B783 ON equipments');
        $this->addSql('DROP INDEX tag_idx ON equipments');
        $this->addSql('ALTER TABLE equipments DROP item_level, DROP name, DROP tag, DROP level_requirement, DROP classification, DROP drops_in, DROP dexterity_requirement, DROP intelligence_requirement, DROP strength_requirement, DROP `set`, DROP act, DROP properties, DROP description, DROP bonus, DROP summons, DROP created_at');
    }
}
