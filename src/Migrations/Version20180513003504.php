<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180513003504 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_service (order_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_17E733998D9F6D38 (order_id), INDEX IDX_17E73399ED5CA9E6 (service_id), PRIMARY KEY(order_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_service ADD CONSTRAINT FK_17E733998D9F6D38 FOREIGN KEY (order_id) REFERENCES car_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_service ADD CONSTRAINT FK_17E73399ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_order DROP INDEX UNIQ_2A82164F3DD3DB4B, ADD INDEX IDX_2A82164F3DD3DB4B (cheque_id)');
        $this->addSql('ALTER TABLE car_order DROP FOREIGN KEY FK_2A82164FAEF5A6C1');
        $this->addSql('ALTER TABLE car_order DROP FOREIGN KEY FK_2A82164F3DD3DB4B');
        $this->addSql('DROP INDEX IDX_2A82164FAEF5A6C1 ON car_order');
        $this->addSql('ALTER TABLE car_order DROP services_id');
        $this->addSql('ALTER TABLE car_order ADD CONSTRAINT FK_2A82164F3DD3DB4B FOREIGN KEY (cheque_id) REFERENCES service (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_service');
        $this->addSql('ALTER TABLE car_order DROP INDEX IDX_2A82164F3DD3DB4B, ADD UNIQUE INDEX UNIQ_2A82164F3DD3DB4B (cheque_id)');
        $this->addSql('ALTER TABLE car_order DROP FOREIGN KEY FK_2A82164F3DD3DB4B');
        $this->addSql('ALTER TABLE car_order ADD services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car_order ADD CONSTRAINT FK_2A82164FAEF5A6C1 FOREIGN KEY (services_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE car_order ADD CONSTRAINT FK_2A82164F3DD3DB4B FOREIGN KEY (cheque_id) REFERENCES cheque (id)');
        $this->addSql('CREATE INDEX IDX_2A82164FAEF5A6C1 ON car_order (services_id)');
    }
}
