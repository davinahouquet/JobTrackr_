<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221173209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, offre_id INT DEFAULT NULL, date_candidature DATETIME NOT NULL, cv TINYINT(1) NOT NULL, lettre_motivation TINYINT(1) NOT NULL, date_relance DATETIME DEFAULT NULL, entretien LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_E33BD3B84CC8505A (offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, lien_entreprise LONGTEXT DEFAULT NULL, siret INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, referent_id INT DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, lieu_travail LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, diffusion VARCHAR(255) DEFAULT NULL, salaire VARCHAR(255) NOT NULL, lien_offre LONGTEXT DEFAULT NULL, INDEX IDX_AF86866FA4AEAFEA (entreprise_id), INDEX IDX_AF86866F35E47E35 (referent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referent (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, linkdin VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B84CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F35E47E35 FOREIGN KEY (referent_id) REFERENCES referent (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B84CC8505A');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA4AEAFEA');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F35E47E35');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE referent');
    }
}
