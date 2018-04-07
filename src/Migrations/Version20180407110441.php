<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180407110441 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495240D1CA');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP INDEX IDX_8D93D6495240D1CA ON user');
        $this->addSql('ALTER TABLE user ADD rank VARCHAR(255) NOT NULL, DROP rank_id_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE rank (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(32) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD rank_id_id INT NOT NULL, DROP rank');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495240D1CA FOREIGN KEY (rank_id_id) REFERENCES rank (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6495240D1CA ON user (rank_id_id)');
    }
}
