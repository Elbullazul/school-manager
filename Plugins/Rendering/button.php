<?php

namespace Plugins\Rendering;

const NODE_OPEN = '<button $ID $CLASS $ATTR $TYPE>';
const NODE_CLOSE = '</button';

/* Classes */
const CLASS_MAIN = 'btn';
const CLASS_BLOCK = "btn-block";
const CLASS_PRIMARY = "btn-primary";
const CLASS_SECONDARY = "btn-secondary";
const CLASS_SUCCESS = "btn-success";
const CLASS_INFO = "btn-info";
const CLASS_WARNING = "btn-warning";
const CLASS_DANGER = "btn-danger";
const CLASS_LINK = "btn-link";
const CLASS_LIGHT = "btn-light";
const CLASS_DARK = "btn-dark";

/* Rendering */
const CLASS_OUTLINE = 'btn-outline-';

/* Sizes */
const CLASS_SIZE_LARGE = "btn-lg";
const CLASS_SIZE_MEDIUM = "btn-md";
const CLASS_SIZE_SMALL = "btn-sm";
const CLASS_SIZE_SMALLER = "btn-xs";

/* States */
const CLASS_STATE_ACTIVE = "active";
const CLASS_STATE_DISABLED = "disabled";

/* Types */
const TYPE_SUBMIT = '"type="submit"';
const TYPE_BUTTON = 'type="button"';
const TYPE_RESET = 'type="reset"';

/* Accessibility */
const ATTR_ARIA_PRESSED = 'aria-pressed="true"';
const ATTR_ARIA_DISABLED = 'aria-disabled="true"';

/* Attributes */
const ATTR_AUTOFOCUS = 'autofocus=""';
const ATTR_FORM = 'form="$FORM"';
const ATTR_NAME = 'name="$NAME"';
const ATTR_VALUE = 'text="$VALUE"';

class button implements control
{
    private $ID = "";
    private $HTML = "";
    private $CONTENT = [];
    private $CLASSES = [];
    private $ATTRIBUTES = [];

    function append(&$concat, $value)
    {
        $concat[] = $value;
    }

    function remove(&$concat, $value)
    {
        if (($key = array_search($value, $concat)) !== false) {
            unset($concat[$key]);
        }
    }

    function contains($concat, $value)
    {
        return (array_search($value, $concat) !== false);
    }

    function add_class($class)
    {
        $this->append($this->CLASSES, $class);
    }

    function remove_class($class) {
        if (!$this->contains($this->CLASSES, $class)) {
            $this->remove($this->CLASSES, $class);
        }
    }

    function add_attribute($attribute)
    {
        if (!$this->contains($this->ATTRIBUTES, $attribute)) {
            $this->append($this->ATTRIBUTES, $attribute);
        }
    }

    function remove_attribute($attribute)
    {
        $this->remove($this->ATTRIBUTES, $attribute);
    }

    function set_id($id)
    {
        $this->ID = $id;
    }

    function remove_id() {
        $this->ID = '';
    }

    function add_content($content)
    {
        $this->append($this->CONTENT, $content);
    }

    function clear_content() {
        $this->CONTENT = [];
    }

    function render()
    {
        // TODO: Generate code
        $this->HTML = '';

        return $this->HTML;
    }

    /* STATUS */
    function disable($yesno)
    {
        if ($yesno) {
            $this->add_class(CLASS_STATE_DISABLED);
        } else {
            $this->remove_class(CLASS_STATE_DISABLED);
        }
    }

    function active($yesno) {
        if ($yesno) {
            $this->add_class(CLASS_STATE_ACTIVE);
        } else {
            $this->remove_class(CLASS_STATE_ACTIVE);
        }
    }

    /* SIZES */
    function set_size($size)
    {
        switch ($size) {
            case CLASS_SIZE_LARGE:
            case CLASS_SIZE_MEDIUM:
            case CLASS_SIZE_SMALL:
            case CLASS_SIZE_SMALLER:
                $this->add_class($size);
            default:
                return NULL;
        }
    }

    /* ATTRIBTES */
    function focus($yesno)
    {
        if ($yesno) {
            $this->add_attribute(ATTR_AUTOFOCUS);
        } else {
            $this->remove_attribute(ATTR_AUTOFOCUS);
        }
    }
}