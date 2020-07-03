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
    public $manQueue;
    public $womanQueue;

    /**
     * @return SplQueue
     */
    public function getManQueue(): SplQueue
    {
        return $this->manQueue;
    }

    /**
     * @param SplQueue $manQueue
     */
    public function setManQueue(SplQueue $manQueue): void
    {
        $this->manQueue = $manQueue;
    }

    /**
     * @return SplQueue
     */
    public function getWomanQueue(): SplQueue
    {
        return $this->womanQueue;
    }

    /**
     * @param SplQueue $womanQueue
     */
    public function setWomanQueue(SplQueue $womanQueue): void
    {
        $this->womanQueue = $womanQueue;
    }

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

    public function displayCouple()
    {
        return $this->queue;
    }

}

$list = new QueueDance();
for ($i = 0; $i < 10; $i++) {
    $list->addDancerToQueue($list->creatDancer());
}
echo "<pre>";
print_r($list->getManQueue());

echo "<pre>";
print_r($list->getWomanQueue());

$status = false;
while (!$status) {
    $status = $list->manQueue->isEmpty() || $list->womanQueue->isEmpty();
    if ($status){
        echo "wait a minute";
    }else{
        $list->makePair();
    }

}
echo "<pre>";
print_r($list->displayCouple());



