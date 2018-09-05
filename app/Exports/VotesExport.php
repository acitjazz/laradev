<?php

namespace App\Exports;

use App\Models\Vote;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VotesExport implements FromView
{
	use Exportable;

	public function forCategory(int $category)
    {
        $this->category = $category;
        
        return $this;
    }

     public function view(): View
    {
    	return view('admin.category.exports', [
            'votes' => Vote::where('category_id', $this->category)->get(),
        ]);
    }

}
