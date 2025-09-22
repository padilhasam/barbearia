<?php
    require_once __DIR__ . '/../../core/Model.php';

    class Cliente extends Model
    {
        protected $table = 'clientes';

        /**
         * Busca um cliente pelo ID
         */
        public function find(int $id)
        {
            $stmt = self::$db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * Busca um cliente pelo e-mail
         */
        public function findByEmail(string $email)
        {
            $stmt = self::$db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * Busca um cliente pelo telefone
         */
        public function findByTelefone(string $telefone)
        {
            $stmt = self::$db->prepare("SELECT * FROM {$this->table} WHERE telefone = :telefone LIMIT 1");
            $stmt->execute(['telefone' => $telefone]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * Retorna todos os clientes
         */
        public function getAll()
        {
            $stmt = self::$db->query("SELECT * FROM {$this->table} ORDER BY nome ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Cria um novo cliente
         */
        public function create(array $data)
        {
            $stmt = self::$db->prepare(
                "INSERT INTO {$this->table} (nome, telefone, email, senha) 
                VALUES (:nome, :telefone, :email, :senha)"
            );
            $stmt->execute([
                'nome'     => $data['nome'],
                'telefone' => $data['telefone'],
                'email'    => $data['email'] ?? null,
                'senha'    => $data['senha']
            ]);
            return self::$db->lastInsertId();
        }

        /**
         * Atualiza um cliente existente
         */
        public function update(int $id, array $data)
        {
            $fields = [
                'nome' => $data['nome'],
                'telefone' => $data['telefone'],
                'email' => $data['email'] ?? null,
                'id' => $id
            ];

            $sql = "UPDATE {$this->table} SET nome = :nome, telefone = :telefone, email = :email";

            if (!empty($data['senha'])) {
                $sql .= ", senha = :senha";
                $fields['senha'] = $data['senha'];
            }

            $sql .= " WHERE id = :id";

            $stmt = self::$db->prepare($sql);
            return $stmt->execute($fields);
        }

        /**
         * Remove um cliente
         */
        public function delete(int $id)
        {
            $stmt = self::$db->prepare("DELETE FROM {$this->table} WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        }
    }
