<?php

namespace Modules\University\Repository;

use Illuminate\Support\Facades\Hash;
use Modules\University\App\Models\Sison;
use Modules\University\App\Models\University;

class SisonRepository
{
    public function index()
    {
        return Sison::get();
    }

    public function find($id)
    {
        return Sison::find($id);
    }

    public function create($message)
    {
        return Sison::create($message);
    }

    public function update($message)
    {
        $sison = Sison::find($message['id']);
        $sison->update($message['data']);
        return $sison;
    }

    public function destroy($id)
    {
        return    Sison::destroy($id);
    }
    public function changeStatus($id)
    {
        $sison = Sison::find($id);
        $sison->status = $sison->status == 1 ? 0 : 1;
        $sison->save();
        return $sison;
    }
}
