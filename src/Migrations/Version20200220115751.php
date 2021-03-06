<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220115751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, membre_note_id_id INT NOT NULL, membre_notant_id_id INT NOT NULL, note INT NOT NULL, avis LONGTEXT DEFAULT NULL, date_enregistrement DATE NOT NULL, INDEX IDX_CFBDFA1440EE8798 (membre_note_id_id), INDEX IDX_CFBDFA14FD77A62A (membre_notant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1440EE8798 FOREIGN KEY (membre_note_id_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14FD77A62A FOREIGN KEY (membre_notant_id_id) REFERENCES membre (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE note');
    }
}
