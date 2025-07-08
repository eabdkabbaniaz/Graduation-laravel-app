<?php

namespace Modules\Medication\Repository;

use Modules\Medication\App\Models\Medication;
use Modules\Medication\Repository\MedicationRepositoryInterface;

class MedicationRepository implements MedicationRepositoryInterface
{
    public function all()
    {
        return Medication::with('effects.system', 'effects.effect')->get();
    }

    public function find($id)
    {
        return Medication::findOrFail($id);
    }

    public function create(array $data)
    {
        return Medication::create(
            [
            'name'=>$data['name'],
            'generic_name'=>$data['generic_name'],
            'description'=>$data['description'],
            'usage'=>$data['usage'],
            'side_effects'=>$data['side_effects'],
            'dosage'=>$data['dosage'],
            ]
        );
    }

    public function update($id, array $data)
    {
        $medication = Medication::findOrFail($id);

        $medication->update([
            'name'          => $data['name'],
            'generic_name'  => $data['generic_name'],
            'description'   => $data['description'],
            'usage'         => $data['usage'],
            'side_effects'  => $data['side_effects'],
            'dosage'        => $data['dosage'],
        ]);

        return $medication;
    }

    public function delete($id)
    {
        return Medication::destroy($id);
    }

    public function filter($systemId = null, $effectId = null)
    {
        return Medication::whereHas('effects', function ($query) use ($systemId, $effectId) {
            if ($systemId) {
                $query->where('system_id', $systemId);
            }
            if ($effectId) {
                $query->where('effect_id', $effectId);
            }
        })
        ->with(['effects.system', 'effects.effect'])
        ->get();
    }

}
