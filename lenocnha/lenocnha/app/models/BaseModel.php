<?php
namespace Module\Models;

class BaseModel
{

    public $items = array();
    public $first = 1;
    public $before = 1;
    public $current = 1;
    public $last = 0;
    public $next = 0;
    public $total_pages = 0;
    public $total_items = 0;
    public $limit = 30;
    
    public function setPages()
    {
        $this->last = $this->total_pages = ceil($this->total_items/$this->limit);
        if($this->current > 1)
        {
            $this->before = $this->current - 1;
        }
        if($this->last > $this->current)
        {
            $this->next = $this->current + 1;
        }
    }
    
}