<?php

class MyCircularDeque {
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    private $arr;
    private $frontIndex;
    private $lastIndex;
    private $size;

    function __construct($k) {
        $this->arr = new SplFixedArray($k);
        $this->size = $k;
        $this->frontIndex = $this->lastIndex = -1;
    }
  
    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->isFull()) {
            return false;
        }
        if ($this->frontIndex === 0 || $this->frontIndex === -1) {
            if ($this->frontIndex === -1) {
                $this->lastIndex = $this->size - 1;
            }
            $this->frontIndex = $this->size - 1;
        } else {
            $this->frontIndex--;
        }
        $this->arr[$this->frontIndex] = $value;
        
        return true;
    }
  
    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->isFull()) {
            return false;
        }
        if ($this->lastIndex === $this->size - 1) {
            $this->lastIndex = 0;
        } else {
            $this->lastIndex++;
        }        
        
        if ($this->frontIndex === -1) {
            $this->frontIndex = $this->lastIndex;
        }
        $this->arr[$this->lastIndex] = $value;

        return true;
    }
  
    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if ($this->isEmpty()) {
            return false;
        }
        unset($this->arr[$this->frontIndex]);
        if ($this->frontIndex === $this->lastIndex) {
            $this->frontIndex = $this->lastIndex = -1;
        } elseif ($this->frontIndex === $this->size - 1) {
            $this->frontIndex = 0;
        } else {
            $this->frontIndex++;
        }

        return true;
    }
  
    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if ($this->isEmpty()) {
            return false;
        }
        unset($this->arr[$this->lastIndex]);
        if ($this->lastIndex === $this->frontIndex) {
            $this->frontIndex = $this->lastIndex = -1;
        } elseif ($this->lastIndex === 0) {
            $this->lastIndex = $this->size - 1;
        } else {
            $this->lastIndex--;
        }

        return true;
    }
  
    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->arr[$this->frontIndex];
    }
  
    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->arr[$this->lastIndex];
    }
  
    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->frontIndex === -1;
    }
  
    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return ($this->frontIndex === 0 && $this->lastIndex === $this->size - 1) || ($this->frontIndex === $this->lastIndex + 1);
    }
}

$circularDeque = new MycircularDeque(3); // set the size to be 3
print($circularDeque->insertFront(2)) . PHP_EOL;			// return true
print($circularDeque->insertLast(4)) . PHP_EOL;  			// return 2
print($circularDeque->insertFront(6)) . PHP_EOL;  			// return 2
print($circularDeque->getRear()) . PHP_EOL;  			// return 2
print($circularDeque->insertFront(5)) . PHP_EOL;			// return true
print($circularDeque->getFront()) . PHP_EOL;  			// return 2
print($circularDeque->getFront()) . PHP_EOL;			// return true
print($circularDeque->insertFront(6)) . PHP_EOL;			// return true
print($circularDeque->isFull()) . PHP_EOL;			// return true
print($circularDeque->insertLast(6)) . PHP_EOL;			// return false, the queue is full
print($circularDeque->getRear()) . PHP_EOL;				// return true


// ["MyCircularDeque","insertFront","insertLast","insertFront","getRear","insertFront","getFront","getFront","insertFront","isFull","insertLast","getRear"]
// [[3],[2],[4],[6],[],[5],[],[],[6],[],[6],[]]


// [null,true,true,false,4,false,2,2,false,true,false,4]
// [null,true,true,true,4,false,6,6,false,true,false,4]