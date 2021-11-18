<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117191316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, mastery_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, tier INT NOT NULL, maximum_level INT NOT NULL, type VARCHAR(255) NOT NULL, parent VARCHAR(255) DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, cool_down VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, properties JSON DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_D5311670E26FCE68 (mastery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670E26FCE68 FOREIGN KEY (mastery_id) REFERENCES mastery (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE skills');
    }
}
