<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628090120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634F60E2305');
        $this->addSql('DROP INDEX IDX_497DD634F60E2305 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP deal_id');
        $this->addSql('ALTER TABLE deal ADD id_cateegorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC1163EB31CF5 FOREIGN KEY (id_cateegorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E3FEC1163EB31CF5 ON deal (id_cateegorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD deal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634F60E2305 FOREIGN KEY (deal_id) REFERENCES deal (id)');
        $this->addSql('CREATE INDEX IDX_497DD634F60E2305 ON categorie (deal_id)');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC1163EB31CF5');
        $this->addSql('DROP INDEX UNIQ_E3FEC1163EB31CF5 ON deal');
        $this->addSql('ALTER TABLE deal DROP id_cateegorie_id');
    }
}
