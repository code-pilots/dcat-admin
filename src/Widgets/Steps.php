<?php
declare(strict_types=1);

namespace Dcat\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;

class Steps implements Renderable
{
    protected $view = 'admin::widgets.steps';

    protected array $items = [];
    protected int $activeIdx;

    public function add(string $title, string $description, bool $active = false, string $icon = null, string $id = null)
    {

        $id = $id ?: mt_rand();

        $this->items[] = [
            'title' => $title,
            'description' => $description,
            'icon' => $icon,
            'id' => $id,
            'index' => count($this->items) + 1
        ];

        if(!$active) {
            $this->activeIdx = count($this->items) - 1;
        }

        return $this;
    }

    public function render()
    {
        $data['items'] = $this->items;
        $data['active_idx'] = $this->activeIdx;

        return view($this->view, $data)->render();
    }
}