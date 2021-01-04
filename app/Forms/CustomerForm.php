<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {
        $this->add('full_name', Field::TEXT, ['rules' => ['required|min:3']]);
        $this->add('phone_number', Field::TEL, ['rules' => ['min:10']]);
        $this->add('email_address', Field::EMAIL, ['rules' => ['required']]);
    }
}
