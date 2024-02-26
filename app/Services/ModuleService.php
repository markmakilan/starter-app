<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Module;

class ModuleService
{
    public function store($data)
    {
        try {
            $result = DB::transaction(function () use ($data) {
                return ['module' => Module::create($data)];
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
