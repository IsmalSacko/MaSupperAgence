<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417103617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aad DROP FOREIGN KEY FK_806D87A2F675F31B');
        $this->addSql('DROP INDEX IDX_806D87A2F675F31B ON aad');
        $this->addSql('ALTER TABLE aad DROP author_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aad ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE aad ADD CONSTRAINT FK_806D87A2F675F31B FOREIGN KEY (author_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_806D87A2F675F31B ON aad (author_id)');
    }
}
