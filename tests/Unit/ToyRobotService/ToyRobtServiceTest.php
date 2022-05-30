<?php

namespace Tests\Unit\ToyRobotService;

use App\Services\ToyrobotService\ToyRobotService;
use Tests\TestCase;

class ToyRobtServiceTest extends TestCase
{
    public function testCase1()
    {
        $toy_robot = new ToyRobotService(10, 10);
        $toy_robot->place(0, 0, ToyRobotService::FACE_NORTH);
        $toy_robot->move();
        $response = $toy_robot->report();
        $this->assertEquals("0,1,NORTH", $response);
    }

    public function testCase2()
    {
        $toy_robot = new ToyRobotService(10, 10);
        $toy_robot->place(0, 0, ToyRobotService::FACE_NORTH);
        $toy_robot->left();
        $response = $toy_robot->report();
        $this->assertEquals("0,0,WEST", $response);
    }

    public function testCase3()
    {
        $toy_robot = new ToyRobotService(10, 10);
        $toy_robot->place(1, 2, ToyRobotService::FACE_EAST);
        $toy_robot->move();
        $toy_robot->move();
        $toy_robot->left();
        $toy_robot->move();
        $response = $toy_robot->report();
        $this->assertEquals("3,3,NORTH", $response);
    }

    public function testFail()
    {
        $toy_robot = new ToyRobotService(10, 10);
        $toy_robot->place(0, 0, ToyRobotService::FACE_NORTH);
        $toy_robot->right();
        $toy_robot->right();
        $toy_robot->move();
        $response = $toy_robot->report();
        $this->assertEquals("0,0,SOUTH", $response);
    }
}
