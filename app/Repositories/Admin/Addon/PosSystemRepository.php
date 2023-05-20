<?php

namespace App\Repositories\Admin\Addon;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductStock;
use App\Models\User;
use App\Repositories\Interfaces\Admin\Addon\PosSystemInterface;
use App\Repositories\Interfaces\Admin\Addon\WalletInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use App\Traits\RandomStringTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PosSystemRepository implements PosSystemInterface
{
   
}
