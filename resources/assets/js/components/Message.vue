<template>
    <div>
        <li class="list-group-item" :class="className">
            <slot></slot>
        </li>
        <small class="badge float-left" :class="">you</small>
    </div>
</template>

<script>
    export default {
        props: [
            'color'
        ],
        mounted() {
            console.log("Component mounted.");
        },
        computed: {
            className() {
                return 'list-group-item-' + this.color;
            },
            badgeName(){
                return 'badge-'+this.color;
            }

        },
    };
</script>