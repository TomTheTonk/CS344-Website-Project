<?php
class company {
    
    //variables
    public $name;
    public $city;
    public $state;
    public $rating;
    public $review_count;
    public $pitch;
    public $services;
    public $cost_plan;

    //methods
    function set_name($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }

    function set_city($city) {
        $this->city = $city;
    }

    function get_city() {
        return $this->city;
    }

    function set_state($state) {
        $this->state = $state;
    }

    function get_state() {
        return $this->state;
    }

    function set_rating($rating) {
        $this->rating = $rating;
    }

    function get_rating() {
        return $this->rating;
    }

    function set_review_count($review_count) {
        $this->review_count = $review_count;
    }

    function get_review_count() {
        return $this->review_count;
    }

    function set_pitch($pitch) {
        $this->pitch = $pitch;
    }

    function get_pitch() {
        return $this->pitch;
    }

    function set_services($services) {
        $this->services = $services;
    }

    function get_services() {
        return $this->services;
    }

    function set_cost_plan($cost_plan) {
        $this->cost_plan = $cost_plan;
    }

    function get_cost_plan() {
        return $this->cost_plan;
    }

}


?>