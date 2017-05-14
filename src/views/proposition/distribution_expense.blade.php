@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-3">@lang('Distribution')</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Precentage')" required>
                        <label for="form1" class="">@lang('Distribution Margin')</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Textarea -->
                    <div class="md-form">
                        <textarea type="text" id="form76" class="md-textarea"></textarea>
                        <label for="form76">@lang('Note')</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->






@endsection
