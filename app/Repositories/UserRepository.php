<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function update($values, $image_id, $id)
    {
        return User::query()->where('id', $id)->update([
            'full_name' => $values->full_name,
            'email' => $values->email,
            'image_id' => $image_id,
            'password' => bcrypt($values->password)
        ]);
    }

    public function addImage($image_id, $id)
    {
        return User::query()->where('id', $id)->update([
            'image_id' => $image_id
        ]);
    }

    public function findById($id)
    {
        return User::query()->findOrFail($id);
    }
}
