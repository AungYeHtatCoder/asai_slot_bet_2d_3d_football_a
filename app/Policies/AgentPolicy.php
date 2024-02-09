<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function before(Admin $admin, $ability)
    {
        // If the user is an Admin, they can perform any action
        if ($admin->hasRole('Admin')) {
            return true;
        }
    }

    public function createMaster(Admin $admin)
    {
        // Only Admin can create a Master
        return $admin->hasRole('Admin');
    }

    public function createAgent(Admin $admin)
    {
        // Only Admin and Master can create an Agent
        return $admin->hasRole('Admin') || $admin->hasRole('Master');
    }

    public function createUser(Admin $admin)
    {
        // Only Admin, Master, and Agent can create a User
        return $admin->hasRole('Admin') || $admin->hasRole('Master') || $admin->hasRole('Agent');
    }
    
    // ... other methods for update, view, delete, etc.
    // admin only view 
    public function viewAdminTransferLog(Admin $admin)
    {
        return $admin->hasRole('Admin');
    }
    // master only view
    public function viewMasterTransferLog(Admin $admin)
    {
        return $admin->hasRole('Master');
    }
    // agent only view
    public function viewAgentTransferLog(Admin $admin)
    {
        return $admin->hasRole('Agent');
    }
    // admin only update balance 
    public function updateAdminBalance(Admin $admin)
    {
        return $admin->hasRole('Admin');
    }
}