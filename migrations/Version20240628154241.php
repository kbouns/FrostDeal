<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628154241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote DROP INDEX UNIQ_5A108564F60E2305, ADD INDEX IDX_5A108564F60E2305 (deal_id)');
        $this->addSql('ALTER TABLE vote DROP INDEX UNIQ_5A108564FB88E14F, ADD INDEX IDX_5A108564FB88E14F (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote DROP INDEX IDX_5A108564F60E2305, ADD UNIQUE INDEX UNIQ_5A108564F60E2305 (deal_id)');
        $this->addSql('ALTER TABLE vote DROP INDEX IDX_5A108564FB88E14F, ADD UNIQUE INDEX UNIQ_5A108564FB88E14F (utilisateur_id)');
    }
}
