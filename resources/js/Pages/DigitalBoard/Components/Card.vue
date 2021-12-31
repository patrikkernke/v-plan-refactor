<template>

    <div class="bg-white rounded shadow-md mb-auto">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                    <h3 class="text-base leading-6 font-medium text-gray-900">
                        {{ title }}
                    </h3>
                </div>
                <div class="ml-4 mt-4 flex-shrink-0">
                    <button
                        @click="$emit('addDocument')"
                        class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <PlusSmIcon class="h-5 w-5" aria-hidden="true"/>
                    </button>
                </div>
            </div>
        </div>

        <div
            v-for="document in list"
            class="flex justify-between px-4 py-4 border-b border-gray-200 sm:px-6"
        >

            <div class="flex items-center space-x-1">
                <DocumentTextIcon class="w-5 h-5 text-gray-400" />
                <span class="text-sm text-gray-800">
                    {{ document.label }}
                </span>
            </div>

            <div class="flex items-center space-x-2">
                <a :href="route('digital-board.download', document.id)">
                    <DownloadIcon class="w-4 h-4 text-gray-300 hover:text-indigo-600 transition" />
                </a>
                <Link
                    as="button"
                    :href="route('digital-board.destroy', document.id)"
                    method="DELETE"
                >
                    <MinusCircleIcon class="w-4 h-4 text-gray-300 hover:text-red-600 transition" />
                </Link>
            </div>

        </div>
    </div>

</template>

<script>
import {DocumentTextIcon, DownloadIcon, PlusSmIcon} from "@heroicons/vue/outline"
import {EyeIcon, MinusCircleIcon} from "@heroicons/vue/solid"
import {Link} from "@inertiajs/inertia-vue3"
import ButtonLink from "@/Components/ButtonLink"

export default {
    props: {
        title: {
            type: String,
            default: 'Your title'
        },
        list: {
            type: Object,
            default: null
        }

    },

    components: {
        PlusSmIcon,
        DocumentTextIcon,
        EyeIcon,
        MinusCircleIcon,
        Link,
        ButtonLink,
        DownloadIcon
    }
}
</script>
