<template>
    <Link :class="buttonStyle"
          class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm font-medium   focus:outline-none transition ease-in-out duration-150 focus:ring-2 focus:ring-offset-2"
    >
        <slot />
    </Link>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3"

export default {
    components: {
        Link
    },

    props: {
        appearance: {
            type: String,
            default: 'primary'
        }
    },

    data() {
        return {
            styles: {
                primary: 'text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-gray-900',
                secondary: 'text-gray-600 bg-gray-200 hover:text-white hover:bg-gray-700 active:bg-gray-600 focus:outline-none focus:ring-gray-400 ',
                danger: 'text-white bg-red-600 hover:bg-red-500 active:bg-red-500 focus:outline-none focus:ring-red-500',
            }
        }
    },

    computed: {
        buttonStyle() {
            return this.styles[this.appearance]
        }
    }
}
</script>
