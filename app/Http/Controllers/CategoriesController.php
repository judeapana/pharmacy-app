<?php

namespace App\Http\Controllers;

use App\Category;
use App\Forms\CategoryForm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;


class CategoriesController extends Controller
{
    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @param FormBuilder $formBuilder
     * @return Application|Factory|View
     */
    public function index(FormBuilder $formBuilder)
    {
        $cats = Category::query()->orderBy('created_at', 'desc')->paginate();
        return view('category.index', compact('cats'))->with(['title' => 'Category']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return Application|Factory|View
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CategoryForm::class, ['method' => 'POST']);
        return view('category.create')->with(['form' => $form, 'title' => 'Create Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $form = $this->form(CategoryForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            Category::query()->create($form->getFieldValues());
            return redirect()->route('category.index')->with(['success' => 'Category has been successfully created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param FormBuilder $formBuilder
     * @return Application|Factory|View
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $cat = Category::query()->where(['id' => $id])->firstOrFail();
        $form = $formBuilder->create(CategoryForm::class, ['url' => route('category.update', $id), 'method' => 'PUT', 'model' => $cat]);
        return view('category.edit')->with(['title' => 'Edit Category', 'form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $form = $this->form(CategoryForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            $cat = Category::query()->where(['id' => $id])->firstOrFail();
            $cat->update($form->getFieldValues());
            if ($cat->save()) {
                return redirect()->route('category.index')->with(['success' => 'Category has been successfully updated']);
            } else {
                return redirect()->route('category.index')->with(['success' => 'Unable to save category']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
