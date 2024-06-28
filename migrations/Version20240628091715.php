<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628091715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote ADD id_utilisateur_id INT DEFAULT NULL, ADD id_deal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A10856428938A75 FOREIGN KEY (id_deal_id) REFERENCES deal (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A108564C6EE5C49 ON vote (id_utilisateur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A10856428938A75 ON vote (id_deal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564C6EE5C49');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A10856428938A75');
        $this->addSql('DROP INDEX UNIQ_5A108564C6EE5C49 ON vote');
        $this->addSql('DROP INDEX UNIQ_5A10856428938A75 ON vote');
        $this->addSql('ALTER TABLE vote DROP id_utilisateur_id, DROP id_deal_id');
    }
}
