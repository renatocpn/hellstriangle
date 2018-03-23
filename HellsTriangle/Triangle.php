<?php

namespace HellsTriangle;




class Triangle {
    
    /**
     * Base array that represents the Hell's Triangle
     *
     * @var array
     */
    private $array = [];

    /**
     * Array that holds the sum result
     *
     * @var array
     */
    private $sumArray = [];

    /**
     * Validates the array against law 1
     *
     * @param array $array
     * @return boolean
     */
    private function isValid($array) {
        
        if (empty($array)) {
            return false;
        }

        foreach ($array as $rowNumber=>$rowElements) {
            if ($rowNumber+1!=count($rowElements)) {
                return false;
            }

            foreach ($rowElements as $element) {
                if (gettype($element)!='integer') {
                    return false;
                }

                if ($element < 0) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Set the base array if it is valid
     *
     * @param array $array
     * @return boolean
     */
    public function setArray($array) {

        if (!$this->isValid($array)) {
            return false;
        }
        
        $this->array = $array;

        return true;
        
    }

    /**
     * Processes all possible sums and returns the largest result
     *
     * @return array
     */
    public function getHellsSum() {
        
        $this->sumArray = [];
        
        $this->recursiveSum();
        
        arsort($this->sumArray);
        
        reset($this->sumArray);
        
        return [key($this->sumArray)=>current($this->sumArray)];
    }

    /**
     * Returns an array of all possible sums recursivelly
     *
     * @param integer $row
     * @param integer $position
     * @param string $indexes
     * @param integer $buffer
     * @return void
     */
    private function recursiveSum($row = 0, $position = 0, $indexes = '',$buffer = 0) {
        //fetch current element
        $currElement = $this->array[$row][$position];

        $newIndex = (($indexes=='')?'':$indexes.',').$position;

        $sumBuffer = $buffer+$currElement;

        //verify if another row exists
        if (isset($this->array[$row+1])) {
            
            $this->recursiveSum($row+1, $position, $newIndex, $sumBuffer);
            $this->recursiveSum($row+1, $position+1, $newIndex, $sumBuffer);

        } else {
             $this->sumArray[$newIndex] = $buffer + $currElement;
        }
    }
}