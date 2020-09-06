<?php

class RestaurantData {
    
    private $menuList;

    function __construct(array $menuList) {
        if (sizeof($menuList)>0) {
            $this->menuList = $menuList;
        } else {
            throw new Exception("No Food Item record available");
        }
    }

    public function getFoodName() {
    $foodNameList = [];

        foreach($this->menuList as $selItem) {
            $foodNameList[] = array(
                "id"=>$selItem['id'],
                "short_name"=>$selItem['short_name'],
                "name"=>$selItem['name'],
                "description"=>$selItem['description'],
                "price_small"=>$selItem['price_small'],
                "price_large"=>$selItem['price_large'],
                "small_portion_name"=>$selItem['small_portion_name'],
                "large_portion_name"=>$selItem['large_portion_name']
            );
        }

        return json_encode($foodNameList);
    }

    public function getFoodById($id) {
        $response = ["In-Valid ID"];
        if($id) {
            foreach($this->menuList as $selItem) {
                if ($id == $selItem['id']) {
                    $response = $selItem;
                    break;
                }
            }
        }
        return json_encode($response);
    }

    /*public function getTopperStudent() {
        $selItem = null;
        // Write your logic;
        $selItem['grade'] = getGrade($per);
    }

    private function getGrade($per) {
        return "A";
    }
*/
}
?>