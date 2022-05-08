<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507164755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments ADD equipment_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipments ADD CONSTRAINT FK_6F6C2544B337437C FOREIGN KEY (equipment_type_id) REFERENCES equipment_types (id)');
        $this->addSql('CREATE INDEX IDX_6F6C2544B337437C ON equipments (equipment_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments DROP FOREIGN KEY FK_6F6C2544B337437C');
        $this->addSql('DROP INDEX IDX_6F6C2544B337437C ON equipments');
        $this->addSql('ALTER TABLE equipments DROP equipment_type_id');
    }
}
