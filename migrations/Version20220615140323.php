<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615140323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, id_buyer_id INT NOT NULL, id_seller_id INT DEFAULT NULL, id_product_id INT NOT NULL, price VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, is_delivered TINYINT(1) NOT NULL, INDEX IDX_F52993983CAEBBB7 (id_buyer_id), INDEX IDX_F5299398DDD9CFE (id_seller_id), INDEX IDX_F5299398E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993983CAEBBB7 FOREIGN KEY (id_buyer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398DDD9CFE FOREIGN KEY (id_seller_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398E00EE68D');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product');
    }
}
