<?php
namespace VarUtils;

class Vars
{
    /**
     * @param array $vars
     * @param string|string ...$varNames
     * @return array
     */
    public static function compact(array $vars, ...$varNames)
    {
        $ret = [];

        foreach ($varNames as $varName) {
            if (is_string($varName)) {
                $keys = array_keys($vars);
                if (in_array($varName, $keys)) {
                    $ret[$varName] = $vars[$varName];
                }
            } elseif (is_array($varName)) {
                $ret = array_merge($ret, self::compact($vars, ...$varName));
            }
        }

        return $ret;
    }
}
