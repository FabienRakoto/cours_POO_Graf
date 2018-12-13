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
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea name="' . $name .'" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
        }

        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit() :string
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}