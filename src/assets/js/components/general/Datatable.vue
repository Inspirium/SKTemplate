<template>
    <table :class="tblClass" :style="tblStyle">
        <thead>
        <th v-for="(col, idx) in columns"
            :key="col.title || col.field || idx"
            :class="col.thClass" :style="col.thStyle">
                {{ col.title }}
            <head-sort v-if="col.sortable" :field="col.field" :query="query" />
        </th>
        </thead>
        <draggable :element="'tbody'" :list="data">
            <tr v-for="(item,index) in data" :key="index">
                <td v-for="col in columns" :class="col.tdClass" :style="col.tdStyle">
                    {{ item[col.field] }}
                </td>
            </tr>
        </draggable>
    </table>
</template>

<script>
    import draggable from 'vuedraggable'
    import HeadSort from './datatable/HeadSort'

    export default {
        name: "datatable",
        components: {'head-sort': HeadSort, 'draggable' : draggable},
        props: {
            columns: { type: Array, required: true },
            data: { type: Array, required: true }, // rows
            total: { type: Number, required: true },
            query: { type: Object, required: true },
            selection: Array, // container for multi-select
            summary: Object, // an extra summary row
            xprops: Object, // extra custom props carrier passed to dynamic components
            Pagination: { type: Boolean, default: true }, // whether to render `PageSizeSelect` and `Pagination`
            pageSizeOptions: { type: Array, default: () => [10, 20, 40, 80, 100] },
            tblClass: [String, Object, Array], // classes for <table>
            tblStyle: [String, Object, Array], // inline styles for <table>
            fixHeaderAndSetBodyMaxHeight: Number, // a fancy prop which combines two props into one
        },
        data() {
            return {}
        },
        created () {
            // init query (make all the properties observable by using `$set`)
            const q = { limit: 10, offset: 0, sort: '', order: '', ...this.query }
            Object.keys(q).forEach(key => { this.$set(this.query, key, q[key]) })
        },
        watch: {
            data: {
                handler (data) {
                    const { supportNested } = this
                    // support nested components feature with extra magic
                    if (supportNested) {
                        data.forEach(item => {
                            if (!item.__nested__) {
                                this.$set(item, '__nested__', {
                                    comp: undefined, // current nested component
                                    visible: false,
                                    $toggle (comp, visible) {
                                        switch (arguments.length) {
                                            case 0:
                                                this.visible = !this.visible
                                                break
                                            case 1:
                                                switch (typeof comp) {
                                                    case 'boolean':
                                                        this.visible = comp
                                                        break
                                                    case 'string':
                                                    case 'object':
                                                        this.comp = comp
                                                        this.visible = !this.visible
                                                        break
                                                }
                                                break
                                            case 2:
                                                this.comp = comp
                                                this.visible = visible
                                                break
                                        }
                                    }
                                })
                                if (supportNested === 'accordion') {
                                    this.$watch(
                                        () => item.__nested__,
                                        nested => {
                                            // only one nested component can be expanded at the same time
                                            if (data.filter(({ __nested__ }) => __nested__.visible).length < 2) return

                                            data.forEach(({ __nested__ }) => {
                                                if (__nested__.visible && __nested__ !== nested) {
                                                    __nested__.visible = false
                                                }
                                            })
                                        },
                                        { deep: true }
                                    )
                                }
                                Object.defineProperty(item, '__nested__', { enumerable: false })
                            }
                        })
                    }
                },
                immediate: true
            }
        }
    }
</script>

<style scoped>

</style>