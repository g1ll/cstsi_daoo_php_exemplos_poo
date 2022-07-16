<?php

namespace app\model;

interface DAO
{
    public function create();
    public function read();
    public function update();
    public function delete($id);
    public function show($id);
    public function filter($arrayFilter);
}