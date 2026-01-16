<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260116125507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link ADD permission_level VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE node ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE node_permission ADD permission_level VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link DROP permission_level');
        $this->addSql('ALTER TABLE node DROP type');
        $this->addSql('ALTER TABLE node_permission DROP permission_level');
    }
}
