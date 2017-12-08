@extends('sktemplate::layout')

@section('content')

    <div class="content">
        <div class="page-name-xl mb-5 mt-2">@lang('Add New Author')</div>
                <!--Body-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_name" class="form-control" >
                                        <label for="form_author_name" class="">First Name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_lastname" class="form-control" >
                                        <label for="form_author_lastname" class="">Last Name') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_title" class="form-control" >
                                        <label for="form_author_title" class="">Formal title') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_occupation" class="form-control" >
                                        <label for="form_author_occupation" class="">Occupation') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="md-form">
                                <input type="text" id="form_author_work" class="form-control" >
                                <label for="form_author_work" class="">Working in') }}</label>
                            </div>
                            <button class="btn btn-neutral btn-addon mb-5" type="button">Add Additional Information') }}</button>
                        </div>
                    </div>


                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-save" >Save') }}</button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">Cancel') }}</button>
                </div>
            </div>
@endsection



<!--
<script>
    export default {
        data: function () {
            return {
                first_name : '',
                last_name : '',
                occupation : '',
                title : '',
                work : ''
            }
        },
        computed: {},
        methods: {
            saveAuthor() {
                axios.post('/api/author', {
                    first_name : this.first_name,
                    last_name : this.last_name,
                    title : this.title,
                    occupation: this.occupation,
                    work: this.work
                })
                    .then((res) => {
                        //emit event upstream
                        this.$emit('authorAdded', res.data);
                        //clear data
                        this.first_name = '';
                        this.last_name = '';
                        this.occupation = '';
                        this.title = '';
                        this.work = '';
                        //close modal
                        jQuery('#centralModalAuthors').modal('hide');
                    })
                    .catch((err) => {
                    //TODO
                    })
            }
        }
    }
</script>

-->









