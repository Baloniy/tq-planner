<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211128201019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_classes (id INT AUTO_INCREMENT NOT NULL, mastery_id INT DEFAULT NULL, additional_mastery_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_6B48FEF8E26FCE68 (mastery_id), INDEX IDX_6B48FEF8F7DAE987 (additional_mastery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_classes ADD CONSTRAINT FK_6B48FEF8E26FCE68 FOREIGN KEY (mastery_id) REFERENCES mastery (id)');
        $this->addSql('ALTER TABLE character_classes ADD CONSTRAINT FK_6B48FEF8F7DAE987 FOREIGN KEY (additional_mastery_id) REFERENCES mastery (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE character_classes');
    }
}
