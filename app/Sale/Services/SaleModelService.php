<?php

namespace App\Sale\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class SaleModelService
{
    public function createSaleModel($type)
    {
        $modelClassName = ucfirst(strtolower($type));
        $modelFilePath = app_path("Models/{$modelClassName}.php");

        // Create the model file
        File::put($modelFilePath, $this->generateModelContent($modelClassName));

        // Return the model class name
        return "App\\Models\\{$modelClassName}";
    }

    protected function generateModelContent($modelClassName)
    {
        return "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {$modelClassName} extends Model
{
    protected \$fillable = ['sale_id', 'start_date', 'end_date', 'banner', 'position'];

    public function sale()
    {
        return \$this->belongsTo(Sale::class);
    }
}
";
    }
}
