<?php
    require_once __DIR__ . '/Database.php';

    class Model {
        /**
         * Conexão PDO compartilhada entre todas as models
         * @var PDO
         */
        protected static $db;

        public function __construct() {
            if (!self::$db) {
                try {
                    self::$db = Database::getInstance()->getConnection();
                } catch (PDOException $e) {
                    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
                }
            }
        }

        /**
         * Método auxiliar para executar queries preparadas
         * @param string $sql
         * @param array $params
         * @return PDOStatement
         */
        protected function query(string $sql, array $params = []): PDOStatement {
            $stmt = self::$db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        }
    }
