<?php

/**
 * Report class
 *
 * The MIT License (MIT)

 * Copyright (c) 2015 Timberline Technologies, LLC
 * Author Joshua L Loy <jloy@charton.biz>

 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Cornershort\MLMappBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/*
 * SQLHelper class
 * @author Joshua Loy <jloy@charton.biz>
 * @version 1.0.1
 */

class SQLHelper {

    private $container;
    private $em;
    private $encryption;
    private $driver = 'pdo_mysql';
    private $stmt;
    private $query_retry_count = 0;
    private $tables = array();
    private $primary_key = array();
    private $encryption_array = array();

    public function __construct(ContainerInterface $container, EntityManager $em, Encryption $encryption) {

        $this->container = $container;
        $this->em = $em;
        $this->encryption = $encryption;

        if ($this->isConnection() == false) {
            $this->connect();
        }

        if ($this->container->hasParameter('database_driver')) {
            $this->driver = $this->container->getParameter('database_driver');
        } else {
            $this->driver = 'pdo_mysql';
        }

        if ($this->container->hasParameter('database_encryption_key')) {
            $this->encryption->setKey($this->container->getParameter('database_encryption_key'));
        } else {
            exit('define "database_encryption_key: [secret key]" in parameters.yml');
        }

        if ($this->container->hasParameter('database_encryption_fields')) {
            $this->encryption_array = explode(',', $this->container->getParameter('database_encryption_fields'));
        } else {
            exit('define "database_encryption_fields: field_name1,field_name2,field_name3 " in parameters.yml');
        }
    }

    public function destruct() {
        $this->em->getConnection()->close();
        return true;
    }

    /**
     * Opens database connection
     *
     * @return boolean
     */
    private function connect() {
        $this->em->getConnection()->close();
        $this->em->getConnection()->connect();
        return $this->isConnection();
    }

    /**
     * Checks database connection
     *
     * @return boolean
     */
    private function isConnection() {
        return $this->em->getConnection()->ping();
    }

    /**
     * Disables SQLLogger
     *
     * @return boolean
     */
    public function disableLogger() {
        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);
        return true;
    }

    /**
     * Sets $this->tables array
     *
     * @param str $table
     * @return empty
     */
    private function setTables($table) {
        if (!array_key_exists($table, $this->tables)) {

            if ($this->driver == 'pdo_mysql') {

                $rows = $this->fetchRows("SHOW COLUMNS FROM " . $table . ";");
                foreach ($rows as $row) {

                    if (isset($this->tables[$table])) {
                        $tables_key = count($this->tables[$table]);
                    } else {
                        $tables_key = 0;
                    }

                    $this->tables[$table][$tables_key]['Field'] = $row['Field'];
                    $this->tables[$table][$tables_key]['Type'] = $row['Type'];
                    $this->tables[$table][$tables_key]['Null'] = $row['Null'];
                    $this->tables[$table][$tables_key]['Key'] = $row['Key'];
                    $this->tables[$table][$tables_key]['Default'] = $row['Default'];
                    $this->tables[$table][$tables_key]['Extra'] = $row['Extra'];
                }

                $row = $this->fetchRow("SHOW INDEX FROM $table WHERE Key_name='PRIMARY';");
                if (isset($row['Column_name'])) {
                    $this->primary_key[$table] = $row['Column_name'];
                }
            }

            if ($this->driver == 'pdo_sqlite') {

                $type_array = array();
                $type_array['INTEGER'] = 'int';
                $type_array['TEXT'] = 'text';
                $type_array['BLOB'] = 'blob';

                $rows = $this->fetchRows("PRAGMA table_info($table)");
                foreach ($rows as $row) {

                    if (isset($this->tables[$table])) {
                        $tables_key = count($this->tables[$table]);
                    } else {
                        $tables_key = 0;
                    }

                    $this->tables[$table][$tables_key]['Field'] = $row['name'];
                    if (isset($type_array[$row['type']])) {
                        $this->tables[$table][$tables_key]['Type'] = $type_array[$row['type']];
                    } else {
                        $this->tables[$table][$tables_key]['Type'] = $row['type'];
                    }

                    if ($row['notnull'] == 1) {
                        $this->tables[$table][$tables_key]['Null'] = 'NO';
                    } else {
                        $this->tables[$table][$tables_key]['Null'] = 'YES';
                    }

                    if ($row['pk'] == 1) {
                        $this->tables[$table][$tables_key]['Key'] = 'PRI';
                    } else {
                        $this->tables[$table][$tables_key]['Key'] = '';
                    }

                    $this->tables[$table][$tables_key]['Default'] = $row['dflt_value'];
                    $this->tables[$table][$tables_key]['Extra'] = '';

                    if ($row['pk'] == 1) {
                        $this->primary_key[$table] = $row['name'];
                    }
                }
            }
        }
    }

    private function setValue($field, $type, $null, $value) {

        //convert null values to zero if field is a number
        if ($value == null && strtolower($null) == 'no') {
            $value = '';
        }

        if (($value == null || $value == '' || $value == 'null') && strtolower($null) == 'yes') {
            $value = null;
        }

        if ($value == '') {
            $haystack = strtolower($type);
            $needleArray = array('int', 'decimal', 'float', 'boolean');
            if (in_array($haystack, $needleArray)) {
                return 0;
            }
        } else {
            if (in_array($field, $this->encryption_array) && $value != '') {
                return $this->encrypt($value);
            }
        }

        return $value;
    }

    private function getValue($field, $value) {

        if (in_array($field, $this->encryption_array) && $value != '') {
            return $this->decrypt($value);
        }

        return $value;
    }

    public function encrypt($value) {
        return $this->encryption->encrypt($value);
    }

    public function decrypt($value) {
        return $this->encryption->decrypt($value);
    }

    /**
     * Query MySQL DB
     *
     * @param str $query the sql statment to be executed
     * @return MYSQLI_STORE_RESULT
     */
    public function query($query, $params = array()) {
        try {
            $this->stmt = $this->em->getConnection()->prepare($query);
            $this->stmt->execute($params);
            $this->query_retry_count = 0;
            return true;
        } catch (\Doctrine\DBAL\DBALException $e) {
            if ($this->isConnection() == false) {
                if ($this->connect() == true && $this->query_retry_count == 0) {
                    $this->query_retry_count += 1;
                    return $this->query($query, $params);
                } else {
                    $this->query_retry_count = 0;
                    $this->logError($e->getMessage(), $query, $params);
                    return false;
                }
            } else {
                $this->query_retry_count = 0;
                $this->logError($e->getMessage(), $query, $params);
                return false;
            }
        }
    }

    /**
     * Returns the number of rows affected by the last SQL statement
     *
     * @return int
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    /**
     * Log errors
     *
     * @param str $message
     * @param str $query
     * @param array $params
     * @return empty
     */
    private function logError($message, $query, $params) {

        $sql = "INSERT INTO sql_helper_error (";
        $sql.="date_time,";
        $sql.="file_name,";
        $sql.="query,";
        $sql.="message";
        $sql.=") VALUES(";
        $sql.=":date_time,";
        $sql.=":file_name,";
        $sql.=":query,";
        $sql.=":message";
        $sql.=");";

        foreach ($params as $key => $value) {
            $query = str_replace(":$key", "'$value'", $query);
        }

        $arry['date_time'] = date('Y-m-d H:i:s');
        $arry['file_name'] = $_SERVER['PHP_SELF'];
        $arry['query'] = $query;
        $arry['message'] = $message;

        try {
            $this->stmt = $this->em->getConnection()->prepare($sql);
            $this->stmt->execute($arry);
            return true;
        } catch (\Doctrine\DBAL\DBALException $e) {
            return false;
        }
    }

    private function createLogErrorSchema() {

        $sql = "CREATE TABLE IF NOT EXISTS sql_helper_error( ";
        $sql .= "sql_helper_error_id BIGINT NOT NULL auto_increment, ";
        $sql .= "date_time DATETIME NOT NULL, ";
        $sql .= "file_name VARCHAR(255) NOT NULL, ";
        $sql .= "query TEXT NOT NULL,";
        $sql .= "message TEXT NOT NULL,";
        $sql .= "PRIMARY KEY (sql_helper_error_id)";
        $sql .= ") engine = myisam charset=utf8;";

        try {
            $this->stmt = $this->em->getConnection()->prepare($sql);
            $this->stmt->execute();
            return true;
        } catch (\Doctrine\DBAL\DBALException $e) {
            return false;
        }
    }

    /**
     * Insert record into database
     *
     * @param str $table database table name
     * @param array $data_array
     * @return boolean
     */
    public function insertRecord($table, $data_array) {

        $params = array();

        $this->setTables($table);

        $my_count = 0;

        $query = "INSERT INTO $table (";
        foreach ($this->tables[$table] as $tables_key => $tables_value) {
            $field = $this->tables[$table][$tables_key]['Field'];
            $type = $this->tables[$table][$tables_key]['Type'];
            $null = $this->tables[$table][$tables_key]['Null'];
            $key = $this->tables[$table][$tables_key]['Key'];
            $default = $this->tables[$table][$tables_key]['Default'];
            $extra = $this->tables[$table][$tables_key]['Extra'];

            if (array_key_exists($field, $data_array)) {
                if ($extra != 'auto_increment' || ($extra == 'auto_increment' && $data_array[$field] > 0)) {
                    if ($my_count == 0) {
                        $query .= $field;
                    } else {
                        $query .= "," . $field;
                    }
                    $my_count+=1;
                }
            }
        }

        $my_count = 0;

        $query .= ") VALUES(";
        foreach ($this->tables[$table] as $tables_key => $tables_value) {
            $field = $this->tables[$table][$tables_key]['Field'];
            $type = $this->tables[$table][$tables_key]['Type'];
            $null = $this->tables[$table][$tables_key]['Null'];
            $key = $this->tables[$table][$tables_key]['Key'];
            $default = $this->tables[$table][$tables_key]['Default'];
            $extra = $this->tables[$table][$tables_key]['Extra'];

            if (array_key_exists($field, $data_array)) {

                if ($extra != 'auto_increment' || ($extra == 'auto_increment' && $data_array[$field] > 0)) {

                    $value = $this->setValue($field, $type, $null, $data_array[$field]);

                    if ($my_count == 0) {
                        $query .= ":" . $field;
                    } else {
                        $query .= ",:" . $field;
                    }
                    $my_count+=1;

                    $params[$field] = $value;
                }
            }
        }
        $query .= ");";

        if ($my_count > 0) {
            if ($this->query($query, $params)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Update record in database
     *
     * @param str $table database table name
     * @param array $data_array
     * @return boolean
     */
    public function updateRecord($table, $data_array) {

        $params = array();

        $this->setTables($table);

        if (isset($this->primary_key[$table])) {
            if (isset($data_array[$this->primary_key[$table]])) {
                $params[$this->primary_key[$table]] = $data_array[$this->primary_key[$table]];
            } else {
                return false;
            }
        } else {
            return false;
        }

        $my_count = 0;
        $query = "UPDATE $table SET ";
        foreach ($this->tables[$table] as $tables_key => $tables_value) {

            $field = $this->tables[$table][$tables_key]['Field'];
            $type = $this->tables[$table][$tables_key]['Type'];
            $null = $this->tables[$table][$tables_key]['Null'];
            $key = $this->tables[$table][$tables_key]['Key'];
            $default = $this->tables[$table][$tables_key]['Default'];
            $extra = $this->tables[$table][$tables_key]['Extra'];

            if (array_key_exists($field, $data_array) && $this->primary_key[$table] != $field) {

                $value = $this->setValue($field, $type, $null, $data_array[$field]);

                if ($my_count == 0) {
                    $query .= $field . "=:" . $field;
                } else {
                    $query .= "," . $field . "=:" . $field;
                }
                $my_count+=1;

                $params[$field] = $value;
            }
        }
        $query .= " WHERE " . $this->primary_key[$table] . "=:" . $this->primary_key[$table] . ";";

        if ($my_count > 0) {
            if ($this->query($query, $params)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Insert or Update record in database
     *
     * @param str $table database table name
     * @param array $data_array
     * @return boolean
     */
    public function saveRecord($table, $data_array) {

        $this->setTables($table);

        if (isset($this->primary_key[$table])) {
            $primay_key_field = $this->primary_key[$table];
            if (array_key_exists($primay_key_field, $data_array)) {
                $primay_key_value = $data_array[$primay_key_field];
            } else {
                return false;
            }
        } else {
            return false;
        }

        $result = $this->fetchRow("SELECT $primay_key_field FROM $table WHERE $primay_key_field=:primay_key_field LIMIT 1;", array('primay_key_field' => $primay_key_value));
        if (count($result) > 0) {
            return $this->updateRecord($table, $data_array);
        } else {
            return $this->insertRecord($table, $data_array);
        }
    }

    /**
     * Delete record in database
     *
     * @param str $table database table name
     * @param array $data_array
     * @return boolean
     */
    public function deleteRecord($table, $data_array) {

        $params = array();
        $this->setTables($table);

        if (isset($this->primary_key[$table])) {
            if (isset($data_array[$this->primary_key[$table]])) {
                $params[$this->primary_key[$table]] = $data_array[$this->primary_key[$table]];
                $query = "DELETE FROM $table WHERE " . $this->primary_key[$table] . "=:" . $this->primary_key[$table] . ";";
                if ($this->query($query, $params)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Return database query results in 2 dimensional array
     *
     * @param str $query sql to be executed
     * @return array $ret_array[row][fieldname]
     */
    public function fetchRows($query, $params = array(), $fetch_num = false) {

        $ret_array = array();
        if ($this->query($query, $params)) {
            $result = $this->stmt->fetchAll();
            foreach ($result as $row => $row_value) {
                $temp_array = Array();
                $c = 0;
                foreach ($result[$row] as $field => $value) {
                    if ($fetch_num == true) {
                        $temp_array[$c] = $this->getValue($field, $value);
                    } else {
                        $temp_array[$field] = $this->getValue($field, $value);
                    }
                    $c+=1;
                }
                $ret_array[] = $temp_array;
            }
        }

        return $ret_array;
    }

    /**
     * Return database query result
     *
     * @param str $query sql to be executed
     * @return array $ret_array[fieldname]
     */
    public function fetchRow($query, $params = array(), $fetch_num = false) {

        $ret_array = array();
        if ($this->query($query, $params)) {
            $result = $this->stmt->fetchAll();
            foreach ($result as $row => $row_value) {
                $c = 0;
                foreach ($result[$row] as $field => $value) {
                    if ($fetch_num == true) {
                        $ret_array[$c] = $this->getValue($field, $value);
                    } else {
                        $ret_array[$field] = $this->getValue($field, $value);
                    }
                    $c+=1;
                }
            }
        }

        return $ret_array;
    }

    /**
     * Returns next auto_increment value
     *
     * @return insert_id
     */
    public function nextInsertId($tbl) {

        if ($this->driver == 'pdo_mysql') {
            $params = array();
            $params['TABLE_SCHEMA'] = $this->em->getConnection()->getDatabase();
            $params['TABLE_NAME'] = $tbl;
            $arry = $this->fetchRow("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = :TABLE_SCHEMA AND TABLE_NAME = :TABLE_NAME;", $params);
            return $arry['AUTO_INCREMENT'];
        } else {
            return -1;
        }
    }

    /**
     * Returns auto_increment value
     *
     * @return insert_id
     */
    public function lastInsertId() {
        return $this->em->getConnection()->lastInsertId();
    }

}
