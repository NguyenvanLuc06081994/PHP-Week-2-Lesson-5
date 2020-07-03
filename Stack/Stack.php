<?php


class Stack123
{
    protected $leftSymbol;
    protected $rightSymbol;


    public function __construct()
    {
        $this->leftSymbol = new SplStack();
        $this->rightSymbol = new SplStack();

    }

    public function pushSymbol($str)
    {
        $arr = str_split($str);
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == "(") {
                $this->leftSymbol->push($arr[$i]);
            } elseif ($arr[$i] == ")") {
                $this->rightSymbol->unshift($arr[$i]);
            }
        }
    }

    public function result()
    {

    }

    public function checkStatus()
    {
        if ($this->rightSymbol->count() !== $this->leftSymbol->count()) {
            return false;
        } else {
            $left = [];
            $right = [];
            $status = false;
            while (!$status) {
                $status = $this->leftSymbol->isEmpty() || $this->rightSymbol->isEmpty();
                if (!$status) {
                    array_push($right, $this->rightSymbol->pop());
                    array_push($left, $this->leftSymbol->pop());
                }
            }
            for ($j = 0; $j < count($left); $j++) {
                if ($left[$j] . $right[$j] == "()") {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function getLeftSymbol()
    {
        return $this->leftSymbol;
    }

    public function getRightSymbol()
    {
        return $this->rightSymbol;
    }

}

$myStack = new Stack123();
$myStack->pushSymbol("(–b+(b^2–4*a*c)^(0.5/ 2*a))");

echo "<pre>";
print_r($myStack->getLeftSymbol());

echo "<pre>";
print_r($myStack->getRightSymbol());

var_dump($myStack->checkStatus());

