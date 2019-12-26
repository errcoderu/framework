<?php

namespace base\config;

use base\exceptions\config\ConfigException;
use base\exceptions\config\ConfigFileException;
use base\exceptions\config\ConfigKeyException;
use base\exceptions\config\ConfigValuesException;

class Config
{
    /**
     *  Файл конфигурации содержит в себе многомерный массив. Его можно найти в
     * папке config/, которая лежит в корне проекта. Файл называется config.php.
     *
     *  Для взаимодействия с этими данными пользуйтесь публичными свойствами,
     * описанными ниже.
     */

    private $config;
    private $filePath;

    /**
     *  Хранит название проекта.
     */
    public $name;

    /**
     *  Хранит URL, который нужно открывать при переходе на site.name/. По
     * умолчанию задан как '/'.
     *
     *  Используйте, если вам нужен редирект со страницы / на /homeUrl.
     */
    public $homeUrl;

    /**
     *  Хранит данные о БД в виде одномерного массива с ключами:
     *  [ 'host', 'user', 'password', 'database' ]
     *
     * @var array
     */
    public $database;

    /**
     *  Хранит массив со ссылками на пользовательское представление ошибок
     * (view-файлы).
     *
     * @var array
     */
    public $errors;

    public function __construct()
    {
        try {
            if (!defined("CONFIG"))
                throw new ConfigException();
        }
        catch (ConfigException $e) {
            echo $e->getMessage();
            die();
        }

        $this->filePath = file_exists(CONFIG . "config.php") ? CONFIG . "config.php" : null;

        try {
            if (!isset($this->filePath))
                throw new ConfigFileException();
        }
        catch (ConfigFileException $e) {
            echo $e->getMessage();
            die();
        }

        $this->config = require $this->filePath;
        $this->setValues();
    }

    private function setValues()
    {
        try {
            foreach ($this->config as $key => $value) {
                if (!property_exists((string)__NAMESPACE__ . "\Config", $key))
                    throw new ConfigKeyException($key);

                $this->$key = $value;

                if (!isset($this->$key))
                    throw new ConfigValuesException($key, $value);
            }
        }
        catch (ConfigKeyException $e) {
            echo $e->getMessage();
            die();
        }
        catch (ConfigValuesException $e) {
            echo $e->getMessage();
            die();
        }
    }
}