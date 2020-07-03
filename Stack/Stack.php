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
        $left = [];
        $right = [];
        $status = false;
        while (!$status) {
            $status = $this->rightSymbol == null || $this->leftSymbol == null;
            if ($status) {
                echo "empty";
            }else{
                array_push($left,$this->rightSymbol->shift());
                array_push($right, $this->leftSymbol->shift());
            }

        }

        for ($i = 0; $i < count($left); $i++) {
            if ($left[$i] . $right[$i] == "()") {
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkStatus()
    {
        $status = $this->leftSymbol == null || $this->rightSymbol == null;
        if ($status) {
            return false;
        } else {
            $this->result();
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
$myStack->pushSymbol("(((abc)))");

echo "<pre>";
print_r($myStack->getLeftSymbol());

echo "<pre>";
print_r($myStack->getRightSymbol());

var_dump($myStack->checkStatus());