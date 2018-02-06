<?php

namespace Betha\Compras\App\Controllers;

abstract class IController
{
    /**
     * @param string $param
     * @return mixed
     */
    public function get($param)
    {
        return filter_input(INPUT_GET, $param);
    }

    /**
     * @param string|null $param
     * @return mixed
     */
    public function getFormData($param = null)
    {
        $formData = json_decode(file_get_contents('php://input'), true);
        return is_null($param) ? $formData : (isset($formData[$param]) ? $formData[$param] : null);
    }

    /**
     * @param array $array
     * @return string
     */
    public function json(array $array)
    {
        return json_encode($array);
    }

}