<?php

class MyCircularQueue {
    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    private $arr;
    private $front;
    private $rear;
    private $size;
    
    function __construct($k) {
        $this->arr = new SplFixedArray($k);
        $this->size = $k;
        $this->front = -1;
        $this->rear = -1;
    }
  
    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
        if ($this->isFull()) {
            return false;
        }
        if ($this->isEmpty()) {
            $this->front = 0;
        }
        if ($this->rear === $this->size - 1) {
            $this->arr[0] = $value;
            $this->rear = 0;
        } else {
            $this->rear++;
            $this->arr[$this->rear] = $value;
        }

        return true;
    }
  
    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue() {
        if ($this->isEmpty()) {
            return false;
        }
        unset($this->arr[$this->front]);
        
        if ($this->front === $this->rear) {
            $this->front = $this->rear = -1;
            return true;
        }

        if ($this->front === $this->size - 1) {
            $this->front = 0;
        } else {
            $this->front++;
        }
        
        return true;
    }
  
    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front() {
        if ($this->front === -1) {
            return -1;
        }

        return $this->arr[$this->front];
    }
  
    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear() {
        if ($this->rear === -1) {
            return -1;
        }

        return $this->arr[$this->rear];
    }
  
    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->front === -1;
    }
  
    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull() {
        if ($this->size === 0) {
            return true;
        }
        if ($this->front === -1) {
            return false;
        }

        return ($this->rear - $this->front === $this->size - 1) ||
            ($this->front === $this->rear + 1); 
    }
}

/**
 * Your MyCircularQueue object will be instantiated and called as such:
 * $obj = MyCircularQueue($k);
 * $ret_1 = $obj->enQueue($value);
 * $ret_2 = $obj->deQueue();
 * $ret_3 = $obj->Front();
 * $ret_4 = $obj->Rear();
 * $ret_5 = $obj->isEmpty();
 * $ret_6 = $obj->isFull();
 */

$circularQueue = new MyCircularQueue(6); // set the size to be 6
echo $circularQueue->enQueue(6) . PHP_EOL;  // return true
echo $circularQueue->Rear() . PHP_EOL;  // return 6
echo $circularQueue->Rear() . PHP_EOL;  // return 6
echo $circularQueue->deQueue() . PHP_EOL;  // return true
echo $circularQueue->enQueue(5) . PHP_EOL;  // return true
echo $circularQueue->Rear() . PHP_EOL;  // return 5
echo $circularQueue->deQueue() . PHP_EOL;  // return true
echo $circularQueue->Front() . PHP_EOL;  // return -1
echo $circularQueue->deQueue() . PHP_EOL;  // return false
echo $circularQueue->deQueue() . PHP_EOL;  // return false
echo $circularQueue->deQueue() . PHP_EOL;  // return false