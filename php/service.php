<?php
class service {

    //variables
    public $main;
    public $sub;

    //methods
    function set_main($main) {
        $this->main = $main;
    }

    function get_main() {
        return $this->main;
    }

    function set_sub($sub) {
        $this->sub = $sub;
    }

    function get_sub() {
        return $this->sub;
    }
}
?>