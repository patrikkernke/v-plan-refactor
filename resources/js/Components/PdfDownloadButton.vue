<template>
    <a
        :href="url"
        class="
            flex items-center w-full
            py-3 pl-5 pr-6
            shadow hover:shadow-lg dark:shadow
            bg-white rounded dark:bg-gray-700
            transition
        "
    >
        <DocumentDownloadIcon class="text-indigo-700 w-4 h-4 dark:text-indigo-400"/>

        <div class="ml-3 text-sm text-gray-600 text-left font-medium leading-none dark:text-gray-300">
            {{ label }}
        </div>
    </a>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import {DocumentDownloadIcon} from "@heroicons/vue/outline"

export default {
    props: {
        label: {
            type: String,
            default: 'Label'
        },
        url: {
            type: String,
            default: null
        }
    },

    components: {
        Link,
        DocumentDownloadIcon
    },
}
</script>
