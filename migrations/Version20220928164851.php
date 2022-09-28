<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928164851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage ADD avatar_personnage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DA6A8707E FOREIGN KEY (avatar_personnage_id) REFERENCES avatar (id)');
        $this->addSql('CREATE INDEX IDX_6AEA486DA6A8707E ON personnage (avatar_personnage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DA6A8707E');
        $this->addSql('DROP INDEX IDX_6AEA486DA6A8707E ON personnage');
        $this->addSql('ALTER TABLE personnage DROP avatar_personnage_id');
    }
}
