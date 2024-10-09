<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

trait CrudTrait
{
    use JsonResponseTrait;
    public function storeT(Request $request, $model): RedirectResponse
    {
        $data = $request->validated();
        if ($model::create($data)) {
            return redirect()->back()->with('successMsg', class_basename($model) . ' created successfully');
        }
        return redirect()->back()->withErrors($model . ' creation failed');
    }


    public function updateT(Request $request, $model): RedirectResponse
    {
        if ($model->update($request->validated())) {
            return redirect()->back()->with('successMsg', class_basename($model) . ' updated successfully');
        }
        return redirect()->back()->withErrors(class_basename($model) . ' update failed');
    }

    public function destroyT(Model $model): JsonResponse
    {
        try {
            $model->delete();
        } catch (\Exception $e) {
            return $this->fail('Không thể xoá: ' . $e->getMessage(), 500);
        }
        return $this->success('Đã xoá thành công');
    }
}
