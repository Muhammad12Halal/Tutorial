<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.post', [
            'datas' => ModelsPost::query()
                ->where(function($query){
                    $query->where('name', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('studentID', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('phone', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('ic', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('email', 'LIKE', '%'.$this->search.'%');
                })
                ->orderBy('name', 'DESC')
                ->paginate(5),
        ]);
    }
}
