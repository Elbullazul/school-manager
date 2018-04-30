<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 11:05
 */

namespace Database;

use \PDO;

class query_builder
{
    private $SELECT = "select";
    private $UPDATE = "update";
    private $INSERT = "insert";
    private $DELETE = "delete";
    private $INTO = "into";
    private $LIMIT = "limit";
    private $VALUES = "values";
    private $FROM = "from";
    private $SET = "set";
    private $AND = "and";
    private $WHERE = "where";
    private $ORDER_BY = "order by";
    private $GROUP_BY = "group by";

    private $ASC = "asc";
    private $DESC = "desc";

    const FETCH = "fetch";
    const FETCH_ALL = "fetchAll";
    const EXECUTE = "execute";

    private $query = "";
    private $entity = NULL;
    private $fetch_mode = NULL;

    function __construct($entity, $fetch_mode)
    {
        if (!is_null($entity) && !is_null($fetch_mode)) {
            $this->entity = $entity;
            $this->fetch_mode = $fetch_mode;
        } else {
            return NULL;
        }
    }

    protected function append($string)
    {
        if ($this->query == "") {
            $this->query = $string;
        } else {
            $this->query = $this->query . " " . $string;
        }
    }

    // RUN!
    protected function fetch()
    {
        $Cnn = connection::getInstance();
        $db = $Cnn->prepare($this->query);

        $db->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $db->execute();
        $mode = $this->fetch_mode;
        $data = $db->$mode();

        return $data;
    }

    protected function run()
    {
        $Cnn = connection::getInstance();
        $db = $Cnn->prepare($this->query);

        return $db->execute([]);    // PDO requires an array?!
    }

    protected function parse($array)
    {
        return implode(',', $array);
    }

    protected function parseArgs($array)
    {
        $values = '"';
        $values = $values . implode('","', $array) . '"';

        return $values;
    }

    protected function parseConditions($conditions)
    {
        $sql_condition = '';

        foreach ($conditions as $condition) {
            //fixme: a blank space isn't an intuitive delimiter
            $parts = explode(" ", $condition);

            $column = $parts[0];
            $operator = $parts[0];
            $value = $parts[0];

            if ($sql_condition != "") {
                $sql_condition = $column . ' ' . $operator . ' \'' . $value . '\'';
            } else {
                $sql_condition = $this->AND.' '. $column . ' ' . $operator . ' \'' . $value . '\'';
            }
        }

        return $condition;
    }

    function clear()
    {
        $this->query = "";
    }

    function execute()
    {
        $result = NULL;

        switch ($this->fetch_mode) {
            case self::FETCH;
            case self::FETCH_ALL:
                $result = $this->fetch();
                break;
            case self::EXECUTE:
                $result = $this->run();
                break;
        }

        return $result;
    }

    // SQL emulation
    function select()
    {
        $this->append($this->SELECT);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function where()
    {
        $this->append($this->WHERE);
        $this->append($this->parseConditions(func_get_args()));
        return $this;
    }

    function and()
    {
        $this->append($this->AND);
        $this->append($this->parseConditions(func_get_args()));
        return $this;
    }

    function order_by()
    {
        $this->append($this->ORDER_BY);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function asc()
    {
        $this->append($this->ASC);
        return $this;
    }

    function desc()
    {
        $this->append($this->DESC);
        return $this;
    }

    function group_by()
    {
        $this->append($this->GROUP_BY);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function limit()
    {
        $this->append($this->LIMIT);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function from()
    {
        $this->append($this->FROM);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function update()
    {
        $this->append($this->UPDATE);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function set()
    {
        $this->append($this->SET);
        $this->append($this->parse(func_get_args()));
        return $this;
    }

    function insert($table, array $fields)
    {
        $this->append($this->INSERT);
        $this->append($this->INTO);
        $this->append($table . '(' . $this->parse($fields) . ')');
        return $this;
    }

    function values()
    {
        $this->append($this->VALUES . '(' . $this->parseArgs(func_get_args()) . ')');
        return $this;
    }

    function delete()
    {
        $this->append($this->DELETE);
        $this->append($this->FROM);
        $this->append($this->parse(func_get_args()));
        return $this;
    }
}