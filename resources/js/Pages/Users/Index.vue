<template>

    <Head title="Users"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="items-center flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Users
                </h2>

                <Link :href="route('users.create')"
                      class="inline-flex items-center p-1.5 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <PlusSmIcon class="h-5 w-5" aria-hidden="true"/>
                </Link>
            </div>
        </template>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="flex justify-end py-6">

            </div>

            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <li v-for="user in users" :key="user.email" class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="px-8 py-4">
                        <h3 class="text-gray-900 text-sm font-medium truncate">{{ user.name }}</h3>
                        <div class=" text-sm inline-flex items-center space-x-1">
                            <MailIcon class="text-gray-400 h-4 w-4"/>
                            <span class="text-gray-500">
                                {{ user.email }}
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {Head, Link} from '@inertiajs/inertia-vue3'
import {CheckCircleIcon, MailIcon, PlusSmIcon} from "@heroicons/vue/solid"

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        CheckCircleIcon,
        MailIcon,
        PlusSmIcon,
        Link
    },
    props: {
        'users': {
            type: Array,
            default: []
        }
    }
}
</script>
