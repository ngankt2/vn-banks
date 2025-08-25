<?php
namespace Ngankt2\VNLocation\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class VnLocation
 *
 * @property int $id
 * @property string $name
 * @property string|null $full_name
 * @property string|null $full_path
 * @property string $code
 * @property string|null $type
 * @property string|null $parent_code
 * @property VNLocation|null $parent
 * @property \Illuminate\Database\Eloquent\Collection|VNLocation[] $children
 */
class VNBank extends Model
{

    protected $table = 'vn_banks';
}
