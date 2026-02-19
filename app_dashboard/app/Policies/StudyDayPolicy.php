<?php

namespace App\Policies;

use App\Models\StudyDay;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudyDayPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudyDay $studyDay): bool
    {
        return $user->is($studyDay->user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudyDay $studyDay): bool
    {
        return $user->is($studyDay->user);
    }

}
