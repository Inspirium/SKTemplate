@extends('sktemplate::layout')

@section('content')

   <div class="page-name-xl mb-1">@lang('Expenses')</div>

    <!-- Circulation Number -->
    <div class="col-md-12 mb-3">
        <h6 class="text-center no-border display-e">@lang('Total')</h6>
        <h1 class="text-center display-2">52.354 kn</h1>
    </div>

    <div class="row">
        <div class="col-md-12">

    <!-- First column -->
    <div class="row">
        <div class="col-md-6">
            <div class="page-name-l mb-2">@lang('Book Block')</div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Text Price')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Accontation')</label>
            </div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Netto Price Percentage')</label>
            </div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Reviews')</label>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Lecture')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Correction')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Proofreading')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Translation')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Index')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Reviews')</label>
            </div>

        </div>



        <!-- Second column -->
        <div class="col-md-6">
            <div class="page-name-l mb-2">@lang('Cover')</div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Photos')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Illustrations')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Tehnical Drawings')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>

            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                <label for="form1" class="">@lang('Expert Report')</label>
            </div>

            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                <label for="form1" class="">@lang('Copyright')</label>
            </div>

            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                <label for="form1" class="">@lang('Copyright Mediator')</label>
            </div>

            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                <label for="form1" class="">@lang('Metodički Instrumentarij')</label>
            </div>

            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                <label for="form1" class="">@lang('Selection')</label>
            </div>

            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                <label for="form1" class="">@lang('PowerPoint Presentation')</label>
            </div>
        </div>
    </div>
</div>
</div>

    <!-- Documents upload -->
    <div class="page-name-l mb-1">@lang('Additional Expenses')</div>
    <button class="btn btn-neutral btn-addon" type="button">@lang('Add New Expense')</button>


    <!-- Autors Expenses -->


    <div class="page-name-xl mb-1 mt-2">@lang('Authors')</div>
    <div class="row">
        <div class="col-md-12">


            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">@lang('First and Last Name')---Ovdje povlači sve autore koje smo naveli na basic_data.php</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Currency')" required>
                        <label for="form1" class="">@lang('Expense')</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('In Precentage')" required>
                        <label for="form1" class="">@lang('Advance Payment')</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button">@lang('Add New Expense')</button>

            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">Vladimir Paar</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Currency')" required>
                        <label for="form1" class="">@lang('Expense')</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('In Precentage')" required>
                        <label for="form1" class="">@lang('Advance Payment')</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button">@lang('Add New Expense')</button>
        </div>
    </div>

    <!-- Add new item -->
    <div class="page-name-l mb-1">@lang('Other Expenses')</div>
    <button class="btn btn-neutral btn-addon" type="button">@lang('Add New Author Expense')</button>

    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Textarea -->
            <div class="md-form">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">@lang('Note')</label>
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
