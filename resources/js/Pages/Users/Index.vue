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

            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <li v-for="user in users" :key="user.email" class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">

                    <div class="px-8 py-4">
                        <div class="flex">

                            <div class="flex-1">
                                <h3 class="text-gray-900 text-sm font-medium truncate">
                                    {{ user.name }}
                                </h3>

                                <div class="mt-2 space-y-1">
                                    <div class="flex items-center">
                                        <CheckCircleIcon v-if="user.canBe.chairmanAtPublicMeetings" class="h-4 w-4 text-green-400 mr-1"/>
                                        <XCircleIcon v-else class="h-4 w-4 text-gray-400 mr-1" />
                                        <span class="font-medium text-xs text-gray-600">Public Chairman</span>
                                    </div>
                                    <div class="flex items-center">
                                        <CheckCircleIcon v-if="user.canBe.watchtowerReader" class="h-4 w-4 text-green-400 mr-1"/>
                                        <XCircleIcon v-else class="h-4 w-4 text-gray-400 mr-1" />
                                        <span class="font-medium text-xs text-gray-600">Watchtower Reader</span>
                                    </div>
                                    <div class="flex items-center">
                                        <CheckCircleIcon v-if="user.canBe.serviceMeetingsLeader" class="h-4 w-4 text-green-400 mr-1"/>
                                        <XCircleIcon v-else class="h-4 w-4 text-gray-400 mr-1" />
                                        <span class="font-medium text-xs text-gray-600">Service Meetings Leader</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <KeyIcon v-if="user.can.login" class="w-5 h-5 text-gray-400"/>
                            </div>
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
import {CheckCircleIcon, KeyIcon, PlusSmIcon, XCircleIcon} from "@heroicons/vue/outline"

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        XCircleIcon,
        CheckCircleIcon,
        PlusSmIcon,
        KeyIcon,
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
