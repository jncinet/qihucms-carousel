<?php

namespace Qihucms\Carousel\Controllers\Admin;

use App\Admin\Controllers\Controller;
use Qihucms\Carousel\Models\CarouselCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '站内图片广告位管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CarouselCategory);

        $grid->model()->latest();

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->like('name', __('carousel::category.name'));

        });

        $grid->column('id', __('carousel::category.id'));
        $grid->column('uri', __('carousel::category.uri'));
        $grid->column('name', __('carousel::category.name'));

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
        $show = new Show(CarouselCategory::findOrFail($id));

        $show->field('id', __('carousel::category.id'));
        $show->field('uri', __('carousel::category.uri'));
        $show->field('name', __('carousel::category.name'));
        $show->field('remark', __('carousel::category.remark'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CarouselCategory);

        $form->text('uri', __('carousel::category.uri'));
        $form->text('name', __('carousel::category.name'));
        $form->textarea('remark', __('carousel::category.remark'));

        return $form;
    }
}
