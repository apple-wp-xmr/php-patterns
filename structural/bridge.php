<?php

interface Formatter {
    public function format($str): string;
}

class SimpleText implements Formatter {
    public function format($str): string 
    {
        return $str;
    }
}

class HTMLText implements Formatter {
    public function format($str): string 
    {
        return "<p> $str </p>";
    }
}

abstract class BrigeService {
    public Formatter $formatter;

    public function __construct($formatter){
        $this->formatter = $formatter;
    }

    abstract public function getFormatter($str);
}

class SimpleTextService extends BrigeService {
    public function getFormatter($str): string
    {
        return $this->formatter->format($str);
    }
}

class HtmlTextService extends BrigeService {
    public function getFormatter($str): string
    {
        return $this->formatter->format($str);
    }
}

$simpleText = new SimpleText();
$htmlText = new HTMLText();

$simpleTextService = new SimpleTextService($simpleText);
$htmlServiceText = new HtmlTextService($htmlText);

var_dump($simpleTextService->getFormatter('Hello'));