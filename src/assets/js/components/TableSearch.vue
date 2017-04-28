<template>
    <div>
    <div class="page-name-xl mb-2">{{ lang( strings['title'] ) }}</div>
        <div class="md-form input-group search-big">
            <input type="search" class="form-control" v-model="filterKey" v-bind:placeholder="lang('Search...')">
        </div>
    <div class="btn-header d-flex p-2">
        <a href="#" class="btn btn-lg btn-unique"><i class="fa fa-plus left"></i>{{ lang( strings['add_new'] ) }}</a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th v-for="(item, key) in columns"
                @click="sortBy(key)"
                :class="{ active: sortKey == key }">
                {{ lang(item) | capitalize }}
                <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
          </span>
            </th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(entry, index) in filteredData">
            <th scope="row">{{ index+1 }}</th>
            <td v-for="(item, key) in columns">
                <template v-if="key === 'name' && links['show']">
                    <a v-bind:href="links['show'] | add_id(entry)">{{entry[key]}}</a>
                </template>
                <template v-else>
                    {{entry[key]}}
                </template>
            </td>
            <td>
                <a class="color-grey" v-bind:href="links['edit'] | add_id(entry)" v-bind:title="lang('Edit')"><i class="fa fa-pencil"></i></a>
                <a class="color-grey" v-bind:href="links['delete'] | add_id(entry)" v-bind:title="lang('Delete')"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
    export default {
        props: {
            data: Array,
            columns: Object,
            strings: Object,
            links: Object
        },
        data: function () {
            let sortOrders = {};
            _.forEach(this.columns, function(value, key) {
                sortOrders[key] = 1
            });
            return {
                sortKey: '',
                sortOrders: sortOrders,
                filterKey: ''
            }
        },
        computed: {
            filteredData: function () {
                let sortKey = this.sortKey;
                let filterKey = this.filterKey && this.filterKey.toLowerCase();
                let order = this.sortOrders[sortKey] || 1;
                let data = this.data;
                if (filterKey) {
                    data = data.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                        })
                    })
                }
                if (sortKey) {
                    data = data.slice().sort(function (a, b) {
                        a = a[sortKey];
                        b = b[sortKey];
                        return (a === b ? 0 : a > b ? 1 : -1) * order
                    })
                }
                return data
            }
        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            },
            add_id: function(str, entry) {
                return str + '/' + entry['id'];
            }
        },
        methods: {
            sortBy: function (key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1
            }
        }
    }
</script>
