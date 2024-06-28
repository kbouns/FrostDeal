<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628092125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_deal_id INT DEFAULT NULL, id_utilisateur_id INT DEFAULT NULL, contenue LONGTEXT NOT NULL, date_commentaire DATETIME NOT NULL, UNIQUE INDEX UNIQ_67F068BC28938A75 (id_deal_id), UNIQUE INDEX UNIQ_67F068BCC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC28938A75 FOREIGN KEY (id_deal_id) REFERENCES deal (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC28938A75');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC6EE5C49');
        $this->addSql('DROP TABLE commentaire');
    }
}
