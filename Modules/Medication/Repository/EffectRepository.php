<?php

namespace Modules\Medication\Repository;

use Modules\Medication\App\Models\Effect;
use Modules\Medication\Repository\EffectRepositoryInterface;

class EffectRepository implements EffectRepositoryInterface
{
    public function all()
    {
        return Effect::all();
    }

    public function find($id)
    {
        return Effect::findOrFail($id);
    }

    public function create(array $data)
    {
        return Effect::create($data);
    }

    public function update($id, array $data)
    {
        $effect = Effect::findOrFail($id);
        $effect->update($data);
        return $effect;
    }

    public function delete($id)
    {
        return Effect::destroy($id);
    }

    public function exists($id)
    {
        return Effect::where('id', $id)->exists(); 
    }
}
