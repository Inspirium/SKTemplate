<template>
    <div>
    <div class="page-name-xl mb-2 mt-3">{{ lang( strings['title'] ) }}</div>
        <div class="md-form input-group search-big">
            <input type="search" class="form-control" v-model="filterKey" v-bind:placeholder="lang('Search...')">
        </div>
    <div class="btn-header d-flex p-2" v-if="links['add_new']">
        <a v-bind:href="links['add_new']" class="btn btn-lg btn-blank"><i class="fa fa-plus left"></i>{{ lang( strings['add_new'] ) }}</a>
    </div>
    <table class="table table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th v-for="(item, key) in computed_columns"
                @click="sortBy(key)"
                :class="{ active: sortKey == key }">
                {{ lang(item['title']) }}
                <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span>
            </th>
            <th>Akcije</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(entry, index) in filteredData">
            <th scope="row">{{ index+1 }}</th>
            <td v-for="(item, key) in computed_columns">
                <template v-if="key === 'name' && links['show']">
                    <a v-bind:href="links['show'] | add_id(entry)">{{entry[key]}}</a>
                </template>
                <template v-else-if="item['image']">
                    <img v-bind:src="entry[key]" class="profile-m-1 mr-1 align-self-center">
                </template>
                <template v-else>
                    {{entry[key]}}
                </template>
            </td>
            <td>
                <a v-if="links['edit']" class="color-grey" v-bind:href="links['edit'] | add_id(entry)" v-bind:title="lang('Edit')"><i class="fa fa-pencil"></i></a>
                <a class="color-grey" v-if="links['delete']"  v-bind:title="lang('Delete')" v-on:click.prevent="deleteWarning(entry)"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
        <inspirium-warning-modal v-on:warning="deleteUser"></inspirium-warning-modal>
    </div>
</template>

<script>
    import pathToRegexp from 'path-to-regexp'
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
                filterKey: '',
                to_delete: 0
            }
        },
        computed: {
            computedData() {
                return this.data;
            },
            filteredData: function () {
                let sortKey = this.sortKey;
                let filterKey = this.filterKey && this.filterKey.toLowerCase();
                let order = this.sortOrders[sortKey] || 1;
                let data = this.computedData;
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
            },
            computed_columns: function () {
                let columns = this.columns;
                columns = _.pickBy(columns, function (row) {
                    if (!row['breakpoint']) {
                        return row;
                    }
                    else if ( window.innerWidth > window.breakpoints[row['breakpoint']] ){
                        return row;
                    }
                });
                return columns;
            }
        },
        filters: {
            add_id: function(str, entry) {
                let toPath = pathToRegexp.compile(str);
                return toPath({id: entry.id});
            }
        },
        methods: {
            sortBy: function (key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1
            },
            deleteWarning(entry) {
                this.to_delete = entry;
                $('#modal-warning').modal('show');
            },
            deleteUser() {
                axios.delete(this.$options.filters.add_id(this.links['delete'], this.to_delete))
                    .then(() => {
                        this.computedData = _.filter(this.computedData, (o) => {
                            return (o.id !== this.to_delete.id)
                        });
                        toastr.success(this.lang('Success'));
                    })
                    .catch(() => {
                        toastr.error(this.lang('Action failed'));
                    });
            }
        }
    }
</script>
