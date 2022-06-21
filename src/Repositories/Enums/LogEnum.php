<?php

/*
 * This file is part of the Tomeet/laravel-enum.
 *
 * (c) Tomeet <tomeet@sohu.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tomeet\Enum\Laravel\Repositories\Enums;

use Tomeet\Enum\Laravel\Contracts\LocalizedEnumContract;
use Tomeet\Enum\Laravel\Enum;

class LogEnum extends Enum implements LocalizedEnumContract
{
    // 定义项目中的日志分类；以冒号区分层级
    const SYSTEM_SQL = 'system:sql';
    const SYSTEM_REQUEST = 'system:request';
}
