<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function update($values, $id)
    {
        return User::query()->where('id', $id)->update([
            'full_name' => $values->full_name,
            'email' => $values->email,
            'image_id' => $values->image_id,
            'password' => \Hash::make($values->password)
        ]);
    }

    public function findById($id)
    {
        return User::query()->findOrFail($id);
    }
}
