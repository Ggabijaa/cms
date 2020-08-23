<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200823144109 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contact_property_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE property_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contact_property (id INT NOT NULL, contact_id INT NOT NULL, property_id INT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_11D78049E7A1254A ON contact_property (contact_id)');
        $this->addSql('CREATE INDEX IDX_11D78049549213EC ON contact_property (property_id)');
        $this->addSql('CREATE TABLE property (id INT NOT NULL, name VARCHAR(80) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE contact_property ADD CONSTRAINT FK_11D78049E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_property ADD CONSTRAINT FK_11D78049549213EC FOREIGN KEY (property_id) REFERENCES property (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contact_property DROP CONSTRAINT FK_11D78049E7A1254A');
        $this->addSql('ALTER TABLE contact_property DROP CONSTRAINT FK_11D78049549213EC');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contact_property_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE property_id_seq CASCADE');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_property');
        $this->addSql('DROP TABLE property');
    }
}
