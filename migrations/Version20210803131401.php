<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803131401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE army (id INT AUTO_INCREMENT NOT NULL, worriors INT NOT NULL, archers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE barrack (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, wood INT NOT NULL, stone INT NOT NULL, worriors INT NOT NULL, archers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE castle (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, wood INT NOT NULL, stone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, wood INT NOT NULL, stone INT NOT NULL, production INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quarry (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, wood INT NOT NULL, stone INT NOT NULL, production INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sawmill (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, wood INT NOT NULL, stone INT NOT NULL, production INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_army_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, nick VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, wood INT NOT NULL, stone INT NOT NULL, creral INT NOT NULL, glory INT NOT NULL, admin TINYINT(1) NOT NULL, banned TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649C64FDD5D (id_army_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_castle_id INT NOT NULL, id_sawmill_id INT NOT NULL, id_quarry_id INT NOT NULL, id_field_id INT NOT NULL, id_barrack_id INT NOT NULL, UNIQUE INDEX UNIQ_4E6C7FAA79F37AE5 (id_user_id), INDEX IDX_4E6C7FAA9B9AB1F3 (id_castle_id), INDEX IDX_4E6C7FAAC75B6636 (id_sawmill_id), INDEX IDX_4E6C7FAA25A4BEB (id_quarry_id), INDEX IDX_4E6C7FAA14ECEB25 (id_field_id), INDEX IDX_4E6C7FAA259543A6 (id_barrack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C64FDD5D FOREIGN KEY (id_army_id) REFERENCES army (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA9B9AB1F3 FOREIGN KEY (id_castle_id) REFERENCES castle (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAAC75B6636 FOREIGN KEY (id_sawmill_id) REFERENCES sawmill (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA25A4BEB FOREIGN KEY (id_quarry_id) REFERENCES quarry (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA14ECEB25 FOREIGN KEY (id_field_id) REFERENCES field (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA259543A6 FOREIGN KEY (id_barrack_id) REFERENCES barrack (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C64FDD5D');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAA259543A6');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAA9B9AB1F3');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAA14ECEB25');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAA25A4BEB');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAAC75B6636');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAA79F37AE5');
        $this->addSql('DROP TABLE army');
        $this->addSql('DROP TABLE barrack');
        $this->addSql('DROP TABLE castle');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE quarry');
        $this->addSql('DROP TABLE sawmill');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE village');
    }
}
