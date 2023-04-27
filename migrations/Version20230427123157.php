<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427123157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, tech_email_id INT NOT NULL, client_email_id INT NOT NULL, date DATE NOT NULL, vehicule VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D11814ABAE356F32 (tech_email_id), UNIQUE INDEX UNIQ_D11814AB86D4F10C (client_email_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABAE356F32 FOREIGN KEY (tech_email_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB86D4F10C FOREIGN KEY (client_email_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABAE356F32');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB86D4F10C');
        $this->addSql('DROP TABLE intervention');
    }
}
