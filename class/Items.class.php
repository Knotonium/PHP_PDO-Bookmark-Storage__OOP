<?php

declare(strict_types=1);

class Items {
    
    private $id;
    private $url;
    private $code;
    
    function __construct(string $url='', string $code='', int $id=0) {
        if ($this->id != 0) {
            $this->id = intVal($this->id);
            return;
        }
        $this->id = $id;
        $this->url = $url;
        $this->code = $code;
    }

    function getId() : int {
        return $this->id;
    }
    function setId(int $id): void {
        $this->id = $id;
    }

    function getUrl() : string {
        return $this->url;
    }
    function setUrl(string $url): void {
        $this->url = $url;
    }

    function getCode() : string {
        return $this->code;
    }
    function setCode(string $code): void {
        $this->code = $code;
    }
}
