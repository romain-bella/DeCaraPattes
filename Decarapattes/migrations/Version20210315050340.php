<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315050340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE laisse_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE laisse (id INT NOT NULL, uneoption_id INT DEFAULT NULL, unebouclerie_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, taille_laisse DOUBLE PRECISION NOT NULL, couleur_laisse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43F5E11DB39D4B40 ON laisse (uneoption_id)');
        $this->addSql('CREATE INDEX IDX_43F5E11DDDA3C3A3 ON laisse (unebouclerie_id)');
        $this->addSql('ALTER TABLE laisse ADD CONSTRAINT FK_43F5E11DB39D4B40 FOREIGN KEY (uneoption_id) REFERENCES option_laisse (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE laisse ADD CONSTRAINT FK_43F5E11DDDA3C3A3 FOREIGN KEY (unebouclerie_id) REFERENCES type_bouclerie_laisse (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE laisse_id_seq CASCADE');
        $this->addSql('DROP TABLE laisse');
    }
}
