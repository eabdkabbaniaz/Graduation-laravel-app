<?php

namespace Modules\Medication\Repository;

use Modules\Medication\App\Models\MedicationEffect;
use Modules\Medication\Repository\MedicationEffectRepositoryInterface;

class MedicationEffectRepository implements MedicationEffectRepositoryInterface
{
    public function all()
    {
        return MedicationEffect::all();
    }

    public function find($id)
    {
        return MedicationEffect::findOrFail($id);
    }

    public function create(array $data)
    {
        return MedicationEffect::create($data);
    }

    public function update($id, array $data)
    {
        $medicationEffect = MedicationEffect::findOrFail($id);
        $medicationEffect->update($data);
        return $medicationEffect;
    }

    public function delete($id)
    {
        return MedicationEffect::destroy($id);
    }

    public function getByMedicationId($medicationId)
    {
        return MedicationEffect::where('medication_id', $medicationId)->first();
    }

}
