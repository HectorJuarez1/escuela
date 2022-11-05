
<?php
include_once 'models/varTodas.php';
class NewusuarioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAll()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM users');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->username = $row['username'];
                $item->role = $row['role'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }


}



?>