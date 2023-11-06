<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106080301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, immeuble_id INT DEFAULT NULL, superficie DOUBLE PRECISION NOT NULL, descriptif VARCHAR(500) NOT NULL, INDEX IDX_71A6BD8DBCF5E72D (categorie_id), INDEX IDX_71A6BD8D63768E3F (immeuble_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avoir_pour_tarif (id INT AUTO_INCREMENT NOT NULL, saisons_id INT DEFAULT NULL, categories_id INT DEFAULT NULL, prix_semaine DOUBLE PRECISION NOT NULL, INDEX IDX_F073D51098E2D5DF (saisons_id), INDEX IDX_F073D510A21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, code_postal VARCHAR(10) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, appartement_id INT NOT NULL, date_reserv DATETIME NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, rue_client VARCHAR(255) NOT NULL, code_postal_client VARCHAR(255) NOT NULL, ville_client VARCHAR(255) NOT NULL, tel_client VARCHAR(255) NOT NULL, num_cheque_acompte VARCHAR(255) NOT NULL, montant_acompte DOUBLE PRECISION NOT NULL, etat VARCHAR(1) NOT NULL, INDEX IDX_42C84955E1729BBA (appartement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semaine (id INT AUTO_INCREMENT NOT NULL, saison_id INT NOT NULL, date_debut DATE NOT NULL, annee INT NOT NULL, INDEX IDX_7B4D8BEAF965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semaine_reservation (semaine_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_F3A573E1122EEC90 (semaine_id), INDEX IDX_F3A573E1B83297E7 (reservation_id), PRIMARY KEY(semaine_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D63768E3F FOREIGN KEY (immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D51098E2D5DF FOREIGN KEY (saisons_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D510A21214B7 FOREIGN KEY (categories_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE semaine ADD CONSTRAINT FK_7B4D8BEAF965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE semaine_reservation ADD CONSTRAINT FK_F3A573E1122EEC90 FOREIGN KEY (semaine_id) REFERENCES semaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semaine_reservation ADD CONSTRAINT FK_F3A573E1B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DBCF5E72D');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D63768E3F');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D51098E2D5DF');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D510A21214B7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E1729BBA');
        $this->addSql('ALTER TABLE semaine DROP FOREIGN KEY FK_7B4D8BEAF965414C');
        $this->addSql('ALTER TABLE semaine_reservation DROP FOREIGN KEY FK_F3A573E1122EEC90');
        $this->addSql('ALTER TABLE semaine_reservation DROP FOREIGN KEY FK_F3A573E1B83297E7');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE avoir_pour_tarif');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE immeuble');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE semaine');
        $this->addSql('DROP TABLE semaine_reservation');
    }
}
