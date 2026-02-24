<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Module;
use App\Models\Permission;
use App\Models\RoleUser;
use App\Models\PermissionType;
use App\Models\UserPermission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $modules = Module::all();
        // Assuming role_id = 1 is the Admin/SuperAdmin role that should get all permissions
        $admins = RoleUser::where('role_id', '1')->get();
        $allTypePermission = PermissionType::ofType('all')->first();

        foreach ($modules as $module) {
            $permissionName = 'export_' . str_replace('-', '_', strtolower($module->module_name));
            $displayName = 'Export ' . ucwords(str_replace('-', ' ', $module->module_name));

            $perm = Permission::firstOrCreate([
                'name' => $permissionName,
                'module_id' => $module->id,
            ], [
                'display_name' => $displayName,
                'is_custom' => 1,
                'allowed_permissions' => Permission::ALL_NONE
            ]);

            if ($allTypePermission && $admins->count() > 0) {
                foreach ($admins as $item) {
                    UserPermission::firstOrCreate(
                        [
                            'user_id' => $item->user_id,
                            'permission_id' => $perm->id,
                            'permission_type_id' => $allTypePermission->id
                        ]
                    );
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $modules = Module::all();
        foreach ($modules as $module) {
            $permissionName = 'export_' . str_replace('-', '_', strtolower($module->module_name));
            $perm = Permission::where('name', $permissionName)->where('module_id', $module->id)->first();

            if ($perm) {
                UserPermission::where('permission_id', $perm->id)->delete();
                $perm->delete();
            }
        }
    }
};
