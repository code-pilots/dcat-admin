<?php

namespace Dcat\Admin\Grid\Displayers;

class Arrow extends AbstractDisplayer
{
    public function display(bool $colored_text = false, string $prepend = '', string $append = ''): string
    {
        $class = "green-arrow";
        if( $colored_text ) {
            $class = "green green-arrow";
        }

        if( $this->value < 0 ) {
            $class = "red-arrow";
            if( $colored_text ) {
                $class = "red red-arrow";
            }
        }

        return '<span class="cp-table-cell '.$class.'"><span class="cp-table-cell__text">'.
            $prepend.$this->value.$append.
        '</span></span>';
    }
}
