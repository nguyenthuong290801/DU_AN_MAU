<?php

namespace app\core\base;

use app\core\Application;
use app\core\Debug;

class Model implements ModelInterface
{
    protected $table;
    protected $columns;
    public \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Application::$app->db->pdo;
    }

    public function table($table)
    {
        return $this->table = $table;
    }

    public function columns($columns)
    {
        return $this->columns = $columns;
    }

    public function toString()
    {
        $columnsString = implode(', ', $this->columns);
        return $columnsString;
    }

    public function all($limit = null, $offset = 0)
    {
        if ($limit !== null) {
            return $this->limit($limit, $offset);
        }

        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE deleted_at IS NULL 
              ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;

        return $this->all($perPage, $offset);
    }

    public function paginateWithTrashed($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;

        return $this->withTrashed($perPage, $offset);
    }

    public function limit($limit, $offset = 0)
    {
        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE deleted_at IS NULL 
              ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $params = ['limit' => $limit, 'offset' => $offset];
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':limit', $params['limit'], \PDO::PARAM_INT);
        $stmt->bindParam(':offset', $params['offset'], \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function limitWithTrashed($limit, $offset = 0)
    {
        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE deleted_at IS NOT NULL 
              ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $params = ['limit' => $limit, 'offset' => $offset];
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':limit', $params['limit'], \PDO::PARAM_INT);
        $stmt->bindParam(':offset', $params['offset'], \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function withTrashed($limit = null, $offset = 0)
    {
        if ($limit !== null) {
            return $this->limitWithTrashed($limit, $offset);
        }

        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE deleted_at IS NOT NULL ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function find($id)
    {
        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findSlug($slug)
    {
        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE slug = :slug";
        $params = [':slug' => $slug];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findCmt($id)
    {
        $query = "SELECT review, comment_name FROM comment 
                  INNER JOIN product ON comment.product_id = product.id 
                  WHERE comment.product_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        
        if (isset($data['slug'])) {
            $searchValue = 'product_name';
            $matchingKeys = preg_grep("/$searchValue/i", array_keys($data));
            $matchingKeysString = implode(', ', $matchingKeys);
            $slug = $this->slug($data["$matchingKeysString"]);
            $data['slug'] = $slug;
        }
        
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }

    function slug($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
    

    public function update($id, array $data)
    {
        $columns = '';
        foreach ($data as $key => $value) {
            $columns .= "$key = :$key, ";
        }
        $columns = rtrim($columns, ', ');

        $query = "UPDATE {$this->table} SET $columns WHERE id = :id";
        $data['id'] = $id;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }

    public function softDelete($id)
    {
        $query = "UPDATE {$this->table} SET deleted_at = NOW() WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }

    public function restore($id)
    {

        $query = "UPDATE {$this->table} SET deleted_at = NULL WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }



    public function login($email, $password)
    {
        $query = "SELECT {$this->toString()} FROM {$this->table} WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['email' => $email, 'password' => $password]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
