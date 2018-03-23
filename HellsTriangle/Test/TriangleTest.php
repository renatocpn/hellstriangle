<?php

namespace HellsTriangle\Test;

use HellsTriangle\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase {

    /**
     * @dataProvider badTriangleProvider
     */
    public function testInvalidTriangle($arr) {
        $tri = new Triangle();

        $this->assertFalse($tri->setArray($arr));
    }
    
    /**
     * @dataProvider goodTriangleProvider
     */
    public function testValidTriangle($arr, $expectedSum) {
        $tri = new Triangle();

        $this->assertTrue($tri->setArray($arr));
        $this->assertEquals($expectedSum, current($tri->getHellsSum()));
    }
    
    public function badTriangleProvider() {
        return [
            [
                [[2],[1,3],[6,4],[3,9,0,4]]
            ],
            [
                [[3],[6,4],[2,8,0],[2,4,5,4],[2,2,7,0]]
            ],
            [
                [[5],[4,7.2],[3,0,6]]
            ],
            [
                [['a'],[2,6],[3,5,9]]
            ]
        ];
    }

    public function goodTriangleProvider() {
        return [
            [
                [[6],[3,5],[9,7,1],[4,6,8,4]],
                26
            ],//base triangle from example
            [
                [[7],[3,9],[2,5,7],[1,6,9,4],[4,2,6,8,5]],
                40
            ]
        ];
    }

}