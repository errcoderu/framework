<?php

class Table
{
    private $columns;
    private $last;

    public function increments($columnName, $size)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('int', $size);

        $this->columns[$columnName]['primary key'] = true;
        $this->columns[$columnName]['not null'] = true;
        $this->columns[$columnName]['auto_increment'] = true;
    }

    public function tinyint($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('tinyint');
        return $this;
    }

    public function smallint($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('smallint');
        return $this;
    }

    public function mediumint($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('mediumint');
        return $this;
    }

    public function int($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('int');
        return $this;
    }

    public function bigint($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('bigint');
        return $this;
    }

    public function float($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('float');
        return $this;
    }

    public function double($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('double');
        return $this;
    }

    public function boolean($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('boolean');
        return $this;
    }

    public function date($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('date');
        return $this;
    }

    public function time($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('time');
        return $this;
    }

    public function year($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('year');
        return $this;
    }

    public function datetime($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('datetime');
        return $this;
    }

    public function char($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('char');
        return $this;
    }

    public function varchar($columnName, $size)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('varchar', $size);
        return $this;
    }

    public function tinytext($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('tinytext');
        return $this;
    }

    public function text($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('text');
        return $this;
    }

    public function mediumtext($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('mediumtext');
        return $this;
    }

    public function longtext($columnName)
    {
        $this->last = $columnName;
        $this->columns[$columnName] = $this->setColumnInfo('longtext');
        return $this;
    }

    public function primary_key()
    {
        if ($this->last) {
            $this->columns[$this->last]['primary key'] = true;
            return $this;
        }
    }

    public function not_null()
    {
        if ($this->last) {
            $this->columns[$this->last]['not null'] = true;
            return $this;
        }
    }

    public function unique()
    {
        if ($this->last) {
            $this->columns[$this->last]['unique'] = true;
            return $this;
        }
    }

    public function binary()
    {
        if ($this->last) {
            $this->columns[$this->last]['binary'] = true;
            return $this;
        }
    }

    public function unsigned()
    {
        if ($this->last) {
            $this->columns[$this->last]['unsigned'] = true;
            return $this;
        }
    }

    public function zerofill()
    {
        if ($this->last) {
            $this->columns[$this->last]['zerofill'] = true;
            return $this;
        }
    }

    public function auto_increment()
    {
        if ($this->last) {
            $this->columns[$this->last]['auto_increment'] = true;
            return $this;
        }
    }

    public function generated()
    {
        if ($this->last) {
            $this->columns[$this->last]['generated'] = true;
            return $this;
        }
    }

    public function default_value($value)
    {
        if ($this->last) {
            $this->columns[$this->last]['default'] = $value;
            return $this;
        }
    }



    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    private function setColumnInfo($type, $size = null)
    {
        return [
            $type => $size,
            'primary key' => false,
            'not null' => false,
            'unique' => false,
            'binary' => false,
            'unsigned' => false,
            'zerofill' => false,
            'auto_increment'=> false,
            'generated' => false,
            'default' => null
        ];
    }


}