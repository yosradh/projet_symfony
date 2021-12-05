<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204064559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD formation_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFE29196EE FOREIGN KEY (formation_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_404021BFE29196EE ON formation (formation_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFE29196EE');
        $this->addSql('DROP INDEX IDX_404021BFE29196EE ON formation');
        $this->addSql('ALTER TABLE formation DROP formation_user_id');
    }
}
