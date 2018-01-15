<template>
    <ul class="collapsible collapsible-accordion">
        <li v-if="editing_proposition"><a href="/propositions">Povratak</a></li>
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
            user() {
                return this.$store.state.employee;
            },
            active: function() {
                return this.$route.path.split('/');
            },
            id: function() {
                return this.$store.state.proposition.proposition_id;
            },
            editing_proposition: function() {
                return this.active[1] === 'proposition';
            },
            lroutes:function() {
                let routes;
                if (this.editing_proposition && this.can('access_proposition_admin')) {
                    routes = {
                        proposition: {
                            enabled: true,
                            title: 'Proposition',
                            order: 0,
                            key: 'edit',
                            children : {
                            start: {
                                enabled: true,
                                path: '/proposition/'+this.id+'/edit/start',
                                title: 'Start',
                                component: true
                            },
                            basic_data: {
                                enabled: true,
                                title: 'Basic Data',
                                path: '/proposition/'+this.id+'/edit/basic_data',
                                component: true
                            },
                            categorization: {
                                enabled: true,
                                title: 'Categorization',
                                path: '/proposition/'+this.id+'/edit/categorization',
                                component: true
                            },
                            market_potential: {
                                enabled: true,
                                title: 'Market Potential',
                                path: '/proposition/'+this.id+'/edit/market_potential',
                                component: true
                            },
                            technical_data: {
                                enabled: true,
                                title: 'Technical Data',
                                path: '/proposition/'+this.id+'/edit/technical_data',
                                component: true
                            },
                            print: {
                                enabled: true,
                                title: 'Print',
                                path: '/proposition/'+this.id+'/edit/print',
                                component: true
                            },
                            authors_expense: {
                                enabled: true,
                                title: 'Authors Expense',
                                path: '/proposition/'+this.id+'/edit/authors_expense',
                                component: true
                            },
                            production_expense: {
                                enabled: true,
                                title: 'Production Expense',
                                path: '/proposition/'+this.id+'/edit/production_expense',
                                component: true
                            },
                            marketing_expense: {
                                enabled: true,
                                title: 'Marketing Expense',
                                path: '/proposition/'+this.id+'/edit/marketing_expense',
                                component: true
                            },
//                            distribution_expense: {
//                                enabled: true,
//                                title: 'Distribution Expense',
//                                path: '/proposition/'+this.id+'/edit/distribution_expense',
//                                component: true
//                            },
                            layout_expense: {
                                enabled: true,
                                title: 'Layout Expense',
                                path: '/proposition/'+this.id+'/edit/layout_expense',
                                component: true
                            },
                            deadline: {
                                enabled: true,
                                title: 'Deadline',
                                path: '/proposition/'+this.id+'/edit/deadline',
                                component: true
                            },
                            precalculation: {
                                enabled: false,
                                title: 'Calculation',
                                path: '/proposition/'+this.id+'/edit/precalculation',
                                component: true
                            },
                            calculation: {
                                enabled: true,
                                title: 'Calculation',
                                path: '/proposition/'+this.id+'/edit/calculation',
                                component: true
                            }
                        }
                        },
                        final_price: {
                            enabled: true,
                            title: 'Final Price',
                            order: 1,
                            key: 'final_price',
                            children : {
                                price_definition: {
                                    enabled: true,
                                    title: 'Price Definition',
                                    path: '/proposition/'+this.id+'/final_price/price_definition',
                                    component: true
                                },
                            }
                        },
                        expenses: {
                            enabled: true,
                            title: 'Expenses',
                            order: 2,
                            key: 'expenses',
                            children : {
                                authors_expense: {
                                    enabled: true,
                                    title: 'Authors Expense',
                                    path: '/proposition/'+this.id+'/expenses/authors_expense',
                                    component: true
                                },
                                production_expense: {
                                    enabled: true,
                                    title: 'Production Expense',
                                    path: '/proposition/'+this.id+'/expenses/production_expense',
                                    component: true
                                },
                                marketing_expense: {
                                    enabled: true,
                                    title: 'Marketing Expense',
                                    path: '/proposition/'+this.id+'/expenses/marketing_expense',
                                    component: true
                                },
//                                distribution_expense: {
//                                    enabled: true,
//                                    title: 'Distribution Expense',
//                                    path: '/proposition/'+this.id+'/expenses/distribution_expense',
//                                    component: true
//                                },
                                layout_expense: {
                                    enabled: true,
                                    title: 'Layout Expense',
                                    path: '/proposition/'+this.id+'/expenses/layout_expense',
                                    component: true
                                },
                                compare: {
                                    enabled: true,
                                    title: 'Compare',
                                    path: '/proposition/'+this.id+'/expenses/compare',
                                    component: true
                                }
                            }
                        },
                        text_preparation: {
                            enabled: true,
                            title: 'Text Preparation',
                            order: 3,
                            key: 'preparation',
                            children : {
                                translation: {
                                    enabled: true,
                                    title: 'Translation',
                                    path: '/proposition/'+this.id+'/preparation/translation',
                                    component: true
                                },
                                technical_preparation: {
                                    enabled: true,
                                    title: 'Technical Preparation',
                                    path: '/proposition/'+this.id+'/preparation/technical_preparation',
                                    component: true
                                },
                                proofreading: {
                                    enabled: true,
                                    title: 'Proofreading',
                                    path: '/proposition/'+this.id+'/preparation/proofreading',
                                    component: true
                                },
                                additional_materials: {
                                    enabled: true,
                                    title: 'Additional Materials',
                                    path: '/proposition/'+this.id+'/preparation/additional_materials',
                                    component: true
                                },
                                reviews: {
                                    enabled: true,
                                    title: 'Reviews',
                                    path: '/proposition/'+this.id+'/preparation/reviews',
                                    component: true
                                },
                                lecture: {
                                    enabled: true,
                                    title: 'Lecture',
                                    path: '/proposition/'+this.id+'/preparation/lecture',
                                    component: true
                                },
                                technical_correction: {
                                    enabled: true,
                                    title: 'Technical Correction',
                                    path: '/proposition/'+this.id+'/preparation/technical_correction',
                                    component: true
                                },
                                final_review: {
                                    enabled: true,
                                    title: 'Final Review',
                                    path: '/proposition/'+this.id+'/preparation/final_review',
                                    component: true
                                },
                            }
                        },
                        design: {
                            enabled: true,
                            title: 'Design',
                            order: 4,
                            key: 'design',
                            children : {
                                cover_design: {
                                    enabled: true,
                                    title: 'Cover Design',
                                    path: '/proposition/'+this.id+'/design/cover_design',
                                    component: true
                                },
                                layout_design: {
                                    enabled: true,
                                    title: 'Layout Design',
                                    path: '/proposition/'+this.id+'/design/layout_design',
                                    component: true
                                },
                            }
                        },
                        layout: {
                            enabled: true,
                            title: 'Layout',
                            order: 5,
                            key: 'layout',
                            children : {
                                first_block_layout: {
                                    enabled: true,
                                    title: 'First Block Layout',
                                    path: '/proposition/'+this.id+'/layout/first_block_layout',
                                    component: true
                                },
                                cover: {
                                    enabled: true,
                                    title: 'Cover',
                                    path: '/proposition/'+this.id+'/layout/cover',
                                    component: true
                                },
                                layout: {
                                    enabled: true,
                                    title: 'Layout',
                                    path: '/proposition/'+this.id+'/layout/layout',
                                    component: true
                                },
                                first_revision: {
                                    enabled: true,
                                    title: 'First Revision',
                                    path: '/proposition/'+this.id+'/layout/first_revision',
                                    component: true
                                },
                                correction: {
                                    enabled: true,
                                    title: 'Correction',
                                    path: '/proposition/'+this.id+'/layout/correction',
                                    component: true
                                },
                                correction_input: {
                                    enabled: true,
                                    title: 'Correction Input',
                                    path: '/proposition/'+this.id+'/layout/correction_input',
                                    component: true
                                },
                                revisions: {
                                    enabled: true,
                                    title: 'Revisions',
                                    path: '/proposition/'+this.id+'/layout/revisions',
                                    component: true
                                },
                            }
                        },
                        prepress: {
                            enabled: true,
                            title: 'Prepress',
                            order: 6,
                            key: 'prepress',
                            children : {
                                print_proof: {
                                    enabled: true,
                                    title: 'Print Proof',
                                    path: '/proposition/'+this.id+'/prepress/print_proof',
                                    component: true
                                },
                                print_proof_correction: {
                                    enabled: true,
                                    title: 'Print Proof Correction',
                                    path: '/proposition/'+this.id+'/prepress/print_proof_correction',
                                    component: true
                                },
                                print: {
                                    enabled: true,
                                    title: 'Print',
                                    path: '/proposition/'+this.id+'/prepress/print',
                                    component: true
                                },
                                warehouse: {
                                    enabled: true,
                                    title: 'Warehouse',
                                    path: '/proposition/'+this.id+'/prepress/warehouse',
                                    component: true
                                },
                            }
                        },
                        additionals: {
                            enabled: true,
                            title: 'Additionals',
                            order: 7,
                            key: 'additionals',
                            children : {
                                multimedia: {
                                    enabled: true,
                                    title: 'Multimedia',
                                    path: '/proposition/'+this.id+'/additionals/multimedia',
                                    component: true
                                },
                                marketing: {
                                    enabled: true,
                                    title: 'Marketing',
                                    path: '/proposition/'+this.id+'/additionals/marketing',
                                    component: true
                                },
                            }
                        },
                    };
                }
                else {
                    routes = {
                        human_resources: {
                            enabled: true,
                            title: 'Human Resources',
                            order: 0,
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
                                },
                                roles: {
                                    enabled: this.can('employee_update_roles'),
                                    path: '/human_resources/roles',
                                    title: 'Roles'
                                }
                            }
                        },
                        propositions: {
                            enabled: this.can('access_proposition_admin'),
                            title: 'Propositions',
                            order: 1,
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
                                    path: '/proposition/start'
                                }
                            }
                        },
                        books: {
                            enabled: true,
                            title: 'Books',
                            order: 2,
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
                            order: 3,
                            key: 'tasks',
                            children: {
                                view: {
                                    enabled: true,
                                    path: '/tasks',
                                    title: 'Tasks',
                                    component: false
                                },
                                graphics: {
                                    enabled: this.canViewDepartmentTasks(1),
                                    path: '/tasks/department/1',
                                    title: 'Graphics',
                                    component: false
                                },
                                design: {
                                    enabled: this.canViewDepartmentTasks(71),
                                    path: '/tasks/department/71',
                                    title: 'Design Department',
                                    component: false
                                },
                                'editorial-1': {
                                    enabled: this.canViewDepartmentTasks(72),
                                    path: '/tasks/department/72',
                                    title: 'Editorial-1',
                                    component: false
                                },
                                'editorial-2': {
                                    enabled: this.canViewDepartmentTasks(73),
                                    path: '/tasks/department/73',
                                    title: 'Editorial-2',
                                    component: false
                                },
                                'editorial-3': {
                                    enabled: this.canViewDepartmentTasks(74),
                                    path: '/tasks/department/74',
                                    title: 'Editorial-3',
                                    component: false
                                },
                                management: {
                                    enabled: this.canViewDepartmentTasks(92),
                                    path: '/tasks/department/92',
                                    title: 'Management',
                                    component: false
                                }
                            }
                        },
                        notifications: {
                            enabled: true,
                            title: 'Notifications',
                            order: 4,
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
                            order: 5,
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
                }
                return _.sortBy(routes, ['order']);
            }
        },
        methods: {
            isGroupActive: function(val) {
                if (this.editing_proposition) {
                    return this.active[3] === val;
                }
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
            },
            can(role) {
                return _.find(this.user.roles, (o) => {
                    return o.name === role;
                });
            },
            canViewDepartmentTasks(department) {
                if (this.can('access_all_department_tasks')) {
                    return true;
                }
                return this.can('access_department_tasks') && this.user.department_id == department;

            }
        },
        mounted: function() {
            this.$store.dispatch('employee/initUser')
                .then(() => {

                })
        },
        watch: {
            lroutes() {
                setTimeout(() => {
                    $('.collapsible').collapsible();
                }, 300);
            }
        }
    }
</script>
