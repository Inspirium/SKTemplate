@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-1">@lang('Categorization')</div>
    <div class="page-name-l mb-2">@lang('Basic Categorization')</div>
    <div class="row">
        <div class="col-md-12">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('Supergroup')</label>
            <div class="row">
                <!-- Dropdown menu -->
                <div class="col-md-6">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Category')</option>
                    </select>
                    <label>@lang('Upgroup')</label>
                </div>

                <!-- Dropdown menu -->
                <div class="col-md-6">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Category')</option>
                    </select>
                    <label>@lang('Group')</label>
                </div>
            </div>

        </div>
    </div>

    <div class="page-name-l mt-1 mb-2">@lang('Book Type')</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('Main Group')</label>
        </div>

        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('Group')</label>
        </div>
    </div>

    <div class="page-name-l mt-1 mb-2">@lang('Škola')</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('School Type')</label>
        <!-- Checkbox -->
        </div>
        <div class="col-md-6 mb-1">
            <div class="page-name-m">@lang('Lektira')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio01" value="Ordered" required>
                    <label for="radio01">@lang('Da')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio02" value="Ordered" required>
                    <label for="radio02">@lang('Ne')</label>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Checkbox -->
    <div class="page-name-m">@lang('Razred OŠ')</div>
    <div class="form-inline">
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox11" value="Ordered" required>
            <label for="checkbox11">@lang('1.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox21" value="Delivered" required>
            <label for="checkbox21">@lang('2.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox31" value="Delivered" required>
            <label for="checkbox31">@lang('3.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox41" value="Delivered" required>
            <label for="checkbox41">@lang('4.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox51" value="Delivered" required>
            <label for="checkbox51">@lang('5.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox61" value="Delivered" required>
            <label for="checkbox61">@lang('6.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox71" value="Delivered" required>
            <label for="checkbox71">@lang('7.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox81" value="Delivered" required>
            <label for="checkbox81">@lang('8.')</label>
        </fieldset>
    </div>
    <!-- Checkbox -->
    <div class="page-name-m mt-1">@lang('Razred SŠ')</div>
    <div class="form-inline">
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox11a" value="Ordered" required>
            <label for="checkbox11a">@lang('1.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox21a" value="Delivered" required>
            <label for="checkbox21a">@lang('2.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox31a" value="Delivered" required>
            <label for="checkbox31a">@lang('3.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox41a" value="Delivered" required>
            <label for="checkbox41a">@lang('4.')</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox51a" value="Delivered" required>
            <label for="checkbox51a">@lang('5.')</label>
        </fieldset>
    </div>



    <div class="page-name-l mt-2 mb-2">@lang('Predmeti')</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('Field')</label>
        </div>

        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('Field Detailed')</label>
        </div>
    </div>

    <div class="page-name-l mt-1 mb-2">@lang('Bibliography')</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" name="department_id" required>
                <option disabled >@lang('Choose Category')</option>
            </select>
            <label>@lang('Bibliography')</label>
        </div>
    </div>



    <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea type="text" id="form76" class="md-textarea"></textarea>
        <label for="form76">@lang('Note')</label>
    </div>

    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Delete')</button>
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Nesto')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->






@endsection
