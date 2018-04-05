<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405122336 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, cars_brand_id INT NOT NULL, cars_model_id INT NOT NULL, license_plate VARCHAR(32) NOT NULL, veh_id_number VARCHAR(32) NOT NULL, eng_id_number VARCHAR(32) NOT NULL, INDEX IDX_773DE69D38B6841A (cars_brand_id), INDEX IDX_773DE69D536E3F5 (cars_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rank (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visit (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, car_id INT NOT NULL, cheque_id INT DEFAULT NULL, status ENUM(
                 \'created\',
                 \'in progress\',
                 \'repaired\',
                 \'canceled\',
                 \'suspended\',
                 \'ready to return\',
                 \'returned\') NOT NULL COMMENT \'(DC2Type:enumOrdersStatuses)\', INDEX IDX_F5299398A76ED395 (user_id), INDEX IDX_F5299398C3C6F69F (car_id), UNIQUE INDEX UNIQ_F52993983DD3DB4B (cheque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_service (order_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_17E733998D9F6D38 (order_id), INDEX IDX_17E73399ED5CA9E6 (service_id), PRIMARY KEY(order_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cheque (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, paid TINYINT(1) NOT NULL, amount NUMERIC(2, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, state VARCHAR(32) NOT NULL, region VARCHAR(32) NOT NULL, settlement VARCHAR(32) NOT NULL, street VARCHAR(32) NOT NULL, number INT NOT NULL, apartment VARCHAR(32) DEFAULT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, rank_id_id INT NOT NULL, login_name VARCHAR(32) NOT NULL, login_pass VARCHAR(32) NOT NULL, name VARCHAR(32) NOT NULL, surname VARCHAR(32) NOT NULL, phone VARCHAR(20) DEFAULT NULL, email VARCHAR(30) DEFAULT NULL, INDEX IDX_8D93D6495240D1CA (rank_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_visit (user_id INT NOT NULL, visit_id INT NOT NULL, INDEX IDX_A1BC1261A76ED395 (user_id), INDEX IDX_A1BC126175FA0FF2 (visit_id), PRIMARY KEY(user_id, visit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_sub_category (id INT AUTO_INCREMENT NOT NULL, super_category_id INT NOT NULL, title VARCHAR(32) NOT NULL, INDEX IDX_D196C646B85A1111 (super_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, paid_cheque_id INT NOT NULL, date DATETIME NOT NULL, amount NUMERIC(2, 0) NOT NULL, INDEX IDX_6D28840DA76ED395 (user_id), INDEX IDX_6D28840D2E82685A (paid_cheque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_model (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, title VARCHAR(32) NOT NULL, INDEX IDX_4DD8215F44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, sub_category_id INT NOT NULL, title VARCHAR(32) NOT NULL, available TINYINT(1) NOT NULL, price NUMERIC(2, 0) NOT NULL, INDEX IDX_E19D9AD212469DE2 (category_id), INDEX IDX_E19D9AD2F7BFE87C (sub_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_brand (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D38B6841A FOREIGN KEY (cars_brand_id) REFERENCES cars_brand (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D536E3F5 FOREIGN KEY (cars_model_id) REFERENCES cars_model (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993983DD3DB4B FOREIGN KEY (cheque_id) REFERENCES cheque (id)');
        $this->addSql('ALTER TABLE order_service ADD CONSTRAINT FK_17E733998D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_service ADD CONSTRAINT FK_17E73399ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495240D1CA FOREIGN KEY (rank_id_id) REFERENCES rank (id)');
        $this->addSql('ALTER TABLE user_visit ADD CONSTRAINT FK_A1BC1261A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_visit ADD CONSTRAINT FK_A1BC126175FA0FF2 FOREIGN KEY (visit_id) REFERENCES visit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE services_sub_category ADD CONSTRAINT FK_D196C646B85A1111 FOREIGN KEY (super_category_id) REFERENCES services_category (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D2E82685A FOREIGN KEY (paid_cheque_id) REFERENCES cheque (id)');
        $this->addSql('ALTER TABLE cars_model ADD CONSTRAINT FK_4DD8215F44F5D008 FOREIGN KEY (brand_id) REFERENCES cars_brand (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES services_category (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F7BFE87C FOREIGN KEY (sub_category_id) REFERENCES services_sub_category (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398C3C6F69F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495240D1CA');
        $this->addSql('ALTER TABLE user_visit DROP FOREIGN KEY FK_A1BC126175FA0FF2');
        $this->addSql('ALTER TABLE order_service DROP FOREIGN KEY FK_17E733998D9F6D38');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993983DD3DB4B');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D2E82685A');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE user_visit DROP FOREIGN KEY FK_A1BC1261A76ED395');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DA76ED395');
        $this->addSql('ALTER TABLE services_sub_category DROP FOREIGN KEY FK_D196C646B85A1111');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD212469DE2');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F7BFE87C');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D536E3F5');
        $this->addSql('ALTER TABLE order_service DROP FOREIGN KEY FK_17E73399ED5CA9E6');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D38B6841A');
        $this->addSql('ALTER TABLE cars_model DROP FOREIGN KEY FK_4DD8215F44F5D008');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP TABLE visit');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_service');
        $this->addSql('DROP TABLE cheque');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_visit');
        $this->addSql('DROP TABLE services_category');
        $this->addSql('DROP TABLE services_sub_category');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE cars_model');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE cars_brand');
    }
}
