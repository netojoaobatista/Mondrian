<?php

/*
 * Mondrian
 */

namespace Trismegiste\Mondrian\Transform\Vertex;

/**
 * MethodVertex is a vertex for a method
 */
class MethodVertex extends StaticAnalysis
{

    public function getAttribute()
    {
        preg_match('#([^:]+)$#', $this->name, $capt);
        $default = array('shape' => 'triangle', 'style' => 'filled',
            'color' => 'yellow', 'label' => $capt[1]);

        if ($this->hasMeta('depend')) {
            $default['color'] = sprintf('/rdylgn11/%.0f', 1 + $this->getMeta('depend'));
        }

        return $default;
    }

}