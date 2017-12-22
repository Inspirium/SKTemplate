<template>
    <ol class="breadcrumb d-flex align-items-center">
        <li v-bind:class="['breadcrumb-item', (index+1)===items.length?'active':'']" v-for="(item, index) in items"><a v-bind:href="item.link">{{ lang(item.name) }}</a></li>
    </ol>
</template>

<script>
    export default {
        name: "breadcrumbs",
        data() {
            return {}
        },
        computed: {
            items() {
                let out = [
                    {
                        link: '/',
                        name: 'Home'
                    }
                ];
                let path = this.$route.path.split('/');
                switch (path[1]) {
                    case 'human_resources':
                        out.push({
                            link: '/human_resources',
                            name: 'Human Resources'
                        });
                        switch (path[2]) {
                            case 'employees':
                            case 'employee':
                                out.push({
                                    link: '/human_resources/employees',
                                    name: 'Employees'
                                });
                                break;
                            case 'departments':
                            case 'department':
                                out.push({
                                    link: '/human_resources/departments',
                                    name: 'Departments'
                                });
                                break;
                            case 'roles':
                            case 'role':
                                out.push({
                                    link: '/human_resources/roles',
                                    name: 'Roles'
                                });
                                break;
                        }
                        break;
                    case 'propositions':
                        out.push({
                            link: '/propositions',
                            name: 'Propositions'
                        });
                        break;
                    case 'proposition':
                        out.push({
                            link: '/propositions',
                            name: 'Propositions'
                        });
                        if (path[2]==='start') {
                            out.push({
                                link: '/proposition/start',
                                name: 'New Proposition'
                            });
                        }
                        else {
                            out.push({
                                link: '/proposition/'+path[2]+'/edit/start',
                                name: this.$store.state.proposition.start.project_name?this.$store.state.proposition.start.project_name:'untitled-'+path[2]
                            });
                            out.push({
                                link: '/proposition/'+path[2]+'/'+path[3]+(path.length>4)?path[4]:'',
                                name: this.$route.meta['breadcrumb']
                            });
                        }
                        break;
                    case 'books':
                    case 'book':
                        out.push({
                            link: '/books',
                            name: 'Books'
                        });
                        switch (path[2]) {
                            case 'authors':
                                out.push({
                                    link: '/books/authors',
                                    name: 'Authors'
                                });
                                break;
                        }
                        break;
                    case 'tasks':
                    case 'task':
                        out.push({
                            link: '/tasks',
                            name: 'Tasks'
                        });
                        switch (path[2]) {
                            case 'department':
                                out.push({
                                    link: '/tasks/department/'+path[2],
                                    name: 'Department'
                                });
                                break;
                        }
                        break;
                    case 'notifications':
                        out.push({
                            link: '/notifications',
                            name: 'Notifications'
                        });
                        break;
                }
                return out;
            }
        }
    }
</script>
