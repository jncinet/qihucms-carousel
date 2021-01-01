<?php

namespace Qihucms\Carousel\Controllers\Admin;

use App\Admin\Controllers\Controller;
use Qihucms\Carousel\Models\Carousel;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Qihucms\Carousel\Models\CarouselCategory;

class CarouselController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '站内图片广告管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel);

        $grid->model()->latest();

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->equal('carousel_category_id', __('carousel::carousel.carousel_category_id'))
                ->select(CarouselCategory::all()->pluck('name', 'id'));
            $filter->like('title', __('carousel::carousel.title'));
            $filter->between('start_time', __('carousel::carousel.start_time'))->date();
            $filter->between('end_time', __('carousel::carousel.end_time'))->date();

        });

        $grid->column('id', __('carousel::carousel.id'));
        $grid->column('category.name', __('carousel::carousel.carousel_category_id'));
        $grid->column('title', __('carousel::carousel.title'));
        $grid->column('img_src', __('carousel::carousel.img_src'))->image();
        $grid->column('status', __('carousel::carousel.status.label'))
            ->using(__('carousel::carousel.status.value'));
        $grid->column('start_time', __('carousel::carousel.start_time'));
        $grid->column('end_time', __('carousel::carousel.end_time'));
        $grid->column('created_at', __('admin.created_at'));

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
        $show = new Show(Carousel::findOrFail($id));

        $show->field('id', __('carousel::carousel.id'));
        $show->field('carousel_category_id', __('carousel::carousel.carousel_category_id'))
            ->as(function () {
                return $this->category->name ?? '';
            });
        $show->field('title', __('carousel::carousel.title'));
        $show->field('url', __('carousel::carousel.url'))->link();
        $show->field('img_src', __('carousel::carousel.img_src'))->image();
        $show->field('alt', __('carousel::carousel.alt'));
        $show->field('remark', __('carousel::carousel.remark'));
        $show->field('status', __('carousel::carousel.status.label'))
            ->using(__('carousel::carousel.status.value'));
        $show->field('start_time', __('carousel::carousel.start_time'));
        $show->field('end_time', __('carousel::carousel.end_time'));
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
        $form = new Form(new Carousel);

        $form->select('carousel_category_id', __('carousel::carousel.carousel_category_id'))
            ->options(CarouselCategory::all()->pluck('name', 'id'));
        $form->text('title', __('carousel::carousel.title'));
        $form->text('url', __('carousel::carousel.url'));
        $form->image('img_src', __('carousel::carousel.img_src'))
            ->removable()
            ->uniqueName()
            ->move('carousel');
        $form->text('alt', __('carousel::carousel.alt'));
        $form->textarea('remark', __('carousel::carousel.remark'));
        $form->select('status', __('carousel::carousel.status.label'))
            ->default(1)
            ->options(__('carousel::carousel.status.value'));
        $form->datetime('start_time', __('carousel::carousel.start_time'))
            ->default(date('Y-m-d H:i:s'));
        $form->datetime('end_time', __('carousel::carousel.end_time'))
            ->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
