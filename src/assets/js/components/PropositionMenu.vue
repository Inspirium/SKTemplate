<template>
    <ul class="collapsible collapsible-accordion">
        <li v-for="route_group in this.lroutes" v-if="route_group.enabled">
            <a href="#" v-bind:class="[ 'collapsible-header', 'nav-link', isGroupActive(route_group.key)?'active':'']">{{ lang(route_group.title) }}</a>
            <div class="collapsible-body" v-if="Object.keys(route_group.children).length">
                <ul>
                    <li v-for="(route, key) in route_group.children" v-if="route.enabled">
                        <template v-if="route.component">
                                <router-link v-bind:class="['waves-effect']" :to="route.path">{{ lang(route.title) }}</router-link>
                        </template>
                        <template v-else>
                                <a v-bind:href="route.path" v-bind:class="['waves-effect', isComplete(route_group.order, key), isActive(route_group.order, key)?'active':'']">{{ lang(route.title) }}</a>
                        </template>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</template>
<script>
    export default {
        data: function () {
            return {

            }
        },
        computed: {
            active: function() {
                return this.$route.path.split('/');
            },
            editing_proposition: function() {
                return this.active[1] === 'proposition';
            },
            lroutes:function() {
                let routes = {
                    administration: {
                        enabled: true,
                        title: 'Administration',
                        order: 0,
                        key: 'administration',
                        children: {
                            users: {
                                enabled: true,
                                path: '/administration/users',
                                title: 'Users'
                            },
                            add_user: {
                                enabled: true,
                                path: '/administration/users/edit',
                                title: 'Add User'
                            },
                            roles: {
                                enabled: true,
                                path: '/administration/roles',
                                title: 'Roles'
                            },
                            add_role: {
                                enabled: true,
                                path: '/administration/roles/edit',
                                title: 'Add Role'
                            }
                        }
                    },
                    human_resources: {
                        enabled: true,
                        title: 'Human Resources',
                        order: 1,
                        key: 'human_resources',
                        children: {
                            employees: {
                                enabled: true,
                                path: '/human_resources/employees',
                                title: 'Employees'
                            },
                            departments: {
                                enabled: true,
                                path: '/human_resources/departments',
                                title: 'Departments'
                            }
                        }
                    },
                    propositions: {
                        enabled: true,
                        title: 'Propositions',
                        order: 2,
                        key: 'propositions',
                        children: {
                            propositions: {
                                enabled: true,
                                path: '/propositions',
                                title: 'Propositions'
                            },
                            add_new: {
                                enabled: true,
                                title: 'Add new',
                                path: '/proposition/basic_data'
                            }
                        }
                    },
                    books: {
                        enabled: true,
                        title: 'Books',
                        order: 3,
                        key: 'books',
                        children: {
                            books: {
                                enabled: true,
                                path: '/books',
                                title: 'Books'
                            },
                            authors: {
                                enabled: true,
                                path: '/books/authors',
                                title: 'Authors'
                            }
                        }
                    },
                    tasks: {
                        enabled: true,
                        title: 'Task Management',
                        order: 4,
                        key: 'tasks',
                        children: {
                            view: {
                                enabled: true,
                                path: '/tasks',
                                title: 'Tasks'
                            }
                        }
                    },
                    notifications: {
                        enabled: true,
                        title: 'Notifications',
                        order: 5,
                        key: 'notifications',
                        children: {
                            view: {
                                enabled: true,
                                path: '/notifications',
                                title: 'Notifications'
                            }
                        }
                    },
                    messages: {
                        enabled: true,
                        title: 'Messages',
                        order: 6,
                        key: 'messages',
                        children: {
                            view: {
                                enabled: true,
                                path: '/messages',
                                title: 'Messages'
                            },
                            add: {
                                enabled: true,
                                path: '/messages/new',
                                title: 'New Message'
                            }
                        }
                    }
                };

                if (this.editing_proposition) {
                    delete(routes.propositions);
                    routes.proposition = {
                        enabled: true,
                        title: 'Propositions',
                        order: 2,
                        key: 'proposition',
                        children : {
                            basic_data: {
                                enabled: true,
                                title: 'Basic Data',
                                path: '/proposition/basic_data',
                                component: true
                            },
                            categorization: {
                                enabled: true,
                                title: 'Categorization',
                                path: '/proposition/categorization',
                                component: true
                            },
                            market_potential: {
                                enabled: true,
                                title: 'Market Potential',
                                path: '/proposition/market_potential',
                                component: true
                            },
                            technical_data: {
                                enabled: true,
                                title: 'Technical Data',
                                path: '/proposition/technical_data',
                                component: true
                            },
                            print: {
                                enabled: true,
                                title: 'Print',
                                path: '/proposition/print',
                                component: true
                            },
                            authors_expense: {
                                enabled: true,
                                title: 'Authors Expense',
                                path: '/proposition/authors_expense',
                                component: true
                            },
                            production_expense: {
                                enabled: true,
                                title: 'Production Expense',
                                path: '/proposition/production_expense',
                                component: true
                            },
                            marketing_expense: {
                                enabled: true,
                                title: 'Marketing Expense',
                                path: '/proposition/marketing_expense', //component: true
                            },
                            distribution_expense: {
                                enabled: true,
                                title: 'Distribution Expense',
                                path: '/proposition/distribution_expense',
                              //  component: true
                            },
                            layout_expense: {
                                enabled: true,
                                title: 'Layout Expense',
                                path: '/proposition/layout_expense',
                              //  component: true
                            },
                            deadline: {
                                enabled: true,
                                title: 'Deadline',
                                path: '/proposition/deadline',
                              //  component: true
                            },
                            precalculation: {
                                enabled: true,
                                title: 'Precalculation',
                                path: '/proposition/precalculation',
                              //  component: true
                            },
                            calculation: {
                                enabled: true,
                                title: 'Calculation',
                                path: '/proposition/calculation',
                               // component: true
                            },
                            work_order: {
                                enabled: true,
                                title: 'Work Order',
                                path: '/proposition/word_order',
                              //  component: true
                            }
                        }
                    }
                }

                return _.sortBy(routes, ['order']);
            }
        },
        methods: {
            isGroupActive: function(val) {
                return this.active[1] === val;
            },
            isActive: function(group, key) {
                return this.$route.path === this.lroutes[group].children[key].path;
            },
            isComplete: function(group_key, key) {

                if (this.$route.path === this.lroutes[group_key].children[key].path) {
                    if (this.lroutes[group_key].children[key].status === 'incomplete') {
                        return 'menu-incomplete';
                    }
                    if (this.lroutes[group_key].children[key].status === 'complete') {
                        return 'menu-complete';
                    }
                }
                return '';
            }
        },
        mounted: function() {
        }
    }
</script>
