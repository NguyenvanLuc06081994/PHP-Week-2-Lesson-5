<?php


class Dancer
{
    public $name;
    public $gender;

    public function __construct($name, $gender)
    {
        $this->name = $name;
        $this->gender = $gender;
    }
}


class QueueDance
{
    protected $manQueue;
    protected $womanQueue;
    protected $queue;
    protected $display;

    public function __construct()
    {
        $this->manQueue = new SplQueue();
        $this->womanQueue = new SplQueue();
        $this->queue = [];
        $this->display = [];

    }

    public function creatDancer()
    {
        $firstName = ["Tung", "manh", "duong", "nguyen", "cuong", "luc", "vietanh"];
        $lastName = ["Pham", "Nguyen", "do", "tran", "Vuong", "Dao", "Hua"];
        $fullName = $firstName[rand(0, count($firstName) - 1)] . $lastName[rand(0, count($lastName) - 1)];
        $genders = ["male", "female"];
        $gender = $genders[rand(0, 1)];
        $dancer = new Dancer($fullName, $gender);
        array_push($this->display, $dancer);
        return $dancer;
    }


    public function addDancerToQueue($dancer)
    {
        if ($dancer->gender == "male") {
            $this->manQueue->enqueue($dancer);
        } else {
            $this->womanQueue->enqueue($dancer);
        }
    }

    public function makePair()
    {
        $arr = [];
        $man = $this->manQueue->dequeue();
        $woman = $this->womanQueue->dequeue();
        array_push($arr, $man, $woman);
        array_push($this->queue, $arr);
        return $this->queue;
    }

    public function getRemain()
    {
        return $this->display;
    }

}
$list = new QueueDance();
$dancer1 = $list->creatDancer();
$dancer2 = $list->creatDancer();
$dancer3 = $list->creatDancer();
$dancer4 = $list->creatDancer();
$dancer5 = $list->creatDancer();

echo "<pre>";
print_r($list->getRemain());

$list->addDancerToQueue($dancer1);
$list->addDancerToQueue($dancer2);
$list->addDancerToQueue($dancer3);
$list->addDancerToQueue($dancer4);
$list->addDancerToQueue($dancer5);

print_r($list->makePair());