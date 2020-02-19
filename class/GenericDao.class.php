<?php

declare(strict_types=1);

abstract class GenericDao {
    
    private $tableName;
    private $className;
    private $connection;
    private $readAllStatement;
    private $readOneStatement;
    private $createStatement;
    private $updateStatement; 
    private $deleteStatement;                               
    
    public function __construct(string $tableName, string $className) {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->tableName = $tableName;
        $this->className = $className;
    }
    
    function readAll() : array {
        
        if ($this->readAllStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '`';
            $this->readAllStatement = $this->connection->prepare($sql);
        }
        
        $this->readAllStatement->execute();
        
        $dtos = [];
        while ($dto = $this->readAllStatement->fetchObject($this->className)) {
            $dtos[] = $dto;
        }

        return $dtos;
    }

    function readOne(int $id) : ?object {

        if ($this->readOneStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `id`=:id';
            $this->readOneStatement = $this->connection->prepare($sql);
        }
        
        $array = [
            ':id' => $id,
        ];
        $this->readOneStatement->execute($array);
        
        while ($dto = $this->readOneStatement->fetchObject($this->className)) {
            return $dto;
        }
        
        return null;
    }

    function create(object $dto) : bool {

        if ($this->createStatement == null) {
            $sql = $this->getCreateSql();
            $this->createStatement = $this->connection->prepare($sql);
        }

        $array = $this->getCreateArray($dto);
        $this->createStatement->execute($array);
        return $this->createStatement->rowCount() == 1;
    }

    abstract protected function getCreateSql() : string;
    abstract protected function getCreateArray(object $dto) : array;
    
    function update(object $dto) : bool {

        if ($dto->getId() == 0) {
            return false;
        }

        if ($this->updateStatement == null) {
            $sql = $this->getUpdateSql();
            $this->updateStatement = $this->connection->prepare($sql);
        }
        
        $this->updateStatement->execute($this->getUpdateArray($dto));
        return $this->updateStatement->rowCount() == 1;
    }
    
    abstract protected function getUpdateSql() : string;
    abstract protected function getUpdateArray(object $dto) : array; 

    function delete(object $dto) : bool {

        if ($dto->getId() == 0) {
            return false;
        }

        if ($this->deleteStatement == null) {
            $sql = 'DELETE FROM `' . $this->tableName . '` WHERE `id`=:id';
            $this->deleteStatement = $this->connection->prepare($sql);
        }
        
        $this->deleteStatement->execute( [ ':id' => $dto->getId() ] );
        return $this->deleteStatement->rowCount() == 1;

    }

    // -------------------------------------------------------------------------
    
    protected function getTableName() {
        return $this->tableName;
    }

    protected function getClassName() {
        return $this->className;
    }

    protected function getConnection() {
        return $this->connection;
    }

}
