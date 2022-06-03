<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpenRequest;
use App\Repository\OpenRepository;
use Illuminate\Support\Facades\View;

class OpenController extends Controller
{
    public $open;

    public function __construct(OpenRepository $open)
    {
        $this->open = $open;
    }

    public function showOpens()
    {
        $open = $this->open->getAllOpens();
        return View::make('open.index', compact('open'));
    }

    public function createOpens()
    {
        return View::make('open.edit');
    }

    public function getOpens($id)
    {
        $open = $this->open->getOpenById($id);
        return View::make('open.edit', compact('open'));
    }

    public function saveOpens(OpenRequest $request, $id = null)
    {
        $collection = $request->except(['_token','_method']);

        if( ! is_null( $id ) )
        {
            $this->open->createOrUpdate($id, $collection);
        }
        else
        {
            $this->open->createOrUpdate($id = null, $collection);
        }

        return redirect()->route('open.index');
    }

    public function deleteOpens($id)
    {
        $this->open->deleteOpens($id);
        return redirect()->route('open.index')->with('success', 'Information deleted successfully');;
    }
}
