<?php

namespace base\database;


use base\security\Security;

class Database
{
    private $connection;

    /**
     *  Database constructor.
     * @param string|null $database
     */
    public function __construct($database = null)
    {
        $this->connection = Connection::getConnection($database);
    }

    /**
     *  Database destructor
     */
    public function __destruct()
    {
        Connection::closeConnection($this->connection);
    }


    /**
     *  Получение массива данных по соединению и SQL-запросу
     *
     * @param $sql              - запрос к базе даных
     * @param bool|null $decode - флаг для декодирования строк
     * @return array|null       - массив данных
     */
    public function getQueryArray($sql, $decode = null)
    {
        $res = array();

        if ($query = $this->connection->query($sql)) {
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            while ($arr = $query->fetch()) {
                if ($decode) {
                    $res[] = Security::aps_decode($arr);
                }
                else {
                    $res[] = $arr;
                }
            }

            return $res;
        }
        else {
            return null;
        }
    }

    public function exec($sql)
    {
        return $this->connection->exec($sql);
    }

    public function query($sql)
    {
        $query = $this->connection->query($sql);
        $query->setFetchMode(\PDO::FETCH_ASSOC);

        return $query;
    }

    public function getInsertId()
    {
        return $this->connection->lastInsertId();
    }
}