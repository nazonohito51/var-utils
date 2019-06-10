<?php
namespace Tests\VarUtils;

use PHPUnit\Framework\TestCase;
use VarUtils\Vars;

class VarsTest extends TestCase
{
    public function provideCompact()
    {
        return [
            [[]],
            [['var1' => 1], 'var1'],
            [['var1' => 1, 'var2' => 2, 'var3' => 3], 'var1', 'var2', 'var3'],
            [[], 'unknown_key'],
            [['var1' => 1, 'var2' => 2], 'unknown_key', 'var1', 'var2'],
            [['var1' => 1, 'var2' => 2], ['var1', 'var2']],
            [['var1' => 1, 'var2' => 2], ['var1', 'var2', 'unknown_key']],
            [['var1' => 1, 'var2' => 2, 'var3' => 3], ['var1', 'var2'], 'var3'],
            [['var1' => 1, 'var2' => 2], ['var1', 'var2'], 'unknown_key'],
            [['var1' => 1, 'var2' => 2, 'var3' => 3], ['var1', 'var2', 'unknown_key'], 'var3'],
            [['value_is_null' => null], 'value_is_null'],
            [['var1' => 1, 'value_is_null' => null], 'var1', 'value_is_null'],
            [['var1' => 1, 'value_is_null' => null], ['var1', 'value_is_null']],
        ];
    }

    /**
     * @param array $expected
     * @param mixed ...$varNames
     * @dataProvider provideCompact
     */
    public function testCompact(array $expected, ...$varNames)
    {
        $this->assertSame($expected, Vars::compact(['var1' => 1, 'var2' => 2, 'var3' => 3, 'value_is_null' => null], ...$varNames));
    }
}
