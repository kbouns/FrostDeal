<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628092534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC28938A75');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC6EE5C49');
        $this->addSql('DROP INDEX UNIQ_67F068BC28938A75 ON commentaire');
        $this->addSql('DROP INDEX UNIQ_67F068BCC6EE5C49 ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD deal_id INT DEFAULT NULL, ADD utilisateur_id INT DEFAULT NULL, DROP id_deal_id, DROP id_utilisateur_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCF60E2305 FOREIGN KEY (deal_id) REFERENCES deal (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67F068BCF60E2305 ON commentaire (deal_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67F068BCFB88E14F ON commentaire (utilisateur_id)');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116C6EE5C49');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC1169F34925F');
        $this->addSql('DROP INDEX UNIQ_E3FEC1169F34925F ON deal');
        $this->addSql('DROP INDEX UNIQ_E3FEC116C6EE5C49 ON deal');
        $this->addSql('ALTER TABLE deal ADD utilisateur_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL, DROP id_utilisateur_id, DROP id_categorie_id');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E3FEC116FB88E14F ON deal (utilisateur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E3FEC116BCF5E72D ON deal (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCF60E2305');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCFB88E14F');
        $this->addSql('DROP INDEX UNIQ_67F068BCF60E2305 ON commentaire');
        $this->addSql('DROP INDEX UNIQ_67F068BCFB88E14F ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD id_deal_id INT DEFAULT NULL, ADD id_utilisateur_id INT DEFAULT NULL, DROP deal_id, DROP utilisateur_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC28938A75 FOREIGN KEY (id_deal_id) REFERENCES deal (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67F068BC28938A75 ON commentaire (id_deal_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67F068BCC6EE5C49 ON commentaire (id_utilisateur_id)');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116FB88E14F');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116BCF5E72D');
        $this->addSql('DROP INDEX UNIQ_E3FEC116FB88E14F ON deal');
        $this->addSql('DROP INDEX UNIQ_E3FEC116BCF5E72D ON deal');
        $this->addSql('ALTER TABLE deal ADD id_utilisateur_id INT DEFAULT NULL, ADD id_categorie_id INT DEFAULT NULL, DROP utilisateur_id, DROP categorie_id');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC1169F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E3FEC1169F34925F ON deal (id_categorie_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E3FEC116C6EE5C49 ON deal (id_utilisateur_id)');
    }
}
