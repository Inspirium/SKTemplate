<template>
<div>
    <div class="content">
        <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ lang('Layout and Design') }}</h1>
            </div>
        </div>
    <!-- Display fileds -->
        <div class="profile-head pb-2 row">
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Number of Pages') }}</h6>
                <h3 class="mb-1 text-white">{{ data.number_of_pages }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Photos') }}</h6>
                <h3 class="mb-1 text-white">{{ data.photos_amount }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Illustrations') }}</h6>
                <h3 class="mb-1 text-white">{{ data.illustrations_amount }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Tehnical Drawings') }}</h6>
                <h3 class="mb-1 text-white">{{ data.technical_drawings_amount }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Category') }}</h6>
                <h3 class="mb-1 text-white" v-if="data.group.parent">{{ data.group.parent.parent.name }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Group') }}</h6>
                <h3 class="mb-1 text-white">{{ data.group.name }}</h3>
            </div>
        </div>

        <!-- Circulation Number -->
        <div class="row">
            <div class="col-md-6 mt-2">
                <h6 class="text-center no-border display-e">{{ lang('Layout Expense') }}</h6>
                <h1 class="text-center display-2">{{ layout_total | flexCurrency(' kn', 2) }}</h1>
                <div class="col-md-6 mx-auto mt-4">
                    <!-- Dropdown menu -->
                    <div class="pos-rel">
                        <select class="mdb-select" v-model="data.layout_complexity">
                            <option disabled >{{ lang('Choose') }}</option>
                            <option value="1">{{ lang('1 - Very Easy') }}</option>
                            <option value="2">{{ lang('2 - Easy') }}</option>
                            <option value="3">{{ lang('3 - Medium') }}</option>
                            <option value="4">{{ lang('4 - Demanding') }}</option>
                            <option value="5">{{ lang('5 - Very Demanding') }}</option>
                        </select>
                        <label>{{ lang('Layout Complexity') }}</label>
                    </div>
                </div>
                <!-- Input fileds -->
                <div class="md-form">
                    <input type="number" id="layout-fix-price" class="form-control" name="layout-fix-price" v-model="data.layout_exact_price" >
                    <label for="layout-fix-price" >{{ lang('Exact Price') }}</label>
                </div>
                <!-- TeAxtarea -->
                <div class="md-form">
                    <textarea class="md-textarea" v-model="data.layout_note"></textarea>
                    <label>{{ lang('Note') }}</label>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <h6 class="text-center no-border display-e">{{ lang('Design Expense') }}</h6>
                <h1 class="text-center display-2">{{ design_total | flexCurrency(' kn', 2) }}</h1>
                <div class="col-md-6 mx-auto mt-4">
                    <!-- Dropdown menu -->
                    <div class="pos-rel">
                        <select class="mdb-select" name="department_id" v-model="data.design_complexity">
                            <option disabled >{{ lang('Choose') }}</option>
                            <option value="1">{{ lang('1 - Very Easy') }}</option>
                            <option value="2">{{ lang('2 - Easy') }}</option>
                            <option value="3">{{ lang('3 - Medium') }}</option>
                            <option value="4">{{ lang('4 - Demanding') }}</option>
                            <option value="5">{{ lang('5 - Very Demanding') }}</option>
                        </select>
                        <label>{{ lang('Design Complexity') }}</label>
                    </div>
                </div>
                <!-- Input fileds -->
                <div class="md-form">
                    <input type="number" id="design-fix-price" class="form-control" name="design-fix-price" v-model="data.design_exact_price">
                    <label for="design-fix-price" >{{ lang('Exact Price') }}</label>
                </div>
                <!-- Textarea -->
                <div class="md-form">
                    <textarea v-model="data.design_note"   class="md-textarea"></textarea>
                    <label>{{ lang('Note') }}</label>
                </div>
            </div>
        </div>

    <proposition-footer-buttons v-on:warningSaved="next"></proposition-footer-buttons>
    </div>
</div>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default {
        data: function () {
            return {
                next: false
            }
        },
        computed: {
            data() {
                return this.$deepModel('proposition.layout_expense');
            },
            ...mapGetters({
                layout_total: 'proposition/layout_expense/layout_total',
                design_total: 'proposition/layout_expense/design_total',
            })
        },
        beforeRouteLeave(to, from, next) {
            if (this.$store.state.edited) {
                this.next = next;
                $('#modal-warning-not-saved').modal('show');
            }
            else {
                next();
            }
        }
    }
</script>