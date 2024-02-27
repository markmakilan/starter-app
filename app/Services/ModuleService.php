<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\Module;

class ModuleService
{
    public function store($module, $permissions = [])
    {
        try {
            $result = DB::transaction(function () use ($module, $permissions) {
                $module = array_merge($module, [
                    'name' => str_replace(' ', '_', strtolower($module['display_name']))
                ]);

                $module = Module::create($module);

                foreach ($permissions as $permission) {

                    foreach ($permission['items'] as $item) {
                        Permission::create([
                            'module_id' => $module->id,
                            'name' => str_replace(' ', '_', strtolower($item['name'])) . '_' . $module->name,
                            'display_name' => ucwords($item['name']),
                            'category' => $permission['category']
                        ]);
                    }
                }

                return ['module' => $module];
            });

            return ['status' => 200, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public function update($data)
    {
        try {
            $result = DB::transaction(function () use ($data) {
                $module = Module::find($data['id']);
                
                return ['module' => $module ? $module->update($data) : false];
            });

            return ['status' => 200, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public function delete($id)
    {
        try {
            $result = DB::transaction(function () use ($id) {
                $module = Module::find($id);

                return ['module' => $module ? $module->delete() : false];
            });

            return ['status' => 200, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }
}
