<?php
interface ModelIf {
    public static function connect();
    public function create();
    public function update();
    public function delete();
}