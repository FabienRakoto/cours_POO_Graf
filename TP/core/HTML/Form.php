<?php
/**
 * POO_Graf - Form.php
 * User: Trinh
 */
namespace Core\HTML;

class Form
{
    /**
     * @var array
     */
    private $data;
    /**
     * @var string
     */
    public $surround = 'p';

    /**
     * Form constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param $html
     * @return string
     */
    protected function surround($html) :string
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    /**
     * @param $index
     * @return mixed|null
     */
    protected function getValue($index)
    {
        if(is_object($this->data)){ // vérifier si la variable $this->data, non le tableau
            return $this->data->$index;
        }
        return $this->data[$index] ?? null; // isset($this->data[$index]) ? $this->data[$index] : null;
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
        '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) .'">'
        );
    }

    /**
     * @return string
     */
    public function submit() :string
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}