<?php
/**
 * POO_Graf - BootstrapForm.php
 * User: Trinh
 */
namespace Core\HTML;

class BootstrapForm extends Form
{
    /**
     * @param $html
     * @return string
     */
    protected function surround($html) :string
    {
        return "<div class='form-group'>$html</div>";
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []) : string
    {
        $type = $options['type'] ?? 'text'; // isset($options['type']) ? $options['type'] : 'text'
        return $this->surround(
        '<label>' . $label . '</label><input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) .'" class="form-control">'
        );
    }

    /**
     * @return string
     */
    public function submit() :string
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}