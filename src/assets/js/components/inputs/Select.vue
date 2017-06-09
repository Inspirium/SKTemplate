<template>
    <div class="select-wrapper">
        <span v-bind:class="{ caret: true, disabled: opened}">▼</span><input type="text" class="select-dropdown" v-bind:readonly="search" data-activates="select-options-" v-on:focus="openDropdown">
        <ul id="select-options-" class="dropdown-content select-dropdown ">
            <li class="disabled" v-if="choose"><span>{{ choose }}</span></li>
            <li class="" v-for="(item, key) in active_options" v-bind:value="key"><span>{{ item.name }}</span></li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: [ 'choose', 'multiple', 'image', 'search', 'value' ],
        data: function() {
            return {
                opened: false,
                term: ''
            }
        },
        computed: {
            selected: function() {
                if (this.choose) {
                    if (this.value) {
                        return this.active_options[this.value];
                    }
                    else {
                        return this.choose;
                    }
                }
                return '';
            },
            active_options: function() {
                return this.options;
            }
        },
        methods: {
            openDropdown: function() {
                this.opened = !this.opened;
            }
        }
    }
</script>
