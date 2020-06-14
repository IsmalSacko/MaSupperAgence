<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200419060257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aad_utilisateur (aad_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_CBFA5459FB7C5FD7 (aad_id), INDEX IDX_CBFA5459FB88E14F (utilisateur_id), PRIMARY KEY(aad_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aad_utilisateur ADD CONSTRAINT FK_CBFA5459FB7C5FD7 FOREIGN KEY (aad_id) REFERENCES aad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aad_utilisateur ADD CONSTRAINT FK_CBFA5459FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur CHANGE image_ad_id image_ad_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE aad_utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE image_ad_id image_ad_id INT DEFAULT NULL');
    }
}
