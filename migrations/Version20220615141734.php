<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615141734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398DDD9CFE');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993983CAEBBB7');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398E00EE68D');
        $this->addSql('DROP INDEX IDX_F52993983CAEBBB7 ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398DDD9CFE ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398E00EE68D ON `order`');
        $this->addSql('ALTER TABLE `order` ADD buyer_id INT NOT NULL, ADD product_id INT NOT NULL, DROP id_buyer_id, DROP id_product_id, CHANGE id_seller_id seller_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993986C755722 FOREIGN KEY (buyer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993988DE820D9 FOREIGN KEY (seller_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_F52993986C755722 ON `order` (buyer_id)');
        $this->addSql('CREATE INDEX IDX_F52993988DE820D9 ON `order` (seller_id)');
        $this->addSql('CREATE INDEX IDX_F52993984584665A ON `order` (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993986C755722');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993988DE820D9');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984584665A');
        $this->addSql('DROP INDEX IDX_F52993986C755722 ON `order`');
        $this->addSql('DROP INDEX IDX_F52993988DE820D9 ON `order`');
        $this->addSql('DROP INDEX IDX_F52993984584665A ON `order`');
        $this->addSql('ALTER TABLE `order` ADD id_buyer_id INT NOT NULL, ADD id_product_id INT NOT NULL, DROP buyer_id, DROP product_id, CHANGE seller_id id_seller_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398DDD9CFE FOREIGN KEY (id_seller_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993983CAEBBB7 FOREIGN KEY (id_buyer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_F52993983CAEBBB7 ON `order` (id_buyer_id)');
        $this->addSql('CREATE INDEX IDX_F5299398DDD9CFE ON `order` (id_seller_id)');
        $this->addSql('CREATE INDEX IDX_F5299398E00EE68D ON `order` (id_product_id)');
    }
}
