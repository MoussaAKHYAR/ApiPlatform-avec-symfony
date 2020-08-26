<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200826105706 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, compte_entreprise_id INT DEFAULT NULL, compte_client_id INT DEFAULT NULL, numero VARCHAR(20) NOT NULL, rib VARCHAR(3) NOT NULL, solde DOUBLE PRECISION NOT NULL, date_ouverture DATE NOT NULL, raison_social VARCHAR(10) DEFAULT NULL, salaire DOUBLE PRECISION DEFAULT NULL, nom_employeur VARCHAR(10) DEFAULT NULL, telephone_employeur VARCHAR(9) DEFAULT NULL, numero_identification VARCHAR(20) DEFAULT NULL, agios DOUBLE PRECISION NOT NULL, frais DOUBLE PRECISION NOT NULL, renumeration DOUBLE PRECISION NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, type_compte VARCHAR(10) NOT NULL, INDEX IDX_CFF6526077147195 (compte_entreprise_id), INDEX IDX_CFF65260DA655713 (compte_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526077147195 FOREIGN KEY (compte_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260DA655713 FOREIGN KEY (compte_client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compte');
    }
}
