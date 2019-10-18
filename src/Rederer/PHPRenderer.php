<?php

namespace JbSilva\Rederer;

class PHPRenderer implements PHPRedererInterface
{
    private $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        if (is_string($this->data)) {
            header('Content-type:txt/html; charset="UTF-8"');
            echo  $this->data;
            exit();
        }

        if (is_array($this->data)) {
            header('Content_type: application/josn; charset="UTF-8"');
            echo  json_encode($this->data);
            exit();
        }
    }
}