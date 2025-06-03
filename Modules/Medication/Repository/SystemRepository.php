<?php

namespace Modules\Medication\Repository;

use Modules\Medication\App\Models\System;
use Modules\Medication\Repository\SystemRepositoryInterface;

class SystemRepository implements SystemRepositoryInterface
{
    public function all()
    {
        return System::all();
    }

    public function find($id)
    {
        return System::findOrFail($id);
    }

    public function create(array $data)
    {
        return System::create($data);
    }

    public function update($id, array $data)
    {
        $system = System::findOrFail($id);
        $system->update($data);
        return $system;
    }

    public function delete($id)
    {
        return System::destroy($id);
    }

    public function exists($id)
    {
        return System::where('id', $id)->exists(); 
    }
}
