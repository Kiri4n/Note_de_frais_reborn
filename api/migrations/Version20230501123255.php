<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501123255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE note_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE note (id INT NOT NULL, personne_id_id INT NOT NULL, date DATE NOT NULL, pin VARCHAR(6) NOT NULL, comment TEXT DEFAULT NULL, editable BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CFBDFA146BA58F3E ON note (personne_id_id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA146BA58F3E FOREIGN KEY (personne_id_id) REFERENCES personne (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE note_id_seq CASCADE');
        $this->addSql('ALTER TABLE note DROP CONSTRAINT FK_CFBDFA146BA58F3E');
        $this->addSql('DROP TABLE note');
    }
}
