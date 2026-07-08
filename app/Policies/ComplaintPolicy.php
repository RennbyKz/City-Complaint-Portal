<?php

namespace App\Policies;

use App\Models\Complaint;
use App\Models\User;

class ComplaintPolicy
{
    public function view(User $user, Complaint $complaint): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isCitizen()) {
            return $complaint->user_id === $user->id;
        }

        if ($user->isDepartmentOfficer()) {
            return $complaint->department_id === $user->department_id;
        }

        return false;
    }

    public function update(User $user, Complaint $complaint): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isDepartmentOfficer()) {
            return $complaint->department_id === $user->department_id;
        }

        return false;
    }
}
