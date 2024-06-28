<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628091052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, type_vote TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deal ADD vote_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC11672DCDAFC FOREIGN KEY (vote_id) REFERENCES vote (id)');
        $this->addSql('CREATE INDEX IDX_E3FEC11672DCDAFC ON deal (vote_id)');
        $this->addSql('ALTER TABLE utilisateur ADD vote_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B372DCDAFC FOREIGN KEY (vote_id) REFERENCES vote (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B372DCDAFC ON utilisateur (vote_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC11672DCDAFC');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B372DCDAFC');
        $this->addSql('DROP TABLE vote');
        $this->addSql('DROP INDEX IDX_E3FEC11672DCDAFC ON deal');
        $this->addSql('ALTER TABLE deal DROP vote_id');
        $this->addSql('DROP INDEX IDX_1D1C63B372DCDAFC ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP vote_id');
    }
}
