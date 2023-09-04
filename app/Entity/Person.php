<?php

namespace App\Entity;

class Person {
    private $name;
    private $nis;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }


    public function getNis() {
        return $this->nis;
    }

    public function setNis($nis) {
        $this->nis = $nis;
    }

    public function table(): string
    {
        return 'persons';
    }

    public function getColumns(): array
    {
        return [
            ':full_name',
            ':nis',
        ];
    }

    public function getValues(): array
    {
        return [
             ':full_name' => $this->getName(),
             ':nis' => $this->getNis(),
        ];
    }
}