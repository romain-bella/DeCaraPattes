<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315043524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE contact_page_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE hygiene_et_soin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE hygiene_et_soin (id INT NOT NULL, reference VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE contact_page');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE hygiene_et_soin_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE contact_page_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact_page (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE hygiene_et_soin');
    }
}
