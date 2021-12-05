<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204054155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_404021BFA76ED395 ON formation (user_id)');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63E69750D');
        $this->addSql('DROP INDEX IDX_5E90F6D63E69750D ON inscription');
        $this->addSql('ALTER TABLE inscription DROP insrit_formation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFA76ED395');
        $this->addSql('DROP INDEX IDX_404021BFA76ED395 ON formation');
        $this->addSql('ALTER TABLE formation DROP user_id');
        $this->addSql('ALTER TABLE inscription ADD insrit_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63E69750D FOREIGN KEY (insrit_formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D63E69750D ON inscription (insrit_formation_id)');
    }
}
