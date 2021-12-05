<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125212611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avertissemets_user (avertissemets_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8E9DA53593ECEA67 (avertissemets_id), INDEX IDX_8E9DA535A76ED395 (user_id), PRIMARY KEY(avertissemets_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documents_user (documents_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C979156D5F0F2752 (documents_id), INDEX IDX_C979156DA76ED395 (user_id), PRIMARY KEY(documents_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documents_formation (documents_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_209936E45F0F2752 (documents_id), INDEX IDX_209936E45200282E (formation_id), PRIMARY KEY(documents_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_user (formation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_DA4C33095200282E (formation_id), INDEX IDX_DA4C3309A76ED395 (user_id), PRIMARY KEY(formation_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_session (formation_id INT NOT NULL, session_id INT NOT NULL, INDEX IDX_95BB90AF5200282E (formation_id), INDEX IDX_95BB90AF613FECDF (session_id), PRIMARY KEY(formation_id, session_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_user (session_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_4BE2D663613FECDF (session_id), INDEX IDX_4BE2D663A76ED395 (user_id), PRIMARY KEY(session_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation (session_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_3A264B5613FECDF (session_id), INDEX IDX_3A264B55200282E (formation_id), PRIMARY KEY(session_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_documents (user_id INT NOT NULL, documents_id INT NOT NULL, INDEX IDX_A250FF6CA76ED395 (user_id), INDEX IDX_A250FF6C5F0F2752 (documents_id), PRIMARY KEY(user_id, documents_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avertissemets_user ADD CONSTRAINT FK_8E9DA53593ECEA67 FOREIGN KEY (avertissemets_id) REFERENCES avertissemets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avertissemets_user ADD CONSTRAINT FK_8E9DA535A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documents_user ADD CONSTRAINT FK_C979156D5F0F2752 FOREIGN KEY (documents_id) REFERENCES documents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documents_user ADD CONSTRAINT FK_C979156DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documents_formation ADD CONSTRAINT FK_209936E45F0F2752 FOREIGN KEY (documents_id) REFERENCES documents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documents_formation ADD CONSTRAINT FK_209936E45200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_user ADD CONSTRAINT FK_DA4C33095200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_user ADD CONSTRAINT FK_DA4C3309A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_session ADD CONSTRAINT FK_95BB90AF5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_session ADD CONSTRAINT FK_95BB90AF613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_user ADD CONSTRAINT FK_4BE2D663613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_user ADD CONSTRAINT FK_4BE2D663A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation ADD CONSTRAINT FK_3A264B5613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formation ADD CONSTRAINT FK_3A264B55200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_documents ADD CONSTRAINT FK_A250FF6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_documents ADD CONSTRAINT FK_A250FF6C5F0F2752 FOREIGN KEY (documents_id) REFERENCES documents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avertissemets ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avertissemets ADD CONSTRAINT FK_A259D05EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A259D05EA76ED395 ON avertissemets (user_id)');
        $this->addSql('ALTER TABLE documents ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B072885200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_A2B072885200282E ON documents (formation_id)');
        $this->addSql('ALTER TABLE inscription ADD inscrit_user_id INT DEFAULT NULL, ADD insrit_formation_id INT DEFAULT NULL, ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D66CDC9EA0 FOREIGN KEY (inscrit_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63E69750D FOREIGN KEY (insrit_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D65200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D66CDC9EA0 ON inscription (inscrit_user_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D63E69750D ON inscription (insrit_formation_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D65200282E ON inscription (formation_id)');
        $this->addSql('ALTER TABLE reclamation ADD many_user_id INT DEFAULT NULL, ADD many_reclamation_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640479584EBD FOREIGN KEY (many_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C3D27485 FOREIGN KEY (many_reclamation_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CE60640479584EBD ON reclamation (many_user_id)');
        $this->addSql('CREATE INDEX IDX_CE606404C3D27485 ON reclamation (many_reclamation_user_id)');
        $this->addSql('ALTER TABLE seance ADD session_id INT DEFAULT NULL, ADD seance_session_id INT DEFAULT NULL, ADD seance_user_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E6B6170BA FOREIGN KEY (seance_session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E7F1C8D54 FOREIGN KEY (seance_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E613FECDF ON seance (session_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E6B6170BA ON seance (seance_session_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E7F1C8D54 ON seance (seance_user_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EA76ED395 ON seance (user_id)');
        $this->addSql('ALTER TABLE session ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4A76ED395 ON session (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE avertissemets_user');
        $this->addSql('DROP TABLE documents_user');
        $this->addSql('DROP TABLE documents_formation');
        $this->addSql('DROP TABLE formation_user');
        $this->addSql('DROP TABLE formation_session');
        $this->addSql('DROP TABLE session_user');
        $this->addSql('DROP TABLE session_formation');
        $this->addSql('DROP TABLE user_documents');
        $this->addSql('ALTER TABLE avertissemets DROP FOREIGN KEY FK_A259D05EA76ED395');
        $this->addSql('DROP INDEX IDX_A259D05EA76ED395 ON avertissemets');
        $this->addSql('ALTER TABLE avertissemets DROP user_id');
        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B072885200282E');
        $this->addSql('DROP INDEX IDX_A2B072885200282E ON documents');
        $this->addSql('ALTER TABLE documents DROP formation_id');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D66CDC9EA0');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63E69750D');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D65200282E');
        $this->addSql('DROP INDEX IDX_5E90F6D66CDC9EA0 ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D63E69750D ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D65200282E ON inscription');
        $this->addSql('ALTER TABLE inscription DROP inscrit_user_id, DROP insrit_formation_id, DROP formation_id');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640479584EBD');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C3D27485');
        $this->addSql('DROP INDEX IDX_CE60640479584EBD ON reclamation');
        $this->addSql('DROP INDEX IDX_CE606404C3D27485 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP many_user_id, DROP many_reclamation_user_id');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E613FECDF');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E6B6170BA');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E7F1C8D54');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EA76ED395');
        $this->addSql('DROP INDEX IDX_DF7DFD0E613FECDF ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E6B6170BA ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E7F1C8D54 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0EA76ED395 ON seance');
        $this->addSql('ALTER TABLE seance DROP session_id, DROP seance_session_id, DROP seance_user_id, DROP user_id');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4A76ED395');
        $this->addSql('DROP INDEX IDX_D044D5D4A76ED395 ON session');
        $this->addSql('ALTER TABLE session DROP user_id');
    }
}
