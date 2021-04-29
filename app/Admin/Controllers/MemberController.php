<?php

namespace App\Admin\Controllers;

use App\Member;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Config;

class MemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Member';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Member());

        $grid->column('id', __('FB ID'));
        $grid->column('name', __('FB 名稱'));
        $grid->column('picture', __('FB 大頭照'))->image('picture',100,100);
        $grid->column('email', __('FB Email'));
        $grid->column('hasForm.name', __('名稱(表單)'));
        $grid->column('hasForm.phone', __('電話(表單)'));
        $grid->column('hasForm.address', __('地址(表單)'));
        $grid->column('hasForm.email', __('Email(表單)'));
        $grid->column('day', __('完成日記天數'));
        $grid->column('is_continuous', __('Is continuous'))->using(Config::get('parameter.YES_NO'));
        $grid->column('is_qualified', __('Is qualified'))->using(Config::get('parameter.YES_NO'));
        $grid->column('form_at', __('完成表單日期'));
        $grid->column('record_at', __('最近完成遊戲日期'));
        $grid->column('created_at', __('建立日期'));
        $grid->actions(function($actions){
          $actions->disableView();
          $actions->disableEdit();
          $actions->disableDelete();

        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Member::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('picture', __('Picture'));
        $show->field('email', __('Email'));
        $show->field('is_public', __('Is public'));
        $show->field('day', __('Day'));
        $show->field('is_continuous', __('Is continuous'));
        $show->field('is_qualified', __('Is qualified'));
        $show->field('form_at', __('Form at'));
        $show->field('record_at', __('Record at'));
        $show->field('login_at', __('Login at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Member());

        $form->text('name', __('Name'));
        $form->image('picture', __('Picture'));
        $form->email('email', __('Email'));
        $form->number('is_public', __('Is public'))->default(1);
        $form->number('day', __('Day'));
        $form->number('is_continuous', __('Is continuous'))->default(1);
        $form->number('is_qualified', __('Is qualified'));
        $form->datetime('form_at', __('Form at'))->default(date('Y-m-d H:i:s'));
        $form->date('record_at', __('Record at'))->default(date('Y-m-d'));
        $form->datetime('login_at', __('Login at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
