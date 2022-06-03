<?php

namespace App\Interface;

interface OpenInterface
{
    public function getAllOpens();

    public function getOpenById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deleteOpens($id);
}
