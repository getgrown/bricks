<?php

namespace Bricks;

use Bricks\Element\Button;
use Bricks\Element\Element;
use Bricks\Element\HTML;

class View
{
    /** @var Form */
    protected $form;

    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function render()
    {
        echo '<form' . $this->form->renderAttributes() . '>';

        $elements = $this->form->getElements();
        $elementsCount = sizeof($elements);

        for($i = 0; $i < $elementsCount; ++$i) {
            /** @var Element $element */
            $element = $elements[$i];

            if($element instanceof Button) {
                $element->render();
            } else {
                $element->renderLabel();
                $element->render();
            }
        }

        echo '</form>';
    }
}