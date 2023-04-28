<?php
$CI = null;
function register_CI(&$_ci)
{
    global $CI;
    $CI = $_ci;
    return $CI;
}

function generateEmployeeNumber($prefix = null)
{
    $prefix = empty($prefix) ? PREFIX_EMPLOYEE_NUMBER : $prefix;
    $last = getLastEntry($prefix, 'number', 'employees');
    $newNumber = $prefix . str_pad($last, 5, '0', STR_PAD_LEFT);
    return $newNumber;
}

function getLastEntry($prefix, $column, $table)
{
    global $CI;
    $builder = $CI->db->table($table);
    $builder->select([$column]);
    $builder->like($column, $prefix, 'after');
    $builder->orderBy($column, 'DESC');
    $last = $builder->get()->getRow();
    $akhir = 1;
    if (!empty($last->$column)) {
        $cast = str_replace($prefix, '', $last->$column);
        $akhir = intval($cast) + 1;
    }
    return $akhir;
}

function setDefaultValue($value = null, $alias = '-')
{
    return !empty($value) ? $value : $alias;
}
function getBaseUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' . $_SERVER['HTTP_HOST'] : 'http://' . $_SERVER['HTTP_HOST'];
    return $protocol;
}
