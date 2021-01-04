<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this->add('cat_name', Field::TEXT,
            ['rules' =>
                ['required|min:3|unique:categories,cat_name,id'],
                'label' => 'Category Name'
            ]);
        $this->add('description', Field::TEXTAREA, ['rules' => ['required']]);
    }
}
