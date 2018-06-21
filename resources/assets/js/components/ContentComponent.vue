<template>
    <div class="text-center mb-3" v-if="level == 1">
        <div class="text-center mt-2">
            <a href="" class="btn btn-primary my-btn">
                <span v-if="loader"><img src="storage/site/loader.gif'"></span>
                {{ confirm }}
            </a>
            <a href="/" class="btn btn-primary my-btn">
                {{ cancel }}
            </a>
        </div>
    </div>

</template>

<script type="text/babel">
    export default {
        props: ['confirm', 'cancel', 'level'],
        data: function () {
            return {
                loader: false
            }
        },
        methods: {
            a: function () {
                alert(1)
            }
        }
    }
</script>
