<?php

namespace App\Tests\Mocks;

class UserFunctionMock
{
    public static function initializeUserFunctionMock($userFunctionMockValues)
    {
        foreach ($userFunctionMockValues as $function => $userFunctionMockValue) {
            foreach ($userFunctionMockValue as $field => $value) {
                \WP_Mock::userFunction($function)->with($field)->andReturn($value);
            }
        }
    }
}
