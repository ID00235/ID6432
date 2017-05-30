<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Form::component('bsText', 'components.form.text', ['name', 'value'=>null, 'attributes'=>[]]);
        Form::component('bsSubmit', 'components.form.submit', ['label', 'back'=>null]);
        Form::component('bsText3', 'components.form.text-col-3', ['name', 'value'=>null, 'attributes'=>[]]);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'value'=>null, 'attributes'=>['rows'=>4]]);
        Form::component('bsCheckbox', 'components.form.checkbox', ['list'=>array(),'select'=>array(),'name','attributes'=>[]]);
        Form::component('bsRadioInline', 'components.form.radio-inline', ['list'=>array(),'select'=>"",'name','attributes'=>[]]);
        Form::component('bsSelect', 'components.form.select', ['list'=>array(),'select'=>"",'name','required'=>false]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
