<?php
/**
 * @link        https://joomedia.com
 * @copyright   Copyright (c) 2021 JooMedia
 * @see         Developer - Khaleb Great (https://khaleb.dev)
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\View\Helper;

use Laminas\View\Helper\AbstractHelper;

// This view helper class displays a menu bar.
class Menu extends AbstractHelper 
{
  // Menu items array.
  protected $items = [];
    
  // Active item's ID.
  protected $activeItemId = '';
    
  // Constructor.
  public function __construct($items=[]) 
  {
    $this->items = $items;
  }
    
  // Sets menu items.
  protected function setItems($items) 
  {
    $this->items = $items;
  }
    
  // Sets ID of the active items.
  public function setActiveItemId($activeItemId) 
  {
    $this->activeItemId = $activeItemId;    
  }  
}
