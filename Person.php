<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 06.04.2019
 * Time: 22:12
 */

/**
 * Class Person Шаблон Domain
 */
class Person
{
    protected $name;
    protected $age;
    protected $interests = [];

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return array
     */
    public function getInterests(): array
    {
        return $this->interests;
    }

    /**
     * @param array $interests
     */
    public function setInterests(array $interests): void
    {
        $this->interests = $interests;
    }

    /**
     * @return static
     */
    public function generatePerson() {
        $person = new static();

        $person->setName('John Doe');
        $person->setAge(33);
        $person->setInterests(['JS', 'php', 'yii2', 'data science', 'linux']);

        return $person;
    }

}

$person = new Person();

var_dump($person->generatePerson());