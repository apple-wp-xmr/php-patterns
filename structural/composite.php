<?php

interface Renderable {

    public function render(): string;
}

class Mail implements Renderable {

    private array $parts = [];

    public function render(): string
    {
        $result = '';
        foreach($this->parts as $part){
            $result .= $part->render();
        }
        return $result;
    }

    public function addPart(Renderable $part){
        $this->parts[] = $part;
    }
}

abstract class Part 
{
    private string $text;

    public function getText(){
        return $this->text . PHP_EOL;
    }

    public function __construct(string $text)
    {
        $this->text = $text;
    }
}


class Header extends Part implements Renderable {
    public function render(): string
    {
        return $this->getText();
    }
}
class Body extends Part implements Renderable {
    public function render(): string
    {
        return $this->getText();
    }
}
class Footer extends Part implements Renderable {
    public function render(): string
    {
        return $this->getText();
    }
}

$mail = new Mail();
$mail->addPart(new Header('Header'));
$mail->addPart(new Body('Body'));
$mail->addPart(new Footer('Footer'));

$postfooter = new Mail();
$postfooter->addPart(new Header('inside header'));
$postfooter->addPart(new Header('inside header'));

$mail->addPart($postfooter);



print_r($mail->render());
