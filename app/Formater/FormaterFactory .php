<?php
namespace App\Formater;

class FormaterFactory
{

    private static $instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (FormaterFactory::$instance == null) {
            FormaterFactory::$instance = new FormaterFactory();
        }
        return FormaterFactory::$instance;
    }

    private function mapFormater($array) {
        $array = (array) $array;
        $data = $array["data"];
        $type = $array['type'];
        switch ($type) {
            case "user":
                return new UserFormater($data);
            case "constant":
                return new ConstantFormater($data);
            case "key":
                return new KeyFormater($data);
            case "merchant":
                return new MerchantFormater($data);
            default:
                return null;
        }
    }

    public function format($dataArray){
        $collection = collect($dataArray);
        return $collection->map(function($f) {
            $formater = $this->mapFormater($f);
            if ($formater) {
                return $formater->format();
            }
            return [];
        });
    }

}
