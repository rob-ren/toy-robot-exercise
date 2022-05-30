<?php

namespace App\Services\ToyRobotService;

class ToyRobotService
{
    const FACE_NORTH = "NORTH";
    const FACE_WEST  = "WEST";
    const FACE_SOUTH = "SOUTH";
    const FACE_EAST  = "EAST";

    private $current_position_x = 0;
    private $current_position_y = 0;
    private $current_position_face = self::FACE_NORTH;

    private $board_x;
    private $board_y;

    public function __construct($board_x = null, $board_y = null)
    {
        $this->board_x = $board_x;
        $this->board_y = $board_y;
    }

    public function place($position_x, $position_y, $face)
    {
        $this->current_position_x    = $position_x;
        $this->current_position_y    = $position_y;
        $this->current_position_face = $face;
    }

    public function move()
    {
        switch ($this->current_position_face) {
            case self::FACE_NORTH:
                // check if off the board
                if ($this->current_position_y == $this->board_y) {
                    break;
                }
                $this->current_position_y += 1;
                break;
            case self::FACE_SOUTH:
                // check if off the board
                if ($this->current_position_y == 0) {
                    break;
                }
                $this->current_position_y -= 1;
                break;
            case self::FACE_EAST:
                // check if off the board
                if ($this->current_position_x == $this->board_x) {
                    break;
                }
                $this->current_position_x += 1;
                break;
            case self::FACE_WEST:
                // check if off the board
                if ($this->current_position_x == 0) {
                    break;
                }
                $this->current_position_x -= 1;
                break;
            default:
        }
    }

    public function left()
    {
        switch ($this->current_position_face) {
            case self::FACE_NORTH:
                $this->current_position_face = self::FACE_WEST;
                break;
            case self::FACE_SOUTH:
                $this->current_position_face = self::FACE_EAST;
                break;
            case self::FACE_EAST:
                $this->current_position_face = self::FACE_NORTH;
                break;
            case self::FACE_WEST:
                $this->current_position_face = self::FACE_SOUTH;
                break;
            default:
        }
    }

    public function right()
    {
        switch ($this->current_position_face) {
            case self::FACE_NORTH:
                $this->current_position_face = self::FACE_EAST;
                break;
            case self::FACE_SOUTH:
                $this->current_position_face = self::FACE_WEST;
                break;
            case self::FACE_EAST:
                $this->current_position_face = self::FACE_SOUTH;
                break;
            case self::FACE_WEST:
                $this->current_position_face = self::FACE_NORTH;
                break;
            default:
        }
    }

    public function report()
    {
        return $this->current_position_x . "," . $this->current_position_y . "," . $this->current_position_face;
    }
}
