<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Basic Info') }}</div>
        <div class="row">
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('First and Last Name') }}</div>
                <div class="md-form">
                    <input type="text" id="form1" class="form-control" name="first_name" v-model="employee.first_name" required>
                    <label for="form1" class="">{{ lang('First Name') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form2" class="form-control" name="last_name" v-model="employee.last_name" required>
                    <label for="form2" class="">{{ lang('Last Name') }}</label>
                </div>
                <div class="page-name-m">Spol</div>
                <div class="form-inline mb-5">
                    <fieldset class="form-group">
                        <input name="sex" type="radio" id="radio11" value="M" v-model="employee.sex" required>
                        <label for="radio11">{{ lang('M') }}</label>
                    </fieldset>
                    <fieldset class="form-group">
                        <input name="sex" type="radio" id="radio21" value="F"  v-model="employee.sex" required>
                        <label for="radio21">{{ lang('F') }}</label>
                    </fieldset>
                </div>

                <div class="pos-rel">
                    <select class="mdb-select" v-model="employee.department_id">
                        <option disabled>{{ lang('Choose Department') }}</option>
                        <option v-for="department in departments" v-bind:value="department.id">{{ department.name }}</option>
                    </select>
                    <label>{{ lang('Department') }}</label>
                </div>
                <div class="md-form">
                    <input type="email" id="email" class="form-control" name="email" v-model="employee.email" required>
                    <label for="email" class="">{{ lang('Email') }}</label>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <select class="mdb-select" v-model="employee.mobile_pre">
                            <option disabled>{{ lang('Choose') }}</option>
                            <option v-for="area_code in mobile_area_codes" v-bind:value="area_code">{{ area_code }}</option>
                        </select>
                        <label>{{ lang('Area Code') }}</label>
                    </div>
                    <div class="col-md-6">
                        <div class=" md-form">
                            <input type="tel" id="mobile" class="form-control" name="mobile" v-model="employee.mobile">
                            <label for="mobile" class="">{{ lang('Mobile Phone') }}</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" md-form">
                            <input type="tel" id="mobile-vpn" class="form-control" name="mobile_vpn" v-model="employee.mobile_vpn">
                            <label for="mobile-vpn" class="">{{ lang('VPN Mobile Phone') }}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <select class="mdb-select" v-model="employee.phone_pre">
                            <option disabled>{{ lang('Choose') }}</option>
                            <option v-for="area_code in area_codes" v-bind:value="area_code">{{ area_code }}</option>
                        </select>
                        <label>{{ lang('Area Code') }}</label>
                    </div>
                    <div class="col-md-6">
                        <div class=" md-form">
                            <input type="tel" id="phone" class="form-control" name="phone" v-model="employee.phone">
                            <label for="phone" class="">{{ lang('Phone') }}</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" md-form">
                            <input type="tel" id="phone_vpn" class="form-control" name="phone_vpn" v-model="employee.phone_vpn">
                            <label for="phone_vpn" class="">{{ lang('VPN phone') }}</label>
                        </div>
                    </div>
                </div>
                <div class="md-form">
                    <input type="text" id="room" class="form-control" name="room" v-model="employee.room">
                    <label for="room" class="">{{ lang('Office Location') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form3" class="form-control" name="address" v-model="employee.address">
                    <label for="form3" class="">{{ lang('Address') }}</label>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="md-form">
                            <input type="text" id="city" class="form-control" name="city" v-model="employee.city">
                            <label for="city" class="">{{ lang('City') }}</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <input type="text" id="postal-code" class="form-control" name="postal_code" v-model="employee.postal_code">
                            <label for="postal-code" class="">{{ lang('Postal Code') }}</label>
                        </div>
                    </div>
                </div>
                <div class="md-form">
                    <input type="password" class="form-control" name="password" v-model="password">
                    <label>{{ lang('Password') }}</label>
                </div>
                <div class="md-form">
                    <input type="password" class="form-control" name="password2" v-model="password2">
                    <label>{{ lang('Repeat Password') }}</label>
                </div>
            </div>

            <div class="col-md-6 order-sm-first">
                <div class="page-name-l mb-4">{{ lang('Image') }}</div>
                <div class="d-flex flex-column align-items-center">
                    <img v-bind:src="employee.image" class="profile-xl">
                    <div></div>
                    <div class="file-field">
                    <div class="btn btn-neutral mt-3">
                        <span>{{ lang('Upload New Image') }}</span>
                        <input type="file" v-on:change="previewImage($event.target)">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 d-flex p-2">
            <button type="submit" class="btn btn-lg btn-save" v-on:click="saveEmployee">{{ lang('Save') }}</button>
            <button type="button" class="btn btn-lg btn-cancel" v-on:click="$router.go(-1)">{{ lang('Cancel') }}</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mobile_area_codes : [
                    '091', '092',  '095', '097', '098', '099'
                ],
                area_codes: [
                    '01', '020', '021', '022', '023',
                    '031', '032', '033', '034', '035',
                    '040', '042', '043', '044', '047',
                    '048', '049', '051', '052', '053'
                ],
                departments: [],
                employee: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    mobile_pre: '',
                    mobile: '',
                    mobile_vpn: '',
                    phone_pre: '',
                    phone: '',
                    phone_vpn: '',
                    room: '',
                    address: '',
                    city: '',
                    postal_code: '',
                    image: '',
                    sex: '',
                    department_id: '',
                },
                new_image: false,
                password: '',
                password2: ''
            }
        },
        methods: {
            previewImage(input) {
                if (input.files && input.files[0]) {
                    this.new_image = input;
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        this.employee.image = e.target.result;
                    }.bind(this);

                    reader.readAsDataURL(input.files[0]);
                }
            },
            saveEmployee() {
                let data = new FormData();
                for ( let key in this.employee ) {
                    data.append(key, this.employee[key]);
                }
                if (this.new_image) {
                    data.append('new_image', this.new_image.files[0], this.new_image.files[0].name);
                }
                if (this.password) {
                    if (this.password === this.password2) {
                        data.append('password', this.password);
                    }
                    else {
                        toastr.error(this.lang('Password must match'));
                        return;
                    }
                }
                if (this.$route.params.id) {
                    axios.post('/api/human_resources/employee/' + this.$route.params.id, data)
                        .then(() => {
                            toastr.success(this.lang('Succesfully saved an employee'));
                            window.location.href= '/human_resources/employee/'+this.$route.params.id+'/show';
                        })
                }
                else {
                    axios.post('/api/human_resources/employee', data)
                        .then((res) => {
                            toastr.success(this.lang('Succesfully saved an employee'));
                            window.location.href= '/human_resources/employee/'+res.data.id+'/show';
                        })
                }
            }
        },
        mounted() {
            axios.get('/api/human_resources/departments')
                .then((res) => {
                    this.departments = res.data.rows;
                    setTimeout(() => {
                        $('.mdb-select').material_select('destroy');
                        $('.mdb-select').material_select();
                    }, 300);
                })
                .catch(() => {});

            if (this.$route.params.id) {
                axios.get('/api/human_resources/employee/' + this.$route.params.id)
                    .then((res) => {
                        this.employee = res.data;
                        setTimeout(() => {
                            $('.mdb-select').material_select('destroy');
                            $('.mdb-select').material_select();
                        }, 300);

                    })
                    .catch(() => {});
            }

        }
    }
</script>