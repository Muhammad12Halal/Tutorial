<?php

namespace App\Repository;

use App\Interface\OpenInterface;
use App\Models\Open;

class OpenRepository implements OpenInterface
{
    protected $open = null;

    public function getAllOpens()
    {
        return Open::all();
    }

    public function getOpenById($id)
    {
        return Open::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {
        if(is_null($id)) {
            $open = new Open();
            $open->title = $collection['title'];
            $open->place = $collection['place'];
            $open->content = $collection['content'];
            return $open->save();
        }
        $open = Open::find($id);
        $open->title = $collection['title'];
        $open->place = $collection['place'];
        $open->content = $collection['content'];
        return $open->save();
    }

    public function deleteOpens($id)
    {
        return Open::find($id)->delete();
    }
}
