<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Generate1 extends MY_Controller {

    public function __construct() {
    parent::__construct();
    }

    public function hello() {

    $this->load->helper(array('form', 'url'));
    $this->load->library('PHPWord');
            $PHPWord = new PHPWord();

            $document = $PHPWord->loadTemplate(FCPATH .  "docx/TemplateCloneRow.docx");

    //    $document->setImageValue('images.jpg', FCPATH . "static/img/mrMorio.png");
// Add image elements
    // $document->save_image('image4', FCPATH . "static/img/mrMorio.png", $document);
    //     $document->setImageValue('images.jpg', FCPATH . "static/img/mrMorio.png");
    //  $document->setValue("Value102", FCPATH . "static/img/mrMorio.png");
    //     $document->setValue('Value1', $section->addImage(FCPATH . "static/img/mrMorio.png"));
    //$document->cloneRow('Value2', 4);
    $document->cloneRow( 'rowValue', 10);

    $document->setValue( 'rowValue#1', htmlspecialchars('Sun'));
    $document->setValue( 'rowValue#2', htmlspecialchars('Mercury'));
    $document->setValue( 'rowValue#3', htmlspecialchars('Venus'));
    $document->setValue( 'rowValue#4', htmlspecialchars('Earth'));
    $document->setValue( 'rowValue#5', htmlspecialchars('Mars'));
    $document->setValue( 'rowValue#6', htmlspecialchars('Jupiter'));
    $document->setValue( 'rowValue#7', htmlspecialchars('Saturn'));
    $document->setValue( 'rowValue#8', htmlspecialchars('Uranus'));
    $document->setValue( 'rowValue#9', htmlspecialchars('Neptun'));
    $document->setValue( 'rowValue#10', htmlspecialchars('Pluto'));


    $document->setValue( 'rowNumber#1', htmlspecialchars('1'));
    $document->setValue( 'rowNumber#2', htmlspecialchars('2'));
    $document->setValue( 'rowNumber#3', htmlspecialchars('3'));
    $document->setValue( 'rowNumber#4', htmlspecialchars('4'));
    $document->setValue( 'rowNumber#5', htmlspecialchars('5'));
    $document->setValue( 'rowNumber#6', htmlspecialchars('6'));
    $document->setValue( 'rowNumber#7', htmlspecialchars('7'));
    $document->setValue( 'rowNumber#8', htmlspecialchars('8'));
    $document->setValue( 'rowNumber#9', htmlspecialchars('9'));
    $document->setValue( 'rowNumber#10', htmlspecialchars('10'));
// Table with a spanned cell
    $document->cloneRow( 'userId', 3);

    $document->setValue( 'userId#1', htmlspecialchars('1'));
    $document->setValue( 'userFirstName#1', htmlspecialchars('James'));
    $document->setValue( 'userName#1', htmlspecialchars('Taylor'));
    $document->setValue( 'userPhone#1', htmlspecialchars('+1 428 889 773'));

    $document->setValue( 'userId#2', htmlspecialchars('2'));
    $document->setValue( 'userFirstName#2', htmlspecialchars('Robert'));
    $document->setValue( 'userName#2', htmlspecialchars('Bell'));
    $document->setValue( 'userPhone#2', htmlspecialchars('+1 428 889 774'));

    $document->setValue( 'userId#3', htmlspecialchars('3'));
    $document->setValue( 'userFirstName#3', htmlspecialchars('Michael'));
    $document->setValue( 'userName#3', htmlspecialchars('Ray'));
    $document->setValue( 'userPhone#3', htmlspecialchars('+1 428 889 775'));
    $document->save(FCPATH .  "docx/WHATTHEFUCK.docx");
}

}
