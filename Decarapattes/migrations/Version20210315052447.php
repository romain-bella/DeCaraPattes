<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315052447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE collier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE collier (id INT NOT NULL, uneoption_id INT DEFAULT NULL, unebouclerie_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, taille_collier DOUBLE PRECISION NOT NULL, couleur_collier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_12259923B39D4B40 ON collier (uneoption_id)');
        $this->addSql('CREATE INDEX IDX_12259923DDA3C3A3 ON collier (unebouclerie_id)');
        $this->addSql('ALTER TABLE collier ADD CONSTRAINT FK_12259923B39D4B40 FOREIGN KEY (uneoption_id) REFERENCES option_collier (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collier ADD CONSTRAINT FK_12259923DDA3C3A3 FOREIGN KEY (unebouclerie_id) REFERENCES type_bouclerie_collier (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE collier_id_seq CASCADE');
        $this->addSql('DROP TABLE collier');
    }
}
