<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501124211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE frais_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE frais (id INT NOT NULL, frais_type_id_id INT NOT NULL, note_id_id INT NOT NULL, amount INT NOT NULL, comment TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_25404C989A5571D2 ON frais (frais_type_id_id)');
        $this->addSql('CREATE INDEX IDX_25404C981A543D80 ON frais (note_id_id)');
        $this->addSql('ALTER TABLE frais ADD CONSTRAINT FK_25404C989A5571D2 FOREIGN KEY (frais_type_id_id) REFERENCES frais_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE frais ADD CONSTRAINT FK_25404C981A543D80 FOREIGN KEY (note_id_id) REFERENCES note (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE frais_id_seq CASCADE');
        $this->addSql('ALTER TABLE frais DROP CONSTRAINT FK_25404C989A5571D2');
        $this->addSql('ALTER TABLE frais DROP CONSTRAINT FK_25404C981A543D80');
        $this->addSql('DROP TABLE frais');
    }
}
