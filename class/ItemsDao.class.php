<?php

declare(strict_types=1);

class ItemsDao extends GenericDao {

    public function __construct() {
        parent::__construct('items', 'Items');
    }

    protected function getCreateSql(): string {
        return 'INSERT INTO `' . $this->getTableName() . '` (`url`, `code`) VALUES (:url, :code)';
    }

    protected function getCreateArray(object $items): array {
        return [
            ':url' => $items->getUrl(),
            ':code' => $items->getCode(),
        ];
    }

    protected function getUpdateSql(): string {
        return 'UPDATE `' . $this->getTableName() . '` SET `url`=:url, `code`=:code WHERE `id`=:id';
    }

    protected function getUpdateArray(object $items): array {
        return array_merge($this->getCreateArray($items), [ ':id' => $items->getId() ]);
    }
}
$id = 0;
$itemsDao = new itemsDao();
$items = $itemsDao->readOne(intVal($id));

if ($items == null) {
   $items = new items();
}
if (isSet($_POST['shortbtn'])) {
    $items->setUrl($_POST['url']);
    $items->setCode($_POST['code']);
    if ($id == 0) {
        $itemsDao->create($items);
    }
}
