<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417154520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur ADD image_ad_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B35871513F FOREIGN KEY (image_ad_id) REFERENCES aad (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B35871513F ON utilisateur (image_ad_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B35871513F');
        $this->addSql('DROP INDEX UNIQ_1D1C63B35871513F ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP image_ad_id');
    }
}