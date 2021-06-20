<?php
/**
 * @link        https://joomedia.com
 * @copyright   Copyright (c) 2021 JooMedia
 * @see         Developer - Khaleb Great (https://khaleb.dev)
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\View\Helper;

// This view helper class displays a menu bar.
class BackOfficeMenu extends Menu {

    // Menu items array.
    protected $items = [];
    protected $template = null;
    // Active item's ID.
    protected $activeItemId = '';

    // Constructor.
    public function __construct($items = []) 
    {
        $this->items = $items;
    }

    public function setActiveItemId($id)
    {
        $this->activeItemId = $id;
    }

    // Renders the menu.
    public function render($template) {
        $this->template = $template;

        $this->prepareItems();

        if (count($this->items) == 0)
            return ''; // Do nothing if there are no items.

        $result = '';

        // Render items
        //dashboard
        $id = 'dashboard';
        $isActive = ($id==$this->activeItemId);
        $result .= '<li class="menu-item '.($isActive?'menu-item-active':'').'">';
            $result .= '<a class="menu-link" href="' . $this->template->url('app/dashboard') . '">';
                $result .= '<i class="menu-icon flaticon-grid-menu-v2"></i>';
                $result .= '<span class="menu-text">Dashboard</span>';
            $result .= '</a>';
        $result .= '</li>';
        $result .= '<li class="menu-section">
                                    <h4 class="menu-text">Blog Manager</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>';
        foreach ($this->items as $item) {
            $result .= $this->renderItem($item);
        }

        //$result .= '';

        return $result;
    }

    // Renders an item.
    public function renderItem($item) {
        $label = isset($item['label']) ? $item['label'] : '';
        $id = isset($item['id']) ? $item['id'] : 'dashboard';
        $isActive = ($id==$this->activeItemId);

        $result = '';

        $link = isset($item['link']) ? $item['link'] : '#';
        $iconClass = isset($item['icon-class']) ? $item['icon-class'] : '';

        $result .= '<li class="menu-item '.($isActive?'menu-item-active':'').'">';
            $result .= '<a class="menu-link" href="' . $link . '">';
                $result .= '<i class="menu-icon ' . $iconClass . '"></i>';
                $result .= '<span class="menu-text">' . $label . '</span>';
            $result .= '</a>';
        $result .= '</li>';

        return $result;
    }

    public function prepareItems() {
        $this->items = $this->application();
    }

    private function application() {
        return [
            // [
            //     'id' => 'dashboard',
            //     'label' => 'Dashboard',
            //     'link' => $this->template->url('app/dashboard'),
            //     'icon-class' => 'flaticon-grid-menu-v2',
            // ],
            [
                'id' => 'editor',
                'label' => 'Create New Post',
                'link' => $this->template->url('app/create-post'),
                'icon-class' => 'flaticon2-writing',
            ],
            [
                'id' => 'posts',
                'label' => 'Manage Posts',
                'link' => $this->template->url('app/manage-posts'),
                'icon-class' => 'flaticon2-checking',
            ],
            [
                'id' => 'groups',
                'label' => 'Groups',
                'link' => $this->template->url('app/manage-groups'),
                'icon-class' => 'flaticon-folder-1',
            ],
            [
                'id' => 'tags',
                'label' => 'Tags',
                'link' => $this->template->url('app/manage-tags'),
                'icon-class' => 'flaticon2-tag',
            ]
        ];
    }
}
