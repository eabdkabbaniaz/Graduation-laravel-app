<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\Session;
use Modules\University\App\Models\UniExpSison;
use Modules\University\App\Models\University;

class SessionRepository
{

    public function create(array $data)
    {


        $uniExpSison = UniExpSison::where('sison_id', $data['sison_id'])
            ->where('experience_id', $data['experience_id'])
            ->where('university_id', $data['university_id'])
            ->first();

        $data['uniexpsison_id'] = $uniExpSison['id'];

        $session = Session::create($data);
        $session->drugs()->sync($data['drug_ids']);
        return $session;
    }

    public function update(array $data)
    {

        $session = $this->get($data['id']);
        $session->update($data['session']);
        if (isset($data['session']['drug_ids'])) {
            $session->drugs()->sync($data['session']['drug_ids']);
        }
        return  $session;
    }

    public function delete($id)
    {
        $session = $this->get($id);
        $session->delete();
    }

    public function find($id)
    {
        return Session::with('drugs')->findOrFail($id);
    }

    public function get($id)
    {
        return Session::findOrFail($id);
    }

    public function all($message)
    {

        return   University::with('sessions')->find($message['university_id']);
        // return Session::with('drugs')->where('uniexpsison_id', $message['uniexpsison_id'])->get();
    }
}
