<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209161127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE balade_educative_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bilan_comportemental_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE conseil_adoption_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cours_collectifs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cours_individuelle_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE partenaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recree_chiot_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rehabilitation_agressif_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE balade_educative (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE bilan_comportemental (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE conseil_adoption (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cours_collectifs (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cours_individuelle (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partenaire (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE recree_chiot (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rehabilitation_agressif (id INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE balade_educative_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bilan_comportemental_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE conseil_adoption_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cours_collectifs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cours_individuelle_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE partenaire_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recree_chiot_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rehabilitation_agressif_id_seq CASCADE');
        $this->addSql('DROP TABLE balade_educative');
        $this->addSql('DROP TABLE bilan_comportemental');
        $this->addSql('DROP TABLE conseil_adoption');
        $this->addSql('DROP TABLE cours_collectifs');
        $this->addSql('DROP TABLE cours_individuelle');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE recree_chiot');
        $this->addSql('DROP TABLE rehabilitation_agressif');
    }
}
