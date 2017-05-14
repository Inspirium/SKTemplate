@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-3">@lang('Basic Information')</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="neko ime" required>
                        <label for="form1" class="">@lang('Author')</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button">@lang('Add')</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="Contact Person"> Jane Doe<i class="close fa fa-times"></i>
            </div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="neko ime" required>
                <label for="form1" class="">@lang('Title')</label>
            </div>

            <div class="row">
                <!-- Dropdown menu -->
                <div class="col-md-6">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Category')</option>
                    </select>
                    <label>@lang('Category')</label>
                </div>

                <!-- Dropdown menu -->
                <div class="col-md-6">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Publishing Type')</option>
                    </select>
                    <label>@lang('Publishing Type')</label>
                </div>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m">@lang('Manuscript')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="Ordered" required>
                    <label for="radio11">@lang('Ordered')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="Delivered" required>
                    <label for="radio21">@lang('Delivered')</label>
                </fieldset>
            </div>

            <!-- File/document table -->
            <div class="files">
                <div class="file-box file-box-l d-flex align-items-center">
                    <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                    <div class="file-box-sty ml-auto">19.07.2017.</div>
                    <div class="file-box-sty icon icon-download">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel">Obriši</div>
                </div>
                <div class="file-box file-box-l d-flex align-items-center">
                    <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                    <div class="file-box-sty ml-auto">19.07.2017.</div>
                    <div class="file-box-sty icon icon-download">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel">Obriši</div>
                </div>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m mt-2">@lang('Dotation')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="yes" required>
                    <label for="radio11">@lang('Yes')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('No')</label>
                </fieldset>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">@lang('Concept')</label>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">@lang('Note')</label>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m mt-2">@lang('Possible Products')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="yes" required>
                    <label for="radio11">@lang('E-book')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('Website')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('App')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('Additional Language')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('Short Edition')</label>
                </fieldset>
            </div>


        </div>
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
